<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Peminjam;
use App\RefPeminjam;

class PeminjamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!\Auth::check()) {
            abort(401);
        }
		
		$semua_peminjam = Peminjam::orderBy('id','DESC')->paginate(3);
        return view('peminjam/index',compact('semua_peminjam'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!\Auth::check()) {
            abort(401);
        }

        $kategoripeminjam = RefPeminjam::all(); 
        
        return view("peminjam/create", compact('kategoripeminjam'));
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
            "nama_peminjam" => "required|min:4|max:255",
            "kategori_peminjam_id" => "required",
            "alamat" => "required",
            "no_hp" => "required|min:10|max:13"
        ]);

        $peminjam_baru = new Peminjam; //membuat objek baru
        $peminjam_baru->nama_peminjam = $request->nama_peminjam;
        $peminjam_baru->kategori_peminjam_id = $request->kategori_peminjam_id;
        $peminjam_baru->alamat = $request->alamat;
        $peminjam_baru->no_hp = $request->no_hp;
		        
        $peminjam_baru->save();
    
        return redirect()->to('/peminjam/create')->with('message', 'Berhasil menambahkan data peminjam');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!\Auth::check()) {
            abort(401);
        }

        $peminjam = Peminjam::findOrFail($id);

        return view('peminjam/show', compact('peminjam'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!\Auth::check()) {
            abort(401);
        }

		$peminjam = Peminjam::findOrFail($id);
        $kategoripeminjam = RefPeminjam::all(); 
        
        return view("peminjam/edit", compact('peminjam', 'kategoripeminjam'));
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
        if (!\Auth::check()) {
            abort(401);
        }

        $request->validate([
            "nama_peminjam" => "required|min:4|max:255",
            "kategori_peminjam_id" => "required",
            "alamat" => "required",
            "no_hp" => "required|min:10|max:13"
        ]);

		$peminjam = Peminjam::findOrFail($id);
		
        $peminjam->nama_peminjam = $request->nama_peminjam;
        $peminjam->kategori_peminjam_id = $request->kategori_peminjam_id;
        $peminjam->alamat = $request->alamat;
        $peminjam->no_hp = $request->no_hp;
		        
        $peminjam->save();
		
		return redirect()->to("peminjam");
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
