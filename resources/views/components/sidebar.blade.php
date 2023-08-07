<div class="navbar nav_title" style="border: 0;">
    <a href="" class="site_title">
        <center>
            <img src="{{ asset('images/logo_hoki.png') }}" alt="logo" class="img-fluid" width="80%">
        </center>
    </a>
</div>

<div class="clearfix"></div>

<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <ul class="nav side-menu ">
            {{-- Menu Role Akses Cashier --}}
            @if (auth()->user()->Role()->where('name', 'cashier')->exists())
                <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
                </li>
                <li><a><i class="fa fa-download"></i> Pembelian <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ route('purchase') }}">Pembelian</a></li>
                        <li><a href="{{ route('purchase.return') }}">Retur Pembelian</a></li>
                    </ul>
                </li>
                <li><a><i class="fa fa-upload"></i> Penjualan <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ route('sale') }}">Penjualan</a></li>
                        <li><a href="{{ route('voucher-sale') }}">Penjualan Voucher</a></li>
                    </ul>
                </li>
                <li><a><i class="fa fa-cubes"></i> Gudang <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ route('item') }}">Data Barang</a></li>
                        <li><a href="{{ route('mutation') }}">Mutasi Barang</a></li>
                        <li><a href="{{ route('adjustment') }}">Adjustment</a></li>
                    </ul>
                </li>
                <li><a><i class="fa fa-file-text-o"></i> Akutansi <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="/">Master Akun</a></li>
                        <li><a href="{{ route('accountancy.journal') }}">Jurnal</a></li>
                    </ul>
                </li>
            @endif

            {{-- Menu Role Akses Admin --}}
            @if (auth()->user()->Role()->where('name', 'admin')->exists())
                <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
                </li>
                <li><a><i class="fa fa-download"></i> Pembelian <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ route('purchase') }}">Pembelian</a></li>
                        <li><a href="{{ route('purchase.return') }}">Retur Pembelian</a></li>
                        <li><a href="{{ route('supplier') }}">Supplier</a></li>
                        <li><a href="{{ route('purchase.report') }}">Lap Pembelian</a></li>
                        <li><a href="{{ route('purchase.return_report') }}">Lap Retur Pembelian</a></li>
                    </ul>
                </li>
                <li><a><i class="fa fa-upload"></i> Penjualan <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ route('sale') }}">Penjualan</a></li>
                        <li><a href="/">Posting jurnal penjualan</a></li>
                        <li><a href="/">Posting jurnal penjualan admin</a></li>
                    </ul>
                </li>
                <li><a><i class="fa fa-ticket"></i> Voucher <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ route('voucher-sale') }}">Penjualan Voucher</a></li>
                        <li><a href="{{ route('voucher-item') }}">Voucher Barang</a></li>
                        <li><a href="{{ route('voucher-member') }}">Voucher Anggota</a></li>
                        <li><a href="/">Master Data Voucher</a></li>
                    </ul>
                </li>
                <li><a><i class="fa fa-cubes"></i> Gudang <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ route('item') }}">Data Barang</a></li>
                        <li><a href="{{ route('mutation') }}">Mutasi Barang</a></li>
                        <li><a href="{{ route('adjustment') }}">Adjustment</a></li>
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
                        <li><a href="{{ route('member') }}">Data Anggota</a></li>
                        <li><a href="/">Tagihan Piutang</a></li>
                        <li><a href="/">Voucher Beras</a></li>
                        <li><a href="/">Distribusi Pembagian SHU</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('log-activity') }}"><i class="fa fa-gears"></i> Log Activity</a>
                </li>
            @endif

            {{-- Menu Role Akses Super Admin --}}
            @if (auth()->user()->Role()->where('name', 'superadmin')->exists())
                <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
                </li>
                <li><a><i class="fa fa-download"></i> Pembelian <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ route('purchase') }}">Pembelian</a></li>
                        <li><a href="{{ route('purchase.return') }}">Retur Pembelian</a></li>
                        <li><a href="{{ route('supplier') }}">Supplier</a></li>
                        <li><a href="{{ route('purchase.report') }}">Lap Pembelian</a></li>
                        <li><a href="{{ route('purchase.return_report') }}">Lap Retur Pembelian</a></li>
                    </ul>
                </li>
                <li><a><i class="fa fa-upload"></i> Penjualan <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ route('sale') }}">Penjualan</a></li>
                        <li><a href="/">Posting jurnal penjualan</a></li>
                        <li><a href="/">Posting jurnal penjualan admin</a></li>
                    </ul>
                </li>
                <li><a><i class="fa fa-ticket"></i> Voucher <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ route('voucher-sale') }}">Penjualan Voucher</a></li>
                        <li><a href="{{ route('voucher-item') }}">Voucher Barang</a></li>
                        <li><a href="{{ route('voucher-member') }}">Voucher Anggota</a></li>
                        <li><a href="/">Master Data Voucher</a></li>
                    </ul>
                </li>
                <li><a><i class="fa fa-cubes"></i> Gudang <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ route('item') }}">Data Barang</a></li>
                        <li><a href="{{ route('mutation') }}">Mutasi Barang</a></li>
                        <li><a href="{{ route('adjustment') }}">Adjustment</a></li>
                        <li><a href="{{ route('warehouse.stock') }}">Persediaan</a></li>
                        <li><a href="{{ route('warehouse.stock_outlet') }}">Kartu Stock Outlet</a></li>
                    </ul>
                </li>
                <li><a><i class="fa fa-file-text-o"></i> Akutansi <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="/">Master Akun</a></li>
                        <li><a href="{{ route('accountancy.journal') }}">Tranksaksi Jurnal</a></li>
                        <li><a href="/">Koreksi Fiksal</a></li>
                        <li><a href="{{ route('accountancy.journal_view') }}">Jurnal</a></li>
                        <li><a href="{{ route('accountancy.ledger') }}">Buku besar</a></li>
                        <li><a href="{{ route('accountancy.pph') }}">PPH Terhutang</a></li>
                        <li><a href="{{ route('accountancy.trial') }}">Trial Balance</a></li>
                        <li><a href="{{ route('accountancy.calculation') }}">Penghitungan Hasil Usaha / PHU</a></li>
                        <li><a href="{{ route('accountancy.balance') }}">Neraca Keuangan</a></li>
                    </ul>
                </li>
                <li><a><i class="fa fa-group"></i> Anggota <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ route('member') }}">Data Anggota</a></li>
                        <li><a href="/">Tagihan Piutang</a></li>
                        <li><a href="/">Voucher Beras</a></li>
                        <li><a href="/">Distribusi Pembagian SHU</a></li>
                    </ul>
                </li>
                <li><a><i class="fa fa-database"></i> Outlet <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ route('outlet') }}">Outlet</a></li>
                        <li><a href="{{ route('user-account') }}">User Account</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('log-activity') }}"><i class="fa fa-gears"></i> Log Activity</a>
                </li>
            @endif

            {{-- Menu Role Akses Member --}}
            @if (auth()->user()->Role()->where('name', 'member')->exists())
                <li><a href="{{ route('member.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
                </li>
                <li><a href="{{ route('member.history') }}"><i class="fa fa-book"></i> History Pembelian</a>
                </li>
            @endif
        </ul>
    </div>
</div>
