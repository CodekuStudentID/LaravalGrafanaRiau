<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Section;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    // 1. PENGATURAN TAMPILAN SIDEBAR
    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationLabel = 'Manajemen Pengguna';
    protected static ?string $pluralModelLabel = 'Pengguna';
    protected static ?string $navigationGroup = 'Admin Settings'; // Mengelompokkan menu admin

    // 2. SISTEM KEAMANAN: HANYA ADMIN YANG BISA LIHAT MENU INI
    public static function canViewAny(): bool
    {
        return auth()->user()->email === 'admin@gmail.com';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Informasi Akun')
                    ->description('Kelola data pengguna/jurnalis di sini.')
                    ->schema([
                        TextInput::make('name')
                            ->label('Nama Lengkap')
                            ->placeholder('Masukkan nama lengkap...')
                            ->required(),

                        TextInput::make('email')
                            ->label('Alamat Email')
                            ->email()
                            ->placeholder('contoh@gmail.com')
                            ->required()
                            ->unique(ignoreRecord: true),

                        TextInput::make('password')
                            ->label('Password Baru')
                            ->password()
                            ->helperText('Kosongkan jika tidak ingin mengubah password')
                            ->dehydrated(fn ($state) => filled($state))
                            ->required(fn (string $context): bool => $context === 'create'),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nama Pengguna')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->color('emerald'),

                TextColumn::make('email')
                    ->label('Email')
                    ->icon('heroicon-m-envelope')
                    ->copyable()
                    ->searchable(),

                // INDIKATOR STATUS REAL-TIME
                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->alignCenter()
                    ->state(function ($record): string {
                        return auth()->id() === $record->id ? 'SEDANG LOGIN' : 'OFFLINE';
                    })
                    ->color(fn (string $state): string => match ($state) {
                        'SEDANG LOGIN' => 'success',
                        'OFFLINE' => 'gray',
                    })
                    ->icon(fn (string $state): string => match ($state) {
                        'SEDANG LOGIN' => 'heroicon-m-check-circle',
                        'OFFLINE' => 'heroicon-m-minus-circle',
                    }),

                TextColumn::make('created_at')
                    ->label('Tgl Bergabung')
                    ->dateTime('d M Y')
                    ->sortable(),
            ])
            ->filters([
                // Tambahkan filter jika diperlukan di masa depan
            ])
            ->actions([
                Tables\Actions\EditAction::make()->button()->color('emerald'),
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
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
