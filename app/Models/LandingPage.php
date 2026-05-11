<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Post;

class LandingPage extends Model
{
    protected $fillable = [
        'user_id', 'slug', 'content', 'theme_color', 'avatar', 'cover', 'hero_cover', 'is_public',
    ];

    protected $casts = [
        'content' => 'array',
        'is_public' => 'boolean',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * AMBIL ARTIKEL ASLI DARI DATABASE
     */
    public function artikels(): HasMany
    {
        // Sesuaikan dengan nama model Artikel Ocu
        return $this->hasMany(Post::class, 'user_id', 'user_id');
    }
}
