<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationBadge(): ?string
    {
        // Hanya admin yang melihat angka notifikasi pengajuan
        if (auth()->user()->email === 'admin@gmail.com') {
            return static::getModel()::where('status', 'pending')->count();
        }

        return null;
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'warning'; // Warna kuning (biasanya untuk pending/warning)
    }

    public static function getEloquentQuery(): \Illuminate\Database\Eloquent\Builder
    {
        $query = parent::getEloquentQuery();
        if (auth()->user()->email !== 'admin@gmail.com') {
            $query->where('user_id', auth()->id());
        }
        return $query;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // --- 2. FITUR AUTO-USER ID: MENCATAT PENULIS SECARA OTOMATIS ---
                Forms\Components\Hidden::make('user_id')
                    ->default(auth()->id())
                    ->required(),

                Forms\Components\TextInput::make('title')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn(Set $set, $state) => $set('slug', Str::slug($state))),

                Forms\Components\TextInput::make('slug')
                    ->disabled()
                    ->dehydrated()
                    ->required(),

                Forms\Components\Select::make('category')
                    ->options([
                        'nasional' => 'nasional',
                        'riau' => 'Riau',
                        'asn' => 'ASN & Kesejahteraan',
                        'ppk' => 'PPK & Honorer',
                        'pgri' => 'PGRI',
                        'karir' => 'Karir',
                    ])
                    ->required()
                    ->native(false),

                Forms\Components\RichEditor::make('content')
                    ->required()
                    ->columnSpanFull(),

                Forms\Components\Select::make('status')
                    ->label('Status Publikasi')
                    ->options([
                        'pending' => 'Menunggu Persetujuan',
                        'published' => 'Terbitkan',
                        'rejected' => 'Tolak / Revisi',
                    ])
                    ->default('pending') // Otomatis pending saat buat baru
                    ->required()
                    // Hanya admin yang bisa klik/ubah. Jurnalis cuma bisa lihat.
                    ->disabled(fn() => auth()->user()->email !== 'admin@gmail.com')
                    ->dehydrated(),     // Tetap kirim datanya ke database saat simpan

                Forms\Components\FileUpload::make('images')
                    ->image()
                    ->directory('posts')
                    ->disk('public')
                    ->imageEditor()
                    ->imageResizeTargetWidth('800')
                    ->imageCropAspectRatio('16:9')
                    ->imageResizeMode('cover')
                    ->getUploadedFileNameForStorageUsing(function ($file): string {
                        return (string) str(now()->timestamp . '_' . $file->getClientOriginalName())
                            ->replaceMatches('/\.[^.]++$/', '.webp');
                    })
                    ->maxSize(2048)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('status')
                    ->badge() // Membuat tampilan seperti label berwarna
                    ->color(fn(string $state): string => match ($state) {
                        'pending' => 'warning',   // Kuning
                        'published' => 'success', // Hijau
                        'rejected' => 'danger',   // Merah
                    })
                    ->sortable(),

                Tables\Columns\ImageColumn::make('images')
                    ->label('Thumbnail')
                    ->disk('public')
                    ->circular(),

                Tables\Columns\TextColumn::make('title')
                    ->label('Judul Berita')
                    ->searchable()
                    ->sortable()
                    ->wrap(),

                // MENAMBAHKAN NAMA PENULIS (Hanya Admin yang butuh ini biasanya)
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Penulis')
                    ->visible(fn() => auth()->user()->role === 'admin@gmail.com'),

                Tables\Columns\TextColumn::make('category')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'nasional' => 'info',
                        'riau' => 'success',
                        'asn' => 'primary',
                        'ppk' => 'warning',
                        'pgri' => 'danger',
                        'karir' => 'primary',
                        default => 'gray',
                    }),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Diposting Pada')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\Action::make('approve')
                    ->label('Approve')
                    ->icon('heroicon-m-check-circle')
                    ->color('success')
                    ->hidden(fn($record) => $record->status !== 'pending' || auth()->user()->email !== 'admin@gmail.com')
                    ->action(function ($record) {
                        $record->update(['status' => 'published']);
                    })
                    ->requiresConfirmation('Apakah Anda yakin ingin menerbitkan artikel ini?'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
