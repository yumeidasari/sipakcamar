@extends('layouts.stisla.index', ['title' => 'Halaman Jenis Barang', 'page_heading' => 'Daftar Jenis Barang'])

@section('content')
    <div class="container">
        <div class="col-md-6 offset-md-3">

            <h3><center>Edit Jenis Barang</center></h3>
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

            <form action="{{url("jenisbarang/$jenisbarang->id")}}" method="POST" enctype="multipart/form-data">

                <input type="hidden" name="_method" value="PUT">

                {{ csrf_field() }}

                <div class="form-group">
                    <label> Jenis Barang </label>
                    <input type="text" value="{{$jenisbarang->jenis_barang}}" class="form-control" name="kode" />
                </div>

                <input type="submit" class="btn btn-primary" value="Simpan">
                <a href="{{url('jenisbarang')}}" class="btn btn-warning">Batal</a>


            </form>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function(){
            $('input.tanggal').datepicker();
        })

    </script>
@endpush