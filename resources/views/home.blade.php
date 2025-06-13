
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <title>News-F</title>
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

    <!-- card agenda -->
    <div class="container">
        <div class="card">
            <h1>Agenda</h1>
            <div class="card-content">
                <div class="card-item">
                    <img src="{{ asset('assets/img/agenda1.jpg') }}" alt="">
                    <h2>Judul Agenda</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatibus.</p>
                </div>
            </div>
        </div>
</body>
</html>