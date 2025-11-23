<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Kelola Transaksi</title>
<link rel="icon" type="image/png" href="css/asset/icn.jpg">
<link rel="shortcut icon" href="css/asset/icn.jpg" type="image/x-icon">
<link rel="apple-touch-icon" href="css/asset/icn.jpg">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

<style>
 body {
    font-family: 'Poppins', sans-serif;
    background-color: #9db7e0;
    margin: 0;
    padding: 0;
}

/* ===============================
   NAVBAR — VERSI STABIL & RAPI
================================*/
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

/* ===============================
   CARD
================================*/
.container {
    display: flex;
    justify-content: center;
    margin-top: 60px;
    padding: 0 20px 80px;
}

.card {
    width: 100%;
    max-width: 600px;
    background: #ffffff;
    border-radius: 35px;
    padding: 45px 55px;
    box-shadow: 0 5px 18px rgba(0,0,0,0.05);
}

.card h2 {
    font-size: 22px;
    margin-bottom: 25px;
    font-weight: 700;
}

/* GRID DETAIL */
.detail-wrapper {
    display: grid;
    grid-template-columns: 160px auto;
    row-gap: 12px;
    font-size: 16px;
}

.detail-label {
    font-weight: 600;
}

/* ===============================
   RADIO STATUS
================================*/
.status-title {
    margin-top: 35px;
    margin-bottom: 15px;
    font-weight: 700;
    font-size: 17px;
}

.radio-group {
    display: flex;
    flex-direction: column;
    gap: 15px;
    font-size: 16px;
}

.radio-item {
    display: flex;
    align-items: center;
    gap: 12px;
}

.radio-group input[type="radio"] {
    width: 20px;
    height: 20px;
    accent-color: #0091ff;
    cursor: pointer;
}

/* ===============================
   BUTTON
================================*/
.btn {
    margin-top: 35px;
    background-color: #1a73e8;
    padding: 14px 0;
    width: 180px;
    color: #fff;
    font-size: 16px;
    border-radius: 18px;
    border: none;
    cursor: pointer;
    transition: 0.2s;
    font-weight: 500;
}

.btn:hover {
    background-color: #135fc4;
}

.container {
    width: 90%;
    margin: 60px auto;
    background: white;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    padding: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
}

td {
    padding: 18px;
    border-bottom: 1px solid #f0f0f0;
}

.status {
    padding: 8px 0;
    border-radius: 20px;
    font-size: 14px;
    font-weight: bold;
    color: white;
    display: inline-block;
    text-align: center;
    width: 170px;
}

.selesai { background: #4CAF50; }
.menunggu { background: #2196F3; }
.diproses { background: #FF9800; }

.btn-bukti {
    background: #1a73e8;
    color: white;
    padding: 10px 22px;
    border-radius: 8px;
    border: none;
    font-size: 14px;
    cursor: pointer;
    text-decoration: none;
    display: inline-block;
}
</style>

</head>
<body>

<header>
    <div class="logo">
        <img src="css/asset/logo.jpg" alt="logo">
        MediRent
    </div>

    <nav>
    <a href="beranda_admin.html">Beranda</a>
        <a href="kelola_alat.html">Kelola Alat</a>
        <a href="kelola_transaksi.html">Kelola Transaksi</a>
        <a href="kelola_pengguna.html">Kelola Pengguna</a>
        <a href="profil_admin.html">Profil</a>
        <a href="laporan.html">Laporan</a>
    </nav>
</header>

<div class="container">
    <div class="card">
        <h2>Kelola Transaksi</h2>

        <div class="detail-wrapper">
            <div class="detail-label">No Pesanan</div><div>Kinanatan</div>
            <div class="detail-label">Tanggal</div><div>MD-1025-4589</div>
            <div class="detail-label">Customer</div><div>Rp. 150.000</div>
            <div class="detail-label">Total Harga</div><div>Diambil sendiri (Pickup)</div>
        </div>

        <div class="status-title">Update Status</div>

        <div class="radio-group">
            <label class="radio-item">
                <input type="radio" name="status"> Selesai
            </label>

            <label class="radio-item">
                <input type="radio" name="status"> Menunggu pembayaran
            </label>

            <label class="radio-item">
                <input type="radio" name="status"> Diproses
            </label>
        </div>

        <button class="btn">Konfirmasi</button>
    </div>
</div>
</body>
</html>
