<?php

namespace App\Filament\Pages;

use App\Models\Profile;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Infolists\Infolist;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\Section as InfoSection;
use Filament\Infolists\Components\Grid as InfoGrid;
use Filament\Notifications\Notification;
use Filament\Forms\Contracts\HasForms;
use Filament\Infolists\Contracts\HasInfolists;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Infolists\Concerns\InteractsWithInfolists;

class ProfileJurnalis extends Page implements HasForms, HasInfolists
{
    use InteractsWithForms;
    use InteractsWithInfolists;

    protected static ?string $navigationIcon = 'heroicon-o-user-circle';
    protected static ?string $navigationLabel = 'Profil Jurnalis';
    protected static ?string $title = 'Profil Jurnalis';
    protected static string $view = 'filament.pages.profile-jurnalis';

    public ?array $data = [];
    public bool $isEditing = false; // Variabel untuk kontrol tampilan

    public function mount(): void
    {
        $profile = auth()->user()->profile;

        if ($profile) {
            $this->form->fill($profile->toArray());
            $this->isEditing = false; // Jika sudah ada data, tampilkan View Mode
        } else {
            $this->form->fill([
                'jurnalis_id' => 'JRN-' . strtoupper(str()->random(6)),
                'active_email' => auth()->user()->email,
                'first_name' => auth()->user()->name,
            ]);
            $this->isEditing = true; // Jika data kosong, tampilkan Form Mode
        }
    }

    // --- MODE EDIT: Definisi Form ---
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Identitas & Data Pribadi')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('jurnalis_id')->label('ID Jurnalis')->disabled()->dehydrated(),
                            FileUpload::make('photo')->label('Foto Formal (Close-up Wajah)')->image()->imageEditor()->imageEditorAspectRatios(['1:1',])->directory('jurnalis-photos')->disk('public')->visibility('public')->required(),
                        ]),
                        Grid::make(2)->schema([
                            TextInput::make('first_name')->label('Nama Depan')->required(),
                            TextInput::make('last_name')->label('Nama Belakang')->required(),
                        ]),
                        Grid::make(2)->schema([
                            TextInput::make('pob')->label('Tempat Lahir')->required(),
                            DatePicker::make('dob')->label('Tanggal Lahir')->required(),
                        ]),
                        TextInput::make('active_email')->label('Email Aktif')->email()->required(),
                        Select::make('gender')->options([
                            'Laki-laki' => 'Laki-laki',
                            'Perempuan' => 'Perempuan',
                            'Tidak ingin menyebutkan' => 'Tidak ingin menyebutkan'
                        ])->required(),
                    ]),
                Section::make('Pendidikan & Bio')
                    ->schema([
                        TextInput::make('title_degree')->label('Gelar'),
                        Select::make('education_level')->options(['SMA' => 'SMA', 'S1' => 'S1', 'S2' => 'S2', 'S3' => 'S3'])->required(),
                        Textarea::make('address')->label('Alamat')->required(),
                        Textarea::make('bio')->label('Tentang Diri')->rows(5)->required(),
                    ]),
            ])
            ->statePath('data');
    }

    // --- MODE VIEW: Definisi Infolist (Tampilan Profil) ---
    public function profileInfolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->record(auth()->user()->profile)
            ->schema([
                InfoSection::make('Kartu Identitas Jurnalis')
                    ->schema([
                        InfoGrid::make(2)->schema([
                            ImageEntry::make('photo')->label('')->disk('public')->columnSpan(1),
                            TextEntry::make('jurnalis_id')
                                ->label('ID REGISTRASI')
                                ->weight('bold')
                                ->size('lg')
                                ->color('primary')
                                ->columnSpan(1),
                        ]),
                    ]),
                InfoSection::make('Informasi Lengkap')
                    ->schema([
                        InfoGrid::make(3)->schema([
                            TextEntry::make('first_name')->label('Nama Depan'),
                            TextEntry::make('last_name')->label('Nama Belakang'),
                            TextEntry::make('gender')->label('Jenis Kelamin'),
                            TextEntry::make('pob')->label('Tempat Lahir'),
                            TextEntry::make('dob')->label('Tanggal Lahir')->date(),
                            TextEntry::make('active_email')->label('Email'),
                            TextEntry::make('education_level')->label('Pendidikan'),
                            TextEntry::make('title_degree')->label('Gelar')->default('-'),
                        ]),
                        TextEntry::make('address')->label('Alamat Lengkap'),
                        TextEntry::make('bio')->label('Bio Jurnalis')->markdown(),
                    ])->columns(1),
            ]);
    }

    public function toggleEdit(): void
    {
        $this->isEditing = !$this->isEditing;
    }

    public function save(): void
    {
        $state = $this->form->getState();
        auth()->user()->profile()->updateOrCreate(['user_id' => auth()->id()], $state);

        Notification::make()->success()->title('Profil Diperbarui')->send();
        $this->isEditing = false; // Balik ke View Mode setelah simpan
    }
}
