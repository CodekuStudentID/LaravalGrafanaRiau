<?php

namespace App\Models;
use App\Models\Post;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;

    // Kolom nan buliah diisi otomatis
    protected $fillable = [
        'post_id',
        'ip_address',
        'user_agent',
        'accessed_at'
    ];

    // Relasi ka Model Post (Bia kito tau berita ma nan dibaco)
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
