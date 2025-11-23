<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MediRent - Pembayaran</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
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
    background-color: #f5f8fc;
    color: #1a1a1a;
  }

  /* ================= NAVBAR ================= */
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

  .nav-links a.active {
    color: #003366;
    font-weight: 700;
  }

  /* ================== PEMBAYARAN ================== */
  .pembayaran-container {
    display: flex;
    justify-content: center;
    align-items: flex-start;
    padding: 60px 80px;
    gap: 60px;
    flex-wrap: wrap;
  }

  .left-box {
    background: #fff;
    border-radius: 40px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    padding: 40px;
    width: 520px;
    min-height: 525px;
  }

  .left-box h3 {
    color: #191919;
    font-size: 22px;
    margin-bottom: 20px;
  }

  .rincian-item {
    margin-bottom: 12px;
    font-weight: 500;
    color: #222;
  }

  .rincian-item span {
    float: right;
    font-weight: 600;
  }

  .form-pembayaran {
    margin-top: 70px;
  }

  .form-pembayaran h3 {
    font-size: 20px;
    color: #222;
    margin-bottom: 15px;
  }

  .form-pembayaran label {
    display: flex;
    align-items: center;
    gap: 10px;
    cursor: pointer;
    margin-bottom: 12px;
    color: #333;
    font-weight: 500;
  }

  .form-pembayaran input[type="radio"] {
    appearance: none;
    width: 18px;
    height: 18px;
    border: 2px solid #bbb;
    border-radius: 70%;
    display: inline-block;
    transition: all 0.3s;
  }

  .form-pembayaran input[type="radio"]:checked {
    border: 6px solid #007bff;
  }

  .upload-btn {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    border: 2.5px solid #0066cc;
    border-radius: 18px;
    padding: 10px 28px;
    background: #ffffff;
    color: #222;
    font-weight: 600;
    font-size: 16px;
    cursor: pointer;
    transition: 0.3s ease;
    box-shadow: 0 2px 6px rgba(0,0,0,0.05);
  }

  .upload-btn img {
    width: 20px;
    height: 20px;
    object-fit: contain;
  }

  .upload-btn:hover {
    transform: scale(1.03);
  }

  .right-box {
    max-width: 500px;
  }

  .right-box h3 {
    color: #003d99;
    font-size: 22px;
    margin-bottom: 45px;
  }

  .right-box p {
    color: #444;
    line-height: 1.6;
  }

  .right-box ul {
    margin-top: 10px;
    margin-left: 20px;
    color: #444;
    line-height: 1.6;
  }

  .checkbox {
    margin-top: 25px;
    display: flex;
    align-items: center;
    gap: 10px;
    color: #333;
    font-weight: 500;
  }

  .checkbox input {
    width: 18px;
    height: 18px;
    accent-color: #007bff;
  }

  .kirim-btn {
    width: 70%;
    margin-top: 70px;
    background: linear-gradient(90deg, #0066cc, #003366);
    color: white;
    border: none;
    border-radius: 20px;
    padding: 14px 0;
    font-weight: 600;
    font-size: 16px;
    cursor: pointer;
    transition: 0.3s;
  }

  .kirim-btn:hover {
    background: linear-gradient(90deg, #005bb5, #002b5c);
    transform: scale(1.03);
  }

  /* ================== RESPONSIVE ================== */
  @media (max-width: 900px) {
    .pembayaran-container {
      flex-direction: column;
      align-items: center;
      padding: 30px 20px;
      gap: 40px;
    }

    .left-box, .right-box {
      width: 100%;
      max-width: 500px;
      border-radius: 25px;
      padding: 25px;
    }

    .navbar {
      flex-direction: column;
      gap: 10px;
      padding: 15px 20px;
    }

    .nav-links {
      flex-wrap: wrap;
      justify-content: center;
      gap: 15px;
    }

    .logo-text {
      font-size: 18px;
    }

    .left-box h3, .right-box h3 {
      font-size: 20px;
    }

    .kirim-btn {
      width: 100%;
      margin-top: 40px;
    }

    .upload-btn {
      width: 100%;
    }
  }

  @media (max-width: 500px) {
    .navbar {
      padding: 10px 15px;
    }

    .nav-links {
      gap: 10px;
    }

    .logo {
      width: 35px;
      height: 35px;
    }

    .pembayaran-container {
      padding: 20px 10px;
    }

    .left-box, .right-box {
      padding: 20px;
    }

    .rincian-item {
      font-size: 14px;
    }

    .upload-btn, .kirim-btn {
      font-size: 14px;
      padding: 12px;
    }
  }
</style>


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

  <!-- Konten -->
  <section class="pembayaran-container">
    <!-- Kolom kiri -->
    <div class="left-box">
      <h3>Rincian Pesanan</h3>
      <div class="rincian-item">Nama Alat <span>Kursi Roda</span></div>
      <div class="rincian-item">Lama Sewa <span>3 hari</span></div>
      <div class="rincian-item">Total Harga <span>Rp 90.000</span></div>
      <div class="rincian-item">Metode Pengambilan <span>Diantar ke Rumah (Delivery)</span></div>

      <div class="form-pembayaran">
        <h3>Form Pembayaran</h3>
        <div class="metode-pembayaran">
  <label class="radio-main">
    
    <p>Transfer Bank</p>
  </label>

  <div class="bank-scroll">
    <label class="bank-option" data-rek="1234567890 (BCA a/n Admin)">
      <input type="radio" name="bank">
      <img src="img/bca.png" alt="BCA">
      <span>BCA</span>
    </label>

    <label class="bank-option" data-rek="9876543210 (Mandiri a/n Admin)">
      <input type="radio" name="bank">
      <img src="img/mandiri.png" alt="Mandiri">
      <span>Mandiri</span>
    </label>

    <label class="bank-option" data-rek="7788990011 (BNI a/n Admin)">
      <input type="radio" name="bank">
      <img src="img/bni.png" alt="BNI">
      <span>BNI</span>
    </label>

    <label class="bank-option" data-rek="1122334455 (BRI a/n Admin)">
      <input type="radio" name="bank">
      <img src="img/bri.png" alt="BRI">
      <span>BRI</span>
    </label>
  </div>

  <div id="rekening-box" class="rekening-box">
    Pilih bank terlebih dahulu
  </div>
</div>

        

        <button class="upload-btn">
        <img src="asset/upload.jpg" alt="Upload Icon">Upload Bukti</button>
      </div>
    </div>

    <!-- Kolom kanan -->
    <div class="right-box">
      <h3>Pembayaran</h3>
      <p>Dengan ini saya menyetujui syarat dan ketentuan penyewaan alat kesehatan di MediRent, termasuk:</p>
      <ul>
        <li>Keterlambatan pengembalian alat akan dikenakan denda sesuai kebijakan yang berlaku.</li>
        <li>Kerusakan atau kehilangan alat selama masa sewa menjadi tanggung jawab penyewa sepenuhnya.</li>
        <li>Pembayaran yang telah dilakukan tidak dapat dikembalikan, kecuali dalam kondisi tertentu sesuai kebijakan MediRent.</li>
      </ul>

      <div class="checkbox">
        <input type="checkbox">
        <label>Saya menyetujui syarat dan ketentuan di atas.</label>
      </div>

      <a href="/status">
    <button class="kirim-btn">Kirim Pembayaran</button>
</a>

    </div>
  </section>

</body>
</html>
