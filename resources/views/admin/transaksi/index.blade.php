<x-app-layout>

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

        .cards {
            display: flex;
            gap: 22px;
            width: 93%;
            margin: 40px auto;
        }

        .card {
            flex: 1;
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.07);
        }

        .card h3 {
            font-size: 22px;
            margin-bottom: 12px;
        }

        .card h2 {
            font-size: 28px;
            margin-bottom: 4px;
        }

        .sub {
            font-size: 14px;
            color: #6f7b85;
        }

        .row {
            display: flex;
            width: 93%;
            gap: 22px;
            margin: 10px auto 50px auto;
        }

        .box {
            flex: 1;
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.07);
        }

        canvas {
            margin-top: 15px;
        }

        .legend {
            margin-top: 15px;
        }

        .legend-item {
            display: flex;
            align-items: center;
            margin-bottom: 6px;
        }

        .legend-color {
            width: 16px;
            height: 16px;
            border-radius: 4px;
            margin-right: 10px;
        }

        #barChart {
            max-width: 340px;
            max-height: 220px;
        }

        #pieChart {
            max-width: 180px;
            max-height: 180px;
            margin: auto;
            display: block;
        }

    </style>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #9db7e0;
        }

        .container-transaksi {
            width: 95%;
            margin: 30px auto;
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            padding: 25px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #fafafa;
            padding: 18px;
            text-align: left;
            font-weight: bold;
            border-bottom: 1px solid #eee;
        }

        td {
            padding: 18px;
            border-bottom: 1px solid #f0f0f0;
        }

        .status {
            padding: 8px 0;
            border-radius: 20px;
            font-size: 14px;
            font-weight: bold;
            color: white;
            display: inline-block;
            width: 180px;
            text-align: center;
        }

        .success {
            background: #4CAF50;
        }

        .pending {
            background: #2196F3;
        }

        .failed {
            background: #e53935;
        }

        .expired {
            background: #9e9e9e;
        }

        .btn-bukti {
            background: #1a73e8;
            color: white;
            padding: 10px 22px;
            border-radius: 8px;
            border: none;
            font-size: 14px;
            cursor: pointer;
        }

        .icon-img {
            width: 22px;
            height: 22px;
            cursor: pointer;
            margin-left: 12px;
        }

        .filter-row {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
        }

        .filter-row input,
        .filter-row select {
            padding: 10px 14px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }

        .btn-filter {
            background: #1a73e8;
            border: none;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            cursor: pointer;
        }

    </style>

    <div class="container-transaksi">

        <h2 class="fw-bold mb-4 text-primary" style="font-size: 22px;">📑 Kelola Transaksi</h2>

        <!-- ===========================
     FORM SEARCH, FILTER, EXPORT
=============================== -->
        <div class="filter-top"
            style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">

            <!-- FORM SEARCH & FILTER -->
            <form method="GET" class="filter-row" style="flex-wrap: wrap;">

                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama customer...">

                <select name="alat">
                    <option value="">Filter Alat</option>
                    @foreach ($alatList as $alat)
                    <option value="{{ $alat->nama_alat }}" {{ request('alat') == $alat->nama_alat ? 'selected' : '' }}>
                        {{ $alat->nama_alat }}
                    </option>
                    @endforeach
                </select>

                <select name="status">
                    <option value="">Status Transaksi</option>
                    @foreach ($statusList as $status)
                    <option value="{{ $status }}" {{ request('status') == $status ? 'selected' : '' }}>
                        {{ ucfirst($status) }}
                    </option>
                    @endforeach
                </select>

                <button class="btn-filter">Filter</button>
            </form>

            <!-- BUTTON EXPORT -->
            <a href="{{ route('admin.transaksi.export') }}" class="btn-export"
                style="background:#4CAF50; color:white; padding:10px 20px; border-radius:8px; text-decoration:none; font-weight:600;">
                Export Excel
            </a>
        </div>


        <!-- ===========================
             TABEL TRANSAKSI
        ============================ -->
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Transaksi</th>
                    <th>Tanggal</th>
                    <th>Customer</th>
                    <th>Total Harga</th>
                    <th>Status</th>
                    <th>Opsi</th>
                </tr>
            </thead>

            <tbody>

                @forelse ($transactions as $index => $trx)
                <tr>
                    <td>{{ $transactions->firstItem() + $index }}</td>

                    <td>{{ $trx->kode_transaksi }}</td>

                    <td>{{ $trx->created_at->format('d-m-Y') }}</td>

                    <td>{{ $trx->user->nama ?? '-' }}</td>

                    <td>Rp {{ number_format($trx->sub_total, 0, ',', '.') }}</td>

                    <td>
                        <span class="status
                                {{ $trx->status == 'sukses' ? 'success' : '' }}
                                {{ $trx->status == 'menunggu' ? 'pending' : '' }}
                                {{ $trx->status == 'gagal' ? 'failed' : '' }}
                            ">
                            {{ ucfirst($trx->status) }}
                        </span>
                    </td>

                    <td>
                        @if ($trx->bukti_pembayaran)
                        <button class="btn-bukti" data-bs-toggle="modal" data-bs-target="#modalBukti{{ $trx->id }}">
                            Bukti Pembayaran
                        </button>
                        @else
                        <span class="text-muted">Tidak ada bukti</span>
                        @endif



                        {{--  <a href="{{ route('admin.transaksi.edit', $trx->id) }}">
                        <img src="{{ asset('asset/Edit.png') }}" class="icon-img" alt="edit">
                        </a> --}}

                        <!-- <form action="{{ route('admin.transaksi.destroy', $trx->id) }}" method="POST"
                            style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button style="background:none;border:none;padding:0;">
                                <img src="{{ asset('asset/Trash 2.png') }}" class="icon-img" alt="delete">
                            </button>
                        </form> -->
                    </td>
                </tr>

                @if ($trx->bukti_pembayaran)
                <div class="modal fade" id="modalBukti{{ $trx->id }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h5 class="modal-title">Bukti Pembayaran - {{ $trx->kode_transaksi }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <div class="modal-body d-flex justify-content-center align-items-center">
                                <img src="{{ asset('bukti_pembayaran/' . $trx->bukti_pembayaran) }}"
                                    class="img-fluid rounded" style="max-height: 80vh; object-fit: contain;"
                                    alt="Bukti Pembayaran">
                            </div>


                        </div>
                    </div>
                </div>
                @endif
                @empty

                <tr>
                    <td colspan="7" class="text-center py-4">
                        Tidak ada data transaksi.
                    </td>
                </tr>

                @endforelse

            </tbody>
        </table>


        <div class="mt-3">
            {{ $transactions->links() }}
        </div>

    </div>
</x-app-layout>
