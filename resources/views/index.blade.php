<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="stylesheet" href="{{asset('css/home.css')}}">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menampilkan Gambar dari Folder Lain</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jaldi:wght@400;700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

</head>

<body style="background-color: #171717;width:100%;">

    <div class="navbar">
        <img class="icon" src="{{ asset('images/instagram.png') }}" alt="Icon">
        <img class="icon-1" src="{{ asset('images/facebook.png') }}" alt="Icon">
        <img class="icon-2" src="{{ asset('images/twitter.png') }}" alt="Icon">
        <h1 class="unimoment">UNIMOMENT</h1>
    </div>
    @guest

    @if (Route::has('login'))
    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
    @endif

    @if (Route::has('register'))
    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
    @endif
    @else
    <a class="logout" href="{{ route('logout') }}" onclick="event.preventDefault();
         document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
    @if ($message = Session::get('success'))
    <div>{{ $message }}</div>
    @endif




    <div class="custom-line"></div>
    <h1 class="welcome">WELCOME</h1>
    <p class="word">Moments: akin to small streams amidst the vast ocean of time, they paint the colors <br> and texture onto the canvas of our lives, each harboring unforgettable <br> tales and bringing forth the marvels of infinite eternity</p>
    @if (Auth::check())
    <h1 class="username">{{ auth()->user()->name }}</h1>
    @endif
    <img src="{{ asset('images/view.jpg') }}" alt="Deskripsi Gambar" class="gambar-orang">

    <h1 class="momment">MOMENT</h1>
    <div class="custom-line2"></div>

    <!-- <div class="kotak-gambar">
    <a href="{{ url('family') }}">
        <div class="kotak-family">
            <img src="{{ asset('images/family.jpg') }}" alt="Deskripsi Gambar" class="gambar-link">
            <h1 class="kata-family">FAMILY</h1>
        </div>
    </a>

    <a href="{{ url('me') }}">
        <div class="kotak-me">
            <img src="{{ asset('images/me.jpg') }}" alt="Deskripsi Gambar" class="gambar-link">
            <h1 class="kata-me">ME</h1>
        </div>
    </a>

    <a href="{{ url('friends') }}">
        <div class="kotak-friends">
            <img src="{{ asset('images/friends.jpg') }}" alt="Deskripsi Gambar" class="gambar-link">
            <h1 class="kata-friends">FRIENDS</h1>
        </div>
    </a>

  
