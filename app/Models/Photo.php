<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = [
        'file_name',
        'user_id',
        'type',
        'description',
        'judul',
        'album_id'
    ];

    // Relasi dengan model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->hasMany(LikePhoto::class);
    }

    public function isLikedBy($userId)
    {
        return $this->likes()->where('user_id', $userId)->exists();
    }

    public function comments()
    {
        return $this->hasMany(KomentarPhoto::class);
    }

    public function like()
    {
        return $this->hasMany(LikePhoto::class, 'foto_id');
    }

    public function komentar()
    {
        return $this->hasMany(KomentarPhoto::class, 'foto_id');
    }
}

