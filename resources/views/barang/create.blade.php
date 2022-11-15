@extends('layouts.stisla.index', ['title' => 'Halaman Buat Data Barang', 'page_heading' => 'Buat Data Barang'])

@section('content')
    <div class="container">
        
            @if(Session::has('message'))
                <div class="alert alert-success">
                    {{ Session::get('message')}}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{url('/barang')}}" method="POST" enctype="multipart/form-data">

                {{ csrf_field() }}

			<div class="row">
            <div class="col">
                <div class="form-group">
                    <label> Nama Barang </label>
                    <input type="text" class="form-control" name="nama_barang" />
                </div>
			</div>
			<div class="col">
                <div class="form-group">
                    <label for="">Foto</label>
                    <input type="file" name="foto" class="form-control">
                </div>
			</div>
			</div>
			
			<div class="row">
            <div class="col">
				 <div class="form-group">
                    <label>Jenis Barang</label>
                    <select name="jenisbarang_id" class="form-control">
                        <option value="">Pilih Jenis Barang</option>
                        @foreach($jenisbarang as $j)
                            <option value="{{$j->id}}"> {{$j->jenis_barang}} </option>
                        @endforeach
                    </select>
                </div>
			</div>
			<div class="col">
				<div class="form-group">
                    <label> Kondisi </label>
                    <select class=form-control name="kondisi">
                        <option value="BAIK">BAIK</option>
                        <option value="RUSAK">RUSAK</option>
                    </select>
                </div>
			</div>
			</div>

			<div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="">Jumlah</label>
                    <input type="text" name="jumlah" class="form-control">
                </div>
			</div>
			<div class="col">
                
			</div>
			</div>

                <input type="submit" class="btn btn-primary" value="Simpan">
                <a href="{{url('barang')}}" class="btn btn-warning">Daftar Barang</a>

            </form>
       
    </div>
@endsection