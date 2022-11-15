@extends('layouts.stisla.index', ['title' => 'Halaman Transaksi Peminjaman Barang', 'page_heading' => 'Transaksi Permohonan Peminjaman Barang'])

@section('content')
<head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">  
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
	<style>
		.custom {
		width: 110px !important;
		}
		.custom1 {
		width: 30px !important;
		}
	</style>
</head>
    <div class="container pt-1">
		
        <hr>
        
		<br>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No. </th>
					<th>Nama Pemohon</th>
					<th>Kategori</th>
					<th>Nama Aset/Barang</th>
					<th>Tanggal Pakai</th>
					<th>Tanggal Selesai</th>
					<th width="120px">Status</th>
                    <!--th><center>Action </center></th-->
                </tr>
            </thead>
            <tbody>
                @foreach($semua_transaksi as $no => $transaksi)
                <tr>
                    <td> {{++$no + ($semua_transaksi->currentPage()-1) * $semua_transaksi->perPage()}}</td>
                    <td> {{$transaksi->nama_peminjam}}</td>
					<td> {{$transaksi->refpeminjam->kategori}}</td>
					<td> {{$transaksi->barang->nama_barang}}</td>
					<td> {{Carbon\Carbon::parse($transaksi->tgl_mulai_pakai)->translatedformat('d F Y')}}</td>
					<td> {{Carbon\Carbon::parse($transaksi->tgl_selesai)->translatedformat('d F Y')}}</td>
					@if($transaksi->status == 0)
						<td width="120px">
							
								<a href="{{url("/form-peminjaman/$transaksi->id/transaksi_confirm_status")}}" class="btn btn-success btn-sm custom1" ><i class='nav-icon fas fa-check' style='color: white'></i></a>
								<a href="{{url("/form-peminjaman/$transaksi->id/transaksi_tolak_status")}}" class="btn btn-danger btn-sm custom1" ><i class='nav-icon fas fa-times' style='color: white'></i></a>
							
						</td>
					@elseif($transaksi->status== 1)
						<td>Diterima</td>
					@else
						<td>Ditolak</td>
					@endif
					
                    <!--td><center>
                        <a href="{{url("/form-peminjaman/$transaksi->id")}}" class="btn btn-success btn-sm"><i class='fa fa-file' style='color: white'></i></a>
                        <a href="{{url("/form-peminjaman/$transaksi->id/delete")}}" class="btn btn-danger btn-sm"><i class='fa fa-trash' style='color: white'></i></a>
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