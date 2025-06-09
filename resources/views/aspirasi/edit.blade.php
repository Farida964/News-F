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
<h3>Edit Agenda</h3>
<form action="{{ route('agenda.update', $agenda->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form_agd">
        <label for="">Title : </label>
        <input type="text" name="title" id="" value="{{ $agenda->title }}" >

        <label for="">Description : </label>
        <textarea name="description" id="" value="{{ $agenda->description }}" ></textarea>
           

        <label for="">Date : </label>
        <input type="date" name="date" id="" value="{{ $agenda->date }}" >

        <label for="">Location :</label>
        <input type="text" name="location" id="" value="{{ $agenda->location }}">

    </div>
    <button type="submit" class="tombol">Update</button>
</form>

</body>
</html>

