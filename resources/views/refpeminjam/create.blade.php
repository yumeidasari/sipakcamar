@extends('layouts.stisla.index', ['title' => 'Halaman Buat Data Kategori Peminjam', 'page_heading' => 'Buat Data Kategori Peminjam'])

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

            <form action="{{url('/refpeminjam')}}" method="POST" enctype="multipart/form-data">

                {{ csrf_field() }}

			<div class="row">
            <div class="col">
                <div class="form-group">
                    <label> Kategori </label>
                    <input type="text" class="form-control" name="kategori" />
                </div>
			</div>
			<div class="col">
                
			</div>
			</div>
					

                <input type="submit" class="btn btn-primary" value="Simpan">
                <a href="{{url('refpeminjam')}}" class="btn btn-warning">Kembali</a>

            </form>
       
    </div>
@endsection