<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Produk::with('mitra')->get()->where('id_mitra', auth()->user()->id);
        return view('mitra.produk', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mitra.create_produk', ['url_form' => url('/mitra/produk')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validasi
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required',
            'stok' => 'required',
            'detail_produk' => 'required',
            'batas_ketahanan' => 'required',
            'foto' => 'required',
        ]);
        
        $image_name = NULL;
        
        if($request->file('foto')){
            $image_name = $request->file('foto')->store('image', 'public');
        }

        $produk = new Produk;
        $produk->id_mitra = auth()->user()->id; //id mitra
        $produk->nama_produk = $request->get('nama_produk');
        $produk->harga = $request->get('harga');
        $produk->stok = $request->get('stok');
        $produk->detail_produk = $request->get('detail_produk');
        $produk->batas_ketahanan = $request->get('batas_ketahanan');
        $produk->foto_produk = $image_name;
        $produk->save();
        
        // Jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect('/mitra/produk')
            ->with('success', 'Produk Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produk = Produk::where('id', $id)->first();

        return view('mitra.detail_produk', ['produk' => $produk]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produk = Produk::where('id', $id)->first();
        return view('mitra.create_produk')
            ->with('produk', $produk)
            ->with('url_form', url('/mitra/produk/' . $id));
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
        //validasi
        
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required',
            'stok' => 'required',
            'detail_produk' => 'required',
            'batas_ketahanan' => 'required',
        ]);

        $produk = Produk::find($id);
        $produk->nama_produk = $request->get('nama_produk');
        $produk->harga = $request->get('harga');
        $produk->stok = $request->get('stok');
        $produk->detail_produk = $request->get('detail_produk');
        $produk->batas_ketahanan = $request->get('batas_ketahanan');

        if($produk->foto_produk && file_exists(storage_path('app/public/' . $produk->foto_produk))){
            Storage::delete('public/' . $produk->foto_produk);
        }
        
        $image_name = NULL;
        if($request->file('foto')){
            $image_name = $request->file('foto')->store('image', 'public');
            $produk->foto_produk = $image_name;
        }

        $produk->save();
        
        // Jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect('/mitra/produk')
            ->with('success', 'Produk Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Produk::where('id', '=', $id)->delete();
        return redirect('/mitra/produk')
        ->with('success', 'Produk Berhasil Dihapus');
    }
}