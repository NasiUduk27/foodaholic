<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Keranjang;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KeranjangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $keranjang = DB::table('keranjang')
                    ->join('produk', 'keranjang.produk_id', '=', 'produk.id')
                    ->join('mitra', 'produk.id_mitra', '=', 'mitra.id')
                    ->select('keranjang.*', 'mitra.nama_mitra', 'produk.nama_produk', 'produk.harga', 'produk.foto_produk')
                    ->where('keranjang.user_id', auth()->user()->id)
                    ->get();

        $keranjang = $keranjang->groupBy('nama_mitra');

        return view('user.keranjang', compact('keranjang'));
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

    public function add_keranjang(Request $request){
        
        $request->validate([
            'user_id' => 'required',
            'produk_id' => 'required',
        ]);

        // $produk = Produk::where('id', $request->produk_id)->get();

        $stok = DB::table('produk')->where('id', $request->produk_id)->select('stok')->first();
        $stok = $stok->stok;
        if($stok > 0){
            if(Keranjang::where('user_id', $request->user_id)->where('produk_id', $request->produk_id)->exists()){
                $keranjang = Keranjang::where('user_id', $request->user_id)->where('produk_id', $request->produk_id)->first();
                $keranjang->qty = $keranjang->qty + 1;
                $keranjang->save();
                $update_stok = DB::table('produk')->where('id', $request->produk_id)->update(['stok' => DB::raw('GREATEST(stok - 1, 0)')]);
                return response()->json([
                    'data' => $keranjang,
                ]);
            }

            $keranjang = Keranjang::create([
                'user_id' => $request->user_id,
                'produk_id' => $request->produk_id,
                'qty' => 1,
            ]);
            $update_stok = DB::table('produk')->where('id', $request->produk_id)->update(['stok' => 1]);

            return response()->json([
                'data' => $keranjang,
            ]);
        }else{
            return response()->json([
                'data' => 'Stok Habis',
            ]);
        }
    }

    public function delete_keranjang(Request $request){
        
        $request->validate([
            'user_id' => 'required',
            'produk_id' => 'required',
        ]);

        var_dump($request);

        // if(Keranjang::where('user_id', $request->user_id)->where('produk_id', $request->produk_id)->exists()){
        //     $keranjang = Keranjang::where('user_id', $request->user_id)->where('produk_id', $request->produk_id)->first();
        //     $keranjang->qty = $keranjang->qty + 1;
        //     $keranjang->save();
        //     return response()->json([
        //         'data' => $keranjang,
        //     ]);
        // }

        // $keranjang = Keranjang::create([
        //     'user_id' => $request->user_id,
        //     'produk_id' => $request->produk_id,
        //     'qty' => 1,
        // ]);
        
        // return response()->json([
        //     'data' => $keranjang,
        // ]);
    }
}