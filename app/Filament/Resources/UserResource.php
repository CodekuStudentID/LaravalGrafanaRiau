<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Section;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Informasi Akun')
                    ->description('Kelola data profil pembaca di sini.')
                    ->schema([
                        TextInput::make('name')
                            ->label('Nama Lengkap')
                            ->required(),
                        TextInput::make('email')
                            ->email()
                            ->required()
                            ->unique(ignoreRecord: true),
                        TextInput::make('password')
                            ->password()
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
                    ->label('Nama Pembaca')
                    ->searchable()
                    ->weight('bold')
                    ->color('emerald'),

                TextColumn::make('email')
                    ->label('Email')
                    ->copyable()
                    ->icon('heroicon-m-envelope'),

                // INDIKATOR STATUS (HIJAU JIKA AKTIF / MERAH JIKA TIDAK)
                TextColumn::make('status')
                    ->label('Status Akun')
                    ->badge()
                    ->alignCenter()
                    ->state(function ($record): string {
                        // Logika: Jika user adalah kita yang sedang login, tampilkan AKTIF
                        return auth()->id() === $record->id ? 'SEDANG LOGIN' : 'OFFLINE';
                    })
                    ->color(fn (string $state): string => match ($state) {
                        'SEDANG LOGIN' => 'success', // Hijau
                        'OFFLINE' => 'danger',       // Merah
                    })
                    ->icon(fn (string $state): string => match ($state) {
                        'SEDANG LOGIN' => 'heroicon-m-check-circle',
                        'OFFLINE' => 'heroicon-m-x-circle',
                    }),

                TextColumn::make('created_at')
                    ->label('Tgl Daftar')
                    ->dateTime('d M Y')
                    ->sortable(),
            ])
            ->filters([])
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
        return [
            //
        ];
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
