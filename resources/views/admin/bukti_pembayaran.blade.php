<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Bukti Pembayaran</title>
<link rel="icon" type="image/png" href="css/asset/icn.jpg">
<link rel="shortcut icon" href="css/asset/icn.jpg" type="image/x-icon">
<link rel="apple-touch-icon" href="css/asset/icn.jpg">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

<style>
    body {
    font-family: 'Poppins', sans-serif;
    background-color: #eef4fa;
    margin: 0;
    padding: 0;

    /* Anti scroll samping */
    overflow-x: hidden;
}

/* ============================
   NAVBAR (DISAMAKAN 100%)
============================ */
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

/* ============================
   CARD
============================ */
.container {
    display: flex;
    justify-content: center;
    margin-top: 50px;
    padding-bottom: 80px;

    /* Anti overflow */
    width: 100%;
    box-sizing: border-box;
}

.card {
    width: 680px;
    background: #ffffff;
    border-radius: 35px;
    padding: 40px 55px 50px 55px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.05);

    /* Anti overflow */
    box-sizing: border-box;
    max-width: 100%;
}

.card h2 {
    text-align: center;
    font-size: 22px;
    font-weight: 700;
    margin-bottom: 30px;
}

.section-title {
    font-weight: 700;
    margin-top: 10px;
    margin-bottom: 10px;
}

.grid {
    display: grid;
    grid-template-columns: 180px auto;
    row-gap: 12px;
    font-size: 16px;

    /* Anti overflow */
    width: 100%;
    box-sizing: border-box;
}

.label {
    font-weight: 600;
}

.btn {
    margin-top: 30px;
    background-color: #0e78d5;
    color: white;
    border: none;
    width: 200px;
    font-size: 17px;
    padding: 13px 0;
    border-radius: 18px;
    display: block;
    margin-left: auto;
    margin-right: auto;
    cursor: pointer;
}

.btn:hover {
    background-color: #0c66b5;
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
       <a href="/admin.beranda_admin">Beranda</a>
        <a href="/admin.kelola_alat">Kelola Alat</a>
        <a href="/admin.kelola_transaksi">Kelola Transaksi</a>
        <a href="/admin.kelola_pengguna">Kelola Pengguna</a>
        <a href="/admin.profil_admin">Profil</a>
        <a href="/admin.laporan">Laporan</a>
    </nav>
</header>

<div class="container">
    <div class="card">
        <h2>Bukti Pembayaran</h2>

        <!-- RINCIAN PESANAN -->
        <div class="section-title">Rincian Pesanan</div>
        <div class="grid">
            <div class="label">Nama Alat</div><div>Kursi Roda</div>
            <div class="label">Total Harga</div><div><strong>Rp. 90.000</strong></div>
            <div class="label">Metode Pengambilan</div><div>Diambil sendiri (Pickup)</div>
            <div class="label">Lama Sewa</div><div>3 Hari</div>
        </div>

        <!-- DETAIL TRANSAKSI -->
        <div class="section-title" style="margin-top: 25px;">Detail Transaksi</div>
        <div class="grid">
            <div class="label">Nama</div><div>Kinanatan</div>
            <div class="label">Tanggal Transaksi</div><div>12 Oktober 2025, 09.15 WIB</div>
            <div class="label">No Pesanan</div><div>MD-1025-4589</div>
            <div class="label">Status Pembayaran</div><div>Selesai</div>
        </div>

        <!-- FORM PEMBAYARAN -->
        <div class="section-title" style="margin-top: 25px;">Form Pembayaran</div>
        <div class="grid">
            <div class="label">Metode Pembayaran</div><div>Transfer Bank</div>
            <div class="label">Bank Tujuan</div>
            <div><img src="asset/bca.png" alt="BCA" style="height:70px;"></div>
            <div class="label">No. Rekening</div><div>1234567890<br>a. n. Medirent</div>
        </div>

        <button class="btn">Konfirmasi</button>
    </div>
</div>

</body>
</html>
