@extends('layouts.user')
@section('content')
        <form method="post" enctype="multipart/form-data" action="{{ url('profile/'.auth()->user()->id) }}">
            @csrf
            @method('PUT')
            <h4>Edit Profile</h4>

            <div class="row">
                <div class="col-md-4">Username
                    <div class="input-group">
                        <input type="text" value="{{ $user->username }}" class="form-control search-hero"
                            placeholder="" name="username">
                    </div>
                </div>
                <div class="col-md-4 offset-md-4">Email
                    <div class="input-group">
                        <input type="text" value="{{ $user->email }}" class="form-control search-hero" placeholder="" name="email">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">Nama Lengkap
                    <div class="input-group">
                        <input type="text" value="{{ $user->name }}" class="form-control search-hero" placeholder="" name="name">
                    </div>
                </div>
                <div class="col-md-4 offset-md-4">No.Hp
                    <div class="input-group">
                        <input type="text" value="{{ $user->no_hp }}" class="form-control search-hero" placeholder="" name="no_hp">
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col">Alamat
                    <div class="input-group">
                        <input type="text" value="{{ $user->alamat }}" class="form-control search-hero" placeholder="" name="alamat">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">Foto Profile
                    <div class="form-group">
                        <input type="file" name="profile_image" id="profile_image">
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col text-center">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
@endsection