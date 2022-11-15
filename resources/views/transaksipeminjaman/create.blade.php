@extends('layouts.stisla.index', ['title' => 'Halaman Buat Data Transaksi Peminjaman ', 'page_heading' => 'Buat Data Transaksi Peminjaman'])

@section('content')
<head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">  
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
</head>
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

            <form action="{{url('/transaksipeminjaman')}}" method="POST" enctype="multipart/form-data">

                {{ csrf_field() }}

			<div class="row">
            <div class="col">
                <div class="form-group">
                    <label> Nama Aset/Barang</label>
                    <select name="barang_id" class="form-control">
                        <option value="">Pilih Aset/Barang</option>
                        @foreach($barang as $b)
                            <option value="{{$b->id}}"> {{$b->nama_barang}} </option>
                        @endforeach
                    </select>
                </div>
			</div>
			<div class="col">
               <div class="form-group">
                    <label> Nama Peminjam</label>
                    <select name="peminjam_id" class="form-control">
                        <option value="">Pilih Data Peminjam</option>
                        @foreach($peminjam as $p)
                            <option value="{{$p->id}}"> {{$p->nama_peminjam}} </option>
                        @endforeach
                    </select>
                </div>
			</div>
			</div>
			
			<div class="row">
            <div class="col">
                <div class="form-group">
                    <label for=""> Deskripsi Kegiatan</label>
                    <input type="text" name="deskripsi_kegiatan" class="form-control">
                </div>
			</div>
			<div class="col">
                <div class="form-group">
                    <label> Waktu Pemakaian</label>
                    <select class=form-control name="waktu_pemakaian">
                        <option value="SIANG">SIANG</option>
                        <option value="MALAM">MALAM</option>
                    </select>
                </div>
			</div>
			</div>
			
			<div class="row">
            <div class="col">
				 <div class="form-group">
                    <label> Tanggal Mulai Pakai</label>
                    <!--input type="text" class=" tanggal" name="nd_tgl_nodin" autocomplete="off"-->
					<input type="text" class="date form-control" name="tgl_mulai_pakai" id="datepicker">
					
                </div>
			</div>
			<div class="col">
				<div class="form-group">
                    <label> Tanggal Selesai</label>
                    <!--input type="text" class=" tanggal" name="nd_tgl_nodin" autocomplete="off"-->
					<input type="text" class="date form-control" name="tgl_selesai" id="datepicker1">
					
                </div>
			</div>
			<div class="col">
				<div class="form-group">
                    <label> Jumlah Barang </label>
                     <input type="text" name="jml_pinjam" class="form-control">
					
                </div>
			</div>
			</div>

			

                <input type="submit" class="btn btn-primary" value="Simpan">
                <a href="{{url('transaksipeminjaman')}}" class="btn btn-warning">Daftar Transaksi</a>

            </form>
       
    </div>
	
	<script type="text/javascript">  
        $('#datepicker').datepicker({ 
            autoclose: true   
              
         });

		$('#datepicker1').datepicker({ 
            autoclose: true   
              
         });		 
    </script>
@endsection