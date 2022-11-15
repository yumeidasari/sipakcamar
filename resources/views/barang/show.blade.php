@extends('layouts.stisla.index', ['title' => 'Halaman Detail Data Barang', 'page_heading' => 'Detail Data Barang'])

@section('content')
    <div class="container pt-5">
        <div class="col-md-6 offset-md-3">
            <h3><center>Detail Barang</center></h3>
            <br>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <td>Nama barang</td>
                        <td>{{$barang->nama_barang}}</td>
                    </tr>
                    <tr>
                        <td>Foto</td>
                        <td>
                            @if(isset($barang->foto))
                                <img width="250px" src="{{asset("/storage/$barang->foto")}}" >
                            @endif
                        </td>
                    </tr>
                   
                    
                </tbody>
            </table>
            <a href="{{url('barang')}}" class="btn btn-warning">Daftar Barang</a>
        </div>
    </div>
@endsection