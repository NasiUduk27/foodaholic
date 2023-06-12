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
                        <li class="breadcrumb-item active">Data mitra</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <form method="GET" action="{{ route('admin.mitra') }}">
            <div class="input-group mb-3">
                <input type="text" name="search" class="form-control" placeholder="Cari Mitra"
                    value="{{ request()->query('search') }}">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                </div>
            </div>
        </form>

        @if(session()->has('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tabel Mitra</h3>

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

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Mitra</th>
                            <th>Lokasi</th>
                            <th>Detail</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($mitra->count() > 0)
                        @foreach($mitra as $i => $m)
                        <tr>
                            <td>{{$i + $mitra->firstItem() }}</td>
                            <td>{{$m->nama_mitra}}</td>
                            <td>{{$m->lokasi_bisnis}}</td>
                            <td>{{$m->detail_mitra}}</td>
                            <td>
                                @if($m->status_verifikasi == 0)
                                <span class="badge badge-warning">Belum Diverifikasi</span>
                                @elseif($m->status_verifikasi == 1)
                                <span class="badge badge-success">Diterima</span>
                                @elseif($m->status_verifikasi == 2)
                                <span class="badge badge-danger">Ditolak</span>
                                @endif
                            </td>
                            <td>
                                @if($m->status_verifikasi != 0)
                                <a href="{{ url('/admin/mitra/produk/'. $m->id) }}"
                                    class="btn btn-sm btn-warning">Produk</a>
                                @endif
                                <a href="{{ url('/admin/mitra/detail/'.$m->id) }}"
                                    class="btn btn-sm btn-primary">Detail</a>
                                <form method="POST" action="{{ url('/admin/mitra/delete'.$m->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        onclick="return confirm('Apakah anda yakin ingin menghapus data {{ $m->nama_mitra }}?')"
                                        class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="6" class="text-center">Data tidak ada</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
                {{ $mitra->links() }}

            </div>
            <!-- /.card -->

    </section>
    <!-- /.content -->
</div>


@endsection