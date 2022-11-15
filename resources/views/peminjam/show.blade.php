@extends('layouts.stisla.index', ['title' => 'Halaman Detail Data Peminjam', 'page_heading' => 'Detail Data Peminjam'])

@section('content')
    <div class="container pt-5">
        <div class="col-md-6 offset-md-3">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <td>Nama Peminjam</td>
                        <td>{{$peminjam->nama_peminjam}}</td>
                    </tr>
                    <tr>
                        <td>Kategori</td>
                        <td>{{$peminjam->kategoripeminjam->kategori}}</td>
                    </tr>
                   
                    
                </tbody>
            </table>
            <a href="{{url('peminjam')}}" class="btn btn-warning">Kembali</a>
        </div>
    </div>
@endsection