<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LokasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $semua_lokasi = Lokasi::orderby('id','DESC')->paginate(3); //orderby untuk menampilkan berdasarkan kehendak user
        //return $semua_kategori;
        return view('lokasi/index', compact('semua_lokasi')); 
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('lokasi/create');
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
        $lokasi_baru = new Lokasi;
        $satker_baru->nama_satker = $request->nama_satker;

        $satker_baru->save();

        return redirect()
            ->to('/satker/create')
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
        $satker = Satker::findOrFail($id);
        return view('satker/edit', compact('satker'));
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
        $satker = Satker::findOrFail($id);
        $satker->nama_satker = $request->nama_satker;
        $satker->save();
        return redirect("satker/$id/edit")
            ->with("pesan", "Berhasil mengedit satker");
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
        $satker = Satker::findOrFail($id);
        $satker->delete();

        return redirect('satker');
    }

    public function delete($id)
    {
        $satker = Satker::findOrFail($id);

        return view('satker/delete', compact('satker'));
    }
}
