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
            <h1>Data user</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Data user</li>
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
          <h3 class="card-title">Data Pengguna</h3>

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
                    <li class="list-group-item"><b>Nama: </b>{{$user->name}}</li>
                    <li class="list-group-item"><b>Username: </b>{{$user->username}}</li>
                    <li class="list-group-item"><b>Email: </b>{{$user->email}}</li>
                    <li class="list-group-item"><b>No. HP: </b>{{$user->no_hp}}</li>
                    <li class="list-group-item"><b>Alamat: </b>{{$user->alamat}}</li>
                </ul>
        </div>

        <div class="card">
        <div class="card-header">
          <h3 class="card-title">Histori Transaksi</h3>

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
                            <th>Nama User</th>
                            <th>Produk</th>
                            <th>Mitra</th>
                            <th>Status</th>
                            <th>Nominal</th>
                            <th>Transaksi Dibuat</th>
                            <th>Transaksi Selesai</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($transaksi->count() > 0)
                        @foreach($transaksi as $m)
                        <tr>
                            <td>{{$m->username}}</td>
                            <td>{{$m->nama_produk}}</td>
                            <td>{{$m->nama_mitra}}</td>
                            <td>{{$m->status}}</td>
                            <td>{{$m->nominal}}</td>
                            <td>{{$m->created_at}}</td>
                            <td>{{$m->updated_at}}</td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="6" class="text-center">Data tidak ada</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
        </div>
        
        <!-- /.card-body -->
        <!-- /.card-body -->
        <div class="card-footer">
          <a href="{{ route('admin.user') }}" class="btn btn-default">Kembali</a>
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
 <link rel="stylesheet" href="{{ asset('css/main.css') }}">

@endsection