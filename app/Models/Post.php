<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Comments;

class Post extends Model
{

    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'user_id',
        'id',
        'title',
        'slug',
        'content',
        'date',
        'images',
        'views',
        'likes',
        'category'
    ];

    public function comments(){
        return $this->hasMany(Comments::class)->orderBy('created_at', 'desc');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
