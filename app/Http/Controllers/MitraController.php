<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Mitra;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

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
        $dataMitra = DB::table('mitra')
                    ->where('user_id', auth()->user()->id)
                    ->get();
        return view('user.daftar-mitra')->with('dataMitra', $dataMitra);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_mitra' => 'required|string|max:255',
            'lokasi' => 'required',
            'detail' => 'required',
            'no_telp' => 'required|min:10|max:14',
            'foto' => 'required',
        ]);
        
        $image_name = NULL;
        
        if($request->file('foto')){
            $image_name = $request->file('foto')->store('image', 'public');
        }

        $mitra = new Mitra;
        $mitra->user_id = auth()->user()->id;
        $mitra->nama_mitra = $request->get('nama_mitra');
        $mitra->foto = $image_name;
        $mitra->lokasi_bisnis = $request->get('lokasi');
        $mitra->detail_mitra = $request->get('detail');
        $mitra->no_telp = $request->get('no_telp');
        $mitra->save();

        return redirect('/daftar-mitra')->with('success', 'Data berhasil ditambahkan');
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

        $user = User::find($mitra->user_id);
        $user->level = 2;
        $user->save();
        return redirect('/admin/mitra/detail/' . $request->id);
    }

    public function view_laporan(){
        $laporan = DB::table('transaksi')
                                        ->join('users', 'users.id', '=', 'transaksi.id_user')
                                        ->select('transaksi.*', 'users.name')
                                        ->where('id_mitra', auth()->user()->id)
                                        ->where('status', '10')
                                        ->get();
        return view('mitra.laporan')->with('laporan', $laporan);
    }   

    public function update_laporan(Request $request){
        $request->validate([
            'tgl_awal' => 'required',
            'tgl_akhir' => 'required',
        ]);
        $tanggal_awal_str = str_replace('/', '-', $request->tgl_awal);
        $tanggal_awal = DateTime::createFromFormat('m-d-Y', $tanggal_awal_str)->format('Y-m-d');
        $tanggal_akhir_str = str_replace('/', '-', $request->tgl_akhir);
        $tanggal_akhir = DateTime::createFromFormat('m-d-Y', $tanggal_akhir_str)->format('Y-m-d');
        $laporan = DB::table('transaksi')
                                        ->join('users', 'users.id', '=', 'transaksi.id_user')
                                        ->select('transaksi.*', 'users.name')
                                        ->where('id_mitra', auth()->user()->id)
                                        ->where('status', '5')
                                        ->whereDate('transaksi.created_at', '>=', $tanggal_awal)
                                        ->whereDate('transaksi.created_at', '<=', $tanggal_akhir)
                                        ->get();
        return view('mitra.laporan', compact(['laporan', 'tanggal_awal', 'tanggal_akhir']));
    }   
}