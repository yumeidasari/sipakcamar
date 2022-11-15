<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RefPeminjam;

class RefPeminjamController extends Controller
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
		
		$semua_kategoripeminjam = RefPeminjam::orderBy('id','DESC')->paginate(3);
        return view('refpeminjam/index',compact('semua_kategoripeminjam'));
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
 
        return view("refpeminjam/create");
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
            "kategori" => "required|min:4|max:255"
            
        ]);

        $kategori_baru = new RefPeminjam; //membuat objek baru
        $kategori_baru->kategori = $request->kategori;
               
        $kategori_baru->save();
    
        return redirect()->to('/refpeminjam/create')->with('message', 'Berhasil menambahkan data kategori peminjam');
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

		$refpeminjam = RefPeminjam::findOrFail($id);
                
        return view("refpeminjam/edit", compact('refpeminjam'));
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

        $refpeminjam = RefPeminjam::findOrFail($id);

        return view('refpeminjam/delete', compact('refpeminjam'));
    }
	
    public function destroy($id)
    {
        if (!\Auth::check()) {
            abort(401);
        }

        $refpeminjam = RefPeminjam::findOrFail($id);
        
        $refpeminjam->delete();

        return redirect('refpeminjam');
    }
}
