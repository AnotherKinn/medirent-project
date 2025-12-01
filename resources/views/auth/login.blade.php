<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login MediRent</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="/css/asset/icn.jpg">
    <link rel="shortcut icon" href="/css/asset/icn.jpg" type="image/x-icon">
    <link rel="apple-touch-icon" href="/css/asset/icn.jpg">

    <link rel="stylesheet" href="/css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        .notify {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: #28a745;
            color: white;
            padding: 12px 18px;
            border-radius: 8px;
            font-size: 14px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.15);
            z-index: 9999;
            opacity: 0;
            animation: fadeInOut 3s forwards;
        }

        @keyframes fadeInOut {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }

            10% {
                opacity: 1;
                transform: translateY(0);
            }

            90% {
                opacity: 1;
            }

            100% {
                opacity: 0;
                transform: translateY(20px);
            }
        }

    </style>

</head>

<body>
    <div class="login-card">
        <i class="fa-solid fa-arrow-left back-arrow" onclick="window.location.href='/'"></i>
        <h2>Login</h2>

        {{-- FORM LOGIN BREEZE --}}
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="input-group">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus>
            </div>
            @error('email')
            <div style="color:red; font-size:12px; margin-top:-10px; margin-bottom:10px;">{{ $message }}</div>
            @enderror

            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" id="password" placeholder="Password" required>
                <i class="fa-regular fa-eye toggle-password" onclick="togglePassword()"></i>
            </div>
            @error('password')
            <div style="color:red; font-size:12px; margin-top:-10px; margin-bottom:10px;">{{ $message }}</div>
            @enderror

            <div class="options">
                <label>
                    <input type="checkbox" name="remember"> Remember Me
                </label>
                <a href="{{ route('password.request') }}">Forgot Password?</a>
            </div>

            <button class="login-btn">
                Login
            </button>
        </form>

        <div class="register">
            Don’t have an account? <a href="{{ route('register') }}">Register</a>
        </div>
    </div>

    {{-- @if (session('success'))
    <div class="notify">
        {{ session('success') }}
    </div>
    @endif --}}


    <script src="/js/login.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        @if(session('success'))
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'success',
            title: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 2500,
            timerProgressBar: true,
        });
        @endif

    </script>
</body>

</html>
