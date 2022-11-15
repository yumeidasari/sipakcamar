<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\JenisBarang;


class BarangController extends Controller
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
		
		$semua_barang = Barang::orderBy('id','DESC')->paginate(3);
        return view('barang/index',compact('semua_barang'));
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

        $jenisbarang = JenisBarang::all(); //karena perlu data jenis barang
        
        return view("barang/create", compact('jenisbarang'));
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
            "nama_barang" => "required|min:4|max:255",
            "jenisbarang_id" => "required",
            "kondisi" => "required",
            "jumlah" => "required"
            
        ]);

        $barang_baru = new Barang; //membuat objek baru
        $barang_baru->nama_barang = $request->nama_barang;
        $barang_baru->jenisbarang_id = $request->jenisbarang_id;
        $barang_baru->kondisi = $request->kondisi;
        $barang_baru->jumlah = $request->jumlah;
		
        
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store("/barang/", 'public');
            $barang_baru->foto = $path; // simpan path foto pada database 
        }
		
    
        $barang_baru->save();
    
        return redirect()->to('/barang/create')->with('message', 'Berhasil menambahkan data barang');
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

        $barang = Barang::findOrFail($id);

        return view('barang/show', compact('barang'));
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

		$barang = Barang::findOrFail($id);
        $jenisbarang = JenisBarang::all(); //karena perlu data jenis barang
        
        return view("barang/edit", compact('jenisbarang', 'barang'));
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
		$barang = Barang::findOrFail($id);
		
		if (!\Auth::check()) {
            abort(401);
        }

        $request->validate([
            "nama_barang" => "required|min:4|max:255",
            "jenisbarang_id" => "required",
            "kondisi" => "required",
            "jumlah" => "required"
            
        ]);
		
		$barang->nama_barang = $request->nama_barang;
        $barang->jenisbarang_id = $request->jenisbarang_id;
        $barang->kondisi = $request->kondisi;
        $barang->jumlah = $request->jumlah;
		
		if ($request->hasFile('foto')) {

            // hapus foto lama
            \Storage::delete("public/".$barang->foto);

            // simpan foto baru
            $path = $request->file('foto')->store("/barang/", 'public');

            $barang->foto = $path;
        }
		
		$barang->save();
		return redirect()->to("barang");
		
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

        $barang = Barang::findOrFail($id);

        return view('barang/delete', compact('barang'));
    }
	
    public function destroy($id)
    {
        if (!\Auth::check()) {
            abort(401);
        }

        $barang = Barang::findOrFail($id);
        
        \Storage::delete("public/".$barang->foto);
        

        $barang->delete();

        return redirect('barang');
    }
}
