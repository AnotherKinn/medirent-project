<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>MediRent Profil</title>
   <!-- Favicon -->
<link rel="icon" type="image/png" href="css/asset/icn.jpg">
<link rel="shortcut icon" href="css/asset/icn.jpg" type="image/x-icon">
<link rel="apple-touch-icon" href="css/asset/icn.jpg">

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="/css/profilbaru.css">
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
  <li><a href="login">Profil</a></li>
</ul>
  </nav>
  
<!-- Profil Section -->
  <section class="profile-container">
    <div class="profile-pic">
      <img id="profileImage" src="asset/default-profile.jpg" alt="Foto Profil">
      <label for="fileInput" class="edit-icon">✎</label>
      <input type="file" id="fileInput" accept="image/*">
    </div>

    <h2>Profil User</h2>

    <div class="input-group">
      <input type="text" id="name" value="AzelHuyy">
      <input type="email" id="email" value="Carlotta7@gmail.com">
      <input type="tel" id="phone" value="+62 200-8912-0080">
    </div>

    <div class="btn-container">
      <button id="saveBtn">Edit Profil</button>
      <button id="logoutBtn" style="background: linear-gradient(90deg,#222,#555);">Logout</button>
    </div>
  </section>

  <script src="/js/profil.js"></script>


</body>
</html>
