@extends('layouts.user')
@section('content')
            <h4>Edit Profile</h4>

            <div class="row">
                <div class="col-md-4">Username
                    <div class="input-group">
                        <input type="text" value="{{ $user->username }}" class="form-control search-hero"
                            placeholder="">
                    </div>
                </div>
                <div class="col-md-4 offset-md-4">Email
                    <div class="input-group">
                        <input type="text" value="{{ $user->email }}" class="form-control search-hero" placeholder="">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">Nama Lengkap
                    <div class="input-group">
                        <input type="text" value="{{ $user->name }}" class="form-control search-hero" placeholder="">
                    </div>
                </div>
                <div class="col-md-4 offset-md-4">No.Hp
                    <div class="input-group">
                        <input type="text" value="{{ $user->no_hp }}" class="form-control search-hero" placeholder="">
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

@endsection