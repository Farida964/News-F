<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
     <link rel="stylesheet" href="{{ asset('assets/css/agenda.css') }}">
    <title>Edit Competition</title>
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
<h3>Edit Competition</h3>
<form action="{{ route('competition.update', $competition->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form_agd">
        <label for="">Title : </label>
        <input type="text" name="title" id="" value="{{ $competition->title }}" >

        <label for="">Description : </label>
        <textarea name="description" id="" value="{{ $competition->description }}" ></textarea>
           

        <label for="">Date : </label>
        <input type="date" name="date" id="" value="{{ $competition->date }}" >

        <label for="">Location :</label>
        <input type="text" name="location" id="" value="{{ $competition->location }}">

    </div>
    <button type="submit" class="tombol">Update</button>
</form>

</body>
</html>

