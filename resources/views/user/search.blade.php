<link rel="stylesheet" href="/css/user.css">
<link href="https://fonts.cdnfonts.com/css/poppins" rel="stylesheet">
<script src="https://kit.fontawesome.com/d4cdca322c.js" crossorigin="anonymous"></script>

<div class="container">
    <form action="{{ url('/search') }}" method="GET" class="d-flex mb-4" role="search">
        <div class="input-group">
            <input type="text" class="form-control search-user" name="produk" placeholder="Cari menu makanan..."
                aria-label="Search" aria-describedby="searchButton">
        </div>
        <div class="input-group-append">
            <button type="submit" class="input-group-text"><i class="fas fa-search"></i></button>
        </div>
    </form>
</div>