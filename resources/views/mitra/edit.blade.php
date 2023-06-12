@extends('layouts.template')
@section('sidebar')
@include('layouts.sidebar', array('level' => 'mitra'))
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Datak</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/mitra/') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/mitra/produk') }}">Produk</a></li>
                        <li class="breadcrumb-item active">Tambah Produk</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Hallo</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ url('mitra/edit/'.auth()->user()->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {!! (isset($mitra))? method_field('PUT') : '' !!}
                    <div class="form-group">
                        <label>Nama Mitra</label>
                        <input class="form-control @error('nama_mitra') is-invalid @enderror"
                            value="{{ isset($mitra)? $mitra->nama_mitra : old('nama_mitra') }}" name="nama_mitra"
                            type="text">
                        @error('nama_mitra')
                        <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Lokasi Bisnis</label>
                        <input class="form-control @error('lokasi_bisnis') is-invalid @enderror"
                            value="{{ isset($mitra)? $mitra->lokasi_bisnis : old('lokasi_bisnis') }}" name="lokasi_bisnis" type="text">
                        @error('lokasi_bisnis')
                        <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Detail</label>
                        <input class="form-control @error('detail_mitra') is-invalid @enderror"
                            value="{{ isset($mitra) ? $mitra->detail_mitra : old('detail_mitra') }}" name="detail_mitra" type="text">
                        @error('detail_mitra')
                        <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Foto</label>
                        <img width="150px" src="{{ isset($mitra)? asset('storage/'.$mitra->foto) : ''}}">
                        <input type="file" class="form-control @error('foto') is-invalid @enderror" name="foto">
                        @error('foto')
                        <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
@endsection