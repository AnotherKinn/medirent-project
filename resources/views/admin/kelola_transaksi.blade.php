<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Kelola Transaksi</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

<style>
body {
    font-family: 'Poppins', sans-serif;
    background-color: #9db7e0;
    margin: 0;
    padding: 0;
}

header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    background: white;
    padding: 10px 20px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.08);
}

.logo {
    display: flex;
    align-items: center;
    font-size: 22px;
    font-weight: 600;
    color: #1a73e8;
}

nav {
    display: flex;
    align-items: center;
    gap: 42px;
}

nav a {
    text-decoration: none;
    color: #6d7a8a;
    font-weight: 500;
    font-size: 16px;
}

nav a:hover,
nav a.active {
    color: #1a73e8;
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

th {
    background: #fafafa;
    padding: 18px;
    text-align: left;
    font-weight: bold;
    border-bottom: 1px solid #eee;
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
}

.icon-img {
    width: 22px;
    height: 22px;
    cursor: pointer;
    margin-left: 12px;
}
</style>
</head>
<body>

<header>
    <div class="logo">
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

<!-- ===========================
     TABEL TRANSAKSI
     =========================== -->
<div class="container">
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>No Pesanan</th>
                <th>Tanggal</th>
                <th>Customer</th>
                <th>Total Harga</th>
                <th>Status</th>
                <th>Opsi</th>
            </tr>
        </thead>

        <tbody>

            <tr>
                <td>1</td>
                <td>MD-1025-4589</td>
                <td>23-09-2025</td>
                <td>Kinanthan</td>
                <td>Rp 105.000</td>
                <td><span class="status selesai">Selesai</span></td>
                <td>
                    <button class="btn-bukti">Bukti Pembayaran</button>
                   <img src="asset/Edit.png" class="icon-img" alt="edit">
                   <img src="asset/Trash 2.png" class="icon-img" alt="delete">

                </td>
            </tr>

            <tr>
                <td>2</td>
                <td>MD-1025-4589</td>
                <td>23-09-2025</td>
                <td>Emel</td>
                <td>Rp 370.000</td>
                <td><span class="status menunggu">Menunggu Pembayaran</span></td>
                <td>
                    <button class="btn-bukti">Bukti Pembayaran</button>
                   <img src="asset/Edit.png" class="icon-img" alt="edit">
                   <img src="asset/Trash 2.png" class="icon-img" alt="delete">

                </td>
            </tr>

            <tr>
                <td>3</td>
                <td>MD-1025-4589</td>
                <td>23-09-2025</td>
                <td>Dini</td>
                <td>Rp 370.000</td>
                <td><span class="status menunggu">Menunggu Pembayaran</span></td>
                <td>
                    <button class="btn-bukti">Bukti Pembayaran</button>
                    <img src="asset/Edit.png" class="icon-img" alt="edit">
                    <img src="asset/Trash 2.png" class="icon-img" alt="delete">

                </td>
            </tr>

            <tr>
                <td>4</td>
                <td>MD-1025-4589</td>
                <td>23-09-2025</td>
                <td>Chika</td>
                <td>Rp 705.000</td>
                <td><span class="status diproses">Diproses</span></td>
                <td>
                    <button class="btn-bukti">Bukti Pembayaran</button>
                    <img src="asset/Edit.png" class="icon-img" alt="edit">
                    <img src="asset/Trash 2.png" class="icon-img" alt="delete">

                </td>
            </tr>

            <tr>
                <td>5</td>
                <td>MD-1025-4589</td>
                <td>23-09-2025</td>
                <td>Azel</td>
                <td>Rp 440.000</td>
                <td><span class="status selesai">Selesai</span></td>
                <td>
                    <button class="btn-bukti">Bukti Pembayaran</button>
                    <img src="asset/Edit.png" class="icon-img" alt="edit">
                    <img src="asset/Trash 2.png" class="icon-img" alt="delete">

                </td>
            </tr>

            <tr>
                <td>6</td>
                <td>MD-1025-4589</td>
                <td>23-09-2025</td>
                <td>Ratna</td>
                <td>Rp 380.000</td>
                <td><span class="status menunggu">Menunggu Pembayaran</span></td>
                <td>
                    <button class="btn-bukti">Bukti Pembayaran</button>
                    <img src="asset/Edit.png" class="icon-img" alt="edit">
                    <img src="asset/Trash 2.png" class="icon-img" alt="delete">

                </td>
            </tr>

            <tr>
                <td>7</td>
                <td>MD-1025-4589</td>
                <td>23-09-2025</td>
                <td>Dimas</td>
                <td>Rp 800.000</td>
                <td><span class="status menunggu">Menunggu Pembayaran</span></td>
                <td>
                    <button class="btn-bukti">Bukti Pembayaran</button>
                    <img src="asset/Edit.png" class="icon-img" alt="edit">
                    <img src="asset/Trash 2.png" class="icon-img" alt="delete">

                </td>
            </tr>

        </tbody>
    </table>
</div>

</body>
</html>
