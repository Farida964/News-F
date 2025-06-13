<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
     <link rel="stylesheet" href="{{ asset('assets/css/agenda.css') }}">
    <title>Edit Aspirasi</title>
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
<h3>Edit Aspirasi</h3>
<form action="{{ route('aspirasi.update', $aspirasi->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form_agd">
        <label for="">Title : </label>
        <input type="text" name="title" id="" value="{{ $aspirasi->title }}" >

        <label for="">Description : </label>
        <textarea name="description" id="" value="{{ $aspirasi->description }}" ></textarea>

    </div>
    <button type="submit" class="tombol">Update</button>
</form>

</body>
</html>

