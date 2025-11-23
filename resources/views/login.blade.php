<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login MediRent</title>
   <!-- Favicon -->
<link rel="icon" type="image/png" href="css/asset/icn.jpg">
<link rel="shortcut icon" href="css/asset/icn.jpg" type="image/x-icon">
<link rel="apple-touch-icon" href="css/asset/icn.jpg">

 <link rel="stylesheet" href="/css/login.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
  <div class="login-card">
   <i class="fa-solid fa-arrow-left back-arrow" onclick="window.location.href='/profil'"></i>
    <h2>Login</h2>

    <div class="input-group">
      <i class="fas fa-envelope"></i>
      <input type="email" placeholder="Email" required>
    </div>

    <div class="input-group">
      <i class="fas fa-lock"></i>
      <input type="password" id="password" placeholder="Password" required>
      <i class="fa-regular fa-eye toggle-password" onclick="togglePassword()"></i>
    </div>

    <div class="options">
      <label><input type="checkbox"> Remember Me</label>
      <a href="#">Forgot Password?</a>
    </div>

    <button class="login-btn" onclick="window.location.href='/beranda'">Login</button>


    <div class="register">
      Don’t have an account? <a href="/register">Register</a>
    </div>
  </div>
  <script src="/js/login.js"></script>
</body>
</html>
