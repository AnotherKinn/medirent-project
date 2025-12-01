<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Booking - MediRent</title>
    <link rel="shortcut icon" href="{{ asset('css/asset/icn.jpg') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('css/asset/icn.jpg') }}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{ asset('css/asset/icn.jpg') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* --- Navbar Styles --- */
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
            margin-top: 120px;
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

        /* --- Table Styles --- */
        .booking-table-container {
            display: none;
        }

        .booking-table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        .booking-table th {
            background: linear-gradient(135deg, #4f46e5, #3b82f6);
            color: white;
            padding: 16px;
            text-align: left;
            font-weight: 600;
        }

        .booking-table td {
            padding: 16px;
            border-bottom: 1px solid #eee;
        }

        .booking-table tr:last-child td {
            border-bottom: none;
        }

        .booking-table tr:hover {
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

        /* --- Mobile Card Styles --- */
        .booking-card-container {
            display: block;
        }

        .booking-card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            transition: transform 0.2s ease;
        }

        .booking-card:hover {
            transform: translateY(-2px);
        }

        .booking-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 1px solid #eee;
        }

        .booking-id {
            font-weight: 600;
            color: #1a73e8;
            font-size: 16px;
        }

        .booking-details {
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

        .booking-summary {
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

        @media (min-width: 769px) {
            .booking-table-container {
                display: block;
            }

            .booking-card-container {
                display: none;
            }
        }

        @media (max-width: 768px) {
            .booking-details {
                grid-template-columns: 1fr;
            }

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
                margin-top: 140px;
            }
        }

    </style>

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

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
        <div class="page-title">Riwayat Booking</div>

        <!-- Filter & Search -->
        <form method="GET" action="{{ route('user.booking.index') }}"
            class="mb-4 d-flex flex-wrap gap-2 align-items-center">
            <input type="text" name="search" placeholder="Cari nama alat..." value="{{ request('search') }}"
                class="form-control w-auto">
            <select name="status" class="form-select w-auto">
                <option value="">Semua Status</option>
                <option value="menunggu" {{ request('status')=='menunggu'?'selected':'' }}>Menunggu</option>
                <option value="menunggu_verifikasi" {{ request('status')=='menunggu_verifikasi'?'selected':'' }}>
                    Menunggu Verifikasi</option>
                <option value="proses" {{ request('status')=='proses'?'selected':'' }}>Proses</option>
                <option value="selesai" {{ request('status')=='selesai'?'selected':'' }}>Selesai</option>
                <option value="dibatalkan" {{ request('status')=='dibatalkan'?'selected':'' }}>Dibatalkan</option>
            </select>
            <button type="submit" class="btn btn-primary">Filter</button>
        </form>

        <!-- Desktop Table -->
        <div class="booking-table-container">
            <table class="booking-table">
                <thead>
                    <tr>
                        <th>ID Booking</th>
                        <th>Alat Disewa</th>
                        <th>Tanggal Sewa</th>
                        <th>Tanggal Kembali</th>
                        <th>Metode</th>
                        <th>Durasi</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bookings as $booking)
                    <tr>
                        <td>{{ $booking->id }}</td>
                        <td>{{ $booking->alat->nama_alat }}</td>
                        <td>{{ \Carbon\Carbon::parse($booking->tanggal_sewa)->format('d M Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($booking->tanggal_kembali)->format('d M Y') }}</td>
                        <td>{{ ucfirst($booking->metode_pengambilan) }}</td>
                        <td>{{ max(1, \Carbon\Carbon::parse($booking->tanggal_sewa)->diffInDays(\Carbon\Carbon::parse($booking->tanggal_kembali))) }}
                            hari</td>
                        <td>
                            @php
                            $statusClass = [
                            'selesai'=>'status-selesai',
                            'barang_sampai'=>'status-selesai',
                            'disetujui'=>'status-selesai',
                            'proses'=>'status-proses',
                            'ditolak'=>'status-dibatalkan',
                            'menunggu'=>'status-proses',
                            'menunggu_verifikasi'=>'status-proses',
                            'sedang_diantarkan'=>'status-proses'
                            ][$booking->status] ?? 'status-proses';

                            $statusIcon = [
                            'selesai'=>'fa-check-circle',
                            'barang_sampai'=>'fa-check-circle',
                            'disetujui'=>'fa-check-circle',
                            'proses'=>'fa-clock',
                            'menunggu'=>'fa-clock',
                            'menunggu_verifikasi'=>'fa-clock',
                            'dibatalkan'=>'fa-times-circle',
                            'sedang_diantarkan'=>'fa-truck'
                            ][$booking->status] ?? 'fa-clock';

                            @endphp
                            <span class="status-badge {{ $statusClass }}"><i class="fa-solid {{ $statusIcon }}"></i>
                                {{ ucfirst(str_replace('_',' ',$booking->status)) }}</span>
                        </td>
                        <td>
                            {{-- Jika status masih bisa diedit --}}
                            @if(in_array($booking->status,['menunggu','menunggu_verifikasi']))
                            <a href="{{ route('user.booking.edit',$booking->id) }}" class="btn-table">Edit</a>

                            <form action="{{ route('user.booking.destroy', $booking->id) }}"
                                class="delete-form" style="display:inline;">
                                @csrf
                                @method('DELETE')

                                <button type="button" class="btn-table btn-delete">
                                    Hapus
                                </button>
                            </form>


                            {{-- Jika status sudah lanjut --}}
                            @else
                            <button type="button" class="btn-table" data-bs-toggle="modal"
                                data-bs-target="#detailModal{{ $booking->id }}">
                                Detail
                            </button>


                            @endif
                        </td>

                    </tr>

                    <!-- ===== MODAL DETAIL BOOKING ===== -->
                    <div class="modal fade" id="detailModal{{ $booking->id }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <h5 class="modal-title">Detail Booking</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <div class="modal-body">

                                    <p><strong>Nama Alat:</strong> {{ $booking->alat->nama_alat }}</p>
                                    <p><strong>Tanggal Sewa:</strong> {{ $booking->tanggal_sewa }}</p>
                                    <p><strong>Tanggal Kembali:</strong> {{ $booking->tanggal_kembali }}</p>
                                    <p><strong>Jumlah Unit:</strong> {{ $booking->jumlah_unit }} unit</p>
                                    <p><strong>Metode Pengambilan:</strong> {{ $booking->metode_pengambilan }}</p>
                                    <p><strong>Status:</strong> {{ $booking->status }}</p>

                                    <hr>

                                    {{-- ================== METODE DIANTAR ================== --}}
                                    @if($booking->metode_pengambilan == 'diantar')

                                    {{-- Barang sedang diantarkan --}}
                                    @if($booking->status == 'sedang_diantarkan')
                                    <form action="{{ route('booking.barangSampai', $booking->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="status" value="barang_sampai">

                                        <button class="btn btn-success w-100">
                                            ✔ Barang Sudah Sampai
                                        </button>
                                    </form>
                                    @endif

                                    {{-- Barang sudah sampai --}}
                                    @if($booking->status == 'barang_sampai')

                                    <div class="alert alert-info">
                                        Barang sudah sampai dan sedang kamu gunakan.<br>
                                        Petugas akan mengambil alat ini pada tanggal
                                        <strong>{{ $booking->tanggal_kembali }}</strong>.
                                    </div>

                                    <form action="{{ route('booking.selesaiCepat', $booking->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="status" value="selesai_cepat">

                                        <button class="btn btn-warning w-100 mt-2">
                                            ✔ Barang Sudah Selesai (Ingin dikembalikan sekarang)
                                        </button>
                                    </form>

                                    @endif

                                    @endif


                                    {{-- ================== METODE DIAMBIL ================== --}}
                                    @if($booking->metode_pengambilan == 'diambil')

                                    @if($booking->status == 'disetujui')
                                    <div class="alert alert-info">
                                        Silahkan ambil alat ini di klinik atau puskesmas terkait.
                                    </div>

                                    <a href="https://maps.app.goo.gl/64WeurYihi92bmba8" target="_blank"
                                        class="btn btn-success w-100 mt-2">
                                        Ke Lokasi Klinik
                                    </a>

                                    @endif

                                    @if($booking->status == 'barang_diambil')
                                    <div class="alert alert-warning">
                                        Jangan lupa mengembalikan alat sebelum tanggal kembali!
                                    </div>
                                    @endif

                                    @endif

                                </div>

                                <div class="modal-footer">
                                    <button class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                </div>

                            </div>
                        </div>
                    </div>

                    @endforeach

                </tbody>

            </table>
            <div class="mt-3">
                {{ $bookings->links() }}
            </div>
        </div>

        <!-- Mobile Card -->
        <div class="booking-card-container">
            @foreach($bookings as $booking)
            <div class="booking-card">
                <div class="booking-header">
                    <div class="booking-id">{{ $booking->id }}</div>
                    <div class="status-badge {{ $statusClass }}">
                        <i class="fa-solid {{ $statusIcon }}"></i> {{ ucfirst(str_replace('_',' ',$booking->status)) }}
                    </div>
                </div>
                <div class="booking-details">
                    <div class="detail-item">
                        <div class="detail-label">Alat Disewa</div>
                        <div class="detail-value">{{ $booking->alat->nama_alat }}</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">Tanggal Sewa</div>
                        <div class="detail-value">{{ \Carbon\Carbon::parse($booking->tanggal_sewa)->format('d M Y') }}
                        </div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">Tanggal Kembali</div>
                        <div class="detail-value">
                            {{ \Carbon\Carbon::parse($booking->tanggal_kembali)->format('d M Y') }}</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">Metode Pengambilan</div>
                        <div class="detail-value">{{ ucfirst($booking->metode_pengambilan) }}</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">Durasi Sewa</div>
                        <div class="detail-value">
                            {{ \Carbon\Carbon::parse($booking->tanggal_sewa)->diffInDays(\Carbon\Carbon::parse($booking->tanggal_kembali)) }}
                            hari</div>
                    </div>
                </div>
                <a href="{{ route('user.booking.edit',$booking->id) }}" class="btn-detail"
                    @if(!in_array($booking->status,['menunggu','menunggu_verifikasi']))
                    style="pointer-events:none;opacity:0.5;" @endif>Edit Booking</a>
            </div>
            @endforeach
        </div>

    </div>

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

    <script>
        document.querySelectorAll('.btn-delete').forEach(btn => {
            btn.addEventListener('click', function () {
                let form = this.closest('form');

                Swal.fire({
                    title: "Yakin ingin menghapus booking ini?",
                    text: "Data yang dihapus tidak bisa dipulihkan",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#6c757d",
                    confirmButtonText: "Ya, hapus",
                    cancelButtonText: "Batal"
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });

            });
        });

    </script>

</body>

</html>
