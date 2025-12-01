<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Alat Kesehatan - MediRent</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: "Poppins", sans-serif;
            background: #9db7e0;
            overflow-x: hidden;
        }

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

        .container {
            margin-top: 80px;
            padding: 20px;
        }

        .page-title {
            text-align: center;
            font-size: 28px;
            font-weight: 700;
            color: white;
            background: linear-gradient(135deg, #4f46e5, #3b82f6);
            padding: 20px;
            border-radius: 12px;
            margin-bottom: 30px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .search-form {
            max-width: 600px;
            margin: 0 auto 30px auto;
        }

        .search-input {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            font-family: "Poppins", sans-serif;
        }

        .search-input:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 0 2px rgba(0, 123, 255, 0.25);
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .product-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
        }

        .product-image {
            width: 100%;
            height: 180px;
            background: #f5f5f5;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .product-image img {
            max-width: 90%;
            max-height: 90%;
            object-fit: contain;
        }

        .product-content {
            padding: 16px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .product-title {
            font-size: 18px;
            font-weight: 600;
            color: #1a73e8;
            margin-bottom: 8px;
        }

        .product-description {
            font-size: 14px;
            color: #666;
            margin-bottom: 12px;
            flex-grow: 1;
        }

        .product-status {
            display: flex;
            align-items: center;
            gap: 6px;
            margin-bottom: 12px;
            font-size: 13px;
        }

        .status-available {
            color: #10b981;
        }

        .status-unavailable {
            color: #ef4444;
        }

        .status-icon {
            font-size: 14px;
        }

        .product-price {
            font-size: 16px;
            font-weight: 700;
            color: #333;
            margin-bottom: 16px;
        }

        .btn-sewa {
            padding: 8px 16px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: all 0.2s;
            text-align: center;
        }

        .btn-primary {
            background: #007bff;
            color: white;
        }

        .btn-primary:hover {
            background: #0056b3;
        }

        .btn-disabled {
            background: #cccccc;
            color: #555;
            cursor: not-allowed;
        }

        .no-results {
            text-align: center;
            padding: 40px;
            color: #666;
            font-size: 18px;
        }

        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 30px;
            gap: 8px;
        }

        .pagination a {
            padding: 8px 16px;
            border: 1px solid #ddd;
            border-radius: 4px;
            text-decoration: none;
            color: #666;
            transition: all 0.2s;
        }

        .pagination a:hover {
            background-color: #007bff;
            color: white;
            border-color: #007bff;
        }

        .pagination .active {
            background-color: #007bff;
            color: white;
            border-color: #007bff;
            font-weight: bold;
        }

        @media (max-width: 768px) {
            header {
                flex-direction: column;
                padding: 10px;
            }

            .logo {
                margin-bottom: 10px;
            }

            nav {
                width: 100%;
                justify-content: space-between;
                gap: 10px;
            }

            .container {
                margin-top: 120px;
            }

            .product-grid {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            }
        }

    </style>
</head>

<body>
    <!-- Header/Navbar -->
    <header>
        <div class="logo">
            <img src="{{ asset('css/asset/logo.jpg') }}" alt="Logo">
            <span>MediRent</span>
        </div>

        <nav>
            <a href="{{ route('dashboard.user') }}">Beranda</a>
            <a href="{{ route('user.about') }}">Tentang</a>
            <a href="{{ route('user.daftar-alat.index') }}" class="active">Daftar Alat</a>
            <a href="{{ route('user.booking.index') }}">Booking</a>
            <a href="{{ route('user.transaksi.index') }}">Transaksi</a>
            <a href="{{ route('user.profile.index') }}">Profil</a>
        </nav>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="page-title">
            Daftar Alat Kesehatan
        </div>

        <!-- Search Form -->
        <form method="GET" action="#" class="search-form">
            <input type="text" name="search" value="" class="search-input" placeholder="Cari alat kesehatan...">
        </form>

        <!-- Product Cards Grid -->
        <div class="product-grid">

            @forelse($alats as $alat)
            <div class="product-card">
                <div class="product-image">
                    @if($alat->foto)
                    <img src="{{ asset('storage/' . $alat->foto) }}" alt="{{ $alat->nama_alat }}">
                    @else
                    <img src="https://placehold.co/200x150" alt="No Image">
                    @endif
                </div>

                <div class="product-content">
                    <h3 class="product-title">{{ $alat->nama_alat }}</h3>

                    <p class="product-description">
                        {{ Str::limit($alat->deskripsi, 80) }}
                    </p>

                    <div class="product-status {{ $alat->stok > 0 ? 'status-available' : 'status-unavailable' }}">
                        @if($alat->stok > 0)
                        <i class="fa-solid fa-check status-icon"></i> Tersedia ({{ $alat->stok }})
                        @else
                        <i class="fa-solid fa-xmark status-icon"></i> Tidak Tersedia
                        @endif
                    </div>

                    <p class="product-price">
                        Rp {{ number_format($alat->harga, 0, ',', '.') }}/hari
                    </p>

                    @if($alat->stok > 0)
                    <a href="{{ route('user.daftar-alat.show', $alat->id) }}" class="btn-sewa btn-primary">Sewa</a>
                    @else
                    <button class="btn-sewa btn-disabled" disabled>Sewa</button>
                    @endif
                </div>
            </div>

            @empty
            <!-- No Results Message -->
            <div class="no-results" style="margin: auto;">
                <p>Tidak ada alat yang ditemukan.</p>
            </div>
            @endforelse

        </div>
        <div class="pagination">
            {{ $alats->links('pagination::bootstrap-5') }}
        </div>

    </div>

    <script>
        // Simple scroll reveal effect
        function reveal() {
            const elements = document.querySelectorAll('.product-card');

            elements.forEach(el => {
                const top = el.getBoundingClientRect().top;
                const windowHeight = window.innerHeight;

                if (top < windowHeight - 50) {
                    el.style.opacity = '1';
                    el.style.transform = 'translateY(0)';
                }
            });
        }

        // Add animation to cards on load
        document.addEventListener('DOMContentLoaded', function () {
            const cards = document.querySelectorAll('.product-card');
            cards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';

                // Stagger the animations
                setTimeout(() => {
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, index * 100);
            });

            // Initial reveal
            reveal();
        });

        // Handle scroll for reveal effect
        window.addEventListener('scroll', reveal);

    </script>
</body>

</html>
