<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MediRent - Kursi</title>
   <!-- Favicon -->
<link rel="icon" type="image/png" href="css/asset/icn.jpg">
<link rel="shortcut icon" href="css/asset/icn.jpg" type="image/x-icon">
<link rel="apple-touch-icon" href="css/asset/icn.jpg">
<link rel="stylesheet" href="/css/kursi.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  
  
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar">
    <div class="logo-section">
      <img src="css/asset/logo.jpg" alt="Logo MediRent" class="logo" />
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

  <!-- Transaksi -->
  <section class="transaksi-container">
    <div class="left-side">
      <h2>Pemesanan</h2>
      <div class="image-section">
        <img src="css/asset/kursiroda.jpg" alt="Kursi Roda">
      </div>
    </div>

    <div class="info-section">
      <h2>Kursi Roda</h2>
      <p>Kursi roda lipat premium dengan rangka aluminium berkualitas tinggi, dilengkapi bantalan empuk dan sandaran ergonomis untuk kenyamanan maksimal. Desainnya ringan, mudah dilipat, dan praktis dibawa bepergian. Cocok untuk penggunaan di rumah maupun fasilitas kesehatan.</p>

      <span class="harga">Rp. 30.000 / Hari</span>

      <div class="form-group">
        <h4>Input Lama Sewa</h4>
        <div class="option-group">
          <input type="radio" id="3hari" name="lama" checked>
          <label for="3hari">3 hari</label>

          <input type="radio" id="1minggu" name="lama">
          <label for="1minggu">1 minggu</label>

          <input type="radio" id="1bulan" name="lama">
          <label for="1bulan">1 bulan</label>
        </div>
      </div>

      <div class="form-group">
        <h4>Pilih Metode Pengambilan:</h4>
        <div class="radio-group">
          <label>
            <input type="radio" name="metode" checked>
            Diantar ke Rumah (Delivery)
          </label>
          <label>
            <input type="radio" name="metode">
            Diambil sendiri (Pickup)
          </label>
        </div>
      </div>

     <button class="btn" onclick="window.location.href='/pembayaran'">Lanjut ke Pembayaran</button>

    </div>
  </section>

</body>
</html>
