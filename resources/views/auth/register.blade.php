<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Foodaholic | Register</title>

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
                <img src="{{ asset('images/register-bro.png') }}" alt="">
            </div>
            <div class="">
                <div class="register-form-container">
                    <form action="{{ url('/register') }}" method="post" class="register-form">
                        <h4 class="text-center mb-3">Register</h4>
                        @csrf
                        <div class="mb-4 d-flex flex-column">
                            <label for="username" class="mb-0 pb-0">Username</label>
                            <input name="username" type="username" class="form-control mt-0 pt-1 pb-1">
                        </div>
                        <div class="mb-4 d-flex flex-column">
                            <label for="name" class="mb-0 pb-0">Name</label>
                            <input type="name" name="name" class="form-control  mt-0 pt-1 pb-1">
                        </div>
                        <div class="mb-4 d-flex flex-column">
                            <label for="email" class="mb-0 pb-0">Email</label>
                            <input type="email" name="email" class="form-control  mt-0 pt-1 pb-1">

                        </div>
                        <div class="mb-4 d-flex flex-column">
                            <label for="password" class="mb-0 pb-0">Password</label>
                            <input type="password" name="password" class="form-control  mt-0 pt-1 pb-1">

                        </div>
                        <div class="mb-4 d-flex flex-column">
                            <label for="password_confirmation" class="mb-0 pb-0">Konfirmasi Password</label>
                            <input type="password" name="password_confirmation" class="form-control  mt-0 pt-1 pb-1">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                        Sudah Punya Akun?

                        <a href="/login">Masuk</a>
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