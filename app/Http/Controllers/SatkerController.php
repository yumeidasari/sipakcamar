<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Satker;

class SatkerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $semua_satker = Satker::orderby('id','DESC')->paginate(3); //orderby untuk menampilkan berdasarkan kehendak user
        //return $semua_kategori;
        return view('satker/index', compact('semua_satker')); 
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $this->authorize('kelola-satker');

        return view('satker/create');
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
        $this->authorize('kelola-satker');

        $request->validate([
            "nama_satker" => "required|min:4|max:255"
        ]);

        $satker_baru = new Satker;
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
        $this->authorize('kelola-satker');
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
        $this->authorize('kelola-satker');

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
        $this->authorize('kelola-satker');

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
        $this->authorize('kelola-satker');

        $satker = Satker::findOrFail($id);
        $satker->delete();

        return redirect('satker');
    }

    public function delete($id)
    {
        $this->authorize('kelola-satker');
        
        $satker = Satker::findOrFail($id);

        return view('satker/delete', compact('satker'));
    }
}
