<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\TransaksiPeminjaman;
use App\Barang;
use App\Peminjam;
//use Carbon\Carbon;

class TransaksiPeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //harus login dulu baru bisa lihat
        if (!\Auth::check()) {
            abort(401);
        }
        
		$cari = $request->get('search');

        $semua_transaksi = DB::table('tr_peminjaman_barang')
                        ->join('ms_barang', 'tr_peminjaman_barang.barang_id', '=', 'ms_barang.id')
                        ->select('tr_peminjaman_barang.*', 'ms_barang.*')
                        ->where('tr_peminjaman_barang.bulan', 'LIKE', '%'.$cari.'%')
						->orderby('tr_peminjaman_barang.id','desc')
                        ->paginate(3);

        return view('transaksipeminjaman/index', compact('semua_transaksi'));
        //---------------------------------------------------------------
    }

    /**
     * Show the form for creating a new resource
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!\Auth::check()) {
            abort(401);
        }

        $barang = Barang::all(); //karena perlu data  barang
		$peminjam = Peminjam::all();
        
        return view("transaksipeminjaman/create", compact('barang', 'peminjam'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!\Auth::check()) {
            abort(401);
        }
		
        $request->validate([
            "barang_id" => "required",
            "tgl_mulai_pakai" => "required|date|after:tomorrow",
            "tgl_selesai" => "required|date|after_or_equal:tgl_mulai_pakai",
            "deskripsi_kegiatan" => "required",
			"peminjam_id" => "required",
            "waktu_pemakaian" => "required"
						
        ]);

        $transaksi_baru = new TransaksiPeminjaman; //membuat objek baru
        $transaksi_baru->barang_id = $request->barang_id;
        $transaksi_baru->tgl_mulai_pakai = Carbon::create($request->tgl_mulai_pakai);
        $transaksi_baru->tgl_selesai = Carbon::create($request->tgl_selesai);
        $transaksi_baru->deskripsi_kegiatan = $request->deskripsi_kegiatan;
		$transaksi_baru->peminjam_id = $request->peminjam_id;
		$transaksi_baru->waktu_pemakaian = $request->waktu_pemakaian;
		$transaksi_baru->jml_pinjam = $request->jml_pinjam;
		$transaksi_baru->bulan = Carbon::parse($request->tgl_mulai_pakai)->translatedformat('F');
        
        $transaksi_baru->save();
    
        return redirect()->to('/transaksipeminjaman/create')->with('message', 'Berhasil menambahkan data transaksi');
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
