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


 <!-- coba -->
         <h3>Detail Show</h3>
         <a href="{{ route('agenda.index') }}" class="tombol">Kembali</a>
         <table class="table">
            <thead class="table-header">
                <tr>
                    <th>Titile</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Location</th>
                </tr>
            </thead>
            <tbody class="table-body">
                <tr>
                   
                    <td>{{ $agenda-> title }}</td>
                    <td>{{ $agenda-> description }}</td>
                    <td>{{ $agenda-> date }}</td>
                    <td>{{ $agenda-> location }}</td>
                </tr>
            </tbody>
         </table>
    
</body>
</html>

