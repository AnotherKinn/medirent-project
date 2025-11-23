<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Alat - MediRent</title>
<link rel="icon" type="image/png" href="css/asset/icn.jpg">
<link rel="shortcut icon" href="css/asset/icn.jpg" type="image/x-icon">
<link rel="apple-touch-icon" href="css/asset/icn.jpg">
<!-- Google Font -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #9db7e0;
        margin: 0;
        padding: 0;
    }

    /* ----------------------- NAVBAR ----------------------- */
/* ----------------------- NAVBAR ----------------------- */
header {
    display: flex;
    align-items: center;
    background: white;
    padding: 10px 20px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.08);
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
    flex-wrap: wrap; /* Biar tidak melebar keluar */
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
    /* ---------------------- EDIT FORM ----------------------- */
    .edit-container {
        width: 60%;
        max-width: 380px;
        background: white;
        margin: 60px auto;
        padding: 40px 50px;
        border-radius: 30px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
    }

    .edit-container h2 {
        margin-bottom: 25px;
        font-size: 20px;
        font-weight: 600;
    }

    .form-row {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
    }

    .form-row label {
        width: 150px;
        font-size: 15px;
    }

    .form-row input {
        width: 230px;
        padding: 6px 10px;
        border: 1px solid #999;
        border-radius: 4px;
        font-size: 14px;
    }

    .status-title {
        margin-top: 35px;
        margin-bottom: 15px;
        font-size: 17px;
        font-weight: 600;
    }

    .radio-group {
        display: flex;
        flex-direction: column;
        gap: 12px;
        margin-bottom: 40px;
    }

    .radio-item {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .radio-label {
        font-size: 15px;
    }

    .radio-item input[type="radio"] {
        width: 18px;
        height: 18px;
        cursor: pointer;
    }

    .button-row {
        display: flex;
        justify-content: space-between;
        margin-top: 20px;
    }

    .btn {
        width: 45%;
        padding: 14px 0;
        border: none;
        border-radius: 18px;
        font-size: 16px;
        cursor: pointer;
        font-weight: 500;
    }

    .btn-cancel {
        background: #8B929A;
        color: white;
    }

    .btn-save {
        background: #0068B5;
        color: white;
    }
</style>

</head>
<body>

<!-- =========================== NAVBAR =========================== -->
<header>
    <div class="logo">
      <img src="css/asset/logo.jpg" alt="logo">
      MediRent
    </div>

    <nav>
      <a href="/admin.beranda_admin">Beranda</a>
        <a href="/admin.kelola_alat">Kelola Alat</a>
        <a href="/admin.kelola_transaksi">Kelola Transaksi</a>
        <a href="/admin.kelola_pengguna">Kelola Pengguna</a>
        <a href="/admin.profil_admin">Profil</a>
        <a href="/admin.laporan">Laporan</a>
    </nav>
</header>


<!-- =========================== FORM EDIT =========================== -->
<div class="edit-container">
    <h2>Edit</h2>

    <div class="form-row">
        <label>Nama Alat</label>
        <input type="text" value="Kursi Roda">
    </div>

    <div class="form-row">
        <label>Harga</label>
        <input type="text" value="Rp. 30.000">
    </div>

    <div class="form-row">
        <label>Stok</label>
        <input type="number" value="180">
    </div>

    <h3 class="status-title">Update Status</h3>

    <div class="radio-group">
        <label class="radio-item">
            <input type="radio" name="status" checked>
            <span class="radio-label">Tersedia</span>
        </label>

        <label class="radio-item">
            <input type="radio" name="status">
            <span class="radio-label">Tidak tersedia</span>
        </label>
    </div>

    <div class="button-row">
        <button class="btn btn-cancel">Batal</button>
        <button class="btn btn-save">Simpan</button>
    </div>
</div>



</body>
</html>
