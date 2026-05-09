<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Post;
use App\Models\User;

class PostStats extends BaseWidget
{
    protected function getStats(): array
    {
        // Cek apakah user yang login adalah admin
        $isAdmin = auth()->user()->email === 'admin@gmail.com';
        $userId = auth()->id();

        // --- LOGIKA QUERY BERITA ---
        $postQuery = Post::query();
        // Jika bukan admin, hanya hitung post milik sendiri
        if (!$isAdmin) {
            $postQuery->where('user_id', $userId);
        }

        // --- START ARRAY STATS ---
        $stats = [
            // Stat 1: Total Berita (Dinamis: Semua vs Milik Sendiri)
            Stat::make($isAdmin ? 'Total Berita' : 'Berita Saya', $postQuery->count())
                ->description($isAdmin ? 'Semua berita terbit' : 'Jumlah berita yang Anda tulis')
                ->descriptionIcon('heroicon-m-newspaper')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success'),

            // Stat 2: Total Views (Dinamis: Total Web vs Total Post Sendiri)
            Stat::make($isAdmin ? 'Total Views' : 'Views Berita Saya', $postQuery->sum('views') ?? 0)
                ->description('Interaksi pembaca')
                ->descriptionIcon('heroicon-m-eye')
                ->chart([15, 4, 10, 2, 12, 4, 20])
                ->color('emerald'),
        ];

        // --- KHUSUS ADMIN: Tambahkan statistik User ---
        if ($isAdmin) {
            // Stat 3: Pembaca Aktif
            $stats[] = Stat::make('Pembaca Aktif', User::count())
                ->description('User terdaftar')
                ->descriptionIcon('heroicon-m-users')
                ->chart([3, 5, 2, 8, 4, 10, 12])
                ->color('warning');

            // Stat 4: Total Pembaca Gabungan
            $stats[] = Stat::make('Total Pembaca', User::count())
                ->description('User yang sudah bergabung')
                ->descriptionIcon('heroicon-m-users')
                ->color('success')
                ->chart([7, 3, 4, 5, 6, 3, 5, 10]);
        }

        return $stats;
    }
}
