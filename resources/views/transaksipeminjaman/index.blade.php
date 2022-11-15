@extends('layouts.stisla.index', ['title' => 'Halaman Transaksi Peminjaman Barang', 'page_heading' => 'Transaksi Peminjaman Barang'])

@section('content')
<head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">  
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
</head>
    <div class="container pt-1">
		<div class="row">
			<div class="col">
				<a href="{{url('/transaksipeminjaman/create')}}" class="btn btn-primary"> Tambah </a>
			</div>
			<!--Form pencarian belum jalan-->
            <form action="{{url('/transaksipeminjaman')}}" method="GET">
                                    
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" name="search" placeholder="Search by bulan...">
                    <span class="input-group-btn">
                        <span class="input-group-btn">
					        <button class="btn btn-default" type="submit"><i class="fa fa-search"></i> Cari</button>
					     </span>
                     </span>
                    </div>
                    
            </form>
		</div>
        <hr>
        
		<br>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No. </th>
					<th>Nama Aset/Barang</th>
					<th>Tanggal Pakai</th>
                    <!--th><center>Action </center></th-->
                </tr>
            </thead>
            <tbody>
                @foreach($semua_transaksi as $no => $transaksi)
                <tr>
                    <td> {{++$no + ($semua_transaksi->currentPage()-1) * $semua_transaksi->perPage()}}</td>
                    <td> {{$transaksi->nama_barang}}</td>
					<td> {{Carbon\Carbon::parse($transaksi->tgl_mulai_pakai)->translatedformat('d F Y')}}
                    <!--td><center>
                        <a href="{{url("/transaksipeminjaman/$transaksi->id/edit")}}" class="btn btn-info btn-sm"><i class='fa fa-edit' style='color: white'></i></a>
                        <a href="{{url("/transaksipeminjaman/$transaksi->id")}}" class="btn btn-success btn-sm"><i class='fa fa-file' style='color: white'></i></a>
                        <a href="{{url("/transaksipeminjaman/$transaksi->id/delete")}}" class="btn btn-danger btn-sm"><i class='fa fa-trash' style='color: white'></i></a>
                    </center>
                    </td-->
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="10">{{$semua_transaksi->links()}}</th>
                </tr>
            </tfoot>
        </table>
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