<div class="navbar nav_title" style="border: 0;">
  <a href="index.html" class="site_title">
    <center>
      <img src="{{ asset('images/logo_hoki.png') }}" alt="logo" class="img-fluid" width="80%">
    </center>
  </a>
</div>

<div class="clearfix"></div>

<!-- menu profile quick info -->
<div class="profile clearfix">
  <div class="profile_info">
    <span>Welcome,</span>
    <h2>
      @if (auth()->check())
      <p><strong>{{ auth()->user()->name }}</strong></p>
      @else
      <p>Anda Belum Login</p>
      @endif
    </h2>
  </div>
</div>
<!-- /menu profile quick info -->

<br />

<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
  <div class="menu_section">
    <ul class="nav side-menu">
      <li><a><i class="fa fa-upload"></i> Penjualan <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="/sale">Penjualan</a></li>
          <li><a href="/">Pembelian cicilan</a></li>
          <li><a href="/">Posting jurnal penjualan</a></li>
          <li><a href="/">Posting jurnal penjualan admin</a></li>
        </ul>
      </li>
      <li><a><i class="fa fa-download"></i> Pembelian <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="/">Data Suplier</a></li>
          <li><a href="{{ route('purchase') }}">Pembelian</a></li>
          <li><a href="/return-purchase">Retur Pembelian</a></li>
          <li><a href="/report-purchase">Lap Pembelian</a></li>
          <li><a href="/">Lap Retur Pembelian</a></li>
        </ul>
      </li>
      <li><a><i class="fa fa-file-text-o"></i> Akutansi <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="/">Master Akun</a></li>
          <li><a href="/">Tranksaksi Jurnal</a></li>
          <li><a href="/">Koreksi Fiksal</a></li>
          <li><a href="/">Jurnal</a></li>
          <li><a href="/bukubesar">Buku besar</a></li>
          <li><a href="/">PPH Terhutang</a></li>
          <li><a href="/">Trial Balance</a></li>
          <li><a href="/">Penghitungan Hasil Usaha / PHU</a></li>
          <li><a href="/">Neraca Keuangan</a></li>
        </ul>
      </li>
      <li><a><i class="fa fa-cubes"></i> Gudang <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="/">Data Toko / Outlet</a></li>
          <li><a href="/">Data Barang</a></li>
          <li><a href="/">Mutasi Barang</a></li>
          <li><a href="/adjustment">Adjust</a></li>
          <li><a href="/">Persediaan</a></li>
          <li><a href="/">Kartu Stock Outlet</a></li>
          <li><a href="/">Mutasi</a></li>
        </ul>
      </li>
      <li><a><i class="fa fa-group"></i> Anggota <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="/">Estate/OU</a></li>
          <li><a href="/">Data Anggota</a></li>
          <li><a href="/">Tagihan Piutang</a></li>
          <li><a href="/">Voucher Beras</a></li>
          <li><a href="/">Distribusi Pembagian SHU</a></li>
        </ul>
      <li><a><i class="fa fa-gears"></i> Pengaturan <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="/">User Account</a></li>
          <li><a href="/">Change Password</a></li>
          <li><a href="/">Log Activity</a></li>
        </ul>
      </li>
      <li><a href="/profiless"><i class="fa fa-user"></i> Profile <span class="fa fa-chevron-down"></span></a>

      </li>
    </ul>
  </div>
</div>