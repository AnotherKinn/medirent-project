<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Transaksi - MediRent</title>
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

        /* Desktop Table Styles */
        .transaction-table-container {
            display: none;
        }

        .transaction-table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        .transaction-table th {
            background: linear-gradient(135deg, #4f46e5, #3b82f6);
            color: white;
            padding: 16px;
            text-align: left;
            font-weight: 600;
        }

        .transaction-table td {
            padding: 16px;
            border-bottom: 1px solid #eee;
        }

        .transaction-table tr:last-child td {
            border-bottom: none;
        }

        .transaction-table tr:hover {
            background-color: #f8f9fa;
        }

        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .status-selesai {
            background: #e8f5e9;
            color: #2e7d32;
        }

        .status-proses {
            background: #fff3e0;
            color: #f57c00;
        }

        .status-dibatalkan {
            background: #ffebee;
            color: #c62828;
        }

        .btn-table {
            background: #1a73e8;
            color: white;
            border: none;
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 500;
            cursor: pointer;
            transition: background 0.2s;
            text-decoration: none;
            display: inline-block;
        }

        .btn-table:hover {
            background: #1557b0;
        }

        /* Mobile Card Styles */
        .transaction-card-container {
            display: block;
        }

        .transaction-card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            transition: transform 0.2s ease;
        }

        .transaction-card:hover {
            transform: translateY(-2px);
        }

        .transaction-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 1px solid #eee;
        }

        .transaction-id {
            font-weight: 600;
            color: #1a73e8;
            font-size: 16px;
        }

        .transaction-details {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .detail-item {
            margin-bottom: 8px;
        }

        .detail-label {
            font-weight: 500;
            color: #666;
            font-size: 14px;
        }

        .detail-value {
            font-weight: 600;
            color: #333;
            font-size: 15px;
        }

        .transaction-summary {
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px solid #eee;
        }

        .summary-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
        }

        .total-amount {
            font-weight: 700;
            color: #1a73e8;
            font-size: 18px;
        }

        .btn-detail {
            background: #1a73e8;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: background 0.2s;
            text-decoration: none;
            display: inline-block;
            margin-top: 15px;
        }

        .btn-detail:hover {
            background: #1557b0;
        }

        /* Modal Styles */
        .modal-content {
            border-radius: 12px;
            border: none;
        }

        .modal-header {
            background: linear-gradient(135deg, #4f46e5, #3b82f6);
            color: white;
            border-bottom: none;
            padding: 20px;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
        }

        .modal-title {
            font-weight: 600;
            font-size: 20px;
        }

        .modal-body {
            padding: 24px;
        }

        .booking-details {
            margin-bottom: 20px;
        }

        .detail-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 12px;
            padding-bottom: 12px;
            border-bottom: 1px solid #eee;
        }

        .detail-label {
            color: #666;
            font-weight: 500;
        }

        .detail-value {
            font-weight: 600;
            color: #333;
        }

        .status-section {
            background: #f8f9fa;
            padding: 16px;
            border-radius: 8px;
            margin-top: 20px;
        }

        .status-title {
            font-weight: 600;
            margin-bottom: 12px;
            color: #4f46e5;
        }

        .status-icon {
            font-size: 24px;
            margin-right: 8px;
        }

        .status-text {
            font-weight: 600;
            font-size: 16px;
        }

        .status-success {
            color: #2e7d32;
        }

        .status-failed {
            color: #c62828;
        }

        .status-pending {
            color: #f57c00;
        }

        /* Responsive Design */
        @media (min-width: 769px) {
            .transaction-table-container {
                display: block;
            }

            .transaction-card-container {
                display: none;
            }
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

            .transaction-details {
                grid-template-columns: 1fr;
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
            <a href="#tentang">Tentang</a>
            <a href="{{ route('user.daftar-alat.index') }}">Daftar Alat</a>
            <a href="{{ route('user.booking.index') }}">Booking</a>
            <a href="{{ route('user.transaksi.index')}}" class="active">Transaksi</a>
            <a href="{{ route('user.profile.index') }}">Profil</a>

        </nav>
    </header>

    <!-- Main Content -->
    <div class="main-content">
        <div class="page-title">
            Riwayat Transaksi
        </div>

        <!-- Desktop Table View -->
        <div class="transaction-table-container">
            <table class="transaction-table">
                <thead>
                    <tr>
                        <th>ID Transaksi</th>
                        <th>Alat Disewa</th>
                        <th>Tanggal Sewa</th>
                        <th>Metode</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaksis as $trx)
                    <tr>
                        <td>{{ $trx->kode_transaksi }}</td>

                        <td>{{ $trx->booking->alat->nama_alat ?? '-' }}</td>

                        <td>{{ \Carbon\Carbon::parse($trx->booking->tanggal_sewa)->format('d M Y') }}</td>

                        <td>{{ ucfirst($trx->booking->metode_pengambilan) }}</td>

                        <td>Rp {{ number_format($trx->sub_total, 0, ',', '.') }}</td>

                        <td>
                            @if ($trx->status == 'sukses')
                            <span class="status-badge status-selesai">
                                <i class="fa-solid fa-check-circle"></i> Selesai
                            </span>
                            @elseif ($trx->status == 'menunggu')
                            <span class="status-badge status-proses">
                                <i class="fa-solid fa-clock"></i> Proses
                            </span>
                            @else
                            <span class="status-badge status-dibatalkan">
                                <i class="fa-solid fa-times-circle"></i> Dibatalkan
                            </span>
                            @endif
                        </td>

                        <td>
                            <button type="button" class="btn-table" data-bs-toggle="modal"
                                data-bs-target="#modalTransaksi{{ $trx->id }}">
                                Detail
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

        <!-- Mobile Card View -->
        <div class="transaction-card-container">
            @foreach ($transaksis as $trx)
            <div class="transaction-card">

                <div class="transaction-header">
                    <div class="transaction-id">{{ $trx->kode_transaksi }}</div>

                    @if ($trx->status == 'sukses')
                    <div class="status-badge status-selesai">
                        <i class="fa-solid fa-check-circle"></i> Selesai
                    </div>
                    @elseif ($trx->status == 'menunggu')
                    <div class="status-badge status-proses">
                        <i class="fa-solid fa-clock"></i> Proses
                    </div>
                    @else
                    <div class="status-badge status-dibatalkan">
                        <i class="fa-solid fa-times-circle"></i> Dibatalkan
                    </div>
                    @endif
                </div>

                <div class="transaction-details">
                    <div class="detail-item">
                        <div class="detail-label">Alat Disewa</div>
                        <div class="detail-value">{{ $trx->booking->alat->nama_alat ?? '-' }}</div>
                    </div>

                    <div class="detail-item">
                        <div class="detail-label">Durasi</div>
                        <div class="detail-value">
                            {{ \Carbon\Carbon::parse($trx->booking->tanggal_sewa)
                        ->diffInDays($trx->booking->tanggal_kembali) }} hari
                        </div>
                    </div>

                    <div class="detail-item">
                        <div class="detail-label">Tanggal Sewa</div>
                        <div class="detail-value">
                            {{ \Carbon\Carbon::parse($trx->booking->tanggal_sewa)->format('d M Y') }}
                        </div>
                    </div>

                    <div class="detail-item">
                        <div class="detail-label">Metode Pengambilan</div>
                        <div class="detail-value">{{ ucfirst($trx->booking->metode_pengambilan) }}</div>
                    </div>

                    <div class="detail-item">
                        <div class="detail-label">Total Bayar</div>
                        <div class="detail-value">Rp {{ number_format($trx->sub_total, 0, ',', '.') }}</div>
                    </div>
                </div>

                <button type="button" class="btn-table" data-bs-toggle="modal"
                    data-bs-target="#modalTransaksi{{ $trx->id }}">
                    Detail
                </button>


            </div>
            @endforeach
        </div>

    </div>


    @foreach ($transaksis as $trx)
    <div class="modal fade" id="modalTransaksi{{ $trx->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Detail Transaksi {{ $trx->kode_transaksi }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    {{-- ===================== STATUS ===================== --}}
                    <div class="status-section mt-3">
                        <div class="status-title fw-bold">Status Transaksi</div>

                        @php
                        $status = $trx->status;
                        $bookingStatus = $trx->booking->status;

                        $statusClass = match ($status) {
                        'menunggu' => 'text-warning',
                        'sukses' => 'text-success',
                        'gagal' => 'text-danger',
                        default => 'text-secondary'
                        };

                        $statusText = match ($status) {
                        'menunggu' => 'Menunggu Konfirmasi',
                        'sukses' => 'Pembayaran Berhasil',
                        'gagal' => 'Pembayaran Ditolak',
                        default => ucfirst($status)
                        };

                        $statusDescription = match ($status) {
                        'menunggu' => 'Transaksi sedang dalam proses verifikasi pembayaran.',
                        'sukses' => 'Pembayaran telah diverifikasi. Terima kasih!',
                        'gagal' => 'Pembayaran gagal atau bukti tidak valid. Silakan upload ulang.',
                        default => 'Status transaksi sedang diperbarui.'
                        };

                        $statusIcon = match ($status) {
                        'menunggu' => 'fa-clock',
                        'sukses' => 'fa-circle-check',
                        'gagal' => 'fa-circle-xmark',
                        default => 'fa-info-circle'
                        };

                        $bookingStatusClass = match ($bookingStatus) {
                        'menunggu' => 'text-warning',
                        'menunggu_verifikasi' => 'text-warning',
                        'selesai' => 'text-success',
                        'ditolak' => 'text-danger',
                        default => 'text-secondary'
                        };

                        $bookingStatusText = match ($bookingStatus) {
                        'menunggu' => 'text-warning',
                        'menunggu_verifikasi' => 'text-warning',
                        'selesai' => 'text-success',
                        'ditolak' => 'text-danger',
                        default => 'text-secondary'
                        };
                        @endphp

                        <div class="status-text {{ $statusClass }} mt-2">
                            <i class="fa-solid {{ $statusIcon }} me-2"></i>
                            {{ $statusText }}
                        </div>

                        <p class="mt-1 text-muted">{{ $statusDescription }}</p>
                    </div>

                    <hr class="my-4">

                    {{-- ===================== INFORMASI BOOKING ===================== --}}
                    @php
                    $booking = $trx->booking;
                    $alat = $booking->alat ?? null;
                    @endphp

                    <div class="booking-info">
                        <h5 class="fw-bold mb-3">Informasi Booking</h5>

                        <div class="row mb-2">
                            <div class="col-5 text-muted">Tanggal Sewa</div>
                            <div class="col-7 fw-semibold">
                                {{ \Carbon\Carbon::parse($booking->tanggal_sewa)->format('d M Y') }}
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-5 text-muted">Tanggal Kembali</div>
                            <div class="col-7 fw-semibold">
                                {{ \Carbon\Carbon::parse($booking->tanggal_kembali)->format('d M Y') }}
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-5 text-muted">Metode Pengambilan</div>
                            <div class="col-7 fw-semibold text-capitalize">
                                {{ $booking->metode_pengambilan }}
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-5 text-muted">Jumlah Unit</div>
                            <div class="col-7 fw-semibold">
                                {{ $booking->jumlah_unit }} unit
                            </div>
                        </div>
                    </div>

                    <hr class="my-4">

                    {{-- ===================== INFORMASI ALAT ===================== --}}
                    <div class="alat-info">
                        <h5 class="fw-bold mb-3">Informasi Alat</h5>

                        <div class="row mb-2">
                            <div class="col-5 text-muted">Nama Alat</div>
                            <div class="col-7 fw-semibold">{{ $alat->nama_alat ?? '-' }}</div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-5 text-muted">Harga Sewa / Hari</div>
                            <div class="col-7 fw-semibold">
                                Rp {{ number_format($alat->harga ?? 0, 0, ',', '.') }}
                            </div>
                        </div>
                    </div>

                    <hr class="my-4">

                    {{-- ===================== PEMBAYARAN ===================== --}}
                    <div class="payment-info">
                        <h5 class="fw-bold mb-3">Detail Pembayaran</h5>

                        <div class="row mb-2">
                            <div class="col-5 text-muted">Subtotal</div>
                            <div class="col-7 fw-semibold">
                                Rp {{ number_format($trx->sub_total, 0, ',', '.') }}
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-5 text-muted">Metode Pembayaran</div>
                            <div class="col-7 fw-semibold">
                                @if($trx->metode_pembayaran === 'cod')
                                Cash On Delivery (COD)
                                @elseif($trx->metode_pembayaran === 'bca')
                                Bank BCA
                                @elseif($trx->metode_pembayaran === 'mandiri')
                                Bank Mandiri
                                @elseif($trx->metode_pembayaran === 'bni')
                                Bank BNI
                                @elseif($trx->metode_pembayaran === 'qris')
                                QRIS
                                @endif
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-5 text-muted">Total Pembayaran</div>
                            <div class="col-7 fw-bold text-primary">
                                Rp {{ number_format($trx->sub_total, 0, ',', '.') }}
                            </div>
                        </div>
                    </div>

                    {{-- ===================== BUTTON UPLOAD PEMBAYARAN (dipindah ke bawah) ===================== --}}
                    @if ($status !== 'sukses' && $status !== 'gagal')
                    <div class="mt-4">
                        <a href="{{ route('user.transaksi.upload', $trx->id) }}" class="btn btn-primary w-100">
                            Upload Bukti Pembayaran
                        </a>
                    </div>
                    @endif

                </div>

            </div>
        </div>
    </div>
    @endforeach





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
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

</body>

</html>
