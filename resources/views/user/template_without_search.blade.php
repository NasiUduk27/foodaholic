<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Homepage User' }}</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" href="{{asset('css/card_food.css')}}">
    <link href="https://fonts.cdnfonts.com/css/poppins" rel="stylesheet">

    <style>
        .main-content {
            min-height: calc(100vh - 155px - 152px);
        }

    </style>
</head>

<body>
    @include('navbar')

    <div class="main-content">
    @yield('content')
</div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    @include('footer')
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js' )}}"></script>
</body>

</html>