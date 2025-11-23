<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>MediRent</title>
   <!-- Favicon -->
<link rel="icon" type="image/png" href="/css/asset/icn.jpg">
<link rel="shortcut icon" href="/css/asset/icn.jpg" type="image/x-icon">
<link rel="apple-touch-icon" href="/css/asset/icn.jpg">

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="/css/daftar.css">
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar">
    <div class="logo-section">
      <img src="css/asset/logo.jpg" alt="Logo MediRent" class="logo" >
      <span class="logo-text">MediRent</span>
    </div>
    <ul class="nav-links">
  <li><a href="beranda#beranda">Beranda</a></li>
  <li><a href="beranda#tentang">Tentang</a></li>
  <li><a href="beranda#daftar">Daftar Alat</a></li>
  <li><a href="beranda#daftar">Transaksi</a></li>
  <li><a href="register">Profil</a></li>
</ul>

  </nav>

  <!-- Daftar Alat -->
  <section id="daftar-alat" class="product-section">
    <h2>Daftar Alat Kesehatan</h2>
    <div class="product-list">

      <div class="product-card">
        <img src="css/asset/kursiroda.jpg" alt="Kursi Roda" />
        <h3>Kursi Roda</h3>
        <p>Rp 30.000 / hari</p>
        <span class="status tersedia"> <i class="fa-solid fa-check"></i> Tersedia</span>
        <button class="btn" onclick="window.location.href='/kursi'">Sewa Sekarang</button>
      </div>

      <div class="product-card">
        <img src="css/asset/tensi.jpg" alt="Tensi Meter Digital" />
        <h3>Tensi Meter Digital</h3>
        <p>Rp 20.000 / hari</p>
        <span class="status tersedia"><i class="fa-solid fa-check"></i> Tersedia</span>
        <button class="btn" onclick="window.location.href='/tensi'">Sewa Sekarang</button>
      </div>

      <div class="product-card">
        <img src="css/asset/omron.jpg" alt="Nebulizer Omron" />
        <h3>Nebulizer Omron</h3>
        <p>Rp 25.000 / hari</p>
        <span class="status disewa"><i class="fa-solid fa-xmark"></i> Disewa</span>
       <button class="btn" onclick="window.location.href='/nebulizer'">Sewa Sekarang</button>
      </div>

      <!-- Ambulans -->
      <div class="product-card">
        <img src="css/asset/ambulan.jpg" alt="Ambulans" />
        <h3>Ambulans</h3>
        <p>Rp 250.000 / hari</p>
        <span class="status tersedia"><i class="fa-solid fa-check"></i> Tersedia</span>
        <button class="btn" onclick="window.location.href='/ambulance'">Sewa Sekarang</button>
      </div>

    </div>
  </section>

</body>
</html>