</div> -->

    <!-- <form method="POST" action="/album">
    @csrf

    <div class="form-group">
        <label for="nama">Nama Album</label>
        <input type="text" class="form-control" id="nama" name="nama" required>
    </div>
    <div class="form-group">
        <label for="deskripsi">Deskripsi</label>
        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form> -->

    <!-- Button untuk membuka modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahAlbumModal">
        Add Album
    </button>

    <!-- Modal untuk menambahkan album -->
    <div class="modal fade" id="tambahAlbumModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Album</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="/album">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama">Nama Album</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Add Photo
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Photo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/photo" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="photo" class="form-label">{{ __('Choose Photo') }}</label>
                            <input type="file" class="form-control" id="photo" name="file_name" required>
                        </div>

                        <div class="mb-3">
                            <label for="judul" class="form-label">{{ __('Judul') }}</label>
                            <input type="text" class="form-control" id="judul" name="judul">
                        </div>

                        <div class="mb-3">
                            <label for="album_id" class="form-label">{{ __('Select Album') }}</label>
                            <select class="form-control" id="album_id" name="album_id" required>
                                @foreach ($albums as $album)
                                <option value="{{ $album->id }}">{{ $album->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">{{ __('Description') }}</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">{{ __('Upload') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="filter-container" style="margin-left: 90px; margin-top: 80px;">
        <select id="album-filter">
            <option value="all">All Albums</option>
            @foreach($albums as $album)
            <option value="{{ $album->id }}">{{ $album->nama }}</option>
            @endforeach
        </select>
    </div>

    <div style="margin-left: 90px; margin-top: 80px; display: flex; flex-wrap: wrap;">
        @foreach($photos as $photo)
        <div class="photo-container" data-album-id="{{ $photo->album_id }}" style="margin-right: 10px; margin-bottom: 10px;">
            <img class="photo" src="{{ asset('storage/images/' . $photo->file_name) }}" alt="{{ $photo->judul }}" data-toggle="modal" data-target="#popup{{$photo->id}}" data-photo-id="{{ $photo->id }}">
        </div>
        @endforeach
    </div>

    <script>
        document.getElementById('album-filter').addEventListener('change', function() {
            var albumId = this.value;
            var photos = document.querySelectorAll('.photo-container');

            photos.forEach(function(photo) {
                var photoAlbumId = photo.dataset.albumId;
                if (albumId === 'all' || photoAlbumId === albumId) {
                    photo.style.display = 'block';
                } else {
                    photo.style.display = 'none';
                }
            });
        });
    </script>



    @foreach($photos as $photo)
    <div class="modal fade" id="popup{{$photo->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="kotak-1">
                        <img class="photo-detail" src="{{ asset('storage/images/' . $photo->file_name) }}">
                        <div class="kotak-1-1">
                            <div class="form-group" style="display: flex; margin-left: 10px;">
                                <label for="exampleFormControlInput1" style="margin-top: 6px;">Owner:</label>
                                <input style="margin-left: 3px;" type="text" class="form-control" id="exampleFormControlInput1" value="{{ $photo->user->name }}">
                            </div>
                            <div class="form-group" style="display: flex; margin-left: 10px;">
                                <label for="exampleFormControlInput1" style="margin-top: 6px;">Judul:</label>
                                <input style="margin-left: 3px;" type="text" class="form-control" id="exampleFormControlInput1" value="{{ $photo->judul }}">
                            </div>
                            <div class="form-group" style="margin-left: 10px;">
                                <label for="exampleFormControlInput1" style="margin-left:80px;">Deskripsi:</label>
                                <textarea name="" id="" cols="30" rows="3">{{ $photo->description }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group" style="margin-left: 10px;">
                                <label for="exampleFormControlInput1" style="margin-left:0px;">Komentar:</label>
                                @foreach($comments->where('foto_id', $photo->id) as $comment)
                                <div class="comment">
                                    <p><strong>{{ $comment->user->name }}</strong>: {{ $comment->komentar }}</p>
                                </div>
                                @endforeach
                            </div>
                </div>
                <div class="modal-footer">
                    <div class="icon-footer">
                        <img src="{{ asset('images/heart.png') }}" alt="" style="height: 30px; width: 30px;">
                        <span>{{ $photo->like->count() }}</span>
                    </div>

                    <div class="icon-footer" style="margin-right: 300px;">
                        <img src="{{ asset('images/comment.png') }}" alt="" style="height: 30px; width: 30px;">
                        <span>{{ $photo->komentar->count() }}</span>
                    </div>

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <!-- resources/views/index.blade.php -->

    <!-- <form action="/" method="GET">
    <select name="album_id" onchange="this.form.submit()">
        <option value="">Pilih Album</option>
        @foreach ($albums as $album)
            <option value="{{ $album->id }}">{{ $album->nama }}</option>
        @endforeach
    </select>
</form>

@if (isset($selectedAlbum))
    <h2>{{ $selectedAlbum->nama }}</h2>

    @if ($photos->isNotEmpty())
        @foreach ($photos as $photo)
            <div>
            <img src="{{ asset('storage/images/' . $photo->file_name) }}" alt="{{ $photo->judul }}">
            </div>
        @endforeach
    @else
        <p>Tidak ada foto dalam album ini.</p>
    @endif
@endif
 -->

    @endguest



</body>

</html>