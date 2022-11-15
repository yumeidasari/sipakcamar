@extends('layouts.stisla.index', ['title' => 'Halaman Buat Data Peminjam', 'page_heading' => 'Buat Data Peminjam'])

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

            <form action="{{url('/peminjam')}}" method="POST" enctype="multipart/form-data">

                {{ csrf_field() }}

			<div class="row">
            <div class="col">
                <div class="form-group">
                    <label> Nama Peminjam </label>
                    <input type="text" class="form-control" name="nama_peminjam" />
                </div>
			</div>
			<div class="col">
                <div class="form-group">
                    <label>Kategori Peminjam</label>
                    <select name="kategori_peminjam_id" class="form-control">
                        <option value="">Pilih Kategori Peminjam</option>
                        @foreach($kategoripeminjam as $j)
                            <option value="{{$j->id}}"> {{$j->kategori}} </option>
                        @endforeach
                    </select>
                </div>
			</div>
			</div>
			
			<div class="row">
            <div class="col">
				 <div class="form-group">
                    <label for="">Alamat</label>
                    <textarea name="alamat" cols="30" rows="4" class="form-control"></textarea>
                </div>
			</div>
			<div class="col">
				<div class="form-group">
                    <label>Nomor Hp</label>
                    <input type="text" class="form-control" name="no_hp" />
                </div>
			</div>
			</div>

                <input type="submit" class="btn btn-primary" value="Simpan">
                <a href="{{url('peminjam')}}" class="btn btn-warning">Daftar Peminjam</a>

            </form>
       
    </div>
@endsection