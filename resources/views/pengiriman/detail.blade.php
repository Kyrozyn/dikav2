@extends('template')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Detail Pengiriman
                <small></small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">
            <!--------------------------
              | Your Page Content Here |
              -------------------------->
            <?php
            $date = new DateTime();
            ?>
            <div class="row" style="padding-top: 10px;padding-bottom: 10px">
                <div class="col-12">
                    <a href="{{url('/laporanresi/'.$pengiriman->no_resi)}}" class="btn btn-block btn-primary">Cetak Resi</a>
                </div>
            </div>
            {{Aire::open()->bind($pengiriman)->action(url('pengiriman/edit'))}}
            <div class="row">
                <div class="col col-sm-12 col-lg-6">
                    {{Aire::input('no_resi','No Resi')->id('no_resi')->defaultValue('LS'.$date->getTimestamp().rand(0,9))->readOnly()}}
                </div>
            </div>
            <div class="row">
                <div class="col col-sm-12 col-lg-6">
                    {{Aire::input('nama_pengirim','Nama Pengirim')->id('nama_pengirim')->required()->readOnly()}}
                </div>
            </div>
            <div class="row">
                <div class="col col-sm-12 col-lg-6">
                    {{Aire::input('nama_penerima','Nama Penerima')->id('nama_penerima')->required()->readOnly()}}
                </div>
            </div>
            <div class="row">
                <div class="col col-sm-12 col-lg-6">
                    {{Aire::input('alamat','Alamat')->id('alamat')->required()->readOnly()}}
                </div>
            </div>
            <div class="row">
                <div class="col col-sm-12 col-lg-6">
                    {{Aire::input('no_telp_pengirim','No Telp Pengirim')->id('no_telp_pengirim')->required()->pattern('[0-9]+')->readOnly()}}
                </div>
            </div>
            <div class="row">
                <div class="col col-sm-12 col-lg-6">
                    {{Aire::input('no_telp_penerima','No Telp Penerima')->id('no_telp_penerima')->required()->pattern('[0-9]+')->readOnly()}}
                </div>
            </div>
            <div class="row">
                <div class="col col-sm-12 col-lg-6">
                    {{Aire::date('tgl_masuk','Tanggal Masuk')->id('tgl_masuk')->required()->readOnly()}}
                </div>
            </div>
            <div class="row">
                <div class="col col-sm-12 col-lg-6">
                    {{Aire::input('deskripsi','Deskripsi')->id('deskripsi')->required()->readOnly()}}
                </div>
            </div>
            <div class="row">
                <div class="col col-sm-12 col-lg-6">
                    {{Aire::input('berat','Berat')->id('berat')->required()->pattern('[0-9]+')->readOnly()->append('Kg')}}
                </div>
            </div>
            <div class="row">
                <div class="col col-sm-12 col-lg-6">
                    {{Aire::input('lebar','Lebar')->id('lebar')->required()->pattern('[0-9]+')->readOnly()->append('cm')}}
                </div>
            </div>
            <div class="row">
                <div class="col col-sm-12 col-lg-6">
                    {{Aire::input('panjang','Panjang')->id('panjang')->required()->pattern('[0-9]+')->readOnly()->append('cm')}}
                </div>
            </div>
            <div class="row">
                <div class="col col-sm-12 col-lg-6">
                    {{Aire::input('tinggi','Tinggi')->id('tinggi')->required()->pattern('[0-9]+')->readOnly()->append('cm')}}
                </div>
            </div>
            <div class="row">
                <div class="col col-sm-12 col-lg-6">
                    {{Aire::input('harga','Harga')->id('harga')->required()->pattern('[0-9]+')->readOnly()->prepend('Rp. ')}}
                </div>
            </div>
            {{ Aire::close() }}
        </section>
        <!-- /.content -->
    </div>
@endsection
