@extends('layouts.stisla.index', ['title' => 'Halaman Kategori Peminjam', 'page_heading' => 'Daftar Kategori Peminjam'])

@section('content')
    <div class="container pt-1">
        <a href="{{url('/refpeminjam/create')}}" class="btn btn-primary"> Tambah </a>
        <!--a href="{{action('AsetController@charts')}}" class="btn btn-info"> Chart </a-->

        <hr>
        
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No. </th>
                    <th>Kategori</th>
                    <th><center>Action </center></th>
                </tr>
            </thead>
            <tbody>
                @foreach($semua_kategoripeminjam as $no => $kategori)
                <tr>
                    <td> {{++$no + ($semua_kategoripeminjam->currentPage()-1) * $semua_kategoripeminjam->perPage()}}</td>
                    <td> {{$kategori->kategori}}</td>
                    <td><center>
                        <a href="{{url("/refpeminjam/$kategori->id/edit")}}" class="btn btn-info btn-sm"><i class='fa fa-edit' style='color: white'></i></a>
                        <!--a href="{{url("/refpeminjam/$kategori->id")}}" class="btn btn-success btn-sm"><i class='fa fa-file' style='color: white'></i></a-->
                        <a href="{{url("/refpeminjam/$kategori->id/delete")}}" class="btn btn-danger btn-sm"><i class='fa fa-trash' style='color: white'></i></a>
                    </center>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="10">{{$semua_kategoripeminjam->links()}}</th>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection