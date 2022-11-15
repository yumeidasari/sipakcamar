<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //untuk authorize

        //$this->authorize('kelola-kategori');
        //return "Hello Belitong";
        //return view('kategori/index'); //view merupakan folder views
        //$semua_kategori = Kategori::all();//menampilkan semua kategori tanpa ada halaman 1, 2 dst
        //$semua_kategori = Kategori::paginate(3);//menampilkan semua kategori
        $semua_kategori = Kategori::orderby('id','DESC')->paginate(3); //orderby untuk menampilkan berdasarkan kehendak user
        //return $semua_kategori;
        return view('kategori/index', compact('semua_kategori')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $this->authorize('kelola-kategori');
        return view('kategori/create');
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
        $kategori_baru = new Kategori;
        $kategori_baru->nama_kategori = $request->nama_kategori;

        $kategori_baru->save();

        return redirect()
            ->to('/kategori/create')
            ->with('pesan', 'Berhasil Menyimpan');

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
        return " Tampilkan Kategori $id";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //public function edit($id, $idkedua = null) -> jika ada 2 id
    public function edit($id)
    {
        //
        $this->authorize('kelola-kategori');

        //return "Mengedit kategori $id " ;
        $kategori = Kategori::findOrFail($id);
        return view('kategori/edit', compact('kategori'));

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
        $kategori = Kategori::findOrFail($id);
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->save();
        return redirect("kategori/$id/edit")
            ->with("pesan", "Berhasil mengedit kategori");

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
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        return redirect('kategori');
    }

    public function delete($id)
    {
        $this->authorize('kelola-kategori');
        $kategori = Kategori::findOrFail($id);

        return view('kategori/delete', compact('kategori'));
    }
}
