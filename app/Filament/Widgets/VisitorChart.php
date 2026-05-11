<?php

namespace App\Filament\Widgets;

use App\Models\Visitor;
use Filament\Widgets\ChartWidget;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class VisitorChart extends ChartWidget
{
    use InteractsWithPageFilters; // Penting untuk menangkap data dari filter luar

    protected static ?string $heading = 'Grafik Pengunjung';
    protected static ?int $sort = 1;

    protected function getData(): array
    {
        $user = auth()->user();
        $isAdmin = $user->email === 'admin@gmail.com';

        // 1. Ambil Tanggal dari Filter (Jika tidak ada, default 7 hari terakhir)
        $startDate = $this->filters['startDate'] ?? now()->subDays(6)->format('Y-m-d');
        $endDate = $this->filters['endDate'] ?? now()->format('Y-m-d');

        // 2. Buat list tanggal di antara dua range tersebut (Dynamic)
        $period = CarbonPeriod::create($startDate, $endDate);

        // 3. Query Data dari Model Visitor
        $query = Visitor::query()
            ->whereDate('accessed_at', '>=', $startDate)
            ->whereDate('accessed_at', '<=', $endDate);

        if (!$isAdmin) {
            $query->whereHas('post', fn($q) => $q->where('user_id', $user->id));
        }

        $allVisitors = $query->get();

        // 4. Petakan data ke grafik
        $chartData = [];
        $labels = [];

        foreach ($period as $date) {
            $formattedDate = $date->format('Y-m-d');
            $labels[] = $date->format('d M'); // Label bawah (Contoh: 08 Apr)

            // Hitung data yang cocok dengan tanggal ini
            $chartData[] = $allVisitors->filter(function ($visitor) use ($formattedDate) {
                return substr($visitor->accessed_at, 0, 10) === $formattedDate;
            })->count();
        }

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Pengunjung',
                    'data' => $chartData,
                    'fill' => 'start',
                    'backgroundColor' => 'rgba(59, 246, 75, 0.1)',
                    'borderColor' => 'rgb(59, 246, 65)',
                    'tension' => 0.4,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
