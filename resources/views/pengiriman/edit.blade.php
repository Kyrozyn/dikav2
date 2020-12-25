@extends('template')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Edit Pengiriman
                <small>Untuk mengedit data pengiriman</small>
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
            {{Aire::open()->bind($pengiriman)->action(url('pengiriman/edit'))}}
            <div class="row">
                <div class="col col-sm-12 col-lg-6">
                    {{Aire::input('no_resi','No Resi')->id('no_resi')->defaultValue('LS'.$date->getTimestamp().rand(0,9))->readOnly()}}
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
                    {{Aire::input('alamat','Alamat')->id('alamat')->required()}}
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
                    {{Aire::input('berat','Berat')->id('berat')->required()->pattern('[0-9]+')->append('Kg')}}
                </div>
            </div>
            <div class="row">
                <div class="col col-sm-12 col-lg-6">
                    {{Aire::input('lebar','Lebar')->id('lebar')->required()->pattern('[0-9]+')->append('cm')}}
                </div>
            </div>
            <div class="row">
                <div class="col col-sm-12 col-lg-6">
                    {{Aire::input('panjang','Panjang')->id('panjang')->required()->pattern('[0-9]+')->append('cm')}}
                </div>
            </div>
            <div class="row">
                <div class="col col-sm-12 col-lg-6">
                    {{Aire::input('tinggi','Tinggi')->id('tinggi')->required()->pattern('[0-9]+')->append('cm')}}
                </div>
            </div>
            <div class="row">
                <div class="col col-sm-12 col-lg-6">
                    {{Aire::input('harga','Harga')->id('harga')->required()->pattern('[0-9]+')->prepend('Rp. ')}}
                </div>
            </div>
            <div class="row">
                <div class="col col-sm-12 col-lg-6">
                    {{Aire::select(['Dikirim' => 'Dikirim','Terkirim' => 'Terkirim','Pending' => 'Pending'],'status','Status')->id('status')->required()}}
                </div>
            </div>
            <div class="row">
                <div class="col col-sm-12 col-lg-6">
                    {{Aire::submit('Edit Pengiriman')}}
                </div>
            </div>
            {{ Aire::close() }}
        </section>
        <!-- /.content -->
    </div>
@endsection
