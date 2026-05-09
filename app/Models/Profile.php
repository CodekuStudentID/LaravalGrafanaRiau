<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $casts = [
        'dob' => 'date', // Ini akan otomatis mengubah string dari DB jadi objek Carbon
    ];

    protected $fillable = [
        'user_id',
        'jurnalis_id',
        'photo',
        'first_name',
        'last_name',
        'pob',
        'dob',
        'title_degree',
        'education_level',
        'address',
        'gender',
        'active_email',
        'bio'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
