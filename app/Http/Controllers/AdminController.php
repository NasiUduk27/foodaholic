<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::select(DB::raw('count(*) as user'))->whereYear('created_at',date('Y'))
        ->groupBy(DB::raw("Month(created_at)"))
        ->pluck('user');
        // var_dump($user);
        // die();
            return view('admin.home', compact('user'));
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

    public function mitra(Request $request)
    {
        $search = $request->query('search');

        $mitra = Mitra::where('nama_mitra', 'LIKE', "%{$search}%")
            ->orderBy('id', 'DESC')
            ->paginate(10)->withQueryString();

        return view('admin.mitra', compact('mitra'));
    }

    public function detail_mitra($id)
    {
        $mitra = Mitra::find($id);
        return view('admin.detail_mitra', ['mitra' => $mitra]);
    }

    public function show_produk($id)
    {
        $produk = Produk::where('id_mitra', $id)->first();
        $paginate = Produk::paginate(5);
        return view('admin.produk', ['produk' => $produk, 'paginate' => $paginate]);
    }

    public function transaksi()
    {
        // $transaksi = Transaksi::with('user')->paginate(5);
        $transaksi = DB::table('transaksi')
                    ->join('users', 'users.id', '=', 'transaksi.id_user')
                    ->join('transaksi_produk', 'transaksi_produk.transaksi_id', '=', 'transaksi.id')
                    ->join('produk', 'produk.id', '=', 'transaksi_produk.produk_id')
                    ->join('mitra', 'mitra.id', '=', 'transaksi.id_mitra')
                    ->select('users.username', 'produk.nama_produk', 'mitra.nama_mitra', 'transaksi.*')
                    ->paginate(5);
        return view('admin.transaksi', ['transaksi' => $transaksi]);
    }

    public function show_user(Request $request)
    {
        $search = $request->query('search');

        $user = User::where('name', 'LIKE', "%{$search}%")
            ->where('level', '1')
            ->orderBy('id', 'DESC')
            ->paginate(10)->withQueryString();
        return view('admin.user', ['user' => $user]);
    }

    public function detail_user($id)
    {
        $user = User::find($id);
        $transaksi = DB::table('transaksi')
                    ->join('users', 'users.id', '=', 'transaksi.id_user')
                    ->join('produk', 'produk.id', '=', 'transaksi.id_produk')
                    ->join('mitra', 'mitra.id', '=', 'transaksi.id_mitra')
                    ->select('users.username', 'produk.nama_produk', 'mitra.nama_mitra', 'transaksi.*')
                    ->where('transaksi.id_user', $id)
                    ->paginate(5);
        return view('admin.detail_user', ['user' => $user, 'transaksi' => $transaksi]);
    }

    public function delete_user($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/admin/user');
    }

    public function delete_mitra($id)
    {
        $mitra = Mitra::find($id);
        $mitra->delete();
        return redirect('/admin/mitra');
    }
}