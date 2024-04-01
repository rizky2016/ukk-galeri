<?php

namespace App\Http\Controllers;

use App\Models\LikePhoto;
use Illuminate\Http\Request;

class likecontroller extends Controller
{
    public function like(Request $request)
    {
        // Validasi request
        $request->validate([
            'photo_id' => 'required|exists:photos,id',
        ]);

        // Buat like baru jika belum ada
        LikePhoto::firstOrCreate([
            'foto_id' => $request->photo_id,
            'user_id' => auth()->id(),
        ]);

        return back()->with('success', 'Foto di-like.');
    }

    public function unlike(Request $request)
    {
        // Validasi request
        $request->validate([
            'photo_id' => 'required|exists:photos,id',
        ]);

        // Hapus like jika sudah ada
        LikePhoto::where('foto_id', $request->photo_id)
            ->where('user_id', auth()->id())
            ->delete();

        return back()->with('success', 'Foto di-unlike.');
    }
}
