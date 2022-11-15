<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\TransaksiPeminjaman;
use App\Barang;
use App\Peminjam;
use Carbon\Carbon;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   // public function index()
    //{
        //
		//return view('about');
    //}
	
	public function index(Request $request)
    {
       
		$cari = $request->get('search');

        $semua_transaksi = DB::table('tr_peminjaman_barang')
                        ->join('ms_barang', 'tr_peminjaman_barang.barang_id', '=', 'ms_barang.id')
                        ->select('tr_peminjaman_barang.*', 'ms_barang.*')
                        ->where('tr_peminjaman_barang.bulan', 'LIKE', '%'.$cari.'%')
						->orderby('tr_peminjaman_barang.id','desc')
                        ->paginate(5);
						
		$semua_barang = Barang::orderBy('id','DESC')->paginate(10);
	
        return view('about', compact('semua_transaksi', 'semua_barang'));
        //---------------------------------------------------------------
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
}
