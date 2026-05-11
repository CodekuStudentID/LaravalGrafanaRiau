<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VisitorResource\Pages;
use App\Models\Visitor;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingServiceContainer;

class VisitorResource extends Resource
{
    protected static ?string $model = Visitor::class;

    // Icon di Sidebar (Bisa diganti sesuai selera)
    protected static ?string $navigationIcon = 'heroicon-o-chart-bar';

    protected static ?string $navigationLabel = 'Detail Pengunjung';

    protected static ?string $modelLabel = 'Pengunjung';

    protected static ?string $slug = 'detail-pengunjung';

    // Tambahkan ini di dalam class VisitorResource
    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();
        $user = auth()->user();

        // Jika bukan admin, kunci data berdasarkan artikel milik user
        if ($user->email !== 'admin@gmail.com') {
            return $query->whereHas('post', function ($q) use ($user) {
                $q->where('user_id', $user->id);
            });
        }

        return $query;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Biasanya detail pengunjung hanya untuk dilihat (read-only)
                Forms\Components\TextInput::make('ip_address')->disabled(),
                Forms\Components\TextInput::make('post_id')->disabled(),
                Forms\Components\Textarea::make('user_agent')->disabled(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Waktu')
                    ->dateTime('d M Y, H:i') // Format Indonesia banget
                    ->sortable(),

                Tables\Columns\TextColumn::make('ip_address')
                    ->label('IP Pengunjung')
                    ->searchable()
                    ->copyable()
                    ->copyMessage('IP berhasil disalin')
                    ->color('primary')
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('post.title')
                    ->label('Berita yang Dibaca')
                    ->searchable()
                    ->limit(40)
                    ->description(fn(Visitor $record): string => "ID Post: {$record->post_id}"),

                Tables\Columns\TextColumn::make('user_agent')
                    ->label('Perangkat/Browser')
                    ->limit(30)
                    ->tooltip(fn(Visitor $record) => $record->user_agent)
                    ->color('gray'),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                // Tambahkan filter tanggal jika perlu
                Tables\Filters\Filter::make('created_at')
                    ->form([
                        Forms\Components\DatePicker::make('dari_tanggal'),
                        Forms\Components\DatePicker::make('sampai_tanggal'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['dari_tanggal'],
                                fn(Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                            )
                            ->when(
                                $data['sampai_tanggal'],
                                fn(Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                            );
                    })
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListVisitors::route('/'),
        ];
    }
}
