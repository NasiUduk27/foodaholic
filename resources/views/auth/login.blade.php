<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Foodaholic | Log in</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/loginRegister.css') }}">
</head>

<body>
    <div class="container">
        <div class="d-flex flex-row justify-content-center align-items-center h-100">
            <div class="imageHero">
                <img src="{{ asset('image/login-bro.png') }}" alt="">
            </div>
            <div class="login-section">
                <h4>Login</h4>
                <div class="login-form-container">
                    <form action="{{ url('/login') }}" method="post" class="login-form">
                        @csrf
                        <div class="mb-4 d-flex flex-column">
                            <label for="username">Username</label>
                            <input name="username" type="username" class="form-control">
                        </div>
                        <div class="mb-4 d-flex flex-column">
                            <label for="password">Password</label>
                            <input name="password" type="password" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block mb-4">Sign In</button>
                        <div class="d-flex justify-content-center">
                            Belum Punya Akun?
                            <a href="/register" class="ml-2">Daftar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js' )}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js' )}}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/dist/js/adminlte.min.js' )}}"></script>
</body>

</html>