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
                    <h1>Data User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Data User</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <form method="GET" action="{{ route('admin.user') }}">
        <div class="input-group mb-3">
            <input type="text" name="search" class="form-control" placeholder="Cari User" value="{{ request()->query('search') }}">
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
                            <th>Nama </th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Alamat</th>
                            <th>No. HP</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($user->count() > 0)
                        @foreach($user as $i => $m)
                        <tr>
                            <td>{{$i + $user->firstItem() }}</td>
                            <td>{{$m->name}}</td>
                            <td>{{$m->username}}</td>
                            <td>{{$m->email}}</td>
                            <td>{{$m->alamat}}</td>
                            <td>{{$m->no_hp}}</td>
                            <td>
                                <a href="{{ url('/admin/user/detail/'.$m->id) }}" class="btn btn-sm btn-primary">Detail</a>
                                <form method="POST" action="{{ url('admin/user/delete/'.$m->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Apakah anda yakin ingin menghapus data {{ $m->name }}?')" class="btn btn-sm btn-danger">Hapus</button>
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
                {{ $user->links() }}

            </div>
            <!-- /.card -->

    </section>
    <!-- /.content -->
</div>


@endsection