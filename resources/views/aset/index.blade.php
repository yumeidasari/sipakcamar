@extends('layouts.stisla.index', ['title' => 'Halaman Data Barang', 'page_heading' => 'Daftar Aset'])

@section('content')
    <div class="container pt-3">
        <a href="{{url('/aset/create')}}" class="btn btn-primary"> Tambah </a>
        <a href="{{url('/aset/import')}}" class="btn btn-secondary"> Import </a>
        <a href="{{action('AsetController@export')}}" class="btn btn-warning"> Export </a>
        <!--a href="{{action('AsetController@charts')}}" class="btn btn-info"> Chart </a-->

        <br/>
        <br/>
        <hr>
        <form action="" method="GET">
        <div class="row">
            <div class="col-md-3">
                <input type="text" value="{{\Request::get('q_nama_aset')}}" name="q_nama_aset" class="form-control" placeholder="Filter by nama aset">
            </div>
            <div class="col-md-2">
                <select name="q_kondisi" class="form-control">
                    <option value="">Semua kondisi</option>
                    <option {{\Request::get('q_kondisi') == "BAIK" ? "selected" : ""}} value="BAIK">BAIK</option>
                    <option {{\Request::get('q_kondisi') == "RUSAK" ? "selected" : ""}} value="RUSAK">RUSAK</option>
                </select>
            </div>
            <div class="col-md-2">
                <select name="q_jenis" class="form-control">
                    <option value="">Semua jenis</option>
                    <option {{\Request::get('q_jenis') == "BERGERAK" ? "selected" : ""}} value="BERGERAK">BERGERAK</option>
                    <option {{\Request::get('q_jenis') == "TETAP" ? "selected" : ""}} value="TETAP">TETAP</option>
                </select>
            </div>
            <div class="col-md-2">
                <select name="q_kategori" class="form-control">
                    <option value="">Semua kategori</option>
                    @foreach($kategori as $k)
                        <option {{\Request::get('q_kategori') == $k->id ? "selected" : ""}} value="{{$k->id}}">{{$k->nama_kategori}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <select name="q_satker" class="form-control">
                    <option value="">Semua satker</option>
                    @foreach($satker as $s)
                        <option {{\Request::get('q_satker') == $s->id ? "selected" : ""}} value="{{$s->id}}">{{$s->nama_satker}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-1">
                <button class="btn btn-info">Filter</button>
            </div>

        </div>
        </form>
        <br>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID </th>
                    <th>Foto</th>
                    <th>Kode aset</th>
                    <th>Nama aset</th>
                    <th>Kondisi</th>
                    <th>Jenis</th>
                    <th>Kategori</th>
                    <th>Satker</th>
                    <th><center>Action </center></th>
                </tr>
            </thead>
            <tbody>
                @foreach($semua_aset as $aset)
                <tr>
                    <td> {{$aset->id}}</td>
                    <td>
                        @if(isset($aset->photo_url))
                          <img width="100px" src="{{asset("/storage/$aset->photo_url")}}" alt="foto">
                        @else
                           -
                        @endif
                    </td>
                    <td> {{$aset->kode}}</td>
                    <td> {{$aset->nama_aset}} </td>
                    <td> {{$aset->kondisi}} </td>
                    <td> {{$aset->jenis}} </td>
                    <td> {{$aset->kategori->nama_kategori}} </td>
                    <td> {{$aset->satker->nama_satker}} </td>
                    <td><center>
                        <a href="{{url("/aset/$aset->id/edit")}}" class="btn btn-info btn-sm">edit </a>
                        <a href="{{url("/aset/$aset->id")}}" class="btn btn-success btn-sm">view </a>
                        <a href="{{url("/aset/$aset->id/delete")}}" class="btn btn-danger btn-sm">Delete </a>
                    </center>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="10">{{$semua_aset->links()}}</th>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection