<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Laporan Transaksi</h3>
            </div>
            <div class="card-body">

                <table class="table table-bordered table-striped" border="1">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Produk</th>
                            <th>Mitra</th>
                            <th>Status</th>
                            <th>Nominal</th>
                            <th>Transaksi Dibuat</th>
                            <th>Terakhir Diubah</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($transaksi->count() > 0)
                        @foreach($transaksi as $key => $m)
                        @if($key === 0 || $m->id !== $transaksi[$key - 1]->id || $m->status === '5' || $m->status ===
                        '6')
                        <tr>
                            <td>{{$m->username}}</td>
                            <td>
                                @foreach($transaksi as $item)
                                @if($item->username === $m->username)
                                {{$item->nama_produk}},<br>
                                @endif
                                @endforeach
                            </td>
                            <td>{{$m->nama_mitra}}</td>
                            <td>
                                @if($m->status === '0')
                                <span class="badge badge-info">Pesanan ditolak</span>
                                @elseif($m->status === '1')
                                <span class="badge badge-warning">Menunggu Konfirmasi</span>
                                @elseif($m->status === '2')
                                <span class="badge badge-success">Pesanan Diterima</span>
                                @elseif($m->status === '3')
                                <span class="badge badge-danger">Pesanan Siap</span>
                                @elseif($m->status === '4')
                                <span class="badge badge-primary">Pesanan Selesai(user)</span>
                                @elseif($m->status === '5')
                                <span class="badge badge-danger">Pesanan Selesai</span>
                                @elseif($m->status === '6')
                                <span class="badge badge-danger">Pesanan dibatalkan</span>
                                @endif
                            </td>
                            <td>{{$m->total}}</td>
                            <td>{{$m->created_at}}</td>
                            <td>{{$m->updated_at}}</td>
                        </tr>
                        @endif
                        @endforeach
                        @else
                        <tr>
                            <td colspan="6" class="text-center">Data tidak ada</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <!-- /.card-body -->

            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>