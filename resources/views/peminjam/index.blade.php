@extends('layouts.stisla.index', ['title' => 'Halaman Data Peminjam', 'page_heading' => 'Daftar Peminjam'])

@section('content')
    <div class="container pt-1">
        <a href="{{url('/peminjam/create')}}" class="btn btn-primary"> Tambah </a>
        <!--a href="{{action('AsetController@charts')}}" class="btn btn-info"> Chart </a-->

        <hr>
        
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No. </th>
                    <th>Nama Peminjam</th>
                    <th>Kategori</th>
                    <th>Alamat</th>
                    <th>No. Hp</th>
                    <th><center>Action </center></th>
                </tr>
            </thead>
            <tbody>
                @foreach($semua_peminjam as $no => $peminjam)
                <tr>
                    <td> {{++$no + ($semua_peminjam->currentPage()-1) * $semua_peminjam->perPage()}}</td>
                    <td> {{$peminjam->nama_peminjam}}</td>
                    <td> {{$peminjam->kategoripeminjam->kategori}} </td>
                    <td> {{$peminjam->alamat}} </td>
                    <td> {{$peminjam->no_hp}} </td>
                    <td><center>
                        <a href="{{url("/peminjam/$peminjam->id/edit")}}" class="btn btn-info btn-sm"><i class='fa fa-edit' style='color: white'></i></a>
                        <a href="{{url("/peminjam/$peminjam->id")}}" class="btn btn-success btn-sm"><i class='fa fa-file' style='color: white'></i></a>
                        <a href="{{url("/peminjam/$peminjam->id/delete")}}" class="btn btn-danger btn-sm"><i class='fa fa-trash' style='color: white'></i></a>
                    </center>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="10">{{$semua_peminjam->links()}}</th>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection