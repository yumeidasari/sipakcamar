@extends('layouts.stisla.index', ['title' => 'Halaman Data Barang', 'page_heading' => 'Daftar Barang'])

@section('content')
    <div class="container pt-1">
        <a href="{{url('/barang/create')}}" class="btn btn-primary"> Tambah </a>
        <!--a href="{{action('AsetController@charts')}}" class="btn btn-info"> Chart </a-->

        <hr>
        
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No. </th>
                    <th>Foto</th>
                    <th>Nama Barang</th>
                    <th>Kondisi</th>
                    <th>Jenis</th>
                    <th>Jumlah</th>
                    <th><center>Action </center></th>
                </tr>
            </thead>
            <tbody>
                @foreach($semua_barang as $no => $barang)
                <tr>
                    <td> {{++$no + ($semua_barang->currentPage()-1) * $semua_barang->perPage()}}</td>
                    <td>
                        @if(isset($barang->foto))
                          <img width="100px" src="{{asset("/storage/$barang->foto")}}" alt="foto">
                        @else
                           -
                        @endif
                    </td>
                    <td> {{$barang->nama_barang}}</td>
                    <td> {{$barang->kondisi}} </td>
                    <td> {{$barang->jenisbarang->jenis_barang}} </td>
                    <td> {{$barang->jumlah}} </td>
                    <td><center>
                        <a href="{{url("/barang/$barang->id/edit")}}" class="btn btn-info btn-sm"><i class='fa fa-edit' style='color: white'></i></a>
                        <a href="{{url("/barang/$barang->id")}}" class="btn btn-success btn-sm"><i class='fa fa-file' style='color: white'></i></a>
                        <a href="{{url("/barang/$barang->id/delete")}}" class="btn btn-danger btn-sm"><i class='fa fa-trash' style='color: white'></i></a>
                    </center>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="10">{{$semua_barang->links()}}</th>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection