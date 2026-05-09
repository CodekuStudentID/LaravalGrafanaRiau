<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\Concerns\InteractsWithPageFilters; // INI KUNCINYA
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class HilltopStats extends BaseWidget
{
    use InteractsWithPageFilters; // Trait ajaib Filament

    protected static ?string $pollingInterval = '60s';

    // Tambahkan di dalam class HilltopStats
    public static function canView(): bool
    {
        // Hanya user dengan role 'admin' yang bisa melihat widget ini
        // Kontributor akan melihat dashboard bersih tanpa kotak saldo ini
        return auth()->check() && auth()->user()->role === 'admin';
    }

    protected function getStats(): array
    {
        // Filament otomatis mengisi $this->filters dari form Dashboard
        $startDate = $this->filters['startDate'] ?? now()->format('Y-m-d');
        $endDate = $this->filters['endDate'] ?? now()->format('Y-m-d');

        $cacheKey = "hilltop_stats_{$startDate}_{$endDate}";

        $data = Cache::remember($cacheKey, 600, function () use ($startDate, $endDate) {
            $apiKey = env('HILLTOP_API_KEY');
            $baseUrl = 'https://api.hilltopads.com/v1';

            try {
                $balanceRes = Http::withHeaders(['X-Api-Key' => $apiKey])
                    ->get("{$baseUrl}/publisher/balance");

                $statsRes = Http::withHeaders(['X-Api-Key' => $apiKey])
                    ->get("{$baseUrl}/publisher/listStats", [
                        'date_from' => $startDate,
                        'date_to'   => $endDate,
                    ]);

                $statsArray = $statsRes->json()['data'] ?? [];

                return [
                    'balance'     => $balanceRes->json()['balance'] ?? 0,
                    'impressions' => collect($statsArray)->sum('impressions'),
                    'revenue'     => collect($statsArray)->sum('revenue'),
                ];
            } catch (\Exception $e) {
                return ['balance' => 0, 'impressions' => 0, 'revenue' => 0];
            }
        });

        return [
            Stat::make('Saldo Akun', '$ ' . number_format($data['balance'], 2))
                ->description('Total balance saat ini')
                ->descriptionIcon('heroicon-m-banknotes')
                ->color('success'),

            Stat::make('Total Revenue', '$ ' . number_format($data['revenue'], 2))
                ->description("Periode: $startDate s/d $endDate")
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('emerald'),

            Stat::make('Total Impression', number_format($data['impressions']))
                ->description('Jumlah tayangan iklan harian')
                ->descriptionIcon('heroicon-m-eye')
                ->color('info'),
        ];
    }
}
