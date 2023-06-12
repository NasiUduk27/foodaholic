<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Doctrine\DBAL\Schema\ForeignKeyConstraint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $total = 0;
        $produk = DB::table('produk')
                ->join('mitra', 'produk.id_mitra', '=', 'mitra.id')
                ->join('keranjang', 'produk.id', '=', 'keranjang.produk_id')
                ->select('produk.*', 'mitra.id as mitra_id', 'mitra.nama_mitra', 'keranjang.qty')
                ->whereIn('produk.id', $request->produk)
                ->get();
        $produk = $produk->groupBy('nama_mitra');
        
        foreach($produk as $k => $p){
            foreach($p as $i => $k){
                $harga = DB::table('produk')->where('id', $k->id)->first()->harga;
                $total += $harga * $k->qty;
            }
            $transaksi = DB::table('transaksi')
                        ->insertGetId(
                            [
                                'id_mitra' => $k->mitra_id,
                                'id_user' => auth()->user()->id,
                                'status' => 1,
                                'total' => $total
                            ]
                        );
            foreach($p as $i => $k){
                $data_transaksi_produk = DB::table('transaksi_produk')
                        ->insert(
                            [
                                'transaksi_id' => $transaksi,
                                'produk_id' => $k->id,
                                'qty' => $k->qty
                            ]
                        );
            }
            $total = 0;
        }
        if($data_transaksi_produk){
            return redirect()->route('user.home')->with('success', 'Pesanan berhasil dibuat');
        }
        return redirect()->route('user.home')->with('failed', 'Pesanan gagal dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }

    public function checkout(Transaksi $transaksi, Request $request){
        // $pesanan = $request->all();
        $pesanan = DB::table('produk')
                    ->join('mitra', 'produk.id_mitra', '=', 'mitra.id')
                    ->join('keranjang', 'produk.id', '=', 'keranjang.produk_id')
                    ->select('produk.*', 'mitra.nama_mitra', 'keranjang.qty')
                    ->whereIn('produk.id', $request->produk)
                    ->get();
                    
        $pesanan = $pesanan->groupBy('nama_mitra');

        return view('user.checkout', compact('pesanan'));
    }
}