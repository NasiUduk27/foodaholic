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
            <p>Nama :</p>
            <p>Email :</p>
            <p>Alamat :</p>
            <p>No. Hp :</p>
        </div>
            <div class="card col-sm-8 shadow">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('profile') ? 'active' : '' }}" href="{{ route('profile') }}">Profil</a>
                            </li>                           
                            <li class="nav-item">
                                <a class="nav-link" href="#">Pesanan Saya</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Keranjang Belanja</a>
                            </li>
                        </ul>
                    </div>
                </nav>

                <h4>Edit Profile</h4>

                <div class="row">
                    <div class="col-md-4">Nama Depan
                        <div class="input-group">
                            <input type="text" class="form-control search-hero" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-4 offset-md-4">Email
                        <div class="input-group">
                            <input type="text" class="form-control search-hero" placeholder="">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">Nama Belakang
                        <div class="input-group">
                            <input type="text" class="form-control search-hero" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-4 offset-md-4">No.Hp
                        <div class="input-group">
                            <input type="text" class="form-control search-hero" placeholder="">
                        </div>
                    </div>
                </div>

                <div class="container">
                    <h4>Foto Profile</h4>
                    <form action="{{ route('profile') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="file" name="profile_image" id="profile_image">
                        </div>

                        <button type="submit">Pilih foto</button>
                    </form>
                </div>

                <h4>Edit Profile</h4>

                <div class="row">
                    <div class="col-md-4">Provinsi
                        <div class="input-group">
                            <input type="text" class="form-control search-hero" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-4 offset-md-4">Kota
                        <div class="input-group">
                            <input type="text" class="form-control search-hero" placeholder="">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">Kecamatan
                        <div class="input-group">
                            <input type="text" class="form-control search-hero" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-4 offset-md-4">Kode Pos
                        <div class="input-group">
                            <input type="text" class="form-control search-hero" placeholder="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">Alamat
                        <div class="input-group">
                            <input type="text" class="form-control search-hero" placeholder="">
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col text-center">
                        <a href="#" class="text-center">Save Profile</a>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

@include('footer')
