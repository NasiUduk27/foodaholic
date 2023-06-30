@extends('layouts.template', ['title' => 'Foodaholic | Laporan Mitra'])
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
                    <h1>Laporan Pendapatan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Laporan</li>
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
                <h3 class="card-title">Laporan Pendapatan</h3>

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
                @if($laporan->count() > 0)
                <div class="d-flex px-5 py-2">
                    <div class="d-flex align-items-center justify-content-center">
                        <form action="{{ url('/mitra/laporan') }}" method="POST"
                            class="d-flex align-items-center justify-content-center">
                            @csrf
                            <p class="my-auto">Tanggal Awal: <input name="tgl_awal" type="text" id="datepicker1">
                            </p>
                            <p class="ml-4 my-auto">Tanggal Akhir: <input name="tgl_akhir" type="text" id="datepicker2">
                            </p>
                            <button type="submit" class="btn btn-primary ml-5">Tampilkan</button>
                        </form>
                    </div>
                </div>
                <div class="px-5">
                    <h2 class="w-100 text-center mt-5">Laporan Pendapatan Toko {{ auth()->user()->username }}</h2>
                    <hr>
                    <table class="w-100" border="1">
                        <thead>
                            <th class="p-2" style="width: 50%;">Nama Pembeli</th>
                            <th class="p-2" style="width: 25%;">Tanggal Transaksi</th>
                            <th class="p-2" style="width: 25%;">Harga Total</th>
                        </thead>
                        <tbody>
                            <?php
                            $total = 0;
                            ?>
                            @foreach($laporan as $i => $p)
                            <?php
                                $total += $p->total;
                            ?>
                            <td class="p-2">{{$p->name}}</td>
                            <td class="p-2">{{$p->created_at}}</td>
                            <td class="p-2">{{$p->total}}</td>
                            @endforeach
                        </tbody>
                    </table>
                    <hr>
                    <table class="w-100" border="1">
                        <thead>
                            <th style="width: 50%;"></th>
                            <th style="width: 25%;"></th>
                            <th style="width: 25%;"></th>
                        </thead>
                        <tbody>
                            <td></td>
                            <td class="p-2">Total Pendapatan :</td>
                            <td class="p-2"> {{ $total }}</td>
                        </tbody>
                    </table>
                    <hr>
                    <form action="{{ url('/mitra/laporan/cetak') }}" method="POST">
                        @csrf
                        <p>{{$tanggal_akhir}}</p>
                        <input type="hidden" value="{{ $tanggal_awal }}" name="awal">
                        <input type="hidden" value="{{ $tanggal_akhir }}" name="akhir">
                        <button type="submit" class="w-100 mb-4 btn btn-success">
                            Cetak Laporan
                        </button>
                    </form>
                    @else
                    <div class="d-flex px-5 py-2">
                        <div class="d-flex align-items-center justify-content-center">
                            <form action="{{ url('/mitra/laporan') }}" method="POST"
                                class="d-flex align-items-center justify-content-center">
                                @csrf
                                <p class="my-auto">Tanggal Awal: <input name="tgl_awal" type="text" id="datepicker1">
                                </p>
                                <p class="ml-4 my-auto">Tanggal Akhir: <input name="tgl_akhir" type="text"
                                        id="datepicker2">
                                </p>
                                <button type="submit" class="btn btn-primary ml-5">Tampilkan</button>
                            </form>
                        </div>
                    </div>
                    <div class="px-5">
                        <h2 class="w-100 text-center mt-5">Laporan Pendapatan Toko {{ auth()->user()->username }}</h2>
                        <hr>
                        <table class="w-100" border="1">
                            <thead>
                                <th class="p-2" style="width: 50%;">Nama Pembeli</th>
                                <th class="p-2" style="width: 25%;">Tanggal Transaksi</th>
                                <th class="p-2" style="width: 25%;">Harga Total</th>
                            </thead>
                            <tbody>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tbody>
                        </table>
                        <hr>
                        <table class="w-100" border="1">
                            <thead>
                                <th style="width: 50%;"></th>
                                <th style="width: 25%;"></th>
                                <th style="width: 25%;"></th>
                            </thead>
                            <tbody>
                                <td></td>
                                <td class="p-2">Total Pendapatan : </td>
                                <td></td>
                            </tbody>
                        </table>
                        <hr>
                        <a class="w-100 btn btn-success" href="{{ url('/mitra/laporan/cetak') }}">
                            Cetak Laporan
                        </a>
                        @endif
                    </div>
                </div>
                <!-- /.card-body -->
                <!-- /.card-body -->
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->

    </section>
    <!-- /.content -->
</div>

@endsection
@push('scripts')
<script>
$(function() {
    $("#datepicker1").datepicker({
        maxDate: "0"
    });
    $("#datepicker2").datepicker({
        maxDate: "0"
    });
});
</script>
@endpush