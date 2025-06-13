<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
     <link rel="stylesheet" href="{{ asset('assets/css/agenda.css') }}">
    <title>Aspirasi</title>
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

    <!-- card aspirasi -->
     <br>
     <a href="{{ route('aspirasi.index') }}" class="tombol">Back</a>
      <a href="{{ route('aspirasi.create') }}" class="tombol tombol-float">Add +</a>
    <div class="container_card">
    @foreach($allAspirasi as $key => $asp)
        <div class="card-item">
            <h2>{{ $asp->title }}</h2>
            <p>Aspirasi : {{ $asp->description }}</p>
            <p>Dibuat: {{ $asp->created_at }}</p>
            <p>Diupdate: {{ $asp->updated_at }}</p>
            <form action="{{ route('aspirasi.destroy', $asp->id) }}" method="POST">
                <a href="{{ route('aspirasi.show', $asp->id) }}" class="tombol">Detail</a>
                <a href="{{ route('aspirasi.edit', $asp->id) }}" class="tombol">Edit</a>
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