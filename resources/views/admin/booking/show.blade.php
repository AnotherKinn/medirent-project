<x-app-layout>
    <style>
        body {
            font-family: "Poppins", sans-serif;
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

    <div class="max-w-5xl mx-auto p-6">

        <!-- Tombol Back -->
        <a href="{{ route('admin.booking.index') }}" class="text-blue-600 text-sm flex items-center mb-4">
            ← Kembali
        </a>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 bg-white p-6 rounded-2xl shadow-lg">

            {{-- FOTO ALAT --}}
            <div class="flex justify-center items-start">
                <img src="{{ asset('storage/' . $booking->alat->foto) }}"
                    class="rounded-xl shadow-md w-full max-w-sm object-cover" />
            </div>


            {{-- DETAIL BOOKING --}}
            <div>
                <h2 class="text-2xl font-bold text-gray-900 mb-2">
                    {{ $booking->alat->nama_alat }}
                </h2>

                <p class="text-gray-600 mb-4">
                    {{ $booking->alat->deskripsi }}
                </p>

                <div class="bg-gray-100 px-4 py-2 inline-block rounded-lg mb-4 text-green-700 font-semibold">
                    Rp. {{ number_format($booking->alat->harga, 0) }} / Hari
                </div>

                <div class="space-y-3">

                    <div>
                        <span class="text-gray-500 text-sm">Nama User</span>
                        <p class="font-semibold text-gray-900">{{ $booking->user->nama }}</p>
                    </div>

                    <div>
                        <span class="text-gray-500 text-sm">Tanggal Sewa</span>
                        <p class="font-semibold">{{ date('d M Y', strtotime($booking->tanggal_sewa)) }}</p>
                    </div>

                    <div>
                        <span class="text-gray-500 text-sm">Tanggal Kembali</span>
                        <p class="font-semibold">{{ date('d M Y', strtotime($booking->tanggal_kembali)) }}</p>
                    </div>

                    <div>
                        <span class="text-gray-500 text-sm">Jumlah Unit</span>
                        <p class="font-semibold">{{ $booking->jumlah_unit }} unit</p>
                    </div>

                    <div>
                        <span class="text-gray-500 text-sm">Metode Pengambilan</span>
                        <p class="font-semibold">
                            {{ ucfirst($booking->metode_pengambilan) }}
                        </p>
                    </div>

                    <div>
                        <span class="text-gray-500 text-sm">Total Harga</span>
                        <p class="text-xl font-bold text-blue-700">
                            Rp {{ number_format($booking->transaksi->sub_total, 0) }}
                        </p>
                    </div>

                    <div>
                        <span class="text-gray-500 text-sm">Status</span>
                        <p class="font-semibold">
                            <span class="px-3 py-1 rounded-lg
                                @if ($booking->status == 'menunggu_verifikasi') bg-yellow-100 text-yellow-700
                                @elseif($booking->status === 'sedang_diantarkan') bg-yellow-100 text-yellow-700
                                @elseif($booking->status === 'barang_diambil') bg-green-100 text-green-700
                                @elseif ($booking->status == 'disetujui') bg-green-100 text-green-700
                                @elseif ($booking->status == 'barang_sampai') bg-green-100 text-green-700
                                @elseif ($booking->status == 'selesai') bg-green-100 text-green-700
                                @else bg-red-100 text-red-700 @endif">
                                @if ($booking->status == 'menunggu_verifikasi')
                                Menunggu
                                @elseif ($booking->status == 'disetujui')
                                Disetujui
                                @elseif ($booking->status == 'ditolak')
                                Ditolak
                                @elseif ($booking->status == 'sedang_diantarkan')
                                Sedang dalam proses pengantaran
                                @elseif ($booking->status == 'barang_diambil')
                                Alat sudah diambil oleh {{ $booking->user->nama }} dengan ID Booking {{ $booking->id}}
                                @elseif ($booking->status == 'barang_sampai')
                                Alat sudah sampai
                                @elseif ($booking->status == 'selesai')
                                Selesai
                                @endif
                            </span>


                        </p>
                    </div>
                </div>

                {{-- BTN VERIFIKASI --}}
                @if ($booking->status == 'menunggu_verifikasi')
                <div class="mt-6 flex gap-3">

                    <form method="POST" action="{{ route('admin.booking.updateStatus', $booking->id) }}"
                        class="form-status">
                        @csrf
                        <input type="hidden" name="status" value="disetujui">
                        <button type="button"
                            class="px-5 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition btn-confirm"
                            data-message="Setujui booking ini?" data-title="Setujui Booking">
                            ✔ Setujui Booking
                        </button>
                    </form>



                    <form method="POST" action="{{ route('admin.booking.updateStatus', $booking->id) }}"
                        class="form-status">
                        @csrf
                        <input type="hidden" name="status" value="ditolak">
                        <button type="button"
                            class="px-5 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition btn-confirm"
                            data-message="Tolak booking ini?" data-title="Tolak Booking">
                            ✖ Tolak Booking
                        </button>
                    </form>



                </div>
                @endif

                @if ($booking->status == 'disetujui' && $booking->metode_pengambilan == 'diantar')
                <form method="POST" action="{{ route('admin.booking.antarBarang', $booking->id) }}" class="form-status">
                    @csrf
                    <button type="button"
                        class="mt-4 px-5 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 btn-confirm"
                        data-message="Yakin ingin mengantar barang ini?" data-title="Antar Barang">
                        🚚 Antar Barang
                    </button>
                </form>

                @endif


                {{-- Jika status disetujui dan metode pengambilan = diambil --}}
                @if ($booking->status == 'disetujui' && $booking->metode_pengambilan == 'diambil')

                <!-- Tombol -->
                <form method="POST" action="{{ route('admin.booking.diambil', $booking->id) }}"
                    class="form-status mt-5">
                    @csrf
                    <button type="button"
                        class="px-5 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition btn-confirm"
                        data-message="Apakah barang sudah diambil oleh user?" data-title="Barang Diambil">
                        ✔ Apakah barang sudah diambil?
                    </button>
                </form>


                <!-- Modal -->
                {{-- <div class="modal fade" id="modalDiambil" tabindex="-1" aria-labelledby="modalDiambilLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h5 class="modal-title" id="modalDiambilLabel">Konfirmasi Pengambilan Barang</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <div class="modal-body">
                                Apakah Anda yakin bahwa barang sudah diambil oleh user?
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Belum</button>

                                <form method="POST" action="{{ route('admin.booking.diambil', $booking->id) }}">
                @csrf
                <button type="submit" class="btn btn-primary">
                    Iya, Barang Sudah Diambil
                </button>
                </form>
            </div>

        </div>
    </div>
    </div> --}}

    @endif

    {{-- Jika barang sudah diambil dan metode = diambil, tampilkan tombol untuk menyelesaikan booking --}}
    @if ($booking->status == 'barang_diambil' && $booking->metode_pengambilan == 'diambil')

    <form method="POST" action="{{ route('admin.booking.selesai', $booking->id) }}" class="form-status mt-5">
        @csrf
        <button type="button"
            class="px-5 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition btn-confirm"
            data-message="Apakah alat sudah dikembalikan dan booking ingin diselesaikan?"
            data-title="Selesaikan Booking">
            ✔ Selesaikan Booking
        </button>
    </form>


    <!-- Modal -->
    {{-- <div class="modal fade" id="modalSelesaikan" tabindex="-1" aria-labelledby="modalSelesaikanLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h5 class="modal-title" id="modalSelesaikanLabel">Konfirmasi Penyelesaian Booking</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <div class="modal-body">
                                Apakah alat sudah dikembalikan oleh user dan booking dapat diselesaikan?
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Belum</button>

                                <form method="POST" action="{{ route('admin.booking.selesai', $booking->id) }}">
    @csrf
    <button type="submit" class="btn btn-success">
        Ya, Selesaikan Booking
    </button>
    </form>
    </div>

    </div>
    </div>
    </div> --}}

    @endif



    </div>
    </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        document.querySelectorAll('.btn-confirm').forEach(btn => {
            btn.addEventListener('click', function () {

                let form = this.closest('form');
                let title = this.dataset.title;
                let msg = this.dataset.message;

                Swal.fire({
                    title: title,
                    text: msg,
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Ya",
                    cancelButtonText: "Batal",
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });

            });
        });

    </script>

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
</x-app-layout>
