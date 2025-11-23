<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login Page</title>
  <link rel="icon" type="image/png" href="css/asset/icn.jpg">
<link rel="shortcut icon" href="css/asset/icn.jpg" type="image/x-icon">
<link rel="apple-touch-icon" href="css/asset/icn.jpg">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background: url('asset/bg.png') no-repeat center center/cover;
      overflow: hidden;
      position: relative;
    }

    /* Overlay lembut biar teks tetap kebaca */
    body::before {
      content: "";
      position: absolute;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 50, 0.4);
      top: 0;
      left: 0;
      z-index: 0;
    }

    .login-card {
      position: relative;
      z-index: 2;
      background: rgba(255, 255, 255, 0.08);
      border: 7px solid rgba(255, 255, 255, 0.4);
      backdrop-filter: blur(20px);
      border-radius: 22px;
      padding: 50px 50px;
      width: 370px;
      color: #fff;
      box-shadow: 0 0 35px rgba(0, 0, 0, 0.3);
      text-align: center;
    }

    .login-card h2 {
      margin-bottom: 30px;
      font-weight: 600;
      letter-spacing: 0.5px;
    }

    .input-group {
      position: relative;
      margin-bottom: 22px;
    }

    .input-group input {
      width: 100%;
      padding: 12px 45px;
      border-radius: 30px;
      border: none;
      background: #fff;
      outline: none;
      color: #333;
      font-size: 14px;
      transition: all 0.3s ease;
    }

    .input-group input::placeholder {
      color: #999;
    }

    .input-group input:focus {
      box-shadow: 0 0 8px rgba(255, 255, 255, 0.8);
      background: #fff;
    }

    .input-group .fa-envelope,
    .input-group .fa-lock {
      position: absolute;
      top: 50%;
      left: 15px;
      transform: translateY(-50%);
      color: #0066cc;
      font-size: 16px;
      pointer-events: none;
    }

    .toggle-password {
      position: absolute;
      top: 50%;
      right: 15px;
      transform: translateY(-50%);
      color: #0066cc;
      cursor: pointer;
      transition: 0.2s;
    }

    .toggle-password:hover {
      color: #004080;
    }

    .options {
      display: flex;
      justify-content: space-between;
      align-items: center;
      font-size: 13px;
      margin-top: 10px;
      margin-bottom: 25px;
    }

    .options label {
      display: flex;
      align-items: center;
      gap: 5px;
      cursor: pointer;
    }

    .options a {
      color: #fff;
      text-decoration: none;
    }

    .options a:hover {
      text-decoration: underline;
    }

    .login-btn {
      width: 65%;
      padding: 10px;
      border-radius: 25px;
      background: #fff;
      color: #0066cc;
      border: none;
      font-weight: 600;
      cursor: pointer;
      transition: 0.3s;
      box-shadow: 0 0 10px rgba(255, 255, 255, 0.4);
    }

    .login-btn:hover {
      background: #f2f2f2;
      transform: translateY(-2px);
      box-shadow: 0 0 15px rgba(255, 255, 255, 0.6);
    }

    .register {
      margin-top: 18px;
      font-size: 13px;
    }

    .register a {
      color: #fff;
      text-decoration: none;
      font-weight: 600;
    }

    .register a:hover {
      text-decoration: underline;
    }

    .back-arrow {
      position: absolute;
      top: 20px;
      left: 25px;
      font-size: 18px;
      color: white;
      cursor: pointer;
    }

    @media (max-width: 480px) {
      .login-card {
        width: 90%;
        padding: 30px 25px;
      }
    }
  </style>
</head>
<body>
  <div class="login-card">
   <i class="fa-solid fa-arrow-left back-arrow" onclick="window.location.href='/admin.profil.admin'"></i>
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

    <button class="login-btn" onclick="window.location.href='/admin.beranda_admin'">Login</button>


  
  <script>
    function togglePassword() {
      const passwordInput = document.getElementById("password");
      const icon = document.querySelector(".toggle-password");
      if (passwordInput.type === "password") {
        passwordInput.type = "text";
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
      } else {
        passwordInput.type = "password";
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
      }
    }
  </script>
</body>
</html>
