@extends('user.template_without_search', ['title' => 'Foodaholic | Keranjang User'])
@section('content')
<div class="container mt-5 mb-5">
    @if($dataMitra->count() == 0)
    <form action="{{ url('/register-mitra') }}" method="post" class="register-form" enctype="multipart/form-data">
        @csrf
        <h4 class="text-center mb-3">Daftar Mitra</h4>
        <div class="mb-4 d-flex flex-column">
            <label for="nama_mitra" class="mb-0 pb-0">Nama Mitra</label>
            <input name="nama_mitra" type="text" class="form-control mt-0 pt-1 pb-1">
        </div>
        <div class="mb-4 d-flex flex-column">
            <label for="lokasi" class="mb-0 pb-0">Lokasi Bisnis</label>
            <input type="text" name="lokasi" class="form-control  mt-0 pt-1 pb-1">
        </div>
        <div class="mb-4 d-flex flex-column">
            <label for="detail" class="mb-0 pb-0">Detail Mitra</label>
            <textarea name="detail" class="form-control"></textarea>
        </div>
        <div class="mb-4 d-flex flex-column">
            <label for="no_telp" class="mb-0 pb-0">No. Telp</label>
            <input name="no_telp" class="form-control">
        </div>
        <div class="mb-4 d-flex flex-column">
            <label for="foto" class="mb-0 pb-0">Foto Mitra</label>
            <input type="file" name="foto" class="form-control  mt-0 pt-1 pb-1">
        </div>
        <button type="submit" class="btn btn-primary btn-block">Daftar</button>
    </form>
    @else
    <div class="container-fluid">
        <td colspan="6" class="text-center">Silahkan menunggu konfirmasi dari tim kami melalui panggilan telfon.</td>
    </div>
    @endif
</div>
@endsection