@extends('template')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Input Kendaraan Baru
                <small>Untuk penginputan kendaraan baru</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">
            <!--------------------------
              | Your Page Content Here |
              -------------------------->
            {{Aire::open()->action(url('kendaraan/baru'))}}
            <div class="row">
                <div class="col col-sm-12 col-lg-6">
                    {{Aire::input('nama_kendaraan','Nama Kendaraan')->id('nama_kendaraan')->required()}}
                </div>
            </div>
            <div class="row">
                <div class="col col-sm-12 col-lg-6">
                    {{Aire::input('kapasitas','Kapasitas')->id('kapasitas')->required()->pattern('[0-9]+')->append('Kg')}}
                </div>
            </div>
{{--            <div class="row">--}}
{{--                <div class="col col-sm-12 col-lg-6">--}}
{{--                    {{Aire::input('prioritas','Prioritas')->id('prioritas')->required()->pattern('[0-9]+')}}--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="row">
                <div class="col col-sm-12 col-lg-6">
                    {{Aire::input('plat_kendaraan','Plat Kendaraan')->id('plat_kendaraan')->required()}}
                </div>
            </div>
            <div class="row">
                <div class="col col-sm-12 col-lg-6">
                    {{Aire::select(['Tersedia' => 'Tersedia','Dipakai' => 'Dipakai','Rusak' => 'Rusak'],'status','status')->id('status')->required()}}
                </div>
            </div>
            <div class="row">
                <div class="col col-sm-12 col-lg-6">
                    {{Aire::submit('Input Kendaraan')}}
                </div>
            </div>
            {{ Aire::close() }}
        </section>
        <!-- /.content -->
    </div>
@endsection
