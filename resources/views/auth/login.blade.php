<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />


    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">  {{-- ✅ Đúng vì file đang ở public/css --}}

    

</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        @if (session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif


        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="input-div">
                <i class="fas fa-user"></i>
                <input type="text" name="email" placeholder="Type your username" required>
            </div>

            <div class="input-div">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Type your password" required>
            </div>

            <div class="forgot-password">
                <a href="#">Forgot password?</a>
            </div>

            <button type="submit" class="login-btn">LOGIN</button>

            <div class="social-login">
                <p>Or Sign Up Using</p>
                <a href="#"><img src="https://img.icons8.com/color/48/facebook-new.png"/></a>
                <a href="#"><img src="https://img.icons8.com/color/48/twitter--v1.png"/></a>
                <a href="#"><img src="https://img.icons8.com/color/48/google-logo.png" alt="Google login" />
</a>

            </div>

            <div class="signup-link">
                Or Sign Up Using <a href="{{ route('register') }}">SIGN UP</a>
            </div>
        </form>
    </div>
</body>
</html>
