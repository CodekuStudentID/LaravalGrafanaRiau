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
        // 1. Definisikan identitas login
        $user = auth()->user();
        $isAdmin = $user->email === 'admin@gmail.com';
        $userId = $user->id;

        // 2. LOGIKA QUERY BERITA (Satu query untuk dua statistik)
        $postQuery = Post::query();

        if (!$isAdmin) {
            $postQuery->where('user_id', $userId);
        }

        // 3. START ARRAY STATS
        $stats = [
            // Stat 1: Total Berita
            Stat::make($isAdmin ? 'Total Berita' : 'Berita Saya', $postQuery->count())
                ->description($isAdmin ? 'Semua berita dari seluruh jurnalis' : 'Jumlah berita yang Anda tulis')
                ->descriptionIcon('heroicon-m-newspaper')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success'),

            // Stat 2: Total Views (Berdasarkan Query di atas)
            Stat::make($isAdmin ? 'Total Seluruh Views' : 'Views Berita Saya', $postQuery->sum('views') ?? 0)
                ->description($isAdmin ? 'Total interaksi seluruh website' : 'Jumlah pembaca tulisan Anda')
                ->descriptionIcon('heroicon-m-eye')
                ->chart([15, 4, 10, 2, 12, 4, 20])
                ->color('emerald'),
        ];

        // 4. KHUSUS ADMIN: Statistik Manajemen User
        if ($isAdmin) {
            $stats[] = Stat::make('Total Jurnalis', User::count())
                ->description('Total kontributor terdaftar')
                ->descriptionIcon('heroicon-m-users')
                ->chart([3, 5, 2, 8, 4, 10, 12])
                ->color('warning');
        }

        return $stats;
    }
}
