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
            background: #9db7e0;
            font-family: "Poppins", sans-serif;
            overflow-x: hidden;
        }

        table {
            table-layout: fixed;
        }

    </style>

    <div class="p-6">

        <!-- Title + Filter -->
        <div class="flex flex-col md:flex-row justify-between items-start mb-6">
            <h1 class="text-2xl font-bold text-blue-900 mb-4 md:mb-0">
                Manajemen Booking MediRent
            </h1>

            <!-- FILTER FORM -->
            <form method="GET" class="flex flex-wrap gap-3">

                <!-- Cari User -->
                <input type="text" name="user" placeholder="Cari Nama User…" value="{{ request('user') }}"
                    class="px-3 py-2 border rounded-lg" />

                <!-- Filter Alat -->
                <select name="alat" class="px-3 py-2 border rounded-lg">
                    <option value="">Filter Alat</option>
                    @foreach ($listAlat as $alat)
                    <option value="{{ $alat->id }}" {{ request('alat') == $alat->id ? 'selected' : '' }}>
                        {{ $alat->nama_alat }}
                    </option>
                    @endforeach
                </select>

                <!-- Filter Status -->
                <select name="status" class="px-3 py-2 border rounded-lg">
                    <option value="">Status</option>
                    @foreach ($listStatus as $st)
                    <option value="{{ $st }}" {{ request('status') == $st ? 'selected' : '' }}>
                        {{ ucwords(str_replace('_', ' ', $st)) }}
                    </option>
                    @endforeach
                </select>

                <button class="px-4 py-2 bg-blue-600 text-white rounded-lg">Filter</button>
            </form>
        </div>

        <!-- TABLE -->
        <div class="overflow-auto bg-white rounded-xl shadow p-4">
            <table class="min-w-full text-sm">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="p-3">ID Booking</th>
                        <th class="p-3">User</th>
                        <th class="p-3">Nama Alat</th>
                        <th class="p-3">Tanggal Sewa</th>
                        <th class="p-3">Tanggal Kembali</th>
                        <th class="p-3">Jumlah</th>
                        <th class="p-3">Total Harga</th>
                        <th class="p-3">Status</th>
                        <th class="p-3 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($bookings as $row)
                    <tr class="border-b">
                        <td class="p-3">{{ $row->id }}</td>
                        <td class="p-3">{{ $row->user->nama }}</td>
                        <td class="p-3">{{ $row->alat->nama_alat }}</td>

                        <td class="p-3">{{ date('d/m/Y', strtotime($row->tanggal_sewa)) }}</td>
                        <td class="p-3">{{ date('d/m/Y', strtotime($row->tanggal_kembali)) }}</td>

                        <td class="p-3">{{ $row->jumlah_unit }} unit</td>

                        <td class="p-3 font-semibold">Rp
                            {{ number_format($row->transaksi->sub_total, 0) }}</td>

                        <td class="p-3">
                            <span class="px-2 py-1 rounded
                                        @if ($row->status == 'menunggu_verifikasi') bg-yellow-100 text-yellow-700
                                        @elseif ($row->status == 'disetujui') bg-green-100 text-green-700
                                        @elseif ($row->status == 'barang_sampai') bg-green-100 text-green-700
                                        @elseif ($row->status == 'barang_diambil') bg-green-100 text-green-700
                                        @elseif ($row->status == 'sedang_diantarkan') bg-yellow-100 text-yellow-700
                                        @elseif ($row->status == 'selesai') bg-green-100 text-green-700
                                        @else bg-red-100 text-red-700 @endif">
                                @if($row->status === 'menunggu_verifikasi')
                                Menunggu Verifikasi
                                @elseif($row->status === 'disetujui')
                                Disetujui
                                @elseif($row->status === 'sedang_diantarkan')
                                Sedang dalam proses pengantaran
                                @elseif($row->status === 'barang_sampai')
                                Alat sudah sampai
                                @elseif($row->status === 'barang_diambil')
                                Alat sudah diambil
                                @elseif($row->status === 'ditolak')
                                Ditolak
                                @elseif($row->status === 'selesai')
                                Selesai
                                @endif
                            </span>
                        </td>

                        <td class="p-3 text-center">
                            <div class="flex gap-2 justify-center">

                                <!-- Detail -->
                                <a href="{{ route('admin.booking.show', $row->id) }}"
                                    class="px-3 py-1 bg-blue-500 text-white rounded text-xs">
                                    Detail
                                </a>

                                <!-- Verifikasi -->
                                {{--  @if ($row->status == 'menunggu_verifikasi')
                                <!-- Setujui -->
                                <form method="POST" action="{{ route('admin.booking.updateStatus', $row->id) }}">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="status" value="disetujui">
                                <button class="px-3 py-1 bg-green-600 text-white rounded text-xs">
                                    Setujui
                                </button>
                                </form>

                                <!-- Tolak -->
                                <form method="POST" action="{{ route('admin.booking.updateStatus', $row->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="status" value="ditolak">
                                    <button class="px-3 py-1 bg-red-600 text-white rounded text-xs">
                                        Tolak
                                    </button>
                                </form>
                                @endif --}}


                                @if($row->status !== 'menunggu_verifikasi')
                                <!-- Hapus -->
                                <form method="POST" action="{{ route('admin.booking.destroy', $row->id) }}"
                                    class="delete-booking-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button"
                                        class="px-3 py-1 bg-red-600 text-white rounded text-xs btn-delete-booking">
                                        Hapus
                                    </button>
                                </form>

                                @endif

                            </div>
                        </td>

                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="p-4 text-center text-gray-500">Tidak ada data.</td>
                    </tr>
                    @endforelse
                </tbody>

            </table>
        </div>

    </div>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if(session('success'))
    <script>
        Swal.fire({
            icon: "success",
            title: "Berhasil",
            text: "{{ session('success') }}",
            timer: 1500,
            showConfirmButton: false
        });

    </script>
    @endif

    <script>
    document.querySelectorAll('.btn-delete-booking').forEach(button => {
        button.addEventListener('click', function () {

            let form = this.closest('form');

            Swal.fire({
                title: "Hapus Booking?",
                text: "Data booking akan dihapus secara permanen.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Ya, hapus",
                cancelButtonText: "Batal",
                confirmButtonColor: "#d33",
                cancelButtonColor: "#6c757d"
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });

        });
    });
</script>


</x-app-layout>
