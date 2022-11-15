@extends('layouts.stisla.index', ['title' => 'Halaman Edit Data Peminjam', 'page_heading' => 'Edit Data Peminjam'])

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

            <form action="{{url("peminjam/$peminjam->id")}}" method="POST" enctype="multipart/form-data">
				<input type="hidden" name="_method" value="PUT">
                
				{{ csrf_field() }}

			<div class="row">
            <div class="col">
                <div class="form-group">
                    <label> Nama Peminjam </label>
                    <input type="text" value="{{$peminjam->nama_peminjam}}" class="form-control" name="nama_peminjam" />
                </div>
			</div>
			<div class="col">
                <div class="form-group">
                    <label>Kategori Peminjam</label>
                    <select name="kategori_peminjam_id" class="form-control">
                        <option value="">Pilih Kategori Peminjam</option>
                        @foreach($kategoripeminjam as $j)
                            <option {{$peminjam->kategori_peminjam_id == $j->id ? "selected" : ""}} value="{{$j->id}}"> {{$j->kategori}} </option>
                        @endforeach
                    </select>
                </div>
			</div>
			</div>
			
			<div class="row">
            <div class="col">
				 <div class="form-group">
                    <label for="">Alamat</label>
                    <textarea name="alamat" cols="30" rows="4" class="form-control">{{$peminjam->alamat}}</textarea>
                </div>
			</div>
			<div class="col">
				<div class="form-group">
                    <label>Nomor Hp</label>
                    <input type="text" class="form-control" value="{{$peminjam->no_hp}}" name="no_hp" />
                </div>
			</div>
			</div>
			
                <input type="submit" class="btn btn-primary" value="Simpan">
                <a href="{{url('peminjam')}}" class="btn btn-warning">Batal</a>
				
            </form>
       
    </div>
@endsection