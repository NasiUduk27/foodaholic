@extends('layouts.user')
@section('content')
<h4>
    Pesanan Saya</h4>

@foreach ($pesanan as $key => $p)
@if ($key === 0 || $p->id_mitra !== $pesanan[$key - 1]->id_mitra)
<div class="container">
    <label for="">{{ $p->nama_mitra }}</label>
    @foreach ($pesanan as $item)
    @if ($item->id_mitra === $p->id_mitra)
    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="width: 15%">Nama Mitra</th>
                <th style="width: 20%">Gambar</th>
                <th style="width: 30%">Nama Produk</th>
                <th style="width: 5%">Qty</th>
                <th style="width: 30%">Harga</th>
                <th style="width: 30%">Total</th>
                <th style="width: 10%">Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $p->nama_mitra }}</td>
                <td><img src="{{ asset('storage/' . $p->foto_produk) }}" alt="Image" style="width: 72px;"></td>
                <td>{{ $item->nama_produk }}</td>
                <td>{{ $item->qty }}</td>
                <td>Rp. {{ $item->harga }}</td>
                <td>Rp. {{ $item->harga * $item->qty }}</td>
                <td>
                    @if ($p->status === '0')
                    <span class="badge badge-info">Pesanan Ditolak</span>
                    @elseif($p->status === '1')
                    <span class="badge badge-warning">Menunggu Konfirmasi</span>
                    @elseif($p->status === '2')
                    <span class="badge badge-success">Pesanan Diterima</span>
                    @elseif($p->status === '3')
                    <span class="badge badge-danger">Pesanan Siap</span>
                    @elseif($p->status === '4')
                    <span class="badge badge-primary">Pesanan Selesai(user)</span>
                    @elseif($p->status === '5')
                    <span class="badge badge-danger">Pesanan Selesai</span>
                    @elseif($p->status === '6')
                    <span class="badge badge-danger">Pesanan dibatalkan</span>
                    @endif
                    </>
                </td>
            </tr>
        </tbody>
    </table>
    @endif
    @endforeach
    {{-- @if ($p->status === '0')
                        <span class="badge badge-info">Pesanan Ditolak</span>
                    @elseif($p->status === '1')
                        <span class="badge badge-warning">Menunggu Konfirmasi</span>
                    @elseif($p->status === '2')
                        <span class="badge badge-success">Pesanan Diterima</span>
                    @elseif($p->status === '3')
                        <span class="badge badge-danger">Pesanan Siap</span>
                    @elseif($p->status === '4')
                        <span class="badge badge-primary">Pesanan Selesai(user)</span>
                    @elseif($p->status === '5')
                        <span class="badge badge-danger">Pesanan Selesai</span>
                    @elseif($p->status === '6')
                        <span class="badge badge-danger">Pesanan dibatalkan</span>
                    @endif</> --}}

    @if ($p->status === '3 ')
    <form action="{{ url('/pesanan/edit-status') }}" method="POST" style="display: inline;">
        @csrf
        <input type="hidden" name="id" value="{{ $p->id }}">
        <input type="hidden" name="status" value="4">
        <button type="submit" class="btn btn-primary">Selesai</button>
    </form>
    @endif
</div>
@endif
@endforeach
<link rel="stylesheet" href="{{ asset('css/main.css') }}">
@endsection