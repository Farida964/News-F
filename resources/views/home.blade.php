<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News-F</title>
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <style>
        body { margin: 0; padding: 0; background: #f5f7fa; font-family: 'Montserrat', Arial, sans-serif; }
        .container { width: 100%; margin: 0 auto; }
        .navbar { background: #4fc21b; border-radius: 8px; padding: 0 32px; display: flex; justify-content: space-between; align-items: center; min-height: 60px; margin-top: 12px; }
        .logo h1 { margin: 0; color: #222; font-size: 1.7rem; font-weight: 700; letter-spacing: 1px; }
        .link { display: flex; align-items: center; gap: 28px; }
        .link a { color: #222; text-decoration: none; font-weight: 500; font-size: 1rem; transition: color 0.2s; }
        .link a:hover { color: #1976d2; }
        .profile-dropdown { position: relative; display: inline-block; }
        .profile-logo { width: 38px; height: 38px; border-radius: 50%; cursor: pointer; object-fit: cover; border: 2px solid #fff; box-shadow: 0 1px 4px rgba(0,0,0,0.07); background: #fff; }
        .dropdown-content { display: none; position: absolute; right: 0; top: 48px; background-color: #fff; min-width: 150px; box-shadow: 0 2px 12px rgba(0,0,0,0.12); border-radius: 10px; z-index: 100; padding: 8px 0; }
        .dropdown-content a, .dropdown-content form button { color: #222; padding: 10px 22px; text-decoration: none; display: block; background: none; border: none; width: 100%; text-align: left; cursor: pointer; font: inherit; font-size: 1rem; transition: background 0.2s; }
        .dropdown-content a:hover, .dropdown-content form button:hover { background-color: #f0f0f0; }
        .slider-container { max-width: 900px; margin: 32px auto 0 auto; position: relative; }
        .slider { position: relative; overflow: hidden; border-radius: 12px; box-shadow: 0 2px 12px rgba(0,0,0,0.10); height: 320px; background: #eee; }
        .slide { display: none; width: 100%; height: 320px; position: absolute; top: 0; left: 0; transition: opacity 0.5s; }
        .slide.active { display: block; position: relative; }
        .slide img { width: 100%; height: 320px; object-fit: cover; border-radius: 12px; }
        .slider-controls { position: absolute; width: 100%; top: 50%; left: 0; display: flex; justify-content: space-between; transform: translateY(-50%); pointer-events: none; }
        .slider-controls button { background: rgba(0,0,0,0.4); color: #fff; border: none; border-radius: 50%; width: 38px; height: 38px; font-size: 1.5rem; cursor: pointer; pointer-events: all; transition: background 0.2s; }
        .slider-controls button:hover { background: rgba(0,0,0,0.7); }
        .card { background: #4fc21b; border-radius: 8px; margin: 32px auto 0 auto; max-width: 900px; padding: 32px 32px 24px 32px; box-shadow: 0 2px 12px rgba(0,0,0,0.06); }
        .card h1 { margin-top: 0; color: #222; font-size: 2rem; font-weight: 700; }
        .card-content { display: flex; gap: 32px; flex-wrap: wrap; }
        .card-item { background: #fff; border-radius: 8px; box-shadow: 0 1px 6px rgba(0,0,0,0.07); padding: 18px; min-width: 220px; max-width: 320px; flex: 1; }
        .card-item img { width: 100%; border-radius: 6px; margin-bottom: 12px; object-fit: cover; }
        .card-item h2 { margin: 0 0 8px 0; font-size: 1.2rem; color: #1976d2; }
        .card-item p { margin: 0; color: #444; font-size: 1rem; }
        .card-item .meta { font-size: 0.95rem; color: #555; margin-top: 8px; }
        .info-section { max-width: 900px; margin: 32px auto 0 auto; background: #fff; border-radius: 8px; box-shadow: 0 2px 12px rgba(0,0,0,0.06); padding: 28px 32px; display: flex; gap: 32px; align-items: center; flex-wrap: wrap; }
        .info-section img { width: 180px; border-radius: 8px; object-fit: cover; }
        .info-content { flex: 1; }
        .info-content h2 { margin-top: 0; color: #1976d2; font-size: 1.3rem; font-weight: 700; }
        .info-content p { color: #444; font-size: 1rem; }
        .footer { margin-top: 48px; background: #222; color: #fff; text-align: center; padding: 18px 0; font-size: 1rem; letter-spacing: 1px; }
        @media (max-width: 900px) {
            .navbar { flex-direction: column; align-items: flex-start; gap: 12px; }
            .card, .info-section { padding: 18px; }
            .card-content, .info-section { flex-direction: column; gap: 18px; }
            .slider-container { margin: 18px auto 0 auto; }
        }
    </style>
</head>
<body>
    <!-- container nav -->
    <div class="container">
        <nav class="navbar">
            <div class="logo">
                <h1>News-F</h1>
            </div>
            <div class="link">
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

    <!-- Slider -->
    <div class="slider-container">
        <div class="slider" id="slider">
            <div class="slide active">
                <img src="{{ asset('assets/img/slider1.jpg') }}" alt="Slider 1">
            </div>
            <div class="slide">
                <img src="{{ asset('assets/img/slider2.jpg') }}" alt="Slider 2">
            </div>
            <div class="slide">
                <img src="{{ asset('assets/img/slider3.jpg') }}" alt="Slider 3">
            </div>
        </div>
        <div class="slider-controls">
            <button onclick="prevSlide()">&#10094;</button>
            <button onclick="nextSlide()">&#10095;</button>
        </div>
    </div>

    <!-- Info Section -->
    <div class="info-section">
        <img src="{{ asset('assets/img/campus.jpg') }}" alt="Kampus">
        <div class="info-content">
            <h2>Selamat Datang di News-F</h2>
            <p>
                News-F adalah portal informasi kampus yang menyediakan berita, agenda, pengumuman, kompetisi, dan aspirasi mahasiswa secara terintegrasi.
                Temukan update terbaru dan jadilah bagian dari komunitas kampus yang aktif dan inspiratif!
            </p>
        </div>
    </div>

    <!-- card agenda dinamis -->
    <div class="container">
        <div class="card">
            <h1>Agenda</h1>
            <div class="card-content">
                @forelse($agendas as $agenda)
                    <div class="card-item">
                        <img src="{{ $agenda->image ? asset('storage/' . $agenda->image) : asset('assets/img/default-agenda.jpg') }}" alt="Agenda Image">
                        <h2>{{ $agenda->title }}</h2>
                        <p>{{ $agenda->description }}</p>
                        <div class="meta">
                            {{ $agenda->date }} | {{ $agenda->location ?? '' }}
                        </div>
                    </div>
                @empty
                    <p>Tidak ada agenda terbaru.</p>
                @endforelse
            </div>
            <div style="text-align:right; margin-top:12px;">
                <a href="{{ route('agenda.index') }}" style="color:#1976d2; font-weight:600;">Lihat Semua Agenda &rarr;</a>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        &copy; {{ date('Y') }} News-F | STT-NF. All rights reserved.
    </div>

    <script>
        let currentSlide = 0;
        const slides = document.querySelectorAll('.slide');

        function showSlide(idx) {
            slides.forEach((slide, i) => {
                slide.classList.toggle('active', i === idx);
            });
            currentSlide = idx;
        }

        function nextSlide() {
            let idx = (currentSlide + 1) % slides.length;
            showSlide(idx);
        }

        function prevSlide() {
            let idx = (currentSlide - 1 + slides.length) % slides.length;
            showSlide(idx);
        }

        // Auto slide
        setInterval(() => {
            nextSlide();
        }, 4000);

        document.addEventListener('DOMContentLoaded', () => {
            showSlide(0);

            // Dropdown profile
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
