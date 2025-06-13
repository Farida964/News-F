<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
     <link rel="stylesheet" href="{{ asset('assets/css/agenda.css') }}">
    <title>Edit Announcement</title>
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
           <a href="{{ route('announcement.index') }}">Announcement</a>
           <a href="{{ route('agenda.index') }}">Agenda</a>
           <a href="{{ route('competition.index') }}">Competition</a>
           </div>
        </nav>
    </div>
<h3>Edit Announcement</h3>
<form action="{{ route('announcement.update', $announcement->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form_agd">
        <label for="">Title : </label>
        <input type="text" name="title" id="" value="{{ $announcement->title }}" >

        <label for="">Description : </label>
        <textarea name="description" id="" value="{{ $announcement->description }}" ></textarea>
           
        <label for="">Info Tambahan :</label>
        <input type="text" name="info" id="" value="{{ $announcement->info }}">

        <label for="">Date : </label>
        <input type="date" name="date" id="" value="{{ $announcement->date }}" >

    </div>
    <button type="submit" class="tombol">Update</button>
</form>

</body>
</html>

