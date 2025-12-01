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
            margin: 0;
            background: #9db7e0;
            font-family: "Poppins", sans-serif;

            /* ANTI SCROLL KE SAMPING */
            overflow-x: hidden;
        }

        /* ======================
   NAVBAR (VERSI BARU)
====================== */
        header {
            display: flex;
            align-items: center;
            background: white;
            padding: 10px 20px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.08);
            box-sizing: border-box;
            width: 100%;
        }

        .logo {
            display: flex;
            align-items: center;
            font-size: 22px;
            font-weight: 600;
            color: #1a73e8;

            /* GANTI 520px → AUTO (TAMPILAN SAMA, TIDAK OVERFLOW) */
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
            /* Biar tidak melebar keluar */
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

        /* ======================
   PAGE TITLE AREA
====================== */
        .page-container {
            padding: 30px 40px;
            box-sizing: border-box;
            /* ANTI OVERFLOW */
        }

        .title-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            /* ANTI MELEBAR KE SAMPING */
        }

        .page-title {
            font-size: 22px;
            font-weight: 700;
            color: #004a80;
            margin-bottom: 20px;
        }

        /* FILTER AREA */
        .filters {
            display: flex;
            gap: 15px;
            align-items: center;
            flex-wrap: wrap;
            /* ANTI MELEBAR */
        }

        .filters select {
            padding: 8px 10px;
            border-radius: 6px;
            border: 1px solid #d0d7df;
            font-size: 14px;
            background: white;
        }

        /* ======================
   TABLE
====================== */
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            font-size: 15px;

            /* ANTI OVERFLOW */
            table-layout: fixed;
        }

        thead {
            background: #f5f7fa;
            font-weight: 600;
            color: #333;
        }

        thead th {
            padding: 14px;
            border-bottom: 2px solid #e2e6ea;
            text-align: left;
            word-wrap: break-word;
        }

        tbody td {
            padding: 14px;
            border-bottom: 1px solid #e7ebef;
            word-wrap: break-word;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        /* BOTTOM TOTAL */
        .total-row {
            font-size: 18px;
            font-weight: 700;
            color: #004a80;
            margin-top: 25px;
            text-align: right;
            padding-right: 10px;
            box-sizing: border-box;
        }

    </style>

    <div class="p-6">

        <!-- Title + Filter -->
        <div class="flex flex-col md:flex-row justify-between items-start mb-6">
            <h1 class="text-2xl font-bold text-blue-900 mb-4 md:mb-0">
                Rekap Transaksi MediRent
            </h1>

            <!-- FILTER FORM -->
            <form method="GET" class="flex flex-wrap gap-3">

                <!-- Cari User -->
                <input type="text" name="user" placeholder="Cari User…" value="{{ request('user') }}"
                    class="px-3 py-2 border rounded-lg" />

                <!-- Filter Alat -->
                <select name="nama_alat" class="px-3 py-2 border rounded-lg">
                    <option value="">Filter Alat</option>
                    @foreach ($listAlat as $alat)
                    <option value="{{ $alat->nama_alat }}"
                        {{ request('nama_alat') == $alat->nama_alat ? 'selected' : '' }}>
                        {{ $alat->nama_alat }}
                    </option>
                    @endforeach
                </select>

                <!-- Filter Status -->
                <select name="status" class="px-3 py-2 border rounded-lg">
                    <option value="">Status</option>
                    @foreach ($listStatus as $st)
                    <option value="{{ $st }}" {{ request('status') == $st ? 'selected' : '' }}>
                        {{ ucfirst($st) }}
                    </option>
                    @endforeach
                </select>

                <button class="px-4 py-2 bg-blue-600 text-white rounded-lg">
                    Filter
                </button>

            </form>
        </div>

        <!-- TABLE -->
        <div class="overflow-auto bg-white rounded-xl shadow p-4">
            <table class="min-w-full text-sm">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="p-3 text-left">ID Transaksi</th>
                        <th class="p-3 text-left">User</th>
                        <th class="p-3 text-left">Nama Alat</th>
                        <th class="p-3 text-left">Durasi</th>
                        <th class="p-3 text-left">Harga/Hari</th>
                        <th class="p-3 text-left">Tanggal</th>
                        <th class="p-3 text-left">Total Harga</th>
                        <th class="p-3 text-left">Status</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($transaksi as $row)
                    <tr class="border-b">
                        <td class="p-3">{{ $row->kode_transaksi }}</td>
                        <td class="p-3">{{ $row->user->nama }}</td>
                        <td class="p-3">{{ $row->alat->nama_alat }}</td>
                        <td class="p-3">{{ $row->durasi }} hari</td>
                        <td class="p-3">Rp {{ number_format($row->harga_per_hari) }}</td>
                        <td class="p-3">{{ $row->created_at->format('d/m/Y') }}</td>
                        <td class="p-3 font-semibold">Rp {{ number_format($row->total_harga) }}</td>
                        <td class="p-3">
                            <span class="px-2 py-1 rounded bg-blue-100 text-blue-700">
                                {{ ucfirst($row->status) }}
                            </span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="p-4 text-center text-gray-500">
                            Tidak ada data.
                        </td>
                    </tr>
                    @endforelse
                </tbody>

            </table>
        </div>

        <!-- Summary -->
        <div class="mt-6 text-right text-lg font-bold text-blue-900">
            Total Pendapatan:
            <span class="text-blue-700">
                Rp {{ number_format($transaksi->sum('total_harga')) }}
            </span>
        </div>

    </div>

</x-app-layout>
