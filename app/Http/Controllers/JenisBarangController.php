<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JenisBarang;

class JenisBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         //harus login dulu baru bisa lihat
        if (!\Auth::check()) {
            abort(401);
        }
		
		$semua_jenis = JenisBarang::orderBy('id','DESC')->paginate(3);
        return view('jenisbarang/index',compact('semua_jenis'));
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

        return view("jenisbarang/create");
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
            "jenis_barang" => "required|min:4|max:255"
        ]);
		
		$jenisbarang_baru = new JenisBarang; //membuat objek baru
		$jenisbarang_baru->jenis_barang = $request->jenis_barang;
		
		$jenisbarang_baru->save();
    
        return redirect()->to('/jenisbarang/create')->with('message', 'Berhasil menambahkan data jenis barang');
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
        if (!\Auth::check()) {
            abort(401);
        }

		$jenisbarang = JenisBarang::findOrFail($id);
                
        return view("jenisbarang/edit", compact('jenisbarang'));
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
	public function delete($id)
    {
        if (!\Auth::check()) {
            abort(401);
        }

        $jenisbarang = JenisBarang::findOrFail($id);

        return view('jenisbarang/delete', compact('jenisbarang'));
    }
	
    public function destroy($id)
    {
        if (!\Auth::check()) {
            abort(401);
        }

        $jenisbarang = JenisBarang::findOrFail($id);
        
        $jenisbarang->delete();

        return redirect('jenisbarang');
    }
}
