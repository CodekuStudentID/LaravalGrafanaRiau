<?php

use App\Http\Controllers\ArtisanController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebsiteController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

use function Laravel\Prompts\text;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/testing', function() {
    return 'success';
});

Route::get('/auth-choice', function () {
    return view('auth.choice');
})->name('auth.choice');

Route::get('/user/login', function() {
    return view('web.login');
})->name('user.login');

Route::get('/user/register', function(){
    return view('web.register');
})->name('user.register');

// Route::get('/postingan', [PostController::class, 'index'])->name('post.index');
// Route::get('/postingan/baru', [PostController::class, 'GetForm'])->name('post.form');
// Route::post('/postingan/baru/ditambahkan', [PostController::class, 'store'])->name('post.store');

Route::get('/', [WebsiteController::class, 'index'])->name('web.index');
Route::get('/berita/{slug}', [WebsiteController::class, 'show'])->name('web.show');
Route::post('/posts/{id}/track-view', [WebsiteController::class, 'trackView'])->name('posts.track-view');
Route::post('/kabar/likes', [WebsiteController::class, 'likes'])->name('web.likes');

Route::get('/privacy-policy', [WebsiteController::class, 'Privacy'])->name('web.privacy');
Route::get('/terms-of-services', [WebsiteController::class, 'Terms'])->name('web.terms');
Route::get('/about', [WebsiteController::class, 'About'])->name('web.about');
Route::get('/contacts', [WebsiteController::class, 'Contacts'])->name('web.contacts');
Route::get('/category/{slug}', [WebsiteController::class, 'categoryPost'])->name('web.category');
Route::get('/contributor', [WebsiteController::class, 'jurnalis'])->name('web.jurnalis');

// Jalankan ini dulu untuk tes koneksi
Route::get('/cek-koneksi', [ArtisanController::class, 'test']);
// Jalankan ini saat sudah di hosting (Satu link untuk semua command)
Route::get('/gas-deploy', [ArtisanController::class, 'deploy']);

Route::get('/buat-admin', function () {
    $user = User::create([
        'name' => 'Admin Dunia Kampar',
        'email' => 'admin@gmail.com', // Sesuaikan emailnya
        'password' => Hash::make('password123'), // Sesuaikan passwordnya
    ]);

    return "User Admin Berhasil Dibuat! Silakan login dengan password: password123";
});

Route::get('/perbaiki-gambar', function () {
    // 1. Tentukan path shortcut di public_html
    $shortcut = base_path('../public_html/storage');

    // 2. Hapus link lama kalau ada (biar tidak bentrok)
    if (file_exists($shortcut) || is_link($shortcut)) {
        // Pakai cara PHP asli biar lebih aman di hosting
        if (is_link($shortcut)) {
            unlink($shortcut);
        } else {
            File::deleteDirectory($shortcut);
        }
    }

    // 3. Jalankan perintah storage:link bawaan Laravel
    // Ini otomatis membaca config yang ada di buletin-kampar
    Artisan::call('storage:link');

    return "<h1>✅ Link Gambar Berhasil Diperbaiki ke Project Baru!</h1><p>Silakan cek gambar di website Ocu.</p>";
});

Route::get('/gas-migrate', function () {
    try {
        Artisan::call('migrate', [
            '--force' => true, // Wajib di production/hosting
        ]);
        return "Alhamdulillah, Tabel Visitors lah Tabuek, Cu! <br><pre>" . Artisan::output() . "</pre>";
    } catch (\Exception $e) {
        return "Ado muncuak error: " . $e->getMessage();
    }
});

require __DIR__.'/auth.php';
