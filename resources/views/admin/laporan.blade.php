<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Laporan Transaksi MediRent</title>
<link rel="icon" type="image/png" href="css/asset/icn.jpg">
<link rel="shortcut icon" href="css/asset/icn.jpg" type="image/x-icon">
<link rel="apple-touch-icon" href="css/asset/icn.jpg">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

<style>
    body {
    margin: 0;
    background: #9db7e0;
    font-family: "Poppins", sans-serif;

    /* ANTI SCROLL KE SAMPING */
    overflow-x: hidden;
}

/* ======================
   NAVBAR (VERSI BARU)
====================== */
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

/* ======================
   PAGE TITLE AREA
====================== */
.page-container {
    padding: 30px 40px;
    box-sizing: border-box; /* ANTI OVERFLOW */
}

.title-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap; /* ANTI MELEBAR KE SAMPING */
}

.page-title {
    font-size: 22px;
    font-weight: 700;
    color: #004a80;
    margin-bottom: 20px;
}

/* FILTER AREA */
.filters {
    display: flex;
    gap: 15px;
    align-items: center;
    flex-wrap: wrap; /* ANTI MELEBAR */
}

.filters select {
    padding: 8px 10px;
    border-radius: 6px;
    border: 1px solid #d0d7df;
    font-size: 14px;
    background: white;
}

/* ======================
   TABLE
====================== */
table {
    width: 100%;
    border-collapse: collapse;
    background: white;
    border-radius: 8px;
    overflow: hidden;
    font-size: 15px;

    /* ANTI OVERFLOW */
    table-layout: fixed;
}

thead {
    background: #f5f7fa;
    font-weight: 600;
    color: #333;
}

thead th {
    padding: 14px;
    border-bottom: 2px solid #e2e6ea;
    text-align: left;
    word-wrap: break-word;
}

tbody td {
    padding: 14px;
    border-bottom: 1px solid #e7ebef;
    word-wrap: break-word;
}

tbody tr:last-child td {
    border-bottom: none;
}

/* BOTTOM TOTAL */
.total-row {
    font-size: 18px;
    font-weight: 700;
    color: #004a80;
    margin-top: 25px;
    text-align: right;
    padding-right: 10px;
    box-sizing: border-box;
}

</style>
</head>
<body>

<!-- NAVBAR BARU -->
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

<!-- MAIN CONTENT -->
<div class="page-container">

    <div class="title-row">
        <div class="page-title">Rekap Transaksi Bulanan MediRent</div>

        <div class="filters">
            <span style="font-size:15px; font-weight:500; color:#004a80;">Filter Berdasarkan:</span>

            <select id="filterUser">
                <option value="">User</option>
            </select>

            <select id="filterAlat">
                <option value="">Nama Alat</option>
            </select>

            <select id="filterTanggal">
                <option value="">Tanggal</option>
            </select>
        </div>
    </div>

    <!-- TABLE -->
    <table id="dataTable">
        <thead>
            <tr>
                <th>ID Transaksi</th>
                <th>User</th>
                <th>Nama Alat</th>
                <th>Durasi Sewa</th>
                <th>Harga / Hari</th>
                <th>Tanggal Transaksi</th>
                <th>Total Harga</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>MD-20251026-TSK-0034</td>
                <td>Kinan</td>
                <td>Kursi Roda</td>
                <td>3 hari</td>
                <td>Rp. 30.000</td>
                <td>03/10/2025</td>
                <td>Rp. 90.000</td>
            </tr>
            <tr>
                <td>MD-20251026-TSK-0036</td>
                <td>Emel</td>
                <td>Tensi Meter Digital</td>
                <td>1 minggu / 7 hari</td>
                <td>Rp. 20.000</td>
                <td>05/10/2025</td>
                <td>Rp. 140.000</td>
            </tr>
            <tr>
                <td>MD-20251026-TSK-0036</td>
                <td>Dini</td>
                <td>Nebulizer Omron</td>
                <td>1 bulan / 30 hari</td>
                <td>Rp. 25.000</td>
                <td>07/10/2025</td>
                <td>Rp. 750.000</td>
            </tr>
            <tr>
                <td>MD-20251026-TSK-0037</td>
                <td>Chika</td>
                <td>Ambulance</td>
                <td>3 hari</td>
                <td>Rp. 350.000</td>
                <td>09/10/2025</td>
                <td>Rp. 1.050.000</td>
            </tr>
            <tr>
                <td>MD-20251026-TSK-0038</td>
                <td>Azel</td>
                <td>Kursi Roda</td>
                <td>1 minggu / 7 hari</td>
                <td>Rp. 30.000</td>
                <td>11/10/2025</td>
                <td>Rp. 210.000</td>
            </tr>
            <tr>
                <td>MD-20251026-TSK-0039</td>
                <td>Ratna</td>
                <td>Tensi Meter Digital</td>
                <td>1 minggu / 7 hari</td>
                <td>Rp. 20.000</td>
                <td>13/10/2025</td>
                <td>Rp. 140.000</td>
            </tr>
            <tr>
                <td>MD-20251026-TSK-0040</td>
                <td>Dimas</td>
                <td>Nebulizer Omron</td>
                <td>1 bulan / 30 hari</td>
                <td>Rp. 35.000</td>
                <td>15/10/2025</td>
                <td>Rp. 750.000</td>
            </tr>
            <tr>
                <td>MD-20251026-TSK-0041</td>
                <td>Salsa</td>
                <td>Ambulance</td>
                <td>3 hari</td>
                <td>Rp. 350.000</td>
                <td>17/10/2025</td>
                <td>Rp. 1.050.000</td>
            </tr>
        </tbody>
    </table>

    <div class="total-row">
        Total Pendapatan Bulan Oktober 2025: 
        <span style="color:#003d6b;">Rp. 3.365.000</span>
    </div>

</div>


<!-- ======================
     SCRIPT: Isi Dropdown
====================== -->
<script>
    const table = document.querySelector("#dataTable tbody");
    const rows = table.querySelectorAll("tr");

    let users = new Set();
    let alat = new Set();
    let tanggal = new Set();

    rows.forEach(row => {
        users.add(row.children[1].innerText);
        alat.add(row.children[2].innerText);
        tanggal.add(row.children[5].innerText);
    });

    function isiDropdown(id, dataSet) {
        const select = document.getElementById(id);
        dataSet.forEach(item => {
            const opt = document.createElement("option");
            opt.value = item;
            opt.textContent = item;
            select.appendChild(opt);
        });
    }

    isiDropdown("filterUser", users);
    isiDropdown("filterAlat", alat);
    isiDropdown("filterTanggal", tanggal);
</script>

</body>
</html>
