<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - MediRent</title>
    <link rel="shortcut icon" href="{{ asset('css/asset/icn.jpg') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('css/asset/icn.jpg') }}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{ asset('css/asset/icn.jpg') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/beranda.css') }}">
    <style>
        /* Navbar Styles */
        header {
            display: flex;
            align-items: center;
            background: white;
            padding: 10px 20px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.08);
            width: 100%;
            position: fixed;
            top: 0;
            z-index: 1000;
        }

        .logo {
            display: flex;
            align-items: center;
            font-size: 22px;
            font-weight: 600;
            color: #1a73e8;
            margin-right: auto;
        }

        .logo img {
            width: 38px;
            height: 38px;
            margin-right: 8px;
        }

        nav {
            display: flex;
            align-items: center;
            gap: 42px;
            flex-wrap: wrap;
        }

        nav a {
            text-decoration: none;
            color: #6d7a8a;
            font-weight: 500;
            font-size: 16px;
            transition: 0.2s;
        }

        nav a:hover {
            color: #1a73e8;
        }

        nav a.active {
            color: #1a73e8;
            font-weight: 600;
        }

        .main-content {
            margin-top: 80px;
        }

    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])


</head>

<body>
    <!-- Navbar -->
    <header>
        <div class="logo">
            <img src="{{ asset('css/asset/logo.jpg') }}" alt="Logo">
            <span>MediRent</span>
        </div>

        <nav>
            <a href="{{ route('dashboard.user') }}">Beranda</a>
            <a href="{{ route('user.about') }}">Tentang</a>
            <a href="{{ route('user.daftar-alat.index') }}">Daftar Alat</a>
            <a href="{{ route('user.booking.index') }}">Booking</a>
            <a href="{{ route('user.transaksi.index') }}">Transaksi</a>
            <a href="{{ route('user.profile.index') }}">Profil</a>
        </nav>
    </header>

    <!-- Main Content -->
    <div class="main-content">
        {{-- HERO --}}
        <section id="beranda" class="hero">
            <h1 class="reveal">Selamat Datang di MediRent</h1>
            <h3 class="reveal">Bantu pemulihan Anda tanpa perlu beli mahal</h3>
        </section>

        {{-- TENTANG --}}
        <section id="tentang">
            <div class="tentang-list">
                <div class="tentang-card">
                    <h2 class="reveal">Mengapa MediRent ?</h2>
                    <img src="{{ asset('css/asset/icnmm.jpg') }}" alt="">
                    <p class="reveal">Kebutuhan alat bantu kesehatan semakin meningkat...</p>
                </div>

                <div class="tentang-card">
                    <h2 class="reveal">Solusi Kami</h2>
                    <img src="{{ asset('css/asset/dtr.jpg') }}" alt="">
                    <p class="reveal">MediRent hadir sebagai layanan sewa alat kesehatan...</p>
                </div>

                <div class="tentang-card">
                    <h2 class="reveal">Pilihan Layanan</h2>
                    <img src="{{ asset('css/asset/mbl.jpg') }}" alt="">
                    <p class="reveal">Delivery / Pickup sesuai kebutuhan pengguna...</p>
                </div>
            </div>
        </section>

        {{-- DAFTAR PRODUK --}}
        <section id="daftar" class="product-section">
            <h2 class="reveal">Daftar Alat Kesehatan</h2>

            <div class="product-list">
                @forelse($alat as $item)
                <div class="product-card">
                    <img src="{{ asset('storage/' . $item->foto) }}" alt="">

                    <h3 class="reveal">{{ $item->nama }}</h3>

                    <p class="reveal">Rp {{ number_format($item->harga, 0, ',', '.') }} / hari</p>

                    @if($item->stok > 0)
                    <span class="status tersedia">
                        <i class="fa-solid fa-check"></i> Tersedia
                    </span>
                    @else
                    <span class="status disewa">
                        <i class="fa-solid fa-xmark"></i> Disewa
                    </span>
                    @endif

                    <a href="{{ route('user.daftar-alat.show', $item->id) }}" class="btn">
                        Sewa Sekarang
                    </a>
                </div>
                @empty
                <p class="text-center">Belum ada alat tersedia.</p>
                @endforelse
            </div>

            {{-- Tombol Lihat Selengkapnya --}}
            <div class="text-center mt-4">
                <a href="{{ route('user.daftar-alat.index') }}" class="btn btn-primary"
                    style="padding: 10px 20px; border-radius: 8px; font-weight: 600;">
                    Lihat Selengkapnya
                </a>
            </div>



            {{-- FOOTER --}}
<div class="footer-section">

    {{-- Leaflet Map --}}
    <div id="map" style="width:100%; height:300px; border-radius:12px;"></div>

    <div class="contact-box mt-3">
        <h3>Contact & Media Sosial</h3>
        <p>📸 Instagram: <a>@medirent.id</a></p>
        <p>🐦 Twitter: <a>@medirentcare</a></p>
        <p>📘 Facebook: MediRent ID</p>
        <p>📱 WhatsApp: <b>+62 856-2356-8976</b></p>
        <p>📧 Email: medirent.support@gmail.com</p>
    </div>
</div>

        </section>
    </div>

    <script>
        function reveal() {
            const elements = document.querySelectorAll('.reveal');

            elements.forEach(el => {
                const top = el.getBoundingClientRect().top;
                const bottom = el.getBoundingClientRect().bottom;
                const windowHeight = window.innerHeight;

                if (top < windowHeight - 50 && bottom > 50) {
                    el.classList.add("active");
                } else {
                    el.classList.remove("active");
                }
            });
        }

        window.addEventListener("scroll", reveal);
        window.addEventListener("load", reveal);

    </script>

    <script>
    document.addEventListener("DOMContentLoaded", function () {
        // Koordinat yang ingin kamu tampilkan
        const lat = -6.416874; // contoh Yogyakarta
        const lng = 106.937951;

        initLeafletMap(lat, lng);
    });
</script>

</body>

</html>
