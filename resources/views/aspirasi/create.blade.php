<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
     <link rel="stylesheet" href="{{ asset('assets/css/agenda.css') }}">
    <title>Masukkan Aspirasi</title>
</head>
<body>
     <!-- container nav -->
    <div class="container">
        <nav class="navbar">
            <div class="logo">
                <!-- <img src="" alt=""> -->
                <h1>News-F</h1>
            </div>
            
            <div class="link">
           <a href="">Profil</a>
           <a href="{{ route('aspirasi.index') }}">Aspirasi</a>
           <a href="">Announcement</a>
           <a href="{{ route('agenda.index') }}">Agenda</a>
           <a href="">Competition</a>
           </div>
        </nav>
    </div>
    <br>
<a href="{{ route('aspirasi.index') }}" class="tombol">Back</a>
<h3>Masukkan aspirasi kamu</h3>
<p>Kami akan menjaga rahasia data Kamu</p>
<form action="{{ route('aspirasi.store') }}" method="POST">
    @csrf
    <div class="form_agd">
        <label for="">Title : </label>
        <input type="text" name="title" id="" placeholder="Title">

        <label for="">Description : </label>
        <textarea name="description" id="" placeholder="Masukkan aspirasimu" ></textarea>
    </div>
    <button type="submit" class="tombol">Submit</button>
</form>

</body>
</html>

