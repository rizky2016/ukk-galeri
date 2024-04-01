<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikePhoto extends Model
{
    use HasFactory;

    protected $table = 'likephotos';

    protected $fillable = ['foto_id', 'user_id'];

    // Relasi dengan model Photo
    public function photo()
    {
        return $this->belongsTo(Photo::class);
    }

    // Relasi dengan model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
