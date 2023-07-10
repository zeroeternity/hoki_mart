<div class="navbar nav_title" style="border: 0;">
  <a href="index.html" class="site_title">
    <center>
      <img src="{{ asset('images/logo_hoki.png') }}" alt="logo" class="img-fluid" width="80%">
    </center>
  </a>
</div>

<div class="clearfix"></div>

<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
  <div class="menu_section">
    <ul class="nav side-menu ">
      <li><a><i class="fa fa-download"></i> Pembelian <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="{{ route('purchase') }}">Pembelian</a></li>
          <li><a href="{{ route('purchase.return') }}">Retur Pembelian</a></li>
          <li><a href="{{ route('purchase.report') }}">Lap Pembelian</a></li>
          <li><a href="{{ route('purchase.return_report') }}">Lap Retur Pembelian</a></li>
        </ul>
      </li>
      <li><a><i class="fa fa-upload"></i> Penjualan <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="{{ route('sale') }}">Penjualan</a></li>
          <li><a href="{{ route('sale.instalment') }}">Penjualan cicilan</a></li>
          <li><a href="/">Posting jurnal penjualan</a></li>
          <li><a href="/">Posting jurnal penjualan admin</a></li>
        </ul>
      </li>
      <li><a><i class="fa fa-cubes"></i> Gudang <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="{{ route('warehouse') }}">Data Barang</a></li>
          <li><a href="{{ route('warehouse.mutation') }}">Mutasi Barang</a></li>
          <li><a href="{{ route('warehouse.adjust') }}">Adjust</a></li>
          <li><a href="{{ route('warehouse.stock') }}">Persediaan</a></li>
          <li><a href="{{ route('warehouse.stock_outlet') }}">Kartu Stock Outlet</a></li>
        </ul>
      </li>
      <li><a><i class="fa fa-file-text-o"></i> Akutansi <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="/">Master Akun</a></li>
          <li><a href="/">Tranksaksi Jurnal</a></li>
          <li><a href="/">Koreksi Fiksal</a></li>
          <li><a href="{{ route('accountancy.journal') }}">Jurnal</a></li>
          <li><a href="{{ route('accountancy.ledger') }}">Buku besar</a></li>
          <li><a href="{{ route('accountancy.pph') }}">PPH Terhutang</a></li>
          <li><a href="{{ route('accountancy.trial') }}">Trial Balance</a></li>
          <li><a href="{{ route('accountancy.calculation') }}">Penghitungan Hasil Usaha / PHU</a></li>
          <li><a href="{{ route('accountancy.balance') }}">Neraca Keuangan</a></li>
        </ul>
      </li>
      <li><a><i class="fa fa-group"></i> Anggota <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="/">Estate/OU</a></li>
          <li><a href="{{ route('member') }}">Data Anggota</a></li>
          <li><a href="/">Tagihan Piutang</a></li>
          <li><a href="/">Voucher Beras</a></li>
          <li><a href="/">Distribusi Pembagian SHU</a></li>
        </ul>
      <li><a><i class="fa fa-database"></i> Master Data <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="{{ route('outlet') }}">Outlet</a></li>
          <li><a href="{{ route('unit') }}">Unit</a></li>
          <li><a href="{{ route('supplier') }}">Supplier</a></li>
          <li><a href="{{ route('estate') }}">Estate</a></li>
        </ul>
      </li>
      <li><a><i class="fa fa-gears"></i> Pengaturan <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="/">User Account</a></li>
          <li><a href="/">Change Password</a></li>
          <li><a href="/">Log Activity</a></li>
        </ul>
      </li>
    </ul>
  </div>
</div>
