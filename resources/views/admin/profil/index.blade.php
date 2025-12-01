<x-app-layout>

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: "Poppins", sans-serif;
            background: #f0f4ff;
            overflow-x: hidden;
        }

        .profile-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin-top: 60px;
            background: #fff;
            max-width: 600px;
            padding: 40px;
            margin-inline: auto;
            border-radius: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.05);
        }

        .profile-pic img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #1a73e8;
        }

        h2 {
            margin-top: 20px;
            color: #222;
            font-size: 24px;
            font-weight: 600;
        }

        .input-group {
            margin-top: 20px;
            width: 100%;
        }

        .input-group input {
            width: 100%;
            padding: 12px 14px;
            border: 2px solid #d6dcec;
            border-radius: 10px;
            margin-bottom: 15px;
            font-size: 15px;
            background: #f7f9fc;
            color: #444;
        }

        .input-group input:disabled {
            background: #eef2ff;
            color: #555;
            font-weight: 500;
        }

        .btn-container {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 20px;
            width: 100%;
        }

        .btn-primary {
            background: linear-gradient(90deg, #1a73e8, #0056b3);
            color: #fff;
            border: none;
            padding: 12px 22px;
            border-radius: 10px;
            cursor: pointer;
            transition: 0.3s;
            font-size: 15px;
            font-weight: 600;
        }

        .btn-primary:hover {
            background: linear-gradient(90deg, #0056b3, #1a73e8);
        }

        .btn-logout {
            background: linear-gradient(90deg, #333, #666);
            color: #fff;
            border: none;
            padding: 12px 22px;
            border-radius: 10px;
            cursor: pointer;
            transition: 0.3s;
            font-size: 15px;
        }

        .btn-logout:hover {
            background: linear-gradient(90deg, #222, #555);
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

        .initial-avatar {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            background: #1a73e8;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 60px;
            font-weight: 700;
            border: 4px solid #e3f2fd;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

    </style>

    <!-- Profil Admin -->
    <section class="profile-container">

        <div class="profile-pic">
            @if ($user->foto)
            <img src="{{ asset('storage/' . $user->foto) }}" alt="Foto Profil">
            @else
            <div class="initial-avatar">
                {{ strtoupper(substr($user->nama, 0, 1)) }}
            </div>
            @endif
        </div>


        <h2>Profil Admin</h2>

        <div class="input-group">
            <label for="nama">Nama</label>
            <input type="text" id="nama" value="{{ $user->nama }}" disabled>

            <label for="email">Email</label>
            <input type="email" id="email" value="{{ $user->email }}" disabled>
            {{-- <input type="tel" value="{{ $user->nomor_telepon }}" disabled> --}}
        </div>

        <div class="btn-container">
            <a href="{{ route('admin.profil.edit') }}">
                <button class="btn-primary">Edit Profil</button>
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn-logout">Logout</button>
            </form>
        </div>

    </section>

</x-app-layout>
