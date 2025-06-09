<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
     <link rel="stylesheet" href="{{ asset('assets/css/agenda.css') }}">
    <title>Agenda</title>
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
           <a href="">Aspirasi</a>
           <a href="">Announcement</a>
           <a href="">Agenda</a>
           <a href="">Competition</a>
           </div>
        </nav>
    </div>
    <br>
<a href="{{ route('agenda.index') }}" class="tombol">Back</a>
<h3>Mau Bikin Agenda Apa Nih?</h3>
<form action="{{ route('agenda.store') }}" method="POST">
    @csrf
    <div class="form_agd">
        <label for="">Title : </label>
        <input type="text" name="title" id="" placeholder="Masukkan Judul Agenda">

        <label for="">Description : </label>
        <textarea name="description" id="" placeholder="Masukkan deskripsi" ></textarea>
           

        <label for="">Date : </label>
        <input type="date" name="date" id="" >

        <label for="">Location :</label>
        <input type="text" name="location" id="" placeholder="Masukkan Lokasi Agenda">

    </div>
    <button type="submit" class="tombol">Submit</button>
</form>

</body>
</html>

