@include('navbar')

@php
use Illuminate\Support\Facades\Auth;
@endphp

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link href="https://fonts.cdnfonts.com/css/poppins" rel="stylesheet">
<link rel="stylesheet" href="/css/profile.css">



<div class="container">
    <div class="row">
        <div class="col-sm-4 preview">
            <img src="{{ asset('images/' . $user->foto) }}" alt="">
            <p>Nama : {{$user->name}}</p>
            <p>Email : {{$user->email}}</p>
            <p>Alamat : {{$user->alamat}}</p>
            <p>No. Hp : {{$user->no_hp}}</p>
        </div>
        <div class="card col-sm-8 shadow">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('profile') ? 'active' : '' }}"
                                href="{{ route('profile') }}">Profil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('pesanan') ? 'active' : '' }}" href="{{ route('pesanan') }}">Pesanan Saya</a>
                        </li>
                    </ul>
                </div>
            </nav>

            @yield('content')

        </div>
    </div>

</div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

@include('footer')