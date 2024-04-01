<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Photo;
use App\Models\Album;
use App\Models\LikePhoto;

class PhotoController extends Controller
{
    /**
     * Menampilkan form upload foto.
     *
     * @return \Illuminate\View\View
     */
    // public function create()
    // {
    //     // Mengambil data album yang dimiliki oleh user yang sedang login
    //     $albums = Album::where('user_id', Auth::id())->get();

    //     // Mengembalikan view form upload photo beserta data album
    //     return view('index', ['albums' => $albums]);
    // }

    /**
     * Menyimpan foto baru ke dalam database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */

     public function isLikedByUser($photoId, $userId)
     {
         // Lakukan pengecekan apakah ada like yang sesuai
         $isLiked = LikePhoto::where('foto_id', $photoId)
                             ->where('user_id', $userId)
                             ->exists();
 
         // Mengembalikan hasil pengecekan
         return $isLiked;
     }

    public function store(Request $request)
    {
        // Validasi data yang dikirimkan oleh form
        $user = Auth::user();

$request->validate([
    'file_name' => 'required|image|max:2048',
    'description' => 'nullable|string',
    'judul' => 'required|string|max:255',
    'album_id' => 'required|exists:albums,id',
]);

$file = $request->file('file_name');
$fileName = $file->getClientOriginalName();
$file->storeAs('public/images', $fileName);

$photo = Photo::create([
    'file_name' => $fileName,
    'user_id' => $user->id,
    'description' => $request->description,
    'judul' => $request->judul,
    'album_id' => $request->album_id,
]);

// Redirect ke halaman yang sesuai
return redirect()->back()->with('success', 'Foto berhasil diunggah.');
    }
    
}
