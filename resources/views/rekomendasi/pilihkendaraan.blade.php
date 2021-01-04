<?php
/** @var array $kendaraans */
/** @var \App\Models\kendaraan $kendaraan */
?>
@extends('template')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Pilih Kendaraan
                <small></small>
            </h1>
        </section>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
        <!-- Main content -->
        <section class="content container-fluid">
        <!--------------------------
              | Your Page Content Here |
              -------------------------->
            <table id="table_id" class="display">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Kendaraan</th>
                    <th>Kapasitas</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach($kendaraans as $key => $kendaraan)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$kendaraan->nama_kendaraan}}</td>
                    <td>{{$kendaraan->kapasitas}} Kg</td>
                    <td><a href="{{url('/rekomendasi/kendaraan/'.$kendaraan->id_kendaraan)}}/0" class="btn btn-primary btn-sm">Rekomendasi Pengiriman</a> </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
            <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
            <script>
                $(document).ready( function () {
                    $.noConflict();
                    $('#table_id').DataTable();
                } );
            </script>
        </section>
        <!-- /.content -->
    </div>
@endsection
