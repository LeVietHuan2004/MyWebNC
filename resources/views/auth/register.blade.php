<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="login-container">
        <h2>Register</h2>
        <form action="{{ route('register') }}" method="POST">
            @csrf

            <div class="input-div">
                <i class="fas fa-user"></i>
               <input type="text" name="name" placeholder="Type your username" required />
            </div>

            <div class="input-div">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" placeholder="Type your email" required />
            </div>

            <div class="input-div">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Type your password" required />
            </div>

            <div class="input-div">
                <i class="fas fa-lock"></i>
                <input type="password" name="password_confirmation" placeholder="Confirm your password" required />
            </div>

            <button type="submit" class="login-btn">REGISTER</button>
        </form>

        <div class="social-login">
            <p>Or Sign Up Using</p>
            <a href="#"><img src="https://img.icons8.com/color/48/facebook-new.png"/></a>
            <a href="#"><img src="https://img.icons8.com/color/48/twitter--v1.png"/></a>
            <a href="#"><img src="https://img.icons8.com/color/48/google-logo.png"/></a>
        </div>

        <p class="signup-link">
            Already have an account? <a href="{{ route('login') }}">LOGIN</a>
        </p>
    </div>
</body>
</html>
