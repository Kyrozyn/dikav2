@extends('template')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Input Pengiriman Baru
                <small>Untuk penginputan pengiriman baru</small>
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
            {{Aire::open()->action('pengiriman/input')}}
            <div class="row">
                <div class="col col-sm-12 col-lg-6">
                    {{Aire::input('no_resi','No Resi')->id('no_resi')->value('LS'.$date->getTimestamp().rand(0,9))->readOnly()}}
                </div>
            </div>
            <div class="row">
                <div class="col col-sm-12 col-lg-6">
                    {{Aire::input('nama_pengirim','Nama Pengirim')->id('nama_pengirim')->required()}}
                </div>
            </div>
            <div class="row">
                <div class="col col-sm-12 col-lg-6">
                    {{Aire::input('nama_penerima','Nama Penerima')->id('nama_penerima')->required()}}
                </div>
            </div>
            <div class="row">
                <div class="col col-sm-12 col-lg-6">
                    {{Aire::input('no_telp_pengirim','No Telp Pengirim')->id('no_telp_pengirim')->required()->pattern('[0-9]+')}}
                </div>
            </div>
            <div class="row">
                <div class="col col-sm-12 col-lg-6">
                    {{Aire::input('no_telp_penerima','No Telp Penerima')->id('no_telp_penerima')->required()->pattern('[0-9]+')}}
                </div>
            </div>
            <div class="row">
                <div class="col col-sm-12 col-lg-6">
                    {{Aire::date('tgl_masuk','Tanggal Masuk')->id('tgl_masuk')->required()}}
                </div>
            </div>
            <div class="row">
                <div class="col col-sm-12 col-lg-6">
                    {{Aire::input('deskripsi','Deskripsi')->id('deskripsi')->required()}}
                </div>
            </div>
            <div class="row">
                <div class="col col-sm-12 col-lg-6">
                    {{Aire::input('berat','Berat')->id('berat')->required()->pattern('[0-9]+')->append('berat dalam satuan Kilogram')}}
                </div>
            </div>
            <div class="row">
                <div class="col col-sm-12 col-lg-6">
                    {{Aire::input('harga','Harga')->id('harga')->required()->pattern('[0-9]+')}}
                </div>
            </div>
            <div class="row">
                <div class="col col-sm-12 col-lg-6">
                    {{Aire::submit('Input Pengiriman')}}
                </div>
            </div>
            {{ Aire::close() }}
        </section>
        <!-- /.content -->
    </div>
@endsection
