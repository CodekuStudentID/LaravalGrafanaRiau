<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Artisan;

class ArtisanController extends Controller
{
    // 1. Fungsi khusus untuk TEST (Cek apakah koneksi route ke controller jalan)
    public function test()
    {
        return view('maintenace.maintenance');
    }

    // 2. Fungsi Command Lengkap (Sekali klik jalan semua yang dibutuhkan hosting)
    public function deploy()
    {
        // Jalankan semua perintah esensial satu per satu
        Artisan::call('migrate --force');
        Artisan::call('storage:link');
        Artisan::call('optimize:clear');
        Artisan::call('view:cache');
        Artisan::call('config:cache');

        // Ambil output terakhir sebagai laporan
        return "Semua Perintah Berhasil Dieksekusi:<br><pre>" . Artisan::output() . "</pre>";
    }
}
