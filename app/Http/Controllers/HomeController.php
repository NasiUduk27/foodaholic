<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('homepage');
    }

    public function mitraHome()
    {
        return view('mitra.mitra');
    }

    public function userHome()
    {
        $produk = DB::table('produk')
                ->join('mitra', 'produk.id_mitra', '=', 'mitra.id')
                ->select('produk.*', 'mitra.nama_mitra')
                ->get();
        return view('user.user')->with('produk', $produk);
    }
}