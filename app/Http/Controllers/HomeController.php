<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\KomentarPhoto;
use App\Models\Photo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
{
    $userId = Auth::id();

    $photos = Photo::where('user_id', $userId)->get();
    $albums = Album::where('user_id', $userId)->get();
    
    $comments = KomentarPhoto::whereIn('foto_id', $photos->pluck('id'))->with('user')->get();

    return view('index', compact('albums', 'photos', 'comments'));}
    

    public function friends()
    {
        $user_id = auth()->id();

        // Ambil daftar foto dengan tipe 'friends' yang sesuai dengan user_id
        $photos = Photo::where('type', 'friends')->where('user_id', $user_id)->get();

        // Tampilkan halaman dengan daftar foto teman
        return view('friends', ['photos' => $photos]);
    }

    public function me(){

        $userId = Auth::id();

        // Mendapatkan foto-foto yang terkait dengan pengguna yang telah login
        $userPhotos = Photo::where('user_id', $userId)->get();

        return view('me', ['photos' => $userPhotos]);
    }

    public function photo(){
        $photos = Photo::all();

        return view('photo', ['photos' => $photos]);    
    }

    public function coba(){
        return view('coba');
    }
}
