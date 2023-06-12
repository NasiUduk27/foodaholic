@extends('user.template_without_search', ['title' => 'Foodaholic | Keranjang User'])
@section('content')
<div class="container mt-5 mb-5">
    @if($pesanan->count() > 0)
    <form method="POST" action="{{ url('order') }}">
        @csrf
        @foreach($pesanan as $k => $p)
        <div class="p-5">
            <h2>{{$k}}</h2>
            @foreach($p as $i => $k)
            <tr>
                <input type="hidden" name="produk[]" value="{{ $k->id }}" id="produk_{{ $k->id }}">
                <input type="hidden" name="qty[]" value="{{ $k->qty }}" id="{{ $k->qty }}">
                <td>{{$k->nama_produk}}</td>
                <td>{{$k->foto_produk}}</td>
                <td>{{$k->harga}}</td>
                <td>{{$k->qty}}</td>
                <br>
            <tr>
                @endforeach
        </div>
        @endforeach

        <button type="submit">Pesan</button>
    </form>
    @else
    <td colspan="6" class="text-center">keranjang tidak ada</td>
    </tr>
    @endif
</div>
@endsection