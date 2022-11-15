<!doctype html>
<html class="no-js" lang="zxx">

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>SIPAKCAMAR | Form Peminjaman Aset</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- <link rel="manifest" href="site.webmanifest"> -->
    
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/storage/img/logo-beltim.png')}}">
	<!-- Place favicon.ico in the root directory -->

	<!-- CSS here -->
	<link rel="stylesheet" href="{{ asset('edumark/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{ asset('edumark/css/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{ asset('edumark/css/magnific-popup.css')}}">
	<link rel="stylesheet" href="{{ asset('edumark/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{ asset('edumark/css/themify-icons.css')}}">
	<link rel="stylesheet" href="{{ asset('edumark/css/nice-select.css')}}">
	<link rel="stylesheet" href="{{ asset('edumark/css/flaticon.css')}}">
	<link rel="stylesheet" href="{{ asset('edumark/css/gijgo.css')}}">
	<link rel="stylesheet" href="{{ asset('edumark/css/animate.css')}}">
	<link rel="stylesheet" href="{{ asset('edumark/css/slicknav.css')}}">
	<link rel="stylesheet" href="{{ asset('edumark/css/style.css')}}">
	<!-- <link rel="stylesheet" href="css/responsive.css"> -->
	
</head>

<body>
	<!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- header-start -->
    <header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid p-0">
                    <div class="row align-items-center no-gutters">
                        <div class="col-xl-2 col-lg-2">
                            <div class="logo-img">
                                <a href="{{ route('login') }}">
                                    <img src="{{ asset('/storage/img/logo.png')}}" style="width:400px" height="100px" alt="">
                                    <!--img src="{{ asset('/storage/img/pakcamar-logo.png')}}" style="width:200px" height="100px" alt=""-->
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-7">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="{{url('/')}}">Menu Utama</a></li>
                                        
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                            <div class="log_chat_area d-flex align-items-center">
                                <div class="live_chat_btn">
                                    <a class="boxed_btn_orange" href="{{url('about')}}">
                                        <i class="fa fa-phone"></i>
                                        <span>Lihat Data Peminjaman</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->
	
		<!-- bradcam_area_start -->
		<div class="bradcam_area breadcam_bg overlay2">
				<h3>Form Peminjaman Aset Kantor Kecamatan Manggar</h3>
			</div>
			<!-- bradcam_area_end -->

	<!-- Start Sample Area -->
	<section class="sample-text-area">
	<div class="container box_1170">
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
		<form action="{{url('/form-peminjaman')}}" method="POST" enctype="multipart/form-data">

                {{ csrf_field() }}

			<div class="form-group">
                    <label> Nama Aset/Barang</label>
                    <select name="barang_id" class="form-control">
                        <option value="">Pilih Aset/Barang</option>
                        @foreach($barang as $b)
                            <option value="{{$b->id}}"> {{$b->nama_barang}} </option>
                        @endforeach
                    </select>
            </div>
			
			<div class="form-group">
                    <label> Kategori Peminjam</label>
                    <select name="refpeminjam_id" class="form-control">
                        <option value="">Pilih Kategori Peminjam</option>
                        @foreach($kategoripeminjam as $k)
                            <option value="{{$k->id}}"> {{$k->kategori}} </option>
                        @endforeach
                    </select>
            </div>
			
			<div class="form-group">
                    <label for=""> Nama Peminjam </label>
                    <input type="text" name="nama_peminjam" class="form-control">
            </div>
				
			<div class="form-group">
                    <label for=""> No. HP/TELP *)Pastikan Nomor Telp Anda selalu aktif</label>
                    <input type="text" name="no_telp" class="form-control">
            </div>
			
			<div class="form-group">
                    <label for=""> Email </label>
                    <input type="text" name="email" class="form-control">
            </div>
			
			<div class="form-group">
                    <label for=""> Alamat Peminjam </label>
                    <input type="text" name="alamat" class="form-control">
            </div>
			
			<div class="form-group">
                    <label for=""> Deskripsi Kegiatan</label>
                    <input type="text" name="deskripsi_kegiatan" class="form-control">
            </div>
			
			<div class="form-group">
                    <label> Waktu Pemakaian</label>
                    <select class=form-control name="waktu_pemakaian">
                        <option value="SIANG">SIANG</option>
                        <option value="MALAM">MALAM</option>
                    </select>
            </div>
			
			<div class="form-group">
                    <label> Tanggal Mulai Pakai</label>
                    <!--input type="text" class=" tanggal" name="nd_tgl_nodin" autocomplete="off"-->
					<input type="text" class="date form-control" name="tgl_mulai_pakai" id="datepicker3">
					
            </div>
			
			<div class="form-group">
                    <label> Tanggal Selesai</label>
                    <!--input type="text" class=" tanggal" name="nd_tgl_nodin" autocomplete="off"-->
					<input type="text" class="date form-control" name="tgl_selesai" id="datepicker4">
					
            </div>
			
			<div class="form-group">
                    <label> Jumlah Barang </label>
                     <input type="text" name="jumlah_barang" class="form-control">
					
            </div>
			
                <input type="submit" class="btn btn-primary" value="Simpan">
                <!--a href="{{url('form-peminjaman')}}" class="btn btn-warning">Daftar Transaksi</a-->

            </form>
		</div>
	</div>
	</section>
	<!-- End Sample Area -->

	
	
	<!-- End Align Area -->
    <!-- footer -->
    <footer class="footer footer_bg_1">
        
        <div class="copy-right_text">
            <div class="container">
                <div class="footer_border"></div>
                <div class="row">
                    <div class="col-xl-12">
                        <p class="copy_right text-center">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Dibuat  <i class="fa fa-heart-o" aria-hidden="true"></i> Oleh <a href="#" target="_blank">TIM IT DISKOMINFO</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer -->
		<!-- link that opens popup -->
	
		<!-- form itself end-->
		<form id="test-form" class="white-popup-block mfp-hide">
			<div class="popup_box ">
				<div class="popup_inner">
					<div class="logo text-center">
						<a href="#">
							<img src="{{ asset('edumark/img/form-logo.png')}}" alt="">
						</a>
					</div>
					<h3>Sign in</h3>
					<form action="#">
						<div class="row">
							<div class="col-xl-12 col-md-12">
								<input type="email" placeholder="Enter email">
							</div>
							<div class="col-xl-12 col-md-12">
								<input type="password" placeholder="Password">
							</div>
							<div class="col-xl-12">
								<button type="submit" class="boxed_btn_orange">Sign in</button>
							</div>
						</div>
					</form>
					<p class="doen_have_acc">Don’t have an account? <a class="dont-hav-acc" href="#test-form2">Sign Up</a> </p>
				</div>
			</div>
		</form>
		<!-- form itself end -->
	
		<!-- form itself end-->
		<form id="test-form2" class="white-popup-block mfp-hide">
			<div class="popup_box ">
				<div class="popup_inner">
					<div class="logo text-center">
						<a href="#">
							<img src="{{ asset('edumark/img/form-logo.png')}}" alt="">
						</a>
					</div>
					<h3>Resistration</h3>
					<form action="#">
						<div class="row">
							<div class="col-xl-12 col-md-12">
								<input type="email" placeholder="Enter email">
							</div>
							<div class="col-xl-12 col-md-12">
								<input type="password" placeholder="Password">
							</div>
							<div class="col-xl-12 col-md-12">
								<input type="Password" placeholder="Confirm password">
							</div>
							<div class="col-xl-12">
								<button type="submit" class="boxed_btn_orange">Sign Up</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</form>
		<!-- form itself end -->

	<!-- JS here -->
	<script src="{{ asset ('edumark/js/vendor/modernizr-3.5.0.min.js')}}"></script>
	<script src="{{ asset ('edumark/js/vendor/jquery-1.12.4.min.js')}}"></script>
	<script src="{{ asset ('edumark/js/popper.min.js')}}"></script>
	<script src="{{ asset ('edumark/js/bootstrap.min.js')}}"></script>
	<script src="{{ asset ('edumark/js/owl.carousel.min.js')}}"></script>
	<script src="{{ asset ('edumark/js/isotope.pkgd.min.js')}}"></script>
	<script src="{{ asset ('edumark/js/ajax-form.js')}}"></script>
	<script src="{{ asset ('edumark/js/waypoints.min.js')}}"></script>
	<script src="{{ asset ('edumark/js/jquery.counterup.min.js')}}"></script>
	<script src="{{ asset ('edumark/js/imagesloaded.pkgd.min.js')}}"></script>
	<script src="{{ asset ('edumark/js/scrollIt.js')}}"></script>
	<script src="{{ asset ('edumark/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{ asset ('edumark/js/wow.min.js')}}"></script>
	<script src="{{ asset ('edumark/js/nice-select.min.js')}}"></script>
	<script src="{{ asset ('edumark/js/jquery.slicknav.min.js')}}"></script>
	<script src="{{ asset ('edumark/js/jquery.magnific-popup.min.js')}}"></script>
	<script src="{{ asset ('edumark/js/plugins.js')}}"></script>
	<script src="{{ asset ('edumark/js/gijgo.min.js')}}"></script>

	<!--contact js-->
	<script src="{{ asset ('edumark/js/contact.js')}}"></script>
	<script src="{{ asset ('edumark/js/jquery.ajaxchimp.min.js')}}"></script>
	<script src="{{ asset ('edumark/js/jquery.form.js')}}"></script>
	<script src="{{ asset ('edumark/js/jquery.validate.min.js')}}"></script>
	<script src="{{ asset ('edumark/js/mail-script.js')}}"></script>

	<script src="{{ asset ('edumark/js/main.js')}}"></script>
    <script>
        $('#datepicker').datepicker({
            iconsLibrary: 'fontawesome',
            disableDaysOfWeek: [0, 0],
        //     icons: {
        //      rightIcon: '<span class="fa fa-caret-down"></span>'
        //  }
        });
        $('#datepicker2').datepicker({
            iconsLibrary: 'fontawesome',
            icons: {
             rightIcon: '<span class="fa fa-caret-down"></span>'
         }

        });
        var timepicker = $('#timepicker').timepicker({
         format: 'HH.MM'
     });
    </script>
	
	<script type="text/javascript">  
        $('#datepicker3').datepicker({ 
            autoclose: true   
              
         });

		$('#datepicker4').datepicker({ 
            autoclose: true   
              
         });		 
    </script>
</body>
</html>