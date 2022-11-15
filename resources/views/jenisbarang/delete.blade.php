@extends('layouts.stisla.index', ['title' => 'Halaman Jenis Barang', 'page_heading' => 'Daftar Jenis Barang'])

@section('content')
        <div class="container pt-5">
            <div class="col-md-6 offset-md-3 ">

                <h3><center>Hapus Jenis Barang?</center></h3>
                
                <!--untuk menampilkan pesan yg didefinisikan pada controller-->
                <center>
                @if(Session::has('pesan'))
                    <div class="alert alert-success">
                        {{ Session::get('pesan')}}
                    </div>
                @endif
                </center>

                <form  method="POST" action="{{url("jenisbarang/$jenisbarang->id")}}"> 

                {{csrf_field()}}
                    <br>
                    <br>
                    <input type="hidden" value="DELETE" name="_method">
                    Anda yakin ingin menghapus {{$jenisbarang->jenis_barang}}?
                    <br>
                    <br>
                    <input value="Ya Hapus" type="submit" class="btn btn-danger">
                    <a href="{{url('jenisbarang')}}" class="btn btn-warning">Batalkan</a>
                    
                </form>

            </div>
        </div>
@endsection