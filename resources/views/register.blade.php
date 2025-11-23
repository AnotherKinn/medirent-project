<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register MediRent</title>
  <link rel="icon" type="image/png" href="css/asset/icn.jpg">
<link rel="shortcut icon" href="css/asset/icn.jpg" type="image/x-icon">
<link rel="apple-touch-icon" href="css/asset/icn.jpg">
  <link rel="stylesheet" href="/css/register.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
  <div class="login-card">
    <i class="fa-solid fa-arrow-left back-arrow" onclick="window.location.href='/login'"></i>
    <h2>Register</h2>

    <div class="input-group">
      <i class="fas fa-user"></i>
      <input type="text" placeholder="Fullname" required>
    </div>

    <div class="input-group">
      <i class="fas fa-phone"></i>
      <input type="tel" placeholder="Phone Number" required>
    </div>

    <!-- 🔽 EMAIL -->
    <div class="input-group">
      <i class="fas fa-envelope"></i>
      <input type="email" placeholder="Email" required>
    </div>

    <!-- 🔽 PASSWORD -->
    <div class="input-group">
      <i class="fas fa-lock"></i>
      <input type="password" id="password" placeholder="Password" required>
      <i class="fa-regular fa-eye toggle-password" onclick="togglePassword()"></i>
    </div>


    <button class="login-btn" onclick="window.location.href='/login'">Register</button>
<script src="/js/register.js"></script>
</body>
</html>
