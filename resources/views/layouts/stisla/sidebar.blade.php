<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
			
            <a href="index.html" class="brand-link">
				<img width="50px" src="{{ asset('/storage/img/beltim.png') }}" alt="Sipakcamar Logo" class="brand-image img-circle elevation-3"
				style="opacity: .8">
				<span><p>SIPAKCAMAR</p></span>
			</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <!--a href="index.html">SIPAK<br>CAMAR</a-->
			<img width="50px" src="{{ asset('/storage/img/beltim.png') }}" alt="Sipakcamar Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
        </div>
		<hr>
		
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item dropdown {{ Request::segment(2) === 'dashboard' ? 'active' : '' }}">
                <a href="{{  url('home') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
			
            <li class="menu-header">Data Master</li>
            <li class="nav-item dropdown {{ Request::segment(2) === 'barang' ? 'active' : '' }}">
                <a href="{{  url('barang') }}" class="nav-link"><i class="fas fa-cubes"></i> <span>Daftar Barang</span></a>
            </li>
			<li class="nav-item dropdown {{ Request::segment(2) === 'barang' ? 'active' : '' }}">
                <a href="{{  url('peminjam') }}" class="nav-link"><i class="fas fa-user"></i> <span>Daftar Peminjam</span></a>
            </li>
			
			<li class="menu-header">Data Referensi</li>
            <li class="nav-item dropdown {{ Request::segment(2) === 'bantuan-dana-operasional' ? 'active' : '' }}">
                <a class="nav-link" href="{{  url('jenisbarang') }}"><i class="fas fa-tools"></i> <span>Jenis Barang</span></a>
            </li>
            <li class="nav-item dropdown {{ Request::segment(2) === 'ruang' ? 'active' : '' }}">
                <a href="{{  url('refpeminjam') }}" class="nav-link"><i class="fas fa-columns"></i> <span>Kategori Peminjam</span></a>
            </li>
			
			<li class="menu-header">Data Transaksi</li>
			<li class="nav-item dropdown {{ Request::segment(2) === 'ruang' ? 'active' : '' }}">
                <a href="{{  url('transaksipeminjaman') }}" class="nav-link"><i class="fas fa-columns"></i> <span>Peminjaman Barang</span></a>
            </li>
			<li class="nav-item dropdown {{ Request::segment(2) === 'ruang' ? 'active' : '' }}">
                <a href="{{  url('form-peminjaman') }}" class="nav-link"><i class="fas fa-columns"></i> <span>Permohonan Peminjaman</span></a>
            </li>
						 
        </ul>
		

        <!--div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a class="btn btn-danger btn-lg btn-block btn-icon-split" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                <i class="fas fa-fw fa-sign-out-alt"></i>
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div-->
    </aside>
</div>