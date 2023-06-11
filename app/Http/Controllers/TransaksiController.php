<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
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
        $transaksi = DB::table('transaksi')
                    ->join('users', 'users.id', '=', 'transaksi.id_user')
                    ->join('transaksi_produk', 'transaksi_produk.transaksi_id', '=', 'transaksi.id')
                    ->join('produk', 'produk.id', '=', 'transaksi_produk.produk_id')
                    ->join('mitra', 'mitra.id', '=', 'transaksi.id_mitra')
                    ->select('users.username', 'produk.nama_produk', 'mitra.nama_mitra', 'transaksi.*')
                    ->where('transaksi.id_mitra', auth()->user()->id)
                    ->paginate(5);
        return view('mitra.pesanan', ['transaksi' => $transaksi]);
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
        //
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

    

    public function riwayat_pesanan(){
        $transaksi = DB::table('transaksi')
                    ->join('users', 'users.id', '=', 'transaksi.id_user')
                    ->join('transaksi_produk', 'transaksi_produk.transaksi_id', '=', 'transaksi.id')
                    ->join('produk', 'produk.id', '=', 'transaksi_produk.produk_id')
                    ->join('mitra', 'mitra.id', '=', 'transaksi.id_mitra')
                    ->select('users.username', 'produk.nama_produk', 'mitra.nama_mitra', 'transaksi.*, transaksi_produk.*')
                    ->where('transaksi.id_mitra', auth()->user()->id)
                    ->where('transaksi.updated_at', '!=', null)
                    ->paginate(5);
        return view('mitra.riwayat_pesanan', ['transaksi' => $transaksi]);
    }

    public function edit_status(Request $request){
        $request->validate([
            'id' => 'required',
            'status' => 'required'
        ]);
        $transaksi = Transaksi::find($request->id);
        $transaksi->status = $request->status;
        $transaksi->save();
        return redirect('/mitra/pesanan');
    }
}
