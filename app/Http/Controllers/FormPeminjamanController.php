<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

use App\Barang;
use App\Peminjam;
use App\RefPeminjam;
use App\TransaksiPermohonan;
use App\TransaksiPeminjaman;



class FormPeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		$semua_transaksi = TransaksiPermohonan::orderBy('id','DESC')->paginate(3);
		
		return view('form-peminjaman/index', compact('semua_transaksi'));
		
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
		$barang = Barang::all();
		$kategoripeminjam = RefPeminjam::all();
		return view("form-peminjaman/create", compact('barang', 'kategoripeminjam'));
        //---------------------------------------------------------------
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
		$request->validate([
            "barang_id" => "required",
			"refpeminjam_id" => "required",
            "tgl_mulai_pakai" => "required|date|after:tomorrow",
            "tgl_selesai" => "required|date|after_or_equal:tgl_mulai_pakai",
            "deskripsi_kegiatan" => "required",
			"nama_peminjam" => "required",
			"no_telp" => "required",
			"email" => "required",
			"alamat" => "required",
			"jumlah_barang" => "required",
			"waktu_pemakaian" => "required"
						
        ]);
	
		
		$transaksi_baru = new TransaksiPermohonan;
		
		$transaksi_baru->barang_id = $request->barang_id;
		$transaksi_baru->refpeminjam_id = $request->refpeminjam_id;
		$transaksi_baru->tgl_mulai_pakai = Carbon::create($request->tgl_mulai_pakai);
        $transaksi_baru->tgl_selesai = Carbon::create($request->tgl_selesai);
        $transaksi_baru->deskripsi_kegiatan = $request->deskripsi_kegiatan;
		$transaksi_baru->nama_peminjam = $request->nama_peminjam;
		$transaksi_baru->no_telp = $request->no_telp;
		$transaksi_baru->alamat = $request->alamat;
		$transaksi_baru->email = $request->email;
		$transaksi_baru->jumlah_barang = $request->jumlah_barang;
		$transaksi_baru->waktu_pemakaian = $request->waktu_pemakaian;
		$transaksi_baru->status = 0;
		
		//return response()->json(['data' => $transaksi_baru]);
        $transaksi_baru->save();
		return redirect()->to('/form-peminjaman/create')->with('message', 'Data Permohonan Terkirim, pihak dari kecamatan akan segera menghubungi Anda');
		
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
	
	public function transaksi_confirm_status($id)
	{
		if (!\Auth::check()) {
            abort(401);
        }
		
		$permohonan = TransaksiPermohonan::findOrFail($id);
		$peminjam = Peminjam::all();
		$jml_peminjam = count($peminjam);
		$no_hp = $permohonan->no_telp;
		
		$tr_peminjaman_baru = new TransaksiPeminjaman;
		$tr_peminjaman_baru->barang_id = $permohonan->barang_id;
		$tr_peminjaman_baru->jml_pinjam = $permohonan->jumlah_barang;
		$tr_peminjaman_baru->tgl_mulai_pakai = $permohonan->tgl_mulai_pakai;
		$tr_peminjaman_baru->tgl_selesai = $permohonan->tgl_selesai;
		$tr_peminjaman_baru->deskripsi_kegiatan = $permohonan->deskripsi_kegiatan;
		$tr_peminjaman_baru->waktu_pemakaian = $permohonan->waktu_pemakaian;
		$tr_peminjaman_baru->bulan = Carbon::parse($permohonan->tgl_mulai_pakai)->translatedformat('F');
		
		
		if($jml_peminjam != 0)
		{
			for($i=0; $i<$jml_peminjam; $i++)
			{
				if($peminjam[$i]->no_hp == $no_hp)
				{
					$tr_peminjaman_baru->peminjam_id = $peminjam[$i]->id;
					break;
				}
				else
				{
					if($i == ($jml_peminjam-1))
					{
						$peminjam_baru = new Peminjam;
						
						$peminjam_baru->nama_peminjam = $permohonan->nama_peminjam;
						$peminjam_baru->alamat = $permohonan->alamat;
						$peminjam_baru->no_hp = $permohonan->no_telp;
						$peminjam_baru->kategori_peminjam_id = $permohonan->refpeminjam_id;
						$peminjam_baru->save();
						
						$tr_peminjaman_baru->peminjam_id = $peminjam_baru->id;
					}
				}
			}
		}
		else
		{
			$peminjam_baru = new Peminjam;
			
			$peminjam_baru->nama_peminjam = $permohonan->nama_peminjam;
			$peminjam_baru->alamat = $permohonan->alamat;
			$peminjam_baru->no_hp = $permohonan->no_telp;
			$peminjam_baru->kategori_peminjam_id = $permohonan->refpeminjam_id;
			$peminjam_baru->save();
			
			$tr_peminjaman_baru->peminjam_id = $peminjam_baru->id;
			
		}
				
		$tr_peminjaman_baru->save();
		
		$permohonan->status = 1;
		$permohonan->save();
		//return response()->json(['data' => $tr_peminjaman_baru]);
		return redirect()->to("form-peminjaman");
	}
	
	public function transaksi_tolak_status($id)
	{
		if (!\Auth::check()) {
            abort(401);
        }
		$permohonan = TransaksiPermohonan::findOrFail($id);
		$permohonan->status = 2;
		$permohonan->save();
		return redirect()->to("form-peminjaman");
	}
}
