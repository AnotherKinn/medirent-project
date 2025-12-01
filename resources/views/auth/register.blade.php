<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register MediRent</title>

  <link rel="icon" href="/css/asset/icn.jpg">
  <link rel="stylesheet" href="/css/register.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>

  <div class="login-card">
    <i class="fa-solid fa-arrow-left back-arrow" onclick="window.location.href='/login'"></i>

    <h2>Register</h2>

    <form method="POST" action="{{ route('register') }}">
      @csrf

      <!-- NAME -->
      <div class="input-group">
        <i class="fas fa-user"></i>
        <input type="text" name="nama" value="{{ old('name') }}" placeholder="Fullname" required>
      </div>
      @error('name')
        <p class="error">{{ $message }}</p>
      @enderror

      <!-- EMAIL -->
      <div class="input-group">
        <i class="fas fa-envelope"></i>
        <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" required>
      </div>
      @error('email')
        <p class="error">{{ $message }}</p>
      @enderror

      <!-- PASSWORD -->
      <div class="input-group">
        <i class="fas fa-lock"></i>
        <input type="password" id="password" name="password" placeholder="Password" required>
        <i class="fa-regular fa-eye toggle-password" onclick="togglePassword()"></i>
      </div>
      @error('password')
        <p class="error">{{ $message }}</p>
      @enderror

      <!-- CONFIRM PASSWORD -->
      <div class="input-group">
        <i class="fas fa-lock"></i>
        <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
      </div>

      <button type="submit" class="login-btn">Register</button>
    </form>

    <script src="/js/register.js"></script>
  </div>

</body>
</html>
