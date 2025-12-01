<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pembayaran - MediRent</title>
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

        .payment-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
        }

        .order-summary {
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        .order-summary h3 {
            color: #1a73e8;
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid #eee;
        }

        .order-detail {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .detail-label {
            color: #666;
            font-weight: 500;
        }

        .detail-value {
            font-weight: 600;
            color: #333;
        }

        .payment-form {
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        .payment-form h3 {
            color: #1a73e8;
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid #eee;
        }

        .payment-method {
            margin-bottom: 20px;
        }

        .method-option {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            cursor: pointer;
            margin-bottom: 10px;
            transition: all 0.2s;
        }

        .method-option:hover {
            background-color: #f5f5f5;
        }

        .method-option.selected {
            background-color: #e3f2fd;
            border-color: #1976d2;
        }

        .method-option input[type="radio"] {
            margin: 0;
            width: 16px;
            height: 16px;
        }

        .method-info {
            margin-left: 10px;
            flex-grow: 1;
        }

        .method-name {
            font-weight: 600;
            color: #333;
        }

        .method-number {
            font-size: 14px;
            color: #666;
        }

        .terms-section {
            margin-top: 20px;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 8px;
        }

        .terms-title {
            font-weight: 600;
            color: #1a73e8;
            margin-bottom: 10px;
        }

        .terms-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .terms-item {
            margin-bottom: 8px;
            padding-left: 20px;
            position: relative;
        }

        .terms-item:before {
            content: "•";
            position: absolute;
            left: 0;
            color: #666;
        }

        .checkbox-section {
            margin-top: 20px;
            display: flex;
            align-items: flex-start;
            gap: 10px;
        }

        .checkbox-input {
            margin: 0;
            width: 20px;
            height: 20px;
            cursor: pointer;
        }

        .checkbox-label {
            font-size: 14px;
            color: #666;
            line-height: 1.6;
        }

        .submit-button {
            background: #1a73e8;
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            width: 100%;
            margin-top: 20px;
            text-align: center;
        }

        .submit-button:hover {
            background: #1557b0;
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

            .payment-container {
                grid-template-columns: 1fr;
            }

            .order-summary,
            .payment-form {
                padding: 15px;
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
            <a href="{{ route('user.daftar-alat.index') }}">Booking</a>
            <a href="{{ route('user.transaksi.index') }}" class="active">Transaksi</a>
            <a href="{{ route('user.profile.index') }}">Profil</a>
        </nav>
    </header>

    <!-- Main Content -->
    <div class="main-content">
        <a href="#" class="back-link">
            <i class="fa-solid fa-arrow-left"></i> Kembali
        </a>

        <div class="page-title">
            Konfirmasi Pembayaran
        </div>

        <div class="payment-container">
            <!-- Order Summary -->
            <div class="order-summary">
                <h3>Rincian Pesanan</h3>

                <div class="order-detail">
                    <span class="detail-label">Nama Alat</span>
                    <span class="detail-value">{{ $booking->alat->nama_alat }}</span>
                </div>

                <div class="order-detail">
                    <span class="detail-label">Lama Sewa</span>
                    <span class="detail-value">
                        @php
                        $mulai = new DateTime($booking->tanggal_sewa);
                        $akhir = new DateTime($booking->tanggal_kembali);
                        $hari = $akhir->diff($mulai)->days;
                        if ($hari == 0) $hari = 1;
                        @endphp

                        {{ $hari }} hari
                    </span>
                </div>

                <div class="order-detail">
                    <span class="detail-label">Total Harga</span>
                    <span class="detail-value">Rp {{ number_format($transaksi->sub_total, 0, ',', '.') }}</span>
                </div>

                <div class="order-detail">
                    <span class="detail-label">Metode Pengambilan</span>
                    <span class="detail-value">
                        {{ $booking->metode_pengambilan == 'diantar' ? 'Diantar ke lokasi' : 'Diambil sendiri (Pick Up)' }}
                    </span>
                </div>
            </div>

            <!-- Payment Form -->
            <div class="payment-form">
                <h3>Pembayaran</h3>

                <p>Dengan ini saya menyetujui syarat dan ketentuan penyewaan alat kesehatan di MediRent, termasuk:</p>

                <div class="terms-section">
                    <div class="terms-title">Syarat & Ketentuan</div>
                    <ul class="terms-list">
                        <li class="terms-item">Keterlambatan pengembalian alat akan dikenakan denda sesuai kebijakan
                            yang berlaku.</li>
                        <li class="terms-item">Kerusakan atau kehilangan alat selama masa sewa menjadi tanggung jawab
                            penyewa sepenuhnya.</li>
                        <li class="terms-item">Pembayaran atau bukti tidak valid tidak dapat dikembalikan.</li>
                    </ul>
                </div>

                <form action="{{ route('user.transaksi.bayar', $booking->id) }}" method="POST">
                    @csrf

                    <div class="payment-method">
                        <label class="method-option">
                            <input type="radio" name="metode_pembayaran" value="cod">
                            <div class="method-info">
                                <div class="method-name">Cash On Delivery (COD)</div>
                                <div class="method-number">Bayar saat Alat Diterima</div>
                            </div>
                        </label>

                        <label class="method-option">
                            <input type="radio" name="metode_pembayaran" value="qris">
                            <div class="method-info">
                                <div class="method-name">QRIS</div>
                                <div class="method-number">Scan QR untuk pembayaran</div>
                            </div>
                        </label>


                        <label class="method-option">
                            <input type="radio" name="metode_pembayaran" value="bca">
                            <div class="method-info">
                                <div class="method-name">Bank BCA</div>
                                <div class="method-number">0123456789 - MediRent</div>
                            </div>
                        </label>

                        <label class="method-option">
                            <input type="radio" name="metode_pembayaran" value="mandiri">
                            <div class="method-info">
                                <div class="method-name">Bank Mandiri</div>
                                <div class="method-number">1234567890 - MediRent</div>
                            </div>
                        </label>

                        <label class="method-option">
                            <input type="radio" name="metode_pembayaran" value="bni">
                            <div class="method-info">
                                <div class="method-name">Bank BNI</div>
                                <div class="method-number">9876543210 - MediRent</div>
                            </div>
                        </label>
                    </div>

                    <div class="checkbox-section">
                        <input type="checkbox" id="terms_agreement" class="checkbox-input" required>
                        <label for="terms_agreement" class="checkbox-label">
                            Saya menyetujui syarat dan ketentuan di atas.
                        </label>
                    </div>

                    <button type="submit" class="submit-button">
                        Bayar Sekarang
                    </button>
                </form>

            </div>
        </div>
    </div>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
           @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: "{{session('success')}}",
                showConfirmButton: true,
            });
            @endif
    </script>


    <script>
        // Handle payment method selection
        document.querySelectorAll('.method-option').forEach(option => {
            option.addEventListener('click', function () {
                // Remove selected class from all options
                document.querySelectorAll('.method-option').forEach(opt => {
                    opt.classList.remove('selected');
                });

                // Add selected class to clicked option
                this.classList.add('selected');

                // Check the radio button
                const radio = this.querySelector('input[type="radio"]');
                radio.checked = true;
            });
        });

        // Handle form submission
        document.querySelector('.submit-button').addEventListener('click', function () {
            const checkbox = document.getElementById('terms_agreement');

            if (!checkbox.checked) {
                alert('Harap setujui syarat dan ketentuan terlebih dahulu.');
                return;
            }
        });

    </script>

</body>

</html>
