<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;
use App\Satker;
use App\Aset;
use Carbon\Carbon;
use App\Imports\AsetImports;
use App\Exports\AsetExports;

class AsetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //public function index()
    //jika ingin ada filter:
    public function index(Request $request)
    {
        //harus login dulu baru bisa lihat
        if (!\Auth::check()) {
            abort(401);
        }
        //jika tidak ada kolom pencarian--------------------------
        //$semua_aset = Aset::orderBy('id', 'DESC')->paginate(3);
        //return view('aset/index', compact('semua_aset'));
        //---------------------------------------------------------

        //kolom pencarian/filter ditambahkan----------------------------
        $q_nama_aset = $request->get('q_nama_aset');
        $q_kondisi = $request->q_kondisi;
        $q_jenis = $request->q_jenis;
        $q_kategori = $request->q_kategori;
        $q_satker = $request->q_satker;
    
        $semua_aset = Aset::orderBy('id', 'DESC')
            ->where('nama_aset', 'like', "%$q_nama_aset%")
            ->where('kondisi', 'like', "%$q_kondisi%")
            ->where('jenis', 'like', "%$q_jenis%")
            ->when($q_kategori, function ($query, $q_kategori) {
                return $query->where('kategori_id', $q_kategori);
            })
            ->when($q_satker, function ($query, $q_satker) {
                return $query->where('satker_id', $q_satker);
            })
            ->paginate(3);

        $kategori = Kategori::all();
        $satker = Satker::all();

        return view('aset/index', compact('semua_aset', 'kategori', 'satker'));
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
        if (!\Auth::check()) {
            abort(401);
        }

        $kategori = Kategori::all(); //karena perlu data kategori
        $satker   = Satker::all(); //dan perlu data satker juga

        return view("aset/create", compact('kategori', 'satker'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate merupakan array.
        // required=harus diisi

        if (!\Auth::check()) {
            abort(401);
        }

        $request->validate([
            "nama_aset" => "required|min:4|max:255",
            "kode" => "required|min:3|max:255",
            "photo" => "file|image|mimes:jpeg,png,gif,webp|max:2048",
            "jenis" => "required",
            "kategori_id" => "required",
            "tgl_terima" => "required",
            "kondisi" => "required",
            "satker_id" => "required",
            "nilai_perolehan" => "required"
        ]);

        $aset_baru = new Aset; //membuat objek baru
        $aset_baru->kode = $request->kode;
        $aset_baru->nama_aset = $request->nama_aset;
        $aset_baru->keterangan = $request->keterangan;
        $aset_baru->nilai_perolehan = $request->nilai_perolehan;
        $aset_baru->satker_id = $request->satker_id;
        $aset_baru->kategori_id = $request->kategori_id;
        $aset_baru->jenis = $request->jenis;
        $aset_baru->kondisi = $request->kondisi;
        $aset_baru->tgl_terima = Carbon::create($request->tgl_terima); //carbon package tersendiri yg 
        //diinclude oleh laravel untuk memanipulasi tgl

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store("/aset/", 'public');
            $aset_baru->photo_url = $path; // simpan path foto pada database dengan field 'photo_url'
        }
    
        $aset_baru->save();
    
        return redirect()->to('/aset/create')->with('message', 'Berhasil menambahkan aset');
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

        if (!\Auth::check()) {
            abort(401);
        }

        $aset = Aset::findOrFail($id);

        return view('aset/view', compact('aset'));
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

        if (!\Auth::check()) {
            abort(401);
        }

        $aset = Aset::findOrFail($id);
        $kategori = Kategori::all();
        $satker = Satker::all();
    
        return view('aset/edit', compact('aset', 'kategori', 'satker'));
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
        if (!\Auth::check()) {
            abort(401);
        }

        $request->validate([
            "nama_aset" => "required|min:4|max:255",
            "kode" => "required|min:3|max:255",
            "photo" => "file|image|mimes:jpeg,png,gif,webp|max:2048",
            "jenis" => "required",
            "kategori_id" => "required",
            "tgl_terima" => "required",
            "kondisi" => "required",
            "satker_id" => "required",
            "nilai_perolehan" => "required"
        ]);

        $aset = Aset::findOrFail($id);
        $aset->kode = $request->kode;
        $aset->nama_aset = $request->nama_aset;
        $aset->keterangan = $request->keterangan;
        $aset->nilai_perolehan = $request->nilai_perolehan;
        $aset->satker_id = $request->satker_id;
        $aset->kategori_id = $request->kategori_id;
        $aset->jenis = $request->jenis;
        $aset->kondisi = $request->kondisi;
        $aset->tgl_terima = Carbon::create($request->tgl_terima);

        if ($request->hasFile('photo')) {

            // hapus foto lama
            \Storage::delete("public/".$aset->photo_url);

            // simpan foto baru
            $path = $request->file('photo')->store("aset", "public");

            $aset->photo_url = $path;
        }

        $aset->save();

        return redirect()->to("/aset/$id/edit")->with("message", "Berhasil mengupdate aset");
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
        if (!\Auth::check()) {
            abort(401);
        }

        $aset = Aset::findOrFail($id);
        
        \Storage::delete("public/".$aset->photo_url);
        

        $aset->delete();

        return redirect('aset');
    }

    public function delete($id)
    {
        if (!\Auth::check()) {
            abort(401);
        }

        $aset = Aset::findOrFail($id);

        return view('aset/delete', compact('aset'));
    }

    //untuk import dari file excel
    public function import()
    {
        return view("aset/import");
    }

    public function processImport(Request $request)
    {
        $request->validate([
            "aset-excel" => "required|file|mimes:xls,xlsx|max:10000"
        ]);

        \Excel::import(new AsetImports, $request->file('aset-excel'));

        return redirect()->to('/aset/import')->with('message', 'Data aset telah berhasil diimport');
    }

    //untuk export ke file excel
    public function export(){
        $export = new AsetExports;
        return $export->download('aset.xlsx');
    }

    //untuk chart
    public function charts(){
        $dataTable = \Lava::DataTable();
    
        $dataTable->addStringColumn('Jenis')
            ->addNumberColumn('Percent');
    
    
        $aset_count = Aset::count();
        $aset_by_jenis = Aset::groupBy('jenis')
            ->select('jenis', \DB::raw('count(*) as count'))
            ->get();
    
        foreach ($aset_by_jenis as $jenis) {
            $dataTable->addRow([$jenis->jenis, $jenis->count / $aset_count]);
        }
    
        $pieByJenis = \Lava::PieChart('pie_by_jenis', $dataTable, [
            'title'  => 'Aset berdasarkan jenis',
            'is3D'   => true,
            'slices' => [
                ['offset' => 0.2],
                ['offset' => 0.25],
                ['offset' => 0.3]
            ]
        ]);
    
        // aset by kondisi
    
            $aset_by_kondisi = Aset::groupBy('kondisi')
                ->select('kondisi', \DB::raw('count(*) as count'))
                ->get();
    
            $byKondisiTable = \Lava::DataTable();
    
            $byKondisiTable
                ->addStringColumn('kondisi')
                ->addNumberColumn('percent');
    
            foreach ($aset_by_kondisi as $kondisi) {
                $byKondisiTable->addRow([$kondisi->kondisi, $kondisi->count / $aset_count]);
            }
    
            //$pieByKondisi = \Lava::PieChart('pie_by_kondisi', $byKondisiTable);
            $pieByKondisi = \Lava::PieChart('pie_by_kondisi', $byKondisiTable, [
                "title" => "Aset berdasarkan kondisi",
                'is3D'   => true
                
            ]);
    
            // aset by kategori
    
            $aset_by_kategori = Aset::with('kategori')->get()->map(function ($aset) {
                $aset->nama_kategori = $aset->kategori->nama_kategori;
                return $aset;
            })->groupBy('nama_kategori');
    
            $byKategoriTable = \Lava::DataTable()
                ->addStringColumn('kategori')
                ->addNumberColumn('jumlah');
    
            foreach ($aset_by_kategori as $kategori) {
                $nama_kategori = $kategori->pluck('nama_kategori')[0];
                $byKategoriTable->addRow([$nama_kategori, count($kategori)]);
            }
    
            $pieByKategori = \Lava::BarChart('pie_by_kategori', $byKategoriTable, [
                "title" => "Aset berdasarkan kategori",
                "orientation" => "horizontal"
            ]);
    
    
            // aset by satker
            $aset_by_satker = Aset::with('satker')->get()->map(function ($aset) {
                $aset->nama_satker = $aset->satker->nama_satker;
                return $aset;
            })->groupBy('nama_satker');
    
            $byKategoriTable = \Lava::DataTable()
                ->addStringColumn('satker')
                ->addNumberColumn('jumlah');
    
            foreach ($aset_by_satker as $satker) {
                $nama_satker = $satker->pluck('nama_satker')[0];
                $byKategoriTable->addRow([$nama_satker, count($satker)]);
            }
    
            $pieBySatker = \Lava::BarChart('pie_by_satker', $byKategoriTable, [
                "title" => "Aset berdasarkan satker",
                "orientation" => "horizontal"
            ]);
    
            return view('aset/charts', compact('pieByJenis', 'pieByKondisi', 'pieByKategori', 'pieBySatker'));
    
    
    }
}
