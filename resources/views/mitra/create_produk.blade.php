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
                    <h1>Tambah/Update Data Produk</h1>
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
                <form action="{{ $url_form }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {!! (isset($produk))? method_field('PUT') : '' !!}
                    <div class="form-group">
                        <label>Nama Produk</label>
                        <input class="form-control @error('nama_produk') is-invalid @enderror"
                            value="{{ isset($produk)? $produk->nama_produk : old('nama_produk') }}" name="nama_produk"
                            type="text">
                        @error('nama_produk')
                        <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <input class="form-control @error('harga') is-invalid @enderror"
                            value="{{ isset($produk)? $produk->harga : old('harga') }}" name="harga" type="text">
                        @error('harga')
                        <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Stok</label>
                        <input class="form-control @error('stok') is-invalid @enderror"
                            value="{{ isset($produk) ? $produk->stok : old('stok') }}" name="stok" type="text">
                        @error('stok')
                        <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Detail Produk</label>
                        <textarea class="form-control @error('detail_produk') is-invalid @enderror" name="detail_produk"
                            type="text">{{ isset($produk)? $produk->detail_produk : old('detail_produk') }}</textarea>
                        @error('detail_produk')
                        <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Batas Ketahanan (Jam)</label>
                        <input class="form-control @error('batas_ketahanan') is-invalid @enderror"
                            value="{{ isset($produk)? $produk->batas_ketahanan : old('batas_ketahanan') }}"
                            name="batas_ketahanan" type="text">
                        @error('batas_ketahanan')
                        <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Foto Makanan</label>
                        <img width="150px" src="{{ isset($produk)? asset('storage/'.$produk->foto_produk) : ''}}">
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