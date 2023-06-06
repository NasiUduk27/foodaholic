@extends('user.catalog')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            @if($produk->count() > 0)
            @foreach($produk as $i => $p)
            <div class="card" style="width: 18rem;">
                <img src="{{asset('storage/' . $p->foto_produk)}}" class="card-img-top">
                <div class="card-body">
                    <p class="d-none" id="id_produk">{{$p->id}}</p>
                    <h5 class="card-title">{{$p->nama_produk}}</h5>
                    <p class="card-text">{{$p->detail_produk}}</p>
                    <form action="{{ url('keranjang/add') }}" method="POST" id="form_keranjang">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id}}">
                        <input type="hidden" name="produk_id" value="{{$p->id}}">
                        <button type="submit" class="btn btn-primary">Tambahkan ke Keranjang</button>
                    </form>
                </div>
            </div>
            @endforeach
            @else
            <tr>
                <td colspan="6" class="text-center">Data tidak ada</td>
            </tr>
            @endif
        </div>
    </div>
</div>
@endsection
@push('custom_js')
<script>
$(document).ready(function() {
    $('#form_keranjang').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            method: "POST",
            data: $(this).serialize(),
            success: function(data) {
                console.log(data);
            }
        });
    });
});
</script>
@endpush