<x-app-layout>

    <style>
        /* Background & Font */
        body {
            margin: 0;
            padding: 0;
            font-family: "Poppins", sans-serif;
            overflow-x: hidden;
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

        .add-button {
            background: #1a73e8;
            color: white;
            padding: 10px 20px;
            border-radius: 6px;
            font-weight: 600;
            font-size: 15px;
            text-decoration: none;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .add-button:hover {
            background: #1557b0;
            text-decoration: none;
        }

        /* Card Styles */
        .alat-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .alat-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .alat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
        }

        .alat-image {
            width: 100%;
            height: 180px;
            background: #f5f5f5;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .alat-image img {
            max-width: 90%;
            max-height: 90%;
            object-fit: contain;
        }

        .alat-content {
            padding: 16px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .alat-title {
            font-size: 18px;
            font-weight: 600;
            color: #1a73e8;
            margin-bottom: 8px;
        }

        .alat-description {
            font-size: 14px;
            color: #666;
            margin-bottom: 12px;
            flex-grow: 1;
        }

        .alat-status {
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

        .alat-price {
            font-size: 16px;
            font-weight: 700;
            color: #333;
            margin-bottom: 12px;
        }

        .alat-stock {
            font-size: 14px;
            color: #666;
            margin-bottom: 16px;
            font-weight: 500;
        }

        .action-buttons {
            display: flex;
            gap: 8px;
            margin-top: auto;
        }

        .btn-action {
            padding: 8px 12px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            text-align: center;
            text-decoration: none;
            border: none;
            flex: 1;
        }

        .btn-view {
            background: #007bff;
            color: white;
        }

        .btn-view:hover {
            background: #0056b3;
        }

        .btn-edit {
            background: #28a745;
            color: white;
        }

        .btn-edit:hover {
            background: #1e7e34;
        }

        .btn-delete {
            background: #dc3545;
            color: white;
        }

        .btn-delete:hover {
            background: #c82333;
        }

        .no-data {
            text-align: center;
            padding: 40px;
            color: #666;
            font-size: 18px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
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

        .add-button {
            background: #1a73e8;
            color: white;
            padding: 10px 20px;
            border-radius: 6px;
            font-weight: 600;
            font-size: 15px;
            text-decoration: none;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .add-button:hover {
            background: #1557b0;
            text-decoration: none;
        }

        /* Card Styles */
        .alat-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .alat-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .alat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
        }

        .alat-image {
            width: 100%;
            height: 180px;
            background: #f5f5f5;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .alat-image img {
            max-width: 90%;
            max-height: 90%;
            object-fit: contain;
        }

        .alat-content {
            padding: 16px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .alat-title {
            font-size: 18px;
            font-weight: 600;
            color: #1a73e8;
            margin-bottom: 8px;
        }

        .alat-description {
            font-size: 14px;
            color: #666;
            margin-bottom: 12px;
            flex-grow: 1;
        }

        .alat-status {
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

        .alat-price {
            font-size: 16px;
            font-weight: 700;
            color: #333;
            margin-bottom: 12px;
        }

        .alat-stock {
            font-size: 14px;
            color: #666;
            margin-bottom: 16px;
            font-weight: 500;
        }

        .action-buttons {
            display: flex;
            gap: 8px;
            margin-top: auto;
        }

        .btn-action {
            padding: 8px 12px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            text-align: center;
            text-decoration: none;
            border: none;
            flex: 1;
        }

        .btn-view {
            background: #007bff;
            color: white;
        }

        .btn-view:hover {
            background: #0056b3;
        }

        .btn-edit {
            background: #28a745;
            color: white;
        }

        .btn-edit:hover {
            background: #1e7e34;
        }

        .btn-delete {
            background: #dc3545;
            color: white;
        }

        .btn-delete:hover {
            background: #c82333;
        }

        .no-data {
            text-align: center;
            padding: 40px;
            color: #666;
            font-size: 18px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
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

            .alat-grid {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            }

            .action-buttons {
                flex-direction: column;
            }
        }

    </style>

    <div class="main-content">

        <div class="page-title">
            Kelola Data Alat
        </div>

        <a href="{{ route('admin.data-alat.create') }}" class="add-button">
            <i class="fa-solid fa-plus"></i> Tambah Alat
        </a>

        <div class="alat-grid">
            @forelse ($alat as $item)
            <div class="alat-card">
                <div class="alat-image">
                    @if ($item->foto)
                    <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama_alat }}">
                    @else
                    <i class="fa-solid fa-image" style="font-size: 48px; color: #ccc;"></i>
                    @endif
                </div>

                <div class="alat-content">
                    <h3 class="alat-title">{{ $item->nama_alat }}</h3>
                    <p class="alat-description">{{ Str::limit($item->deskripsi, 60) }}</p>

                    @if ($item->stok > 0)
                    <div class="alat-status status-available">
                        <i class="fa-solid fa-check status-icon"></i> Tersedia
                    </div>
                    @else
                    <div class="alat-status status-unavailable">
                        <i class="fa-solid fa-xmark status-icon"></i> Habis
                    </div>
                    @endif

                    <p class="alat-price">Rp {{ number_format($item->harga, 0, ',', '.') }}/hari</p>
                    <p class="alat-stock">Stok: {{ $item->stok }} unit</p>

                    <div class="action-buttons">
                        @if ($item->foto)
                        <button type="button" class="btn-action btn-view" data-bs-toggle="modal"
                            data-bs-target="#modalFoto{{ $item->id }}">
                            Lihat Foto
                        </button>
                        @endif

                        <a href="{{ route('admin.data-alat.edit', $item->id) }}" class="btn-action btn-edit">Edit</a>

                        <form action="{{ route('admin.data-alat.destroy', $item->id) }}" method="POST"
                            class="form-delete">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn-action btn-delete btn-confirm-delete">
                                Hapus
                            </button>
                        </form>

                    </div>
                </div>
            </div>

            {{-- Modal Foto --}}
            <div class="modal fade" id="modalFoto{{ $item->id }}" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Foto: {{ $item->nama_alat }}</h5>
                            <button class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body text-center">
                            <img src="{{ asset('storage/' . $item->foto) }}"
                                style="width:100%; max-height:400px; object-fit:contain;">
                        </div>
                    </div>
                </div>
            </div>

            @empty
            <div class="no-data">
                <p><i class="fa-solid fa-box-open" style="font-size:48px; color:#ccc;"></i></p>
                <p>Belum ada data alat tersedia.</p>
            </div>
            @endforelse
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
        document.querySelectorAll('.btn-confirm-delete').forEach(button => {
            button.addEventListener('click', function (e) {
                let form = this.closest('form');

                Swal.fire({
                    title: 'Hapus Alat?',
                    text: "Data alat akan dihapus secara permanen.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#dc3545',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });

    </script>

</x-app-layout>
