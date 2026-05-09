<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Visitor; // WAJIB ADA
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class WebsiteController extends Controller
{
    public function index(Post $post)
    {
        $mostPopular = Post::orderBy('views', 'desc')->first();
        $topPosts = Post::orderBy('views', 'desc')->take(8)->get();
        $newPosts = Post::orderBy('created_at', 'desc')->paginate(3);

        $nasionalPost = Post::where('category', 'nasional')->take(3)->get();
        $culturePost = Post::where('category', 'asn')->latest()->get();
        $ppkPost = Post::where('category', 'ppk')->take(3)->get();
        $pgriPost = Post::where('category', 'pgri')->take(3)->get();
        $karirPost = Post::where('category', 'karir')->take(3)->get();
        $hiburanPost = Post::where('category', 'hiburan')->take(3)->get();

        return view('web.home', compact('mostPopular', 'topPosts', 'newPosts', 'nasionalPost', 'culturePost', 'ppkPost', 'pgriPost', 'karirPost'));
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();

        // 1. Ambiak User Agent (Info Browser/Bot)
        $userAgent = request()->header('User-Agent');

        // 2. Daftar Bot nan suko mampir (Google, Facebook, Twitter, dll)
        $bots = [
            'Googlebot',
            'bingbot',
            'Baiduspider',
            'yandex',
            'facebookexternalhit',
            'twitterbot',
            'rogerbot',
            'linkedinbot',
            'embedly',
            'quora link preview',
            'showyoubot',
            'outbrain',
            'pinterest',
            'slackbot',
            'vkShare',
            'W3C_Validator'
        ];

        // 3. Cek apakah nan mambuka ko adolah Bot
        $isBot = false;
        foreach ($bots as $bot) {
            if (stripos($userAgent, $bot) !== false) {
                $isBot = true;
                break;
            }
        }

        // 4. Cek apakah nan mambuka ko adolah Ocu (Admin)
        // Syarat: Ocu lah Login jo Email admin@gmail.com
        $isAdmin = auth()->check() && auth()->user()->email === 'admin@gmail.com';

        // 5. LOGIKA INCREMENT (Hanyo tambah views kalau BUKAN Bot & BUKAN Admin)
        if (!$isBot && !$isAdmin) {
            $post->increment('views');
        }

        // Data untuak UI (Sidebar)
        $popularPosts = Post::orderBy('views', 'desc')->take(8)->get();
        $latestPosts = Post::latest()->take(5)->get();

        return view('web.show', compact('post', 'popularPosts', 'latestPosts'));
    }

    public function trackView(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        // 1. Ambil Data IP dan User Agent
        $ip = $request->header('CF-Connecting-IP', $request->ip());
        $userAgent = $request->header('User-Agent') ?? 'Unknown';

        // 2. FILTER SEMUA BOT (Universal Bot Detection)
        // Pola ini mendeteksi hampir semua crawler, head-less browser, dan scraper
        $botRegex = '/bot|googlebot|crawler|spider|robot|crawling|slurp|archiver|curl|python|wget|phantomjs|headless|lighthouse/i';
        $isBot = preg_match($botRegex, $userAgent);

        // 3. Filter Email Admin
        $isAdminEmail = auth()->check() && auth()->user()->email === 'admin@gmail.com';

        // 4. Filter IP Owner
        $excludedIps = ['127.0.0.1', '::1', '182.1.6.215', '36.72.214.112', '116.206.36.2', '202.67.45.17'];
        $isOwnerIp = in_array($ip, $excludedIps);

        // 5. JALANKAN LOGIKA: Hanya proses jika BUKAN Bot, BUKAN Admin, dan BUKAN IP Owner
        if (!$isBot && !$isAdminEmail && !$isOwnerIp) {

            // Cek Unique Visitor 24 Jam (Cegah Spam Refresh)
            $alreadyVisited = Visitor::where('post_id', $post->id)
                ->where('ip_address', $ip)
                ->where('accessed_at', '>', now()->subDay())
                ->exists();

            if (!$alreadyVisited) {
                $post->increment('views');

                Visitor::create([
                    'post_id'    => $post->id,
                    'ip_address' => $ip,
                    'user_agent' => \Str::limit($userAgent, 250),
                    'accessed_at' => now(),
                ]);
            }
        }

        return response()->json(['status' => 'success']);
    }

    public function likes(Post $post)
    {
        $post->increment('likes');
        return redirect()->back();
    }

    public function Privacy()
    {
        return view('web.privacy');
    }

    public function Terms()
    {
        return view('web.terms');
    }

    public function About()
    {
        return view('web.about');
    }

    public function Contacts()
    {
        return view('web.contacts');
    }

    public function pagePost()
    {
        $data = [
            'nasional'      => Post::where('category', 'nasional')->latest()->take(5)->get(),
            'internasional' => Post::where('category', 'internasional')->latest()->take(4)->get(),
            'ekonomi'       => Post::where('category', 'ekonomi')->latest()->take(6)->get(),
            'budaya'        => Post::where('category', 'budaya')->latest()->take(4)->get(),
            'olahraga'      => Post::where('category', 'olahraga')->latest()->take(4)->get(),
            'teknologi'     => Post::where('category', 'teknologi')->latest()->take(5)->get(),
            'hiburan'       => Post::where('category', 'hiburan')->latest()->take(4)->get(),
            'lifestyle'     => Post::where('category', 'lifestyle')->latest()->take(4)->get(),
            'populer'       => Post::orderBy('views', 'desc')->take(5)->get(), // Berita Terpopuler
        ];

        return view('web.pagePost', $data);
    }

    //// App/Http/Controllers/PostController.php

    public function categoryPost($slug)
    {
        // 1. Konten Utama sesuai kategori yang diklik
        $mainPosts = Post::where('category', $slug)->latest()->paginate(12);
        $title = ucfirst($slug);

        // 2. Data Pendukung untuk Sidebar & Bottom Grid (Agar tidak Undefined)
        $sidebarPopuler = Post::orderBy('views', 'desc')->take(5)->get();

        // Ambil data untuk section bawah
        $ekonomi   = Post::where('category', 'ekonomi')->latest()->take(4)->get();
        $teknologi = Post::where('category', 'teknologi')->latest()->take(4)->get();
        $hiburan   = Post::where('category', 'hiburan')->latest()->take(4)->get();
        $olahraga  = Post::where('category', 'olahraga')->latest()->take(4)->get();
        $lifestyle = Post::where('category', 'lifestyle')->latest()->take(4)->get();
        $budaya    = Post::where('category', 'budaya')->latest()->take(4)->get();

        return view('web.categoryPage', compact('mainPosts', 'title', 'sidebarPopuler', 'ekonomi', 'teknologi', 'hiburan', 'budaya', 'olahraga', 'lifestyle', 'slug'));
    }

    public function jurnalis(){
        return view('web.cardJurnalis');
    }
}
