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

    <!-- card agenda -->
    <div class="container_card">
        <div class="card-content">
            <div class="card-item">
                @foreach($allAgenda as $key => $agd)
                <img src="{{ asset('assets/img/CONT01.webp') }}" alt="">
                <h2>{{ $agd-> title }}</h2>
                <p>{{ $agd-> description }}</p>
                <p>{{ $agd-> date }}</p>
                <p>{{ $agd-> location }}</p>
                <form action="{{ route('agenda.destroy', $agd->id) }}" method="POST">
                            <a href="{{ route('agenda.show', $agd->id) }}" class="tombol">Detail</a>
                            <a href="{{ route('agenda.edit', $agd->id) }}" class="tombol">Edit</a>
                            <!-- hapus -->
                
                             @csrf
                            @method('DELETE')
                            <button type="submit" class="tombol">Hapus</button>
                </form>
                @endforeach
            </div>
        </div>

    
               
</div>

 <!-- coba tabel database -->
         <h3>Agenda</h3>
         <a href="{{ route('agenda.create') }}" class="tombol">Tambah</a>
         <table class="table">
            <thead class="table-header">
                <tr>
                    <th>Titile</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Location</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="table-body">
                <!-- perulangan -->
                @foreach($allAgenda as $key => $agd)
                <tr>
                    <td>{{ $agd-> title }}</td>
                    <td>{{ $agd-> description }}</td>
                    <td>{{ $agd-> date }}</td>
                    <td>{{ $agd-> location }}</td>
                    <td>
                        <form action="{{ route('agenda.destroy', $agd->id) }}" method="POST">
                            <a href="{{ route('agenda.show', $agd->id) }}" class="tombol">Detail</a>
                            <a href="{{ route('agenda.edit', $agd->id) }}" class="tombol">Edit</a>
                            <!-- hapus -->
                
                             @csrf
                            @method('DELETE')
                            <button type="submit" class="tombol">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
         </table>
    
</body>
</html>

