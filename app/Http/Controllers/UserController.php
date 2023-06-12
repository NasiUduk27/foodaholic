<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function search(Request $request){

        $cari = $request->produk;
        $produk = DB::table('produk')
                    ->where('nama_produk', 'like', '%'.$cari.'%')
                    ->paginate(12);

        return view('user.result', ['produk' => $produk]);
    }

    public function pesanan(){
        $user = auth()->user();
        $pesanan = DB::table('transaksi')
                    ->join('users', 'users.id', '=', 'transaksi.id_user')
                    ->join('transaksi_produk', 'transaksi_produk.transaksi_id', '=', 'transaksi.id')
                    ->join('produk', 'produk.id', '=', 'transaksi_produk.produk_id')
                    ->join('mitra', 'mitra.id', '=', 'transaksi.id_mitra')
                    ->select('users.username', 'produk.*', 'mitra.nama_mitra', 'transaksi.*', 'transaksi_produk.*')
                    ->where('transaksi.id_user', auth()->user()->id)
                    ->paginate(2);
        return view('user.pesanan', ['pesanan' => $pesanan, 'user' => $user]);
    }
}