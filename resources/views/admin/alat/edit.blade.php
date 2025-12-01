<x-app-layout>

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: "Poppins", sans-serif;
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
        .min-h-screen {
            background: #9db7e0 !important;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: "Poppins", sans-serif;
            overflow-x: hidden;
        }

        /* Override background Jetstream */
        .min-h-screen {
            background: #9db7e0 !important;
        }

        /* Override background <main> supaya tidak putih */
        main {
            background: #9db7e0 !important;
            min-height: 100vh;
            padding-bottom: 40px;
        }

    </style>


    <div style="max-width: 600px; background:white; margin: 60px auto; padding: 30px;
        border-radius: 4px; box-shadow: 0 1px 4px rgba(0,0,0,0.1);">

        <h2 style="margin-bottom:20px; font-weight:600; color:#333;">Edit Alat</h2>

        <form action="{{ route('admin.data-alat.update', $alat->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <label>Nama Alat</label>
            <input type="text" name="nama_alat" value="{{ $alat->nama_alat }}" required
                style="width:100%; padding:10px; margin-bottom:15px; border-radius:6px; border:1px solid #ccc;">

            <label>Deskripsi</label>
            <textarea name="deskripsi" required
                style="width:100%; padding:10px; margin-bottom:15px; border-radius:6px; border:1px solid #ccc;">{{ $alat->deskripsi }}</textarea>

            <label>Harga Sewa (Rp)</label>
            <input type="number" name="harga" value="{{ $alat->harga }}" required
                style="width:100%; padding:10px; margin-bottom:15px; border-radius:6px; border:1px solid #ccc;">

            <label>Stok</label>
            <input type="number" name="stok" value="{{ $alat->stok }}" required
                style="width:100%; padding:10px; margin-bottom:15px; border-radius:6px; border:1px solid #ccc;">

            <label>Foto Saat Ini</label><br>
            @if ($alat->foto)
            <img src="{{ asset('storage/' . $alat->foto) }}" width="120" style="margin-bottom:15px; border-radius:6px;">
            @else
            <p>Tidak ada foto</p>
            @endif

            <input type="file" name="foto"
                style="width:100%; padding:10px; margin-bottom:20px; border-radius:6px; border:1px solid #ccc;">

            <button type="submit" style="width:100%; background:#1a73e8; padding:12px; border:none;
                    color:white; font-size:16px; font-weight:600; border-radius:6px;">
                Update
            </button>
        </form>
    </div>
</x-app-layout>
