<?php

namespace App\Models;

// 1. Tambahkan import ini
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

// 2. Tambahkan "implements FilamentUser" agar dikenali oleh Filament
class User extends Authenticatable implements FilamentUser
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * IZINKAN AKSES BERDASARKAN ROLE
     */
    public function canAccessPanel(Panel $panel): bool
    {
        // Siapa pun yang rolenya 'admin' atau 'contributor' boleh masuk!
        return in_array($this->role, ['admin', 'contributor']);
    }

    /**
     * Tambahkan relasi ke Post agar getEloquentQuery di Resource tidak error
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function comments()
    {
        return $this->hasMany(Comments::class);
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
}
