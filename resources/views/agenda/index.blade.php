<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/aspirasi.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/navbar.css') }}">
    
    <title>Agenda</title>
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

    <!-- card agenda -->
    <br>
    <a href="{{ route('agenda.index') }}" class="back">Back</a>
    <a href="{{ route('agenda.create') }}" class="add">Add +</a>

    <div class="container_card">
        @foreach($allAgenda as $key => $agd)
            <div class="card-item">
                <img src="{{ asset('assets/img/CONT01.webp') }}" alt="">
                <h2>{{ $agd->title }}</h2>
                <p class="caption">✍️ : {{ $agd->description }}</p>
                <p>📅 : {{ $agd->date }}</p>
                <p>📍 : {{ $agd->location }}</p>
                <p>Uploaded: {{ $agd->created_at }}</p>
                <p>Updated: {{ $agd->updated_at }}</p>
                <form action="{{ route('agenda.destroy', $agd->id) }}" method="POST">
                    @auth
                        <a href="{{ route('agenda.edit', $agd->id) }}" class="edit">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete">Hapus</button>
                    @endauth
                </form>
            </div>
        @endforeach
    </div>

     <script>
        document.addEventListener('DOMContentLoaded', function() {
            const logo = document.getElementById('profileLogo');
            const dropdown = document.getElementById('profileDropdown');
            if (logo) {
                document.addEventListener('click', function(e) {
                    if (logo.contains(e.target)) {
                        dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
                    } else if (!dropdown.contains(e.target)) {
                        dropdown.style.display = 'none';
                    }
                });
            }
        });
    </script>
</body>
</html>
