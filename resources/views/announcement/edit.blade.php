<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
     <link rel="stylesheet" href="{{ asset('assets/css/agenda.css') }}">
     <link rel="stylesheet" href="{{ asset('assets/css/aspirasi.css') }}">
     <link rel="stylesheet" href="{{ asset('assets/css/navbar.css') }}">
    <title>Edit Announcement</title>
</head>
<body>
 <!-- container nav -->

        <nav class="navbar" style="display: flex; justify-content: space-between; align-items: center;">
            <div class="logo">
                <h1>News-F</h1>
            </div>
            <div class="link" style="display: flex; align-items: center; gap: 24px;">
                <a href="{{ url('/home') }}">Home</a>
                <a href="{{ route('aspirasi.index') }}">Aspirasi</a>
                <a href="{{ route('announcement.index') }}">Announcement</a>
                <a href="{{ route('agenda.index') }}">Agenda</a>
                <a href="{{ route('competition.index') }}">Competition</a>
                @auth
                <div class="profile-dropdown">
                    <img src="{{ asset('assets/img/LOGO (2).png') }}" alt="Profil" class="profile-logo" id="profileLogo">
                    <div class="dropdown-content" id="profileDropdown">
                        <a href="{{ route('profile.edit') }}">Edit Profil</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit">Logout</button>
                        </form>
                    </div>
                </div>
                @endauth
            </div>
        </nav>

<!-- endNav -->

<br>
<div class="card-form">
<a href="{{ route('aspirasi.index') }}" class="back">Cancel</a>
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
    <button type="submit" class="add">Update</button>
</form>
</div>

</body>
</html>

