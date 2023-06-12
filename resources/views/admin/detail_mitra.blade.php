@extends('layouts.template')
@section('sidebar')
@include('layouts.sidebar', array('level' => 'admin'))
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Mitra</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Data Mitra</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tabel Mitras</h3>

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
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>Nama: </b>{{$mitra->nama_mitra}}</li>
                    <li class="list-group-item"><b>Lokasi Bisnis: </b>{{$mitra->lokasi_bisnis}}</li>
                    <li class="list-group-item"><b>Detail Mitra: </b>{{$mitra->detail_mitra}}</li>
                    <li class="list-group-item">
                        <b>Status: </b>
                        @if ($mitra->status_verifikasi == 0)
                        <b>Belum Diverifikasi</b>
                        @elseif ($mitra->status_verifikasi == 1)
                        <b>Diverifikasi</b>
                        @elseif ($mitra->status_verifikasi == 2)
                        <b>Ditolak</b>
                        @endif
                    </li>
                </ul>
            </div>
            @if ($mitra->status_verifikasi == 0)
            <form action="{{ url('/admin/mitra/verifikasi') }}" method="POST" style="display: inline;">
                @csrf
                <input type="hidden" name="id" value="{{ $mitra->id}}">
                <input type="hidden" name="status" value="1">
                <button type="submit" class="btn btn-sm btn-warning custom-btn">Terima Verifikasi</button>
            </form>
            <form action="{{ url('/admin/mitra/verifikasi') }}" method="POST" style="display: inline;">
                @csrf
                <input type="hidden" name="id" value="{{ $mitra->id}}">
                <input type="hidden" name="status" value="2">
                <button type="submit" class="btn btn-sm btn-danger custom-btn">Tolak Verifikasi</button>
            </form>
            @else
            <form action="{{ url('/admin/mitra/verifikasi') }}" method="POST" style="display: inline;">
                @csrf
                <input type="hidden" name="id" value="{{ $mitra->id}}">
                <input type="hidden" name="status" value="2">
                <button type="submit" class="btn btn-sm btn-danger custom-btn">Hapus Verifikasi</button>
            </form>
            @endif

            <!-- /.card-body -->
            <!-- /.card-body -->
            <div class="card-footer">
                <a href="{{ url('/admin/mitra') }}" class="btn btn-default">Kembali</a>
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<link rel="stylesheet" href="{{ asset('css/main.css') }}">

@endsection