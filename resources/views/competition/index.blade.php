<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
     <link rel="stylesheet" href="{{ asset('assets/css/agenda.css') }}">
    <title>Competition</title>
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

    <!-- card competition -->
     <br>
     <a href="{{ route('competition.index') }}" class="tombol">Back</a>
      <a href="{{ route('competition.create') }}" class="tombol tombol-float">Add +</a>
    <div class="container_card">
    @foreach($allCompetition as $key => $cmp)
        <div class="card-item">
            <img src="{{ asset('assets/img/CONT01.webp') }}" alt="">
            <h2>{{ $cmp->title }}</h2>
            <p>Caption : {{ $cmp->description }}</p>
            <p>Date : {{ $cmp->date }}</p>
            <p>Location : {{ $cmp->location }}</p>
            <p>Dibuat: {{ $cmp->created_at }}</p>
            <p>Diupdate: {{ $cmp->updated_at }}</p>
            <form action="{{ route('competition.destroy', $cmp->id) }}" method="POST">
                <a href="{{ route('competition.show', $cmp->id) }}" class="tombol">Detail</a>
                <a href="{{ route('competition.edit', $cmp->id) }}" class="tombol">Edit</a>
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

