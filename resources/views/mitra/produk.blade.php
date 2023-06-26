@extends('layouts.template', ['title' => 'Foodaholic | Produk Mitra'])
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
                    <h1>Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
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

                <a href="{{url('/mitra/produk/create')}}" class="btn btn-sm btn-success my-2">Tambah Produk</a>

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Makanan</th>
                            <th>Harga</th>
                            <th>Rating</th>
                            <th>Stok</th>
                            <th>Batas Ketahanan (Jam)</th>
                            <th>Foto</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($data->count() > 0)
                        @foreach($data as $i => $p)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$p->nama_produk}}</td>
                            <td>{{$p->harga}}</td>
                            <td>{{$p->rating}}</td>
                            <td>{{$p->stok}}</td>
                            <td>{{$p->batas_ketahanan}}</td>
                            <td><img width="100px" height="100px" src="{{ asset('storage/'.$p->foto_produk)}}">
                            </td>
                            <td class="d-flex">
                                <a href="{{ url('/mitra/produk/'. $p->id) }}" class="btn btn-sm btn-info mx-2">Show</a>

                                <a href="{{ url('/mitra/produk/'. $p->id.'/edit') }}"
                                    class="btn btn-sm btn-primary mx-2">Edit</a>

                                <form method="POST" action="{{ url('/mitra/produk/'.$p->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger mx-2">Delete</button>
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
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
@endsection