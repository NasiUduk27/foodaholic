@extends('layouts.user')
@section('content')
            <h4>Pesanan Saya</h4>

            @foreach($pesanan as $p)

            <div class="container">
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Qty</th>
                        <th>Gambar</th>
                        <th>Nama Mitra</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>{{ $p->nama_produk }}</td>
                        <td>{{ $p->harga }}</td>
                        <td>{{ $p->qty }}</td>
                        <td><img src="{{ asset('images/fast-food.jpg'. $p->foto_produk) }}" style="max-width: 100px;" alt="Image"></td>
                        <td>{{ $p->nama_mitra }}</td>
                      </tr>
                    </tbody>
                  </table>
                  
                  
              </div>
              

            @endforeach
@endsection