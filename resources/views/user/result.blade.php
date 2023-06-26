@extends('user.catalog')
@section('content')
<div class="container mt-5 mb-5 main-content">
    <div class="row">
        <div class="col-12">
            @if($produk->count() > 0)
            @foreach($produk as $i => $p)
            <div class="col-md-4 mb-0">
                <div class="card">
                    <div class="row no-gutters">
                        <div class="col-md-6">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <i class="fa-regular fa-heart"></i>
                                    <div>
                                        <p class="d-none" id="id_produk">{{$p->id}}</p>
                                        <i class="fa-solid fa-star" style="color: #fdbf2d;"></i>
                                        <span>{{$p->rating}}</span>
                                    </div>
                                </div>
                                <div class="mt-auto">
                                    <h5 class="card-title">{{$p->nama_produk}}</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">Rp. {{$p->harga}}</h6>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card-body">
                                <div class="text-center">
                                    <form action="{{ url('keranjang/add') }}" class="p-0 m-0" method="POST"
                                        id="form_keranjang">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ auth()->user()->id}}">
                                        <input type="hidden" name="produk_id" value="{{$p->id}}">
                                        <img src="{{asset('storage/' . $p->foto_produk)}}" class="card-img"
                                            alt="Food Image 1">
                                        <button type="submit" class="btn btn-secondary mt-4">+ Keranjang</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
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
                alert('Selamat, menu berhasil ditambahkan ke keranjang!')
                console.log(data);
            }
        });
    });
});
</script>
@endpush