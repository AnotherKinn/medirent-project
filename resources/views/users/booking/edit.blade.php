<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Booking - MediRent</title>
    <link rel="shortcut icon" href="{{ asset('css/asset/icn.jpg') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('css/asset/icn.jpg') }}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{ asset('css/asset/icn.jpg') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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

        .booking-container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        .booking-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .booking-title {
            font-size: 24px;
            font-weight: 700;
            color: #1a73e8;
            margin-bottom: 10px;
        }

        .booking-form {
            display: grid;
            gap: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            font-weight: 600;
            margin-bottom: 8px;
            color: #333;
        }

        .form-input {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            font-family: "Poppins", sans-serif;
            transition: border-color 0.2s;
        }

        .form-input:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 0 2px rgba(0, 123, 255, 0.25);
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
            font-size: 14px;
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

        .button-group {
            display: flex;
            gap: 15px;
            justify-content: center;
            margin-top: 30px;
        }

        .btn-save {
            background: #1a73e8;
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            flex: 1;
            min-width: 120px;
            text-align: center;
        }

        .btn-save:hover {
            background: #1557b0;
        }

        .btn-cancel {
            background: #6c757d;
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            flex: 1;
            min-width: 120px;
            text-align: center;
        }

        .btn-cancel:hover {
            background: #5a6268;
        }

        .required {
            color: #e63946;
        }

        .booking-info {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .info-title {
            font-weight: 600;
            color: #1a73e8;
            margin-bottom: 10px;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
        }

        .info-label {
            color: #666;
        }

        .info-value {
            font-weight: 600;
            color: #333;
        }

        @media (max-width: 768px) {
            header {
                flex-direction: column;
                padding: 10px;
            }

            .logo {
                margin-bottom: 10px;
                margin-right: 0;
            }

            nav {
                width: 100%;
                justify-content: center;
                gap: 10px;
            }

            .main-content {
                margin-top: 120px;
            }

            .booking-container {
                padding: 20px;
            }

            .button-group {
                flex-direction: column;
            }

            .duration-options {
                flex-direction: column;
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
            <a href="{{ route('user.daftar-alat.index') }}">Daftar Alat</a>
            <a href="{{ route('user.booking.index') }}">Booking</a>
            <a href="{{ route('user.transaksi.index') }}">Transaksi</a>
            <a href="{{ route('user.profile.index') }}">Profil</a>
        </nav>
    </header>

    <!-- Main Content -->
    <div class="main-content">
        <a href="{{ route('user.booking.index') }}" class="back-link">
            <i class="fa-solid fa-arrow-left"></i> Kembali ke Riwayat Booking
        </a>

        <div class="page-title">
            Edit Booking
        </div>

        <div class="booking-container">
            <div class="booking-header">
                <h2 class="booking-title">Edit Informasi Booking</h2>
            </div>

            <div class="booking-info">
                <div class="info-title">Informasi Alat</div>
                <div class="info-row">
                    <span class="info-label">Nama Alat</span>
                    <span class="info-value">{{ $booking->alat->nama_alat }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Harga per Hari</span>
                    <span class="info-value">Rp {{ number_format($booking->alat->harga,0,",",".") }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Stok Tersedia</span>
                    <span class="info-value">{{ $booking->alat->stok }} unit</span>
                </div>
            </div>

            <form class="booking-form" id="edit-booking-form" method="POST"
                action="{{ route('user.booking.update', $booking->id) }}">
                @csrf
                @method('PUT')


                <div class="form-group">
                    <label for="alat" class="form-label">Alat Disewa</label>
                    <input type="text" id="alat" class="form-input" value="{{ $booking->alat->nama_alat }}" readonly>
                </div>

                <div class="form-group">
                    <label for="jumlah-unit" class="form-label">Jumlah Unit <span class="required">*</span></label>
                    <input type="number" id="jumlah-unit" name="jumlah_unit" class="form-input"
                        value="{{ $booking->jumlah_unit }}" min="1"
                        max="{{ $booking->alat->stok + $booking->jumlah_unit }}" required>
                </div>

                <div class="form-group">
                    <label for="tanggal-sewa" class="form-label">Tanggal Mulai Sewa <span
                            class="required">*</span></label>
                    <input type="date" id="tanggal-sewa" name="tanggal_sewa" class="form-input"
                        value="{{ $booking->tanggal_sewa }}" required>
                </div>

                <div class="form-group">
                    <label for="tanggal-kembali" class="form-label">Tanggal Pengembalian <span
                            class="required">*</span></label>
                    <input type="date" id="tanggal-kembali" name="tanggal_kembali" class="form-input"
                        value="{{ $booking->tanggal_kembali }}" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Metode Pengambilan <span class="required">*</span></label>
                    <div class="pickup-options">
                        <div class="pickup-option {{ $booking->metode_pengambilan == 'diantar' ? 'selected' : '' }}">
                            <input type="radio" name="metode_pengambilan" value="diantar" id="pickup-delivery"
                                {{ $booking->metode_pengambilan=='diantar'?'checked':'' }}>
                            <label for="pickup-delivery">Diantar ke Rumah (Delivery)</label>
                        </div>
                        <div class="pickup-option {{ $booking->metode_pengambilan == 'diambil' ? 'selected' : '' }}">
                            <input type="radio" name="metode_pengambilan" value="diambil" id="pickup-pickup"
                                {{ $booking->metode_pengambilan=='diambil'?'checked':'' }}>
                            <label for="pickup-pickup">Diambil sendiri (Pickup)</label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Total Pembayaran</label>
                    <div class="booking-info">
                        @php
                        $hargaPerHari = $booking->alat->harga;

                        $durasi = \Carbon\Carbon::parse($booking->tanggal_sewa)
                        ->diffInDays(\Carbon\Carbon::parse($booking->tanggal_kembali));

                        // Jika durasi 0, maka minimal 1 hari
                        $durasi = max($durasi, 1);

                        $total = $hargaPerHari * $durasi * $booking->jumlah_unit;
                        @endphp

                        <div class="info-row">
                            <span class="info-label">Harga per Hari</span>
                            <span class="info-value">Rp {{ number_format($hargaPerHari,0,",",".") }}</span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">Durasi</span>
                            <span class="info-value">{{ $durasi }} hari</span>
                        </div>

                        <div class="info-row">
                            <span class="info-label">Jumlah Unit</span>
                            <span class="info-value">{{ $booking->jumlah_unit }} unit</span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">Total</span>
                            <span class="info-value" style="color: #1a73e8; font-weight: 700;">Rp
                                {{ number_format($total,0,",",".") }}</span>
                        </div>
                    </div>
                </div>

                <div class="button-group">
                    <button type="submit" class="btn-save">Simpan Perubahan</button>
                    <button type="button" class="btn-cancel"
                        onclick="window.location.href='{{ route('user.booking.index') }}'">Batal</button>
                </div>
            </form>

        </div>
    </div>

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

                // Update return date based on duration
                updateReturnDate();
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

        // Handle date change
        document.getElementById('tanggal-sewa').addEventListener('change', function () {
            updateReturnDate();
        });

        // Handle unit change
        document.getElementById('jumlah-unit').addEventListener('change', function () {
            updateTotalPayment();
        });

        // Function to update return date based on duration and start date
        function updateReturnDate() {
            const startDate = new Date(document.getElementById('tanggal-sewa').value);
            const durationOptions = document.querySelectorAll('input[name="duration"]:checked');
            if (durationOptions.length > 0) {
                const duration = parseInt(durationOptions[0].value);
                const returnDate = new Date(startDate);
                returnDate.setDate(startDate.getDate() + duration);

                // Format date as YYYY-MM-DD
                const year = returnDate.getFullYear();
                const month = String(returnDate.getMonth() + 1).padStart(2, '0');
                const day = String(returnDate.getDate()).padStart(2, '0');
                const formattedDate = `${year}-${month}-${day}`;

                document.getElementById('tanggal-kembali').value = formattedDate;
            }

            updateTotalPayment();
        }

        // Function to update total payment
        function updateTotalPayment() {
            const hargaPerHari = 20000;
            const durationOptions = document.querySelectorAll('input[name="duration"]:checked');
            const jumlahUnit = parseInt(document.getElementById('jumlah-unit').value) || 1;

            if (durationOptions.length > 0) {
                const duration = parseInt(durationOptions[0].value);
                const total = hargaPerHari * duration * jumlahUnit;

                // Update total display
                const totalElements = document.querySelectorAll('.info-value');
                if (totalElements.length >= 4) {
                    totalElements[3].textContent = 'Rp ' + total.toLocaleString('id-ID');
                }
            }
        }

        // Handle cancel button
        document.querySelector('.btn-cancel').addEventListener('click', function () {
            if (confirm('Apakah Anda yakin ingin membatalkan perubahan?')) {
                window.location.href = '#';
            }
        });

    </script>
</body>

</html>
