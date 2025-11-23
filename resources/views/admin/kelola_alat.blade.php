<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MediRent - Admin</title>
  <link rel="icon" type="image/png" href="css/asset/icn.jpg">
<link rel="shortcut icon" href="css/asset/icn.jpg" type="image/x-icon">
<link rel="apple-touch-icon" href="css/asset/icn.jpg">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <style>
body {
  font-family: 'Poppins', sans-serif;
  background-color: #9db7e0;
  margin: 0;
  padding: 0;
  overflow-x: hidden; /* 🔥 Hilangin scroll samping */
}

/* Navbar */
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

/* =========================
   TABLE CONTAINER
========================= */

.table-container {
  max-width: 970px;
  background: white;
  margin: 60px auto;
  border-radius: 4px;
  box-shadow: 0 1px 4px rgba(0,0,0,0.1);

  overflow-x: auto; /* Biar tabel tetap aman */
}

table {
  width: 100%;
  border-collapse: collapse;
}

thead {
  background-color: #f8f9fb;
}

th, td {
  padding: 16px 20px;
  text-align: left;
  border-bottom: 1px solid #e5e5e5;
  font-size: 15px;
}

th {
  font-weight: 600;
  color: #333;
}

td {
  color: #333;
}

td.status {
  color: #2ecc71;
  font-weight: 600;
}

.edit-btn {
  background-color: #1a73e8;
  color: white;
  font-size: 13px;
  font-weight: 500;
  border: none;
  border-radius: 6px;
  padding: 6px 14px;
  display: flex;
  align-items: center;
  cursor: pointer;
}

.edit-btn i {
  font-style: normal;
  margin-right: 6px;
}

tr:hover {
  background-color: #f9fbff;
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

 <div class="table-container">
    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Alat</th>
          <th>Harga Sewa</th>
          <th>Status</th>
          <th>Stok</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>Kursi Roda</td>
          <td>Rp 30.000</td>
          <td class="status">Tersedia</td>
          <td>180</td>
          <td>
    <a href="kelola_alat2.html" class="edit-btn">✎ Edit</a></td>

        </tr>
        <tr>
          <td>2</td>
          <td>Tensi</td>
          <td>Rp 20.000</td>
          <td class="status">Tersedia</td>
          <td>145</td>
          <td><a href="kelola_alat2.html" class="edit-btn">✎ Edit</a></td></td>
        </tr>
        <tr>
          <td>3</td>
          <td>Nebulizer</td>
          <td>Rp 25.000</td>
          <td class="status">Tersedia</td>
          <td>120</td>
          <td><a href="kelola_alat2.html" class="edit-btn">✎ Edit</a></td></td>
        </tr>
        <tr>
          <td>4</td>
          <td>Ambulance</td>
          <td>Rp 350.000</td>
          <td class="status">Tersedia</td>
          <td>3</td>
          <td><a href="kelola_alat2.html" class="edit-btn">✎ Edit</a></td></td>
        </tr>
      </tbody>
    </table>
  </div>



</body>
</html>
