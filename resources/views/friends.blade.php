<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="stylesheet" href="{{asset('css/friends.css')}}">

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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">

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
   

    <h1 class="friends">FRIENDS</h1>
    <div class="custom-line"></div>
    
<!-- <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="photo">
    <input type="text" name="description" placeholder="Description">
    <button type="submit">Upload</button>
</form> -->

<button type="button" class="button-tambah" data-toggle="modal" data-target="#uploadModal">
    ADD
</button>

<div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="uploadModalLabel">Upload Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="photo">Choose Image</label>
                        <input type="file" class="form-control-file" id="photo" name="photo">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" id="description" name="description" placeholder="Description">
                    </div>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function showAlert(message) {
        Swal.fire({
            title: 'Success!',
            text: message,
            icon: 'success',
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
    }
</script>

@if(session('success'))
    <script>
        showAlert("{{ session('success') }}");
    </script>
@endif


<div class="grid-container">
    @foreach ($photos as $photo)
        <img class="photos" src="{{ asset('images/' . $photo->file_name) }}" alt="Photo" onclick="showDescription('{{ $photo->description }}')">
    @endforeach
</div>

<script>
    function showDescription(description) {
        alert(description);
    }
</script>


@endguest

    
   
</body>

</html>