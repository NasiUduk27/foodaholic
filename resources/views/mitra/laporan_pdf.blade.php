<link rel="stylesheet" href="{{ public_path('assets/dist/css/adminlte.min.css') }}">
<h2 class="w-100 text-center mt-5">Laporan Pendapatan Toko {{ auth()->user()->username }}</h2>
<h3 class="w-100 text-center mt-5">{{ $tanggal_awal }} - {{ $tanggal_akhir }}</h3>
<hr>
<table class="w-100" border="1">
    <thead>
        <th class="p-2" style="width: 50%;">Nama Pembeli</th>
        <th class="p-2" style="width: 25%;">Tanggal Transaksi</th>
        <th class="p-2" style="width: 25%;">Harga Total</th>
    </thead>
    <tbody>
        <?php
                            $total = 0;
                            ?>
        @foreach($laporan as $i => $p)
        <?php
                                $total += $p->total;
                            ?>
        <td class="p-2">{{$p->name}}</td>
        <td class="p-2">{{$p->created_at}}</td>
        <td class="p-2">{{$p->total}}</td>
        @endforeach
    </tbody>
</table>
<hr>
<table class="w-100" border="1">
    <thead>
        <th style="width: 50%;"></th>
        <th style="width: 25%;"></th>
        <th style="width: 25%;"></th>
    </thead>
    <tbody>
        <td></td>
        <td class="p-2">Total Pendapatan :</td>
        <td class="p-2"> {{ $total }}</td>
    </tbody>
</table>
<hr>