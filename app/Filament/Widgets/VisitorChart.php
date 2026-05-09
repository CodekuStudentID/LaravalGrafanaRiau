<?php

namespace App\Filament\Widgets;

use App\Models\Visitor;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class VisitorChart extends ChartWidget
{
    protected static ?string $heading = 'Grafik Pembaca (7 Hari Terakhir)';
    protected static ?int $sort = 1;

    protected function getData(): array
{
    // Ambiak data 7 hari terakhir
    $days = collect(range(6, 0))->map(function($i) {
        return now()->subDays($i)->format('Y-m-d');
    });

    $visitors = \App\Models\Visitor::selectRaw('DATE(accessed_at) as date, count(*) as count')
        ->where('accessed_at', '>=', now()->subDays(7))
        ->groupBy('date')
        ->pluck('count', 'date');

    // Pastikan satiap tanggal ado angkonyo (walaupun 0) supayo garihnyo indak putuih
    $chartData = $days->mapWithKeys(function($date) use ($visitors) {
        return [$date => $visitors->get($date, 0)];
    });

    return [
        'datasets' => [
            [
                'label' => 'Pengunjung Bulletin Kampar',
                'data' => $chartData->values()->toArray(),
                'fill' => 'start',
                'borderColor' => 'rgb(59, 130, 246)',
                'tension' => 0.4,
            ],
        ],
        'labels' => $chartData->keys()->toArray(),
    ];
}

    protected function getType(): string
    {
        return 'line';
    }
}
