<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="stylesheet" href="{{asset('css/family.css')}}">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menampilkan Gambar dari Folder Lain</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

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
   



@endguest

    
   
</body>

</html>