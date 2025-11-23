<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>MediRent</title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="/css/asset/icn.jpg" type="image/x-icon">
<link rel="icon" href="/css/asset/icn.jpg" type="image/x-icon">
<link rel="apple-touch-icon" href="/css/asset/icn.jpg">

  <!-- Fonts & Icons -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <!-- CSS -->
  <link rel="stylesheet" href="css/beranda.css">


  <script>
  function reveal() {
    const elements = document.querySelectorAll('.reveal');

    elements.forEach(el => {
      const top = el.getBoundingClientRect().top;
      const bottom = el.getBoundingClientRect().bottom;
      const windowHeight = window.innerHeight;

      // masuk layar
      if (top < windowHeight - 50 && bottom > 50) {
        el.classList.add("active");
      } 
      // keluar layar → reset biar bisa animasi lagi
      else {
        el.classList.remove("active");
      }
    });
  }

  window.addEventListener("scroll", reveal);
  window.addEventListener("load", reveal);

  
</script>


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

  <!-- HERO / BERANDA -->
  <section id="beranda" class="hero">
    <h1 class="reveal">Selamat Datang di MediRent</h1>
    <h3 class="reveal">Bantu pemulihan Anda tanpa perlu beli mahal</h3>
  </section>

  <!-- SECTION TENTANG -->
<section id="tentang">
  <div class="tentang-list">

      <div class="tentang-card">
        <h2 class="reveal">Mengapa MediRent ?</h2>
        <img src="css/asset/icnmm.jpg">
        <p class="reveal">Kebutuhan alat bantu kesehatan semakin meningkat...</p>
      </div>

      <div class="tentang-card">
        <h2  class="reveal">Solusi Kami</h2>
        <img src="css/asset/dtr.jpg">
        <p class="reveal">MediRent hadir sebagai layanan sewa alat kesehatan...</p>
      </div>

      <div class="tentang-card">
        <h2 class="reveal">Pilihan Layanan</h2>
        <img src="css/asset/mbl.jpg">
        <p class="reveal">Delivery / Pickup sesuai kebutuhan pengguna...</p>
      </div>

  </div>
</section>


  <!-- DAFTAR ALAT -->
  <section id="daftar" class="product-section">
    <h2 class="reveal">Daftar Alat Kesehatan</h2>

    <div class="product-list">

      <div class="product-card">
        <img src="css/asset/kursiroda.jpg" alt="Kursi Roda" />
        <h3 class="reveal">Kursi Roda</h3>
        <p class="reveal">Rp 30.000 / hari</p>
        <span class="status tersedia">
          <i class="fa-solid fa-check"></i> Tersedia
        </span>
        <button class="btn" onclick="window.location.href='/kursi'">Sewa Sekarang</button>
      </div>

      <div class="product-card">
        <img src="css/asset/tensi.jpg" alt="Tensi Meter Digital" />
        <h3 class="reveal">Tensi Meter Digital</h3>
        <p class="reveal">Rp 20.000 / hari</p>
        <span class="status tersedia">
          <i class="fa-solid fa-check"></i> Tersedia
        </span>
        <button class="btn" onclick="window.location.href='/tensi'">Sewa Sekarang</button>
      </div>

      <div class="product-card">
        <img src="css/asset/omron.jpg" alt="Nebulizer Omron" />
        <h3 class="reveal">Nebulizer Omron</h3>
        <p class="reveal">Rp 25.000 / hari</p>
        <span class="status disewa">
          <i class="fa-solid fa-xmark"></i> Disewa
        </span>
        <button class="btn" onclick="window.location.href='/nebulizer'">Sewa Sekarang</button>
      </div>

      <div class="product-card">
        <img src="css/asset/ambulan.jpg" alt="Ambulans" />
        <h3 class="reveal">Ambulans</h3>
        <p class="reveal">Rp 250.000 / hari</p>
        <span class="status tersedia">
          <i class="fa-solid fa-check"></i> Tersedia
        </span>
        <button class="btn" onclick="window.location.href='/ambulance'">Sewa Sekarang</button>
      </div>

    </div>
 <!-- ======================
     MAP + CONTACT SECTION
====================== -->
<div class="footer-section">

    <iframe 
    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.8798772516996!2d106.957815!3d-6.411681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69e9b21ddfc63f%3A0xc3f3d2e2cd8a945e!2sPuskesmas%20Kecamatan%20Gunung%20Putri!5e0!3m2!1sid!2sid!4v1732353000000!5m2!1sid!2sid"
    width="100%" 
    height="300" 
    style="border:0; border-radius:12px;"
    allowfullscreen="" 
    loading="lazy">
</iframe>


    <div class="contact-box">
        <h3>Contact & Media Sosial</h3>

        <p>📸 Instagram: <a href="#">@medirent.id</a></p>
        <p>🐦 Twitter: <a href="#">@medirentcare</a></p>
        <p>📘 Facebook: MediRent ID – Sewa Alat Kesehatan</p>
        <p>📱 WhatsApp: <b>+62 856-2356-8976</b></p>
        <p>📧 Email: medirent.support@gmail.com</p>
    </div>

</div>


</body>
</html>
