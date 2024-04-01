<?php

namespace App\Http\Controllers;

use App\Models\KomentarPhoto;
use Illuminate\Http\Request;

class komentarcontroller extends Controller
{
    public function store(Request $request)
{
    // Validasi input
    $request->validate([
        'photo_id' => 'required|exists:photos,id',
        'komentar' => 'required|string',
    ]);

    // Simpan komentar ke dalam database
    KomentarPhoto::create([
        'foto_id' => $request->photo_id,
        'user_id' => auth()->user()->id,
        'komentar' => $request->komentar,
    ]);

    return back()->with('success');
}
}
