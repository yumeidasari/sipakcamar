@extends('layouts.stisla.index', ['title' => 'Halaman Jenis Barang', 'page_heading' => 'Daftar Jenis Barang'])

@section('content')
    <div class="container pt-1">
        <a href="{{url('/jenisbarang/create')}}" class="btn btn-primary"> Tambah </a>
        <!--a href="{{action('AsetController@charts')}}" class="btn btn-info"> Chart </a-->
		<hr>
        
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No. </th>
                    <th>Jenis Barang</th>
                    <th><center>Action </center></th>
                </tr>
            </thead>
            <tbody>
                @foreach($semua_jenis as $no => $jenis)
                <tr>
                    <td> {{++$no + ($semua_jenis->currentPage()-1) * $semua_jenis->perPage()}}</td>
                    <td> {{$jenis->jenis_barang}}</td>
                    <td><center>
                        <a href="{{url("/jenisbarang/$jenis->id/edit")}}" class="btn btn-info btn-sm"><i class='fa fa-edit' style='color: white'></i></a>
                        <!--a href="{{url("/jenisbarang/$jenis->id")}}" class="btn btn-success btn-sm"><i class='fa fa-file' style='color: white'></i></a-->
                        <a href="{{url("/jenisbarang/$jenis->id/delete")}}" class="btn btn-danger btn-sm"><i class='fa fa-trash' style='color: white'></i></a>
                    </center>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="10">{{$semua_jenis->links()}}</th>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection