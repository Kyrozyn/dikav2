<?php
/** @var \App\Models\kendaraan $k */
/** @var */
?>
@extends('template')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Invoice untuk kendaraan {{$k->nama_kendaraan}} ({{$k->plat_kendaraan}})
                <small></small>
            </h1>
        </section>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
        <!-- Main content -->
        <section class="content container-fluid">
            <!--------------------------
                  | Your Page Content Here |
                  -------------------------->
            <div class="row">
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Total Berat</h5>
                            <p class="card-text text-bold">{{$totalWt}} Kg</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title ">Total Harga</h5>
                            <p class="card-text text-bold">Rp. {{number_format($totalVal,0,',','.')}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title ">Jumlah Barang</h5>
                            <p class="card-text text-bold">{{count($pickedItems)}}</p>
                        </div>
                    </div>
                </div>
            </div>
            {{Aire::open()->action(url('kendaraan/baru'))}}
            <div class="row">
                <div class="col col-sm-12 col-lg-6">
                    {{Aire::date('tanggal_kirim','Tanggal Kirim')->id('nama_kendaraan')->defaultValue(\Carbon\Carbon::now()->toDateString())->min(\Carbon\Carbon::now()->toDateString())}}
                </div>
            </div>
            <div class="row">
                <div class="col col-sm-12 col-lg-6">
                    {{Aire::submit('Buat Invoice')}}
                </div>
            </div>
            {{ Aire::close()}}
        </section>
        <!-- /.content -->
    </div>
@endsection
