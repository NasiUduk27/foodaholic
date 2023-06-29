@extends('user.template_without_search', ['title' => 'Foodaholic | Keranjang User'])
@section('content')
<div class="container mt-5 mb-5">
    @if($pesanan->count() > 0)
    <form method="POST" action="{{ url('order') }}">
        @csrf
        <?php
            $total = 0;
        ?>
        @foreach($pesanan as $k => $p)
        <div class="p-5 card d-block">
            <h3 class="mb-3">{{$k}}</h3>
            <table width="100%">
                <thead>
                    <th style="width: 15%">Foto</th>
                    <th style="width: 25%">Nama Menu</th>
                    <th style="width: 20%">Harga</th>
                    <th style="width: 20%">Kuantitas</th>
                    </th>
                </thead>
                @foreach($p as $i => $k)
                <tr class="">
                    <input type="hidden" name="produk[]" value="{{ $k->id }}" id="produk_{{ $k->id }}">
                    <input type="hidden" name="qty[]" value="{{ $k->qty }}" id="{{ $k->qty }}">
                    <td><img width="100px" height="100px" class="mt-3 mb-3 image-cover-menu"
                            src="{{ asset('storage/'.$k->foto_produk)}}"></td>
                    <td>{{$k->nama_produk}}</td>
                    <td>Rp. {{$k->harga}},00</td>
                    <td class="cart-product-quantity" width="130px">
                        <div class="input-group quantity">
                            <div class="input-group-prepend decrement-btn" style="cursor: pointer">
                                <span class="input-group-text">-</span>
                            </div>
                            <input type="text" name="qty_{{ $k->id }}" class="qty-input form-control" maxlength="2" max="{{ $k->stok }}" value="{{$k->qty}}">
                            <div class="input-group-append increment-btn" style="cursor: pointer; margin-right:100px">
                                <span class="input-group-text">+</span>
                            </div>
                        </div>
                    </td>
                    <?php
                        $total += $k->harga * $k->qty;
                    ?>
                </tr>
                @endforeach
            </table>
        </div>
        @endforeach
        <div class="d-flex mb-3">
            <div class="ml-auto mt-4 mb-3">
                <p>Total : {{ $total }}</p>
                <button class="button ml-auto btn btn-primary rounded mt-0 mb-3" type="submit">Pesan</button>
            </div>
        </div>
    </form>
    @else
    <td colspan="6" class="text-center">keranjang tidak ada</td>
    </tr>
    @endif
</div>
@endsection

@push('custom_js')
<script>
     $(document).ready(function () {
        $('.increment-btn').click(function (e) {
            e.preventDefault();
            var incre_value = $(this).parents('.quantity').find('.qty-input').val();
            var value = parseInt(incre_value, 10);
            value = isNaN(value) ? 0 : value;
            if(value<10){
                value++;
                $(this).parents('.quantity').find('.qty-input').val(value);
            }

        });

        $('.decrement-btn').click(function (e) {
            e.preventDefault();
            var decre_value = $(this).parents('.quantity').find('.qty-input').val();
            var value = parseInt(decre_value, 10);
            value = isNaN(value) ? 0 : value;
            if(value>1){
                value--;
                $(this).parents('.quantity').find('.qty-input').val(value);
            }
        });

        });
</script>
@endpush