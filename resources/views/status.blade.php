<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MediRent - Status Pengiriman</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="icon" type="image/png" href="css/asset/icn.jpg">
<link rel="shortcut icon" href="css/asset/icn.jpg" type="image/x-icon">
<link rel="apple-touch-icon" href="css/asset/icn.jpg">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      background-color: #f4f8fc;
      color: #1a1a1a;
    }

    /* ===== NAVBAR ===== */
    .navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background-color: #ffffff;
      padding: 15px 50px;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
      position: sticky;
      top: 0;
      z-index: 100;
    }

    .logo-section {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .logo {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      object-fit: cover;
    }

    .logo-text {
      font-size: 20px;
      font-weight: 700;
      color: #007bff;
    }

    .nav-links {
      list-style: none;
      display: flex;
      gap: 25px;
    }

    .nav-links a {
      text-decoration: none;
      color: #0066cc;
      font-weight: 600;
      transition: color 0.3s ease;
    }

    .nav-links a:hover {
      color: #555;
    }

    /* ===== CONTAINER ===== */
    .container {
      display: flex;
      justify-content: center;
      align-items: flex-start;
      padding: 60px 40px;
      gap: 200px;
      flex-wrap: wrap;
    }

    /* ===== KIRI ===== */
    .left-section {
      display: flex;
      flex-direction: column;
      gap: 20px;
    }

    .status-box {
      background-color: #ffffff;
      padding: 30px 40px;
      border-radius: 25px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.08);
      width: 500px;
      min-height: 400px;
    }

    .status-box h2 {
      color: #004aad;
      font-size: 22px;
      font-weight: 700;
      margin-bottom: 10px;
    }

    .status-box p {
      color: #333;
      font-size: 15px;
      margin-bottom: 25px;
    }

    .button-group {
      display: flex;
      gap: 10px;
      margin-bottom: 25px;
    }

    .button-group button {
      flex: 1;
      padding: 10px 0;
      border-radius: 10px;
      border: none;
      font-weight: 600;
      font-size: 15px;
      cursor: pointer;
      transition: 0.3s;
    }

    .button-group .active {
      background-color: #003f79;
      color: white;
    }

    .button-group button:not(.active) {
      background-color: #cfd8e1;
      color: #333;
    }

    .detail h3 {
      font-size: 16px;
      font-weight: 700;
      margin-bottom: 10px;
    }

    .detail p {
      margin-bottom: 10px;
      color: #333;
      font-size: 15px;
    }

    .info-box {
      background: white;
      border-radius: 10px;
      padding: 18px 20px;
      width: 100%;
      max-width: 500px;
      font-size: 14px;
      box-shadow: 0 1px 4px rgba(0,0,0,0.15);
      border: 1px solid #ddd;
    }

    .info-item {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 10px;
      font-size: 15px;
    }

    .info-item i {
      margin-right: 8px;
      color: #555;
    }

    .info-item strong {
      font-weight: 600;
    }

    /* ===== KANAN ===== */
    .progress-container {
      width: 500px;
      min-height: 550px;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: flex-start;
      padding-top: 70px;
    }

    .location-card {
      background-color: #ffffff;
      border-radius: 20px;
      padding: 50px;
      width: 100%;
      max-width: 420px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
      text-align: left;
    }

    .location-card h3 {
      font-size: 18px;
      font-weight: 700;
      color: #333;
      margin-bottom: 15px;
    }

    .location-info {
      display: flex;
      align-items: flex-start;
      gap: 10px;
      color: #444;
      font-size: 15px;
      line-height: 1.6;
    }

    .location-info i {
      font-size: 18px;
      color: #003f79;
      margin-top: 3px;
    }

    .note {
      color: #555;
      font-size: 14px;
      margin-top: 25px;
      line-height: 1.6;
      text-align: left;
      max-width: 420px;
    }

    /* ===== BUTTONS ===== */
    .button-footer {
      display: flex;
      justify-content: center;
      gap: 20px;
      margin-top: 80px;
    }

    .button-footer button {
      border: none;
      padding: 12px 30px;
      border-radius: 12px;
      font-weight: 600;
      cursor: pointer;
      transition: 0.3s;
    }

    .btn-secondary {
      background-color: #d8dee8;
      color: #333;
    }

    .btn-primary {
      background: linear-gradient(90deg, #0066cc, #003366);
      color: white;
    }

    .btn-primary:hover {
      background: linear-gradient(90deg, #005bb5, #002b5c);
    }
  </style>
</head>
<body>

  <!-- NAVBAR -->
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

  <!-- MAIN CONTENT -->
  <section class="container">
    <!-- Kiri -->
    <div class="left-section">
      <div class="status-box">
        <h2>Delivery / Pickup Status</h2>
        <p>Pilihan metode pengambilan alat kesehatan Anda:</p>
        <div class="button-group">
          <button class="active">Delivery</button>
          <button>Pickup</button>
        </div>

        <div class="detail">
          <h3>Rincian Pengantaran</h3>
          <p><strong>Nama Alat:</strong> Kursi Roda</p>
          <p><strong>Tujuan Pengantaran:</strong><br>
            Dusun Sukamaju, RT 04 RW 02, Desa Cibeureum,<br>
            Kec. Cikalong, Kab. Tasikmalaya
          </p>
        </div>
      </div>

      <div class="info-box">
        <div class="info-item">
          <span><i class="fa-regular fa-clock"></i> Diperkirakan tiba:</span>
          <strong>12 Oktober 2025</strong>
        </div>
        <div class="info-item">
          <span><i class="fa-solid fa-phone"></i> Kontak Petugas Pengantaran:</span>
          <strong>+62 856-3759-5762</strong>
        </div>
      </div>
    </div>

    <!-- Kanan (lokasi fasilitas kesehatan) -->
    <div class="progress-container">
      <div class="location-card">
        <h3>Lokasi Fasilitas Kesehatan</h3>
        <div class="location-info">
          <i class="fa-solid fa-location-dot"></i>
          <p>Jl. Ahmad Yani No. 45, Kec. Cigalontang, Kab. Tasikmalaya, Jawa Barat</p>
        </div>
      </div>

      <p class="note">
        Gunakan kode untuk konfirmasi pemesanan Anda kepada petugas layanan MediRent.<br>
        Pastikan membawa identitas pengguna saat mengambil alat.
      </p>

      <div class="button-footer">
        <button class="btn-secondary">Kembali ke Beranda</button>
        <button class="btn-primary">Lihat Riwayat Pesanan</button>
      </div>
    </div>
  </section>

</body>
</html>
