<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Mitra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MitraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('mitra.mitra');
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
        $mitra = auth()->user();
        return view('mitra.edit', compact('mitra'));
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
        $request->validate([
            'nama_mitra' => 'required|string|max:255',
            'lokasi_bisnis' => 'required|string|max:255',
            'detail_mitra' => 'string|max:255',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $mitra = Mitra::find(auth()->user()->id);
        $mitra->nama_mitra = $request->get('nama_mitra');
        $mitra->lokasi_bisnis = $request->get('lokasi_bisnis');
        $mitra->detail_mitra = $request->get('detail_mitra');

        if($mitra->foto && file_exists(storage_path('app/public/' . $mitra->foto))){
            Storage::delete('public/' . $mitra->foto);
        }
        
        $image_name = NULL;
        if($request->file('foto')){
            $image_name = $request->file('foto')->store('image', 'public');
            $mitra->foto = $image_name;
        }
        $mitra->save();
        return view('mitra.edit', compact('mitra'));

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
    
    
    public function edit_verifikasi(Request $request){
        $request->validate([
            'id' => 'required',
            'status' => 'required',
        ]);
        $mitra = Mitra::find($request->id);
        $mitra->status_verifikasi = $request->status;
        $mitra->save();
        return redirect('/admin/mitra/detail/' . $request->id);
    }
}