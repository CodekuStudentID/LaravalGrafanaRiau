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

    // --- 1. FITUR FILTERING: HANYA TAMPILKAN DATA MILIK SENDIRI ---
    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();

        // Jika bukan admin, hanya ambil data yang user_id-nya sama dengan yang login
        if (auth()->check() && auth()->user()->role !== 'admin') {
            return $query->where('user_id', auth()->id());
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
                    ->afterStateUpdated(fn (Set $set, $state) => $set('slug', Str::slug($state))),

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
                    ->visible(fn() => auth()->user()->role === 'admin'),

                Tables\Columns\TextColumn::make('category')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
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
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array { return []; }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}