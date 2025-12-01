<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Profil - MediRent</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


    <style>
        .form-input,
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            font-family: "Poppins", sans-serif;
            margin-bottom: 15px;
            transition: border-color 0.2s;
        }

        .form-input:focus,
        textarea:focus,
        input[type="file"]:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 0 2px rgba(0, 123, 255, 0.25);
        }

        .profile-pic {
            text-align: center;
            margin-bottom: 20px;
            position: relative;
        }

        .profile-pic img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #e3f2fd;
        }

        .edit-icon {
            position: absolute;
            bottom: 0;
            right: 50%;
            transform: translateX(50%);
            cursor: pointer;
            font-size: 20px;
            background: #fff;
            border-radius: 50%;
            padding: 5px 8px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
        }

        .btn-action {
            flex: 1;
            min-width: 170px;
            padding: 10px 0;
            /* Tinggi tombol sama */
            font-size: 16px;
            font-weight: 600;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.2s;
            text-align: center;
            border: none;
        }

        .btn-action.btn-cancel {
            background: #777;
            color: white;
        }

        .btn-action:not(.btn-cancel) {
            background: #1a73e8;
            color: white;
            height: 45px;

        }

        .btn-action:hover {
            opacity: 0.9;
        }

    </style>

    <style>
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

        nav a:hover,
        nav a.active {
            color: #1a73e8;
            font-weight: 600;
        }

        .main-content {
            margin-top: 120px;
            padding: 20px;
        }

    </style>

</head>

<body class="bg-light">

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
            <a href="{{ route('user.transaksi.index')}}">Transaksi</a>
            <a href="{{ route('user.profile.index')}}" class="active">Profil</a>
            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" style="
                    background:#e63946;
                    color:white;
                    border:none;
                    padding:8px 14px;
                    border-radius:6px;
                    cursor:pointer;
                    font-weight:600;
                    font-size:14px;
                ">
                    Logout
                </button>
            </form>
        </nav>
    </header>


    <div class="container py-4">

        <h3 class="fw-bold mb-4">Edit Profil</h3>

        <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')


            <!-- ================== FOTO PROFIL ================== -->
            <div class="text-center mb-4">

                @php
                $initial = strtoupper(substr($user->nama, 0, 1));
                $fotoProfil = $profile?->foto_profil ? asset('storage/' . $profile->foto_profil) : null;
                @endphp

                <div style="position: relative; display: inline-block;">

                    @if ($fotoProfil)
                    <!-- FOTO PROFIL JIKA ADA -->
                    <img id="fotoPreview" src="{{ $fotoProfil }}" alt="Foto Profil" class="rounded-circle" width="140"
                        height="140" style="object-fit: cover; border: 2px solid #ddd;">
                    @else
                    <!-- DEFAULT AVATAR WITH INITIAL -->
                    <div id="fotoPreview" class="rounded-circle d-flex justify-content-center align-items-center" style="
                width: 140px;
                height: 140px;
                background: #1a73e8;
                color: white;
                font-size: 48px;
                font-weight: bold;
                border: 2px solid #ddd;
             ">
                        {{ $initial }}
                    </div>
                    @endif

                    <!-- Icon Edit Foto -->
                    <div class="edit-icon" onclick="document.getElementById('fotoProfilInput').click()" style="
        position: absolute;
        bottom: 10px;
        right: 10px;
        background: #00000090;
        border: none;
        border-radius: 50%;
        padding: 8px;
        cursor: pointer;
        color: white;
        font-size: 18px;
     ">
                        <i class="fa-solid fa-camera-rotate"></i>
                    </div>

                </div>

                <!-- Input file hidden -->
                <input type="file" id="fotoProfilInput" name="foto_profil" accept="image/*" style="display:none;">

            </div>

            <!-- ================== FORM DATA ================== -->
            <div class="card shadow-sm p-4">

                <div class="mb-3">
                    <label class="form-label fw-semibold">Nama</label>
                    <input type="text" name="nama" class="form-control" value="{{ $user->nama }}">

                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                </div>


                <div class="mb-3">
                    <label class="form-label fw-semibold">No Telepon</label>
                    <input type="text" name="nomor_telepon" class="form-control"
                        value="{{ $profile->nomor_telepon ?? '' }}">

                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Alamat</label>
                    <textarea name="alamat" class="form-control" rows="3">{{ $profile->alamat ?? '' }}</textarea>

                </div>


                <!-- ================== UPLOAD KTP ================== -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Upload Foto KTP</label>

                    @if (optional(Auth::user()->profile)->foto_ktp)
                    <p class="text-success mb-2">✔ Sudah mengupload KTP</p>
                    @else
                    <p class="text-danger mb-2">✘ Belum mengupload KTP</p>
                    @endif


                    <input type="file" name="foto_ktp" accept="image/*" class="form-control">
                </div>


            </div>

            <div class="text-end mt-4">
                <button type="submit" class="btn btn-primary px-4">Simpan Perubahan</button>
            </div>

        </form>
    </div>

    <!-- FOTO PREVIEW SCRIPT -->
    <script>
        document.getElementById('fotoProfilInput').addEventListener('change', function (e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (event) {
                    document.getElementById('fotoPreview').src = event.target.result;
                };
                reader.readAsDataURL(file);
            }
        });

    </script>

</body>

</html>
