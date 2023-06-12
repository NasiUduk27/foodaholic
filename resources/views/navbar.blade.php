@php
use Illuminate\Support\Facades\Auth;
@endphp

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">



<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('images/logo.png') }}" alt="Logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/about_us">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/pesanan">Pesanan Saya</a>
                </li>
            </ul>



            <div class="ml-auto">
                <ul class="navbar-nav">
                    @if (Auth::check())
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="/logout">
                            Logout
                        </a>
                    </li>
                    @endif

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('keranjang') }}">
                            <img src="{{ asset('images/cart.png') }}" alt="Cart">
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('profile') }}">
                            <img src="{{ asset('images/user.png') }}" alt="User" class="rounded-circle" width="30">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>