@extends('layouts.stisla.index', ['title' => 'Halaman Kategori Peminjam', 'page_heading' => 'Edit Kategori Peminjam'])

@section('content')
    <div class="container">
        <div class="col-md-6 offset-md-3">
		
			
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

            <form action="{{url("kategori/$refpeminjam->id")}}" method="POST" enctype="multipart/form-data">
				<input type="hidden" name="_method" value="PUT">
                
				{{ csrf_field() }}

			
                <div class="form-group">
                    <label> Kategori Peminjam </label>
                    <input type="text" value="{{$refpeminjam->kategori}}" class="form-control" name="kategori" />
                </div>
						
                <input type="submit" class="btn btn-primary" value="Simpan">
                <a href="{{url('refpeminjam')}}" class="btn btn-warning">Batal</a>
				
            </form>
       </div>
    </div>
@endsection