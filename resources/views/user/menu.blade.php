<link rel="stylesheet" href="/css/user.css">
<link href="https://fonts.cdnfonts.com/css/poppins" rel="stylesheet">
<script src="https://kit.fontawesome.com/d4cdca322c.js" crossorigin="anonymous"></script>

<div class="container">
    <h3>Menu Pilihan</h3>
    <div class="card-deck">
        @foreach($produk as $key => $p)
        <div class="card">
            <img class="card-img-top" src="{{  asset('storage/'.$p->foto_produk) }}" alt="Card image cap">
            <a href="{{ url('/search?produk=' . $p->nama_produk) }}" class="card-link">
                <div class="card-img-overlay">
                    <small class="text-muted">{{$p->nama_produk}}</small>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>