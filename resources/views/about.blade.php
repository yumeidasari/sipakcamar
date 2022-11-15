<!doctype html>
<html class="no-js" lang="zxx">

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>SIPAKCAMAR | Halaman Data Peminjaman Aset</title>
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
	<!-- untuk kalender -->
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />
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
                                    <a class="boxed_btn_orange" href="{{url('form-peminjaman/create')}}">
                                        <i class="flaticon-user"></i>
                                        <span>Ajukan Peminjaman</span>
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
				<h3>Jadwal Data Peminjaman Aset Kantor Kecamatan Manggar</h3>
			</div>
			<!-- bradcam_area_end -->

	<!-- Start Sample Area -->
	<section class="sample-text-area">
	<div class="container box_1170">
			
		<div class="row">
			<div class="col">
                <div class="form-group">
                   
                </div>
			</div>
			<div class="col">
			<label> Masukkan Data Pencarian Berdasarkan Nama Bulan</label> 
			<form action="{{url('/about')}}" method="GET">
                                    
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
		</div>
		
		<hr>
        
		<br>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No. </th>
					<th>Nama Aset/Barang</th>
					<th>Tanggal Pakai</th>
					<th>Tanggal Selesai Pakai</th>
					<th>Jumlah Pakai</th>
					<th>Sisa Barang</th>
					
                </tr>
            </thead>
            <tbody>
                @foreach($semua_transaksi as $no => $transaksi)
                <tr>
                    <td> {{++$no + ($semua_transaksi->currentPage()-1) * $semua_transaksi->perPage()}}</td>
                    <td> {{$transaksi->nama_barang}}</td>
					<td> {{Carbon\Carbon::parse($transaksi->tgl_mulai_pakai)->translatedformat('d F Y')}}</td>
					<td> {{Carbon\Carbon::parse($transaksi->tgl_selesai)->translatedformat('d F Y')}}</td>
					<td> {{$transaksi->jml_pinjam}}</td>
					<td> {{($transaksi->jumlah - $transaksi->jml_pinjam)}}</td>
					
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="10">{{$semua_transaksi->links()}}</th>
                </tr>
            </tfoot>
        </table>
	<br>
	<!-- untuk kalender -->
		<div id='calendar'></div>
	</div>
	</section>
	<!-- End Sample Area -->

	
	
	<!-- End Align Area -->
    <!-- footer -->
    <footer class="footer footer_bg_1">
        <!--div class="footer_top">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-md-6 col-lg-4">
                        <div class="footer_widget">
                            <div class="footer_logo">
                                <a href="#">
                                    <img  src="{{ asset ('new/ppdb.png')}}" style="width:180px" height="100px" alt="">
                                </a>
                            </div>
                            <p>
                                Pilihlah Jurusan yang kamu sukai dan sesuai dengan minat dan bakatmu, <br>
                                Jangan dengarkan kata orang lain dan ikuti kata hatimu!!
                            </p>
                            <div class="socail_links">
                                <ul>
                                    <li>
                                        <a href="https://mobile.facebook.com/profile.php?id=100025985352169&_rdc=1&_rdr">
                                            <i class="ti-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://twitter.com/riana_ftri">
                                            <i class="ti-twitter-alt"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.instagram.com/izzatul______/?hl=en">
                                            <i class="fa fa-instagram"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.youtube.com/channel/UCcie4VEPRMkS2I3xT_HxpqA/featured?view_as=subscriber">
                                            <i class="fa fa-youtube-play"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-2 offset-xl-1 col-md-6 col-lg-3">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Terima Kasih!!
                            </h3>
                            <ul>
                                
                                <li><a href="#"> Photoshop</a></li>
                                <li><a href="#">Illustrator</a></li>
                                <li><a href="#">UI/UX</a></li>
                            </ul>

                        </div>
                    </div>
                    <div class="col-xl-2 col-md-6 col-lg-2">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Informasi Lebih Lanjut
                            </h3>
                            <ul>
                                
                                <li><a href="#"> Tentang Kami</a></li>
                                <li><a href="#"> Kontak</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 col-lg-3">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Alamat
                            </h3>
                            <p>
                                Jl.Tuanku Nan Biru-Ampang Gadang,VII Koto Talago <br>
                                Kec.Guguak,Kab.Lima Puluh Kota,Sumatera Barat 26253
                                (0752)97318<br>
                               Zandri081@gmail.com
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div-->
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
	
	<!-- kalender-->
	<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
	<script>
    $(document).ready(function() {
        // page is now ready, initialize the calendar...
        $('#calendar').fullCalendar({
            // put your options and callbacks here
            events : [
                @foreach($semua_transaksi as $transaksi)
                {
                    title : '{{$transaksi->nama_barang}}',
                    start : '{{$transaksi->tgl_mulai_pakai}}',
                    url : ''
                },
                @endforeach
            ]
        })
    });
	</script>
</body>
</html>