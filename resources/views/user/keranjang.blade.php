@extends('user.template_without_search', ['title' => 'Foodaholic | Keranjang User'])
@section('content')
<div class="container mt-5 mb-5">
    @if($keranjang->count() > 0)
    <form method="POST" action="{{ url('checkout') }}" clas>
        @csrf
        @foreach($keranjang as $k => $p)
        <div class="p-5 card d-block">
            <h3 class="mb-3">{{$k}}</h3>
            <table width="100%">
                <thead>
                    <th style="width: 5%"></th>
                    <th style="width: 15%">Foto</th>
                    <th style="width: 25%">Nama Menu</th>
                    <th style="width: 20%">Harga</th>
                    <th style="width: 20%">Kuantitas</th>
                    </th>
                </thead>
                @foreach($p as $i => $k)
                <tr class="">
                    <td><input type="checkbox" name="produk[]" value="{{ $k->produk_id }}"
                            id="produk_{{ $k->produk_id }}"></td>
                    <td><img width="100px" height="100px" class="mt-3 mb-3 image-cover-menu"
                            src="{{ asset('storage/'.$k->foto_produk)}}"></td>
                    <td>{{$k->nama_produk}}</td>
                    <td>Rp. {{$k->harga}},00</td>
                    <td class="p-5">{{$k->qty}}</td>
                </tr>
                @endforeach
            </table>
        </div>
        @endforeach
        <div class="d-flex">
            <button class="button ml-auto btn btn-primary rounded" type="submit">Checkout</button>
        </div>
    </form>
    @else
    <td colspan="6" class="text-center">Keranjang tidak ada</td>
    </tr>
    @endif
</div>
@endsection
<!-- @push('custom_js')
<script>
$(document).ready(function() {
    $('#form_keranjang').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            method: "POST",
            data: $(this).serialize(),
            success: function(data) {
                alert('Menu berhasil dihapus!')
            }
        });
    });
});
</script>
@endpush -->