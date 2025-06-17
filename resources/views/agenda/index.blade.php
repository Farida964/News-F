<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/agenda.css') }}">
    <title>Agenda</title>
    <style>
        .profile-dropdown {
            position: relative;
            display: inline-block;
        }
        .profile-logo {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            cursor: pointer;
            object-fit: cover;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            right: 0;
            background-color: #fff;
            min-width: 140px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            border-radius: 8px;
            z-index: 100;
        }
        .dropdown-content a, .dropdown-content form button {
            color: #333;
            padding: 10px 18px;
            text-decoration: none;
            display: block;
            background: none;
            border: none;
            width: 100%;
            text-align: left;
            cursor: pointer;
            font: inherit;
        }
        .dropdown-content a:hover, .dropdown-content form button:hover {
            background-color: #f0f0f0;
        }
    </style>
</head>
<body>
    <!-- container nav -->
    <div class="container">
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
                    <img src="/images/sttnf-logo.png" alt="Profil" class="profile-logo" id="profileLogo">
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
    </div>

    <!-- card agenda -->
    <br>
    <a href="{{ route('aspirasi.index') }}" class="tombol">Back</a>
    @auth
        <a href="{{ route('agenda.create') }}" class="tombol tombol-float">Add +</a>
    @endauth

    <div class="container_card">
        @foreach($allAgenda as $key => $agd)
            <div class="card-item">
                <img src="{{ asset('assets/img/CONT01.webp') }}" alt="">
                <h2>{{ $agd->title }}</h2>
                <p>Caption : {{ $agd->description }}</p>
                <p>Date : {{ $agd->date }}</p>
                <p>Location : {{ $agd->location }}</p>
                <p>Dibuat: {{ $agd->created_at }}</p>
                <p>Diupdate: {{ $agd->updated_at }}</p>
                <form action="{{ route('agenda.destroy', $agd->id) }}" method="POST">
                    <a href="{{ route('agenda.show', $agd->id) }}" class="tombol">Detail</a>
                    @auth
                        <a href="{{ route('agenda.edit', $agd->id) }}" class="tombol">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="tombol">Hapus</button>
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
