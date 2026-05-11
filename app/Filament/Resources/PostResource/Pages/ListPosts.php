<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\PostResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListPosts extends ListRecords
{
    protected static string $resource = PostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    /**
     * Membuat Tab Filter di atas Tabel
     */
    public function getTabs(): array
    {
        return [
            'all' => Tab::make('Semua Berita'),

            'pengajuan' => Tab::make('Pengajuan')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'pending'))
                ->badge(\App\Models\Post::where('status', 'pending')->count())
                ->badgeColor('warning'),

            'terbit' => Tab::make('Telah Terbit')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'published'))
                ->badge(\App\Models\Post::where('status', 'published')->count())
                ->badgeColor('success'),

            'ditolak' => Tab::make('Ditolak')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'rejected'))
                ->badge(\App\Models\Post::where('status', 'rejected')->count())
                ->badgeColor('danger'),
        ];
    }
}
