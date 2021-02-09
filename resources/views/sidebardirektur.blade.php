<ul class="sidebar-menu" data-widget="tree">
    <li class="header">Dashboard</li>
    <li class="{{ Request::is('dashboard') ? 'active' : '' }}"><a href="{{url('dashboard')}}"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
    <li class="header">Invoice</li>
    <li class="{{ Request::is('invoice/verifikasi') ? 'active' : '' }}"><a href="{{url('/invoice/verifikasi')}}"><i class="fa fa-send"></i> <span>Verifikasi Invoice</span></a></li>
    <li class="{{ Request::is('invoice') ? 'active' : '' }}"><a href="{{url('/invoice')}}"><i class="fa fa-send"></i> <span>Lihat Semua Invoice</span></a></li>

    <li class="header">Laporan</li>
    {{--    <li class="treeview">--}}
    {{--        <a href="#"><i class="fa fa-link"></i> <span>Pengiriman</span>--}}
    {{--            <span class="pull-right-container">--}}
    {{--                <i class="fa fa-angle-left pull-right"></i>--}}
    {{--              </span>--}}
    {{--        </a>--}}
    {{--        <ul class="treeview-menu">--}}
    {{--            <li class="active"><a href="{{url('/pengiriman/baru')}}"><i class="fa fa-send"></i> <span>Pengiriman Baru</span></a></li>--}}
    {{--            <li class="active"><a href="{{url('/pengiriman/lihat')}}"><i class="fa fa-box"></i> <span>Lihat Semua Pengiriman</span></a></li>--}}
    {{--            <li><a href="#">Link in level 2</a></li>--}}
    {{--        </ul>--}}
    {{--    </li>--}}

    {{--    <li><a href="#"><i class="fa fa-link"></i> <span>Another Link</span></a></li>--}}
    {{--    <li class="treeview">--}}
    {{--        <a href="#"><i class="fa fa-link"></i> <span>Multilevel</span>--}}
    {{--            <span class="pull-right-container">--}}
    {{--                <i class="fa fa-angle-left pull-right"></i>--}}
    {{--              </span>--}}
    {{--        </a>--}}
    {{--        <ul class="treeview-menu">--}}
    {{--            <li><a href="#">Link in level 2</a></li>--}}
    {{--            <li><a href="#">Link in level 2</a></li>--}}
    {{--        </ul>--}}
    {{--    </li>--}}
</ul>
