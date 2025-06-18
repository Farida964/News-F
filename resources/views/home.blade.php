<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News-F Home</title>
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/aspirasi.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/footer.css') }}">
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

<!-- main -->
<div class="main">
    <section class="slider">
        <div class="slide active"><img src="{{ asset('assets/img/gedunga.jpg') }}" alt="Slide 1"></div>
        <div class="slide"><img src="{{ asset('assets/img/newsapp.png') }}" alt="Slide 2"></div>
        <div class="slide"><img src="{{ asset('assets/img/gedungnf.jpg') }}" alt="Slide 3"></div>

        <button class="prev" onclick="prevSlide()">&#10094;</button>
        <button class="next" onclick="nextSlide()">&#10095;</button>
    </section>

    <section class="info">
        <img src="{{ asset('assets/img/LOGO (2).png') }}" alt="Campus">
        <div class="info-text">
            <h2>Welcome to News-F</h2>
            <p>Campus information portal: news, events, announcements, and student aspirations.</p>
            <p>Be wise in sharing and receiving information. Read information thoroughly and carefully. 
                Let's get started — would you like to check out the campus agenda first?</p>
        </div>
    </section>

    <!-- card -->
    <div class="container_card">
        @foreach($allAgenda as $key => $agd)
            <div class="card-item">
                <img src="{{ asset('assets/img/CONT01.webp') }}" alt="">
                <h2>{{ $agd->title }}</h2>
                <p class="caption">✍️ : {{ $agd->description }}</p>
                <p>📅 : {{ $agd->date }}</p>
                <p>📍 : {{ $agd->location }}</p>
                <p>Uploaded : {{ $agd->created_at }}</p>
                <p>Updated : {{ $agd->updated_at }}</p>
                <form action="{{ route('agenda.destroy', $agd->id) }}" method="POST">
                    <!-- <a href="{{ route('agenda.show', $agd->id) }}" class="detail">Detail</a> -->
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
    <script src="{{ asset('assets/js/dropDown.js') }}"></script>
</div>
<!-- endMain -->


    <footer class="footer">
        &copy; {{ date('Y') }} News-F | STT-NF. All rights reserved.
    </footer>

    <script src="{{ asset('assets/js/home.js') }}"></script>
</body>
</html>
