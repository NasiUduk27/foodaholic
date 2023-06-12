@extends('layouts.user')
@section('content')
            <h4>Pesanan Saya</h4>

            @foreach($pesanan as $p)

            <div class="container">
                <h4>{{ $p->nama_mitra }}</h4>
                <img src="{{ asset('images/'. $p->foto_produk) }}" alt="Image">
                <p>{{ $p->nama_produk }}</p>
                <p>{{ $p->harga }}</p>
                <p>{{ $p->qty }}</p>

            </div>

            @endforeach
@endsection