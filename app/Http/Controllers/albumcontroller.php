<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class albumcontroller extends Controller
{
    public function create()
    {
        return view('index');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
        ]);

        // Buat album baru
        $album = new Album();
        $album->nama = $request->nama;
        $album->deskripsi = $request->deskripsi;
        $album->user_id = auth()->user()->id; // Ambil ID pengguna yang sedang login
        $album->save();

        // Redirect ke halaman index atau ke halaman lain jika diperlukan
        return redirect()->back()->with('success');
    }
}
