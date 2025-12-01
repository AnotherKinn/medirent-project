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

    @push('styles')
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .table-container {
            max-width: 1300px;
            background: white;
            margin: 40px auto;
            border-radius: 6px;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead th {
            background-color: #f8f9fb;
            padding: 16px 20px;
            font-weight: 600;
            border-bottom: 2px solid #e5e5e5;
        }

        tbody td {
            padding: 16px 20px;
            border-bottom: 1px solid #e5e5e5;
        }

        tbody tr:hover {
            background-color: #f9fbff;
        }

        .status {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .aktif {
            background-color: #e5f6e8;
            color: #2ecc71;
        }

        .nonaktif {
            background-color: #fbe6e7;
            color: #dc3545;
        }

        .actions button {
            background: none;
            border: none;
            cursor: pointer;
            padding: 6px;
            border-radius: 5px;
            transition: 0.2s;
            font-size: 16px;
        }

        .actions button:hover {
            background-color: #f0f2f5;
        }

        .delete-btn {
            color: #dc3545;
        }

    </style>
    @endpush

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>Nomor Telepon</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->nama }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        {{ $user->profile ? ($user->profile->alamat ?? '-') : '-' }}
                    </td>
                    <td>
                        {{ $user->profile ? ($user->profile->nomor_telepon ?? '-') : '-' }}
                    </td>


                    <td>
                        <span class="status {{ $user->is_online ? 'aktif' : 'nonaktif' }}">
                            {{ $user->is_online ? 'Aktif' : 'Nonaktif' }}
                        </span>
                    </td>

                    <td class="actions" style="display:flex; align-items:center; gap:10px;">

                        <!-- Tombol Lihat KTP -->
                        <button type="button" class="btn btn-sm btn-primary"
                            style="background-color: #1a73e8; transform: scale(0.8); width: 150px;"
                            data-bs-toggle="modal" data-bs-target="#modalKtp{{ $user->id }}">
                            Lihat KTP
                        </button>

                        <!-- Tombol Hapus -->
                        <form id="deleteForm-{{ $user->id }}" action="{{ route('admin.users.destroy', $user->id) }}"
                            method="POST" style="margin:0;">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="delete-btn btn-delete-user" data-id="{{ $user->id }}">
                                <i class="fas fa-trash"></i>
                            </button>


                        </form>

                    </td>


                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @foreach($users as $user)
    <div class="modal fade" id="modalKtp{{ $user->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Foto KTP - {{ $user->nama }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body text-center">

                    @if($user->profile && $user->profile->foto_ktp)
                    <img src="{{ asset('storage/' . $user->profile->foto_ktp) }}" alt="Foto KTP"
                        class="img-fluid rounded shadow">
                    @else
                    <p class="text-muted">Tidak ada foto KTP</p>
                    @endif

                </div>

            </div>
        </div>
    </div>
    @endforeach

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.querySelectorAll('.btn-delete-user').forEach(btn => {
            btn.addEventListener('click', function () {

                let userId = this.getAttribute('data-id');
                let form = document.getElementById('deleteForm-' + userId);

                Swal.fire({
                    title: "Hapus Pengguna?",
                    text: "Data pengguna akan dihapus permanen.",
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
