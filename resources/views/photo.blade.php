<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="stylesheet" href="{{asset('css/photo.css')}}">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menampilkan Gambar dari Folder Lain</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

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
        <a class="link-back" href="{{ url('/'); }}"><img class="icon-back" src="{{ asset('images/arrow-left.png') }}" alt="Icon"></a>
    </div>

    @guest
    @if (Route::has('login'))
    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
    @endif

    @if (Route::has('register'))
    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
    @endif
    @else
    <!-- <a class="logout" href="{{ route('logout') }}" onclick="event.preventDefault();
         document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a> -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
    @if ($message = Session::get('success'))
    <div>{{ $message }}</div>
    @endif

    <style>
        .photo {
            cursor: pointer;
        }
    </style>

    <div class="container-1">
        @foreach($photos as $photo)
        <div class="photo-container">
            <img class="photo" src="{{ asset('storage/images/' . $photo->file_name) }}" alt="{{ $photo->judul }}" data-toggle="modal" data-target="#popup{{$photo->id}}" data-photo-id="{{ $photo->id }}">
        </div>
        @endforeach
    </div>

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

                    <form method="POST" action="/komentar">
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Komentar</label>
                            <input type="hidden" name="photo_id" value="{{ $photo->id }}">
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="komentar" placeholder="isi komentar...">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Unggah</button>
                    </form>
                    <style>
    /* Menghilangkan tampilan default tombol */
    .like-button,
    .unlike-button {
        background: none;
        border: none;
        padding: 0;
        margin: 0;
        cursor: pointer; /* Menambahkan kursor pointer ketika di atas gambar */
    }
</style>

@if (auth()->check())
    @if ((new \App\Http\Controllers\PhotoController)->isLikedByUser($photo->id, auth()->id()))
        <!-- Tombol untuk Unlike -->
        <form action="/unlike" method="POST">
            @csrf
            <input type="hidden" name="photo_id" value="{{ $photo->id }}">
            <button type="submit" class="unlike-button">
                <img src="{{ asset('images/unlike.png') }}" alt="Unlike" style="height: 30px; width: 30px;">
            </button>
        </form>
    @else
        <!-- Tombol untuk Like -->
        <form action="/like" method="POST">
            @csrf
            <input type="hidden" name="photo_id" value="{{ $photo->id }}">
            <button type="submit" class="like-button">
                <img src="{{ asset('images/heart.png') }}" alt="Like" style="height: 30px; width: 30px;">
            </button>
        </form>
    @endif
@endif



                </div>
            </div>
        </div>
    </div>
    @endforeach


    @endguest


</body>

</html>