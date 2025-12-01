<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Alat - MediRent</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .navbar {
            padding: 10px 20px;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.08);
            background-color: white;
        }

        .logo-section {
            display: flex;
            align-items: center;
        }

        .logo {
            width: 40px;
            height: 40px;
            margin-right: 8px;
        }

        .logo-text {
            font-weight: 600;
            font-size: 18px;
            color: #1a73e8;
        }

        .nav-links {
            display: flex;
            gap: 20px;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .nav-links a {
            text-decoration: none;
            color: #6d7a8a;
            font-weight: 500;
            font-size: 16px;
            transition: 0.2s;
        }

        .nav-links a:hover {
            color: #1a73e8;
        }

        .nav-links a.active {
            color: #1a73e8;
            font-weight: 600;
        }

        .btn-danger {
            background-color: #e63946;
            border: none;
            padding: 8px 14px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
            font-size: 14px;
            color: white;
        }

        .btn-danger:hover {
            background-color: #c12e3b;
        }

        .container {
            max-width: 1200px;
            margin: 80px auto 40px auto;
            padding: 20px;
        }

        .detail-container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            padding: 30px;
            display: flex;
            gap: 30px;
        }

        .product-image {
            flex: 0 0 300px;
            background: #f5f5f5;
            border-radius: 12px;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .product-image img {
            max-width: 90%;
            max-height: 90%;
            object-fit: contain;
        }

        .product-info {
            flex: 1;
        }

        .product-title {
            font-size: 24px;
            font-weight: 700;
            color: #1a73e8;
            margin-bottom: 10px;
        }

        .product-description {
            font-size: 14px;
            color: #666;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .price-tag {
            display: inline-block;
            background: #e3f2fd;
            color: #1976d2;
            padding: 6px 12px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 14px;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: 600;
            margin-bottom: 8px;
            display: block;
        }

        .duration-options {
            display: flex;
            gap: 10px;
            margin-bottom: 15px;
        }

        .duration-option {
            padding: 8px 16px;
            border: 1px solid #ddd;
            border-radius: 20px;
            cursor: pointer;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .duration-option:hover {
            background-color: #f5f5f5;
        }

        .duration-option.selected {
            background-color: #007bff;
            color: white;
            border-color: #007bff;
        }

        .pickup-options {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-bottom: 20px;
        }

        .pickup-option {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.2s;
        }

        .pickup-option:hover {
            background-color: #f5f5f5;
        }

        .pickup-option.selected {
            background-color: #007bff;
            color: white;
            border-color: #007bff;
        }

        .radio-input {
            margin: 0;
            width: 16px;
            height: 16px;
        }

        .btn-primary {
            background: #007bff;
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            width: 100%;
            text-align: center;
        }

        .btn-primary:hover {
            background: #0056b3;
        }

        .back-link {
            color: #1a73e8;
            text-decoration: none;
            font-weight: 600;
            margin-bottom: 20px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .back-link:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .detail-container {
                flex-direction: column;
                padding: 20px;
            }

            .product-image {
                flex: 0 0 200px;
            }

            .navbar {
                position: static;
            }

            .container {
                margin-top: 20px;
            }
        }

    </style>

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
    <!-- Navbar -->
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
            <a href="{{ route('user.profile.index')}}">Profil</a>
        </nav>
    </header>

    <!-- Main Content -->
    <div class="detail-container">
        <!-- Foto Alat -->
        <div class="product-image">
            <img src="{{ asset('storage/' . $alat->foto) }}" alt="{{ $alat->nama_alat }}">
        </div>

        <!-- Informasi & Form Booking -->
        <div class="product-info">
            <h2 class="product-title">{{ $alat->nama_alat }}</h2>
            <p class="product-description">{{ $alat->deskripsi }}</p>

            <div class="price-tag">
                Rp {{ number_format($alat->harga, 0, ',', '.') }} / hari
            </div>

            @php
            $profilKosong = empty($user->nama) ||
            empty($user->profile->alamat) ||
            empty($user->profile->nomor_telepon) ||
            empty($user->profile->foto_ktp);
            @endphp

            <form action="{{ route('user.booking.store') }}" method="POST">
                @csrf

                <!-- Hidden input -->
                <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                <input type="hidden" name="id_alat" value="{{ $alat->id }}">
                <input type="hidden" name="harga" id="harga_input" value="{{ $alat->harga }}">

                <!-- Tanggal Sewa -->
                <div class="form-group">
                    <label class="form-label">Tanggal Sewa</label>
                    <input type="date" name="tanggal_sewa" id="tanggal_sewa" class="form-control" required>
                </div>

                <!-- Tanggal Kembali -->
                <div class="form-group">
                    <label class="form-label">Tanggal Kembali</label>
                    <input type="date" name="tanggal_kembali" id="tanggal_kembali" class="form-control" required>
                </div>

                <!-- Jumlah Unit -->
                <div class="form-group">
                    <label class="form-label">Jumlah Unit</label>
                    <input type="number" name="jumlah_unit" class="form-control" min="1" max="{{ $alat->stok }}"
                        value="1" required>
                    <small class="text-muted">Stok tersedia: {{ $alat->stok }}</small>
                </div>

                <!-- Metode Pengambilan -->
                <div class="form-group">
                    <label class="form-label">Metode Pengambilan</label>
                    <div class="pickup-options">
                        <label class="pickup-option">
                            <input type="radio" name="metode_pengambilan" value="diambil" class="radio-input" required>
                            Ambil di Tempat
                        </label>

                        <label class="pickup-option">
                            <input type="radio" name="metode_pengambilan" value="diantar" class="radio-input" required>
                            Diantar ke Lokasi
                        </label>
                    </div>
                </div>

                <!-- Estimasi Harga -->
                {{-- <div class="form-group">
                    <label class="form-label">Estimasi Total Harga</label>
                    <input type="text" id="total_harga" class="form-control" value="Rp 0" disabled>
                </div> --}}

                <button type="submit" class="btn-primary" @if($profilKosong) disabled
                    style="background:#ccc; cursor:not-allowed;" @endif>
                    Sewa Sekarang
                </button>

            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Handle duration selection
        document.querySelectorAll('.duration-option').forEach(option => {
            option.addEventListener('click', function () {
                // Remove selected class from all options
                document.querySelectorAll('.duration-option').forEach(opt => {
                    opt.classList.remove('selected');
                });

                // Add selected class to clicked option
                this.classList.add('selected');

                // Check the radio button
                const radio = this.querySelector('input[type="radio"]');
                radio.checked = true;
            });
        });

        // Handle pickup method selection
        document.querySelectorAll('.pickup-option').forEach(option => {
            option.addEventListener('click', function () {
                // Remove selected class from all options
                document.querySelectorAll('.pickup-option').forEach(opt => {
                    opt.classList.remove('selected');
                });

                // Add selected class to clicked option
                this.classList.add('selected');

                // Check the radio button
                const radio = this.querySelector('input[type="radio"]');
                radio.checked = true;
            });
        });

        // Handle mobile navbar toggle
        document.querySelector('.navbar-toggler').addEventListener('click', function () {
            const mobileNav = document.getElementById('mobileNav');
            if (mobileNav.classList.contains('show')) {
                mobileNav.classList.remove('show');
            } else {
                mobileNav.classList.add('show');
            }
        });

    </script>

    <script>
        function hitungTotal() {
            const hargaPerHari = {
                {
                    $alat - > harga
                }
            };
            const tglSewa = new Date(document.getElementById('tanggal_sewa').value);
            const tglKembali = new Date(document.getElementById('tanggal_kembali').value);
            const jumlahUnit = document.querySelector('input[name="jumlah_unit"]').value;

            if (!isNaN(tglSewa) && !isNaN(tglKembali) && tglKembali >= tglSewa) {
                const hari = (tglKembali - tglSewa) / (1000 * 60 * 60 * 24);
                const total = hari * hargaPerHari * jumlahUnit;
                document.getElementById('total_harga').value = "Rp " + total.toLocaleString('id-ID');
            }
        }

        document.getElementById('tanggal_sewa').onchange = hitungTotal;
        document.getElementById('tanggal_kembali').onchange = hitungTotal;
        document.querySelector('input[name="jumlah_unit"]').oninput = hitungTotal;

    </script>


    @if ($profilKosong)
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            Swal.fire({
                icon: "warning",
                title: "Lengkapi Profil Dulu!",
                text: "Anda harus mengisi biodata sebelum dapat melakukan penyewaan.",
                confirmButtonText: "Oke",
            });
        });

    </script>
    @endif

</body>

</html>
