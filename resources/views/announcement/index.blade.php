<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/agenda.css') }}">
    <title>Upload Announcement</title>
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

    <!-- card announcement -->
     <br>
      <a href="{{ route('announcement.create') }}" class="tombol tombol-float">Add +</a>
    <div class="container_card">
    @foreach($allAnnouncement as $key => $ann)
        <div class="card-item">
            <img src="{{ asset('assets/img/CONT01.webp') }}" alt="">
            <h2>{{ $ann->title }}</h2>
            <p>Caption : {{ $ann->description }}</p>
            <p>Informasi : {{ $ann->info }}</p>
            <p>Date : {{ $ann->date }}</p>
            <p>Dibuat: {{ $ann->created_at }}</p>
            <p>Diupdate: {{ $ann->updated_at }}</p>
            <form action="{{ route('announcement.destroy', $ann->id) }}" method="POST">
                <a href="{{ route('announcement.show', $ann->id) }}" class="tombol">Detail</a>
                <a href="{{ route('announcement.edit', $ann->id) }}" class="tombol">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="tombol">Hapus</button>
            </form>
        </div>
    @endforeach
</div>


    
               
</div>
    
</body>
</html>

