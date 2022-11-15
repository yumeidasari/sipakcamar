@extends('layouts.stisla.index', ['title' => 'Halaman Buat Data Jenis Barang', 'page_heading' => 'Buat Data Jenis Barang'])

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

            <form action="{{url('/jenisbarang')}}" method="POST" enctype="multipart/form-data">

                {{ csrf_field() }}

			<div class="row">
            <div class="col">
                <div class="form-group">
                    <label> Jenis Barang </label>
                    <input type="text" class="form-control" name="jenis_barang" />
                </div>
			</div>
			<div class="col">
               
			</div>
			</div>
			
			

                <input type="submit" class="btn btn-primary" value="Simpan">
                <a href="{{url('jenisbarang')}}" class="btn btn-warning">Daftar Jenis Barang</a>

            </form>
       
    </div>
@endsection