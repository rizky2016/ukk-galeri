<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KomentarPhoto extends Model
{
    use HasFactory;
    protected $table = 'komentarphotos';
    protected $fillable = ['foto_id', 'user_id', 'komentar'];

    public function photo()
    {
        return $this->belongsTo(Photo::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
}
