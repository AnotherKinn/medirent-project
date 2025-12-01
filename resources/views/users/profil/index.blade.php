<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil User - MediRent</title>
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

        .profile-container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        .profile-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .profile-title {
            font-size: 24px;
            font-weight: 700;
            color: #1a73e8;
            margin-bottom: 10px;
        }

        .profile-avatar {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #e3f2fd;
            margin: 0 auto 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .profile-form {
            display: grid;
            gap: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            font-weight: 600;
            margin-bottom: 8px;
            color: #333;
        }

        .form-input {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            font-family: "Poppins", sans-serif;
            transition: border-color 0.2s;
        }

        .form-input:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 0 2px rgba(0, 123, 255, 0.25);
        }

        .button-group {
            display: flex;
            gap: 15px;
            justify-content: center;
            margin-top: 30px;
        }

        .btn-primary {
            background: #1a73e8;
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            flex: 1;
            min-width: 120px;
            text-align: center;
        }

        .btn-primary:hover {
            background: #1557b0;
        }

        .btn-secondary {
            background: #6c757d;
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            flex: 1;
            min-width: 120px;
            text-align: center;
        }

        .btn-secondary:hover {
            background: #5a6268;
        }

        .edit-profile-text {
            font-size: 14px;
            color: #666;
            margin-top: 10px;
            text-align: center;
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

            .profile-container {
                padding: 20px;
            }

            .profile-avatar {
                width: 120px;
                height: 120px;
            }

            .button-group {
                flex-direction: column;
            }
        }

    </style>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
            <a href="{{ route('user.transaksi.index')}}">Transaksi</a>
            <a href="{{ route('user.profile.index')}}" class="active">Profil</a>
        </nav>
    </header>

    <!-- Main Content -->
    <div class="main-content">
        <a href="#" class="back-link">
            <i class="fa-solid fa-arrow-left"></i> Kembali
        </a>

        <div class="page-title">
            Profil User
        </div>

        <div class="profile-container">
            <div class="profile-header">
                @php
                // Ambil inisial dari nama user
                $initial = strtoupper(substr($user->nama, 0, 2));

                // Tentukan URL foto profil
                $avatarUrl = ($profile && $profile->foto_profil)
                ? asset('storage/' . $profile->foto_profil)
                : "https://placehold.co/150x150/1a73e8/ffffff?text=$initial";
                @endphp

                <img src="{{ $avatarUrl }}" alt="Profile Picture" class="profile-avatar">



                <h2 class="profile-title">Profil User</h2>
            </div>

            <form class="profile-form">
                <div class="form-group">
                    <label for="name" class="form-label">Nama Lengkap</label>
                    <input type="text" id="name" class="form-input" value="{{ $user->nama }}" readonly>
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" class="form-input" value="{{ $user->email }}" readonly>
                </div>

                <div class="form-group">
                    <label for="phone" class="form-label">Nomor Telepon</label>
                    <input type="tel" id="phone" class="form-input" value="{{ $profile->nomor_telepon ?? '-' }}"
                        readonly>
                </div>

                <div class="form-group">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" id="alamat" class="form-input" value="{{ $profile->alamat ?? '-' }}" readonly>
                </div>

                <div class="form-group">
                    <label class="form-label">Status Foto KTP</label>

                    @if($profile && $profile->foto_ktp)
                    <div style="
            padding: 10px 14px;
            background: #e8f5e9;
            border: 1px solid #a5d6a7;
            border-radius: 8px;
            color: #2e7d32;
            font-weight: 600;
            display:flex;
            align-items:center;
            gap:10px;
        ">
                        <i class="fa-solid fa-circle-check"></i>
                        Sudah upload
                    </div>
                    @else
                    <div style="
            padding: 10px 14px;
            background: #ffebee;
            border: 1px solid #ef9a9a;
            border-radius: 8px;
            color: #c62828;
            font-weight: 600;
            display:flex;
            align-items:center;
            gap:10px;
        ">
                        <i class="fa-solid fa-circle-xmark"></i>
                        Belum upload foto KTP
                    </div>
                    @endif
                </div>

            </form>


            <div class="button-group">
                <a href="{{ route('user.profile.edit') }}" class="btn-primary" style="text-decoration:none;">
                    Edit Profil
                </a>

                <form action="{{ route('logout') }}" method="POST" style="flex:1;">
                    @csrf
                    <button type="button" class="btn bg-danger text-white btn-logout"
                        style="height: 50px;">Logout</button>

                </form>
            </div>


            <p class="edit-profile-text">Klik "Edit Profil" untuk mengubah informasi profil Anda.</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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
        document.querySelector('.btn-logout').addEventListener('click', function () {
            let form = this.closest('form');

            Swal.fire({
                title: "Yakin ingin logout?",
                text: "Kamu akan keluar dari akun.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#6c757d",
                confirmButtonText: "Ya, logout",
                cancelButtonText: "Batal"
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });

    </script>

</body>

</html>

</body>

</html>
