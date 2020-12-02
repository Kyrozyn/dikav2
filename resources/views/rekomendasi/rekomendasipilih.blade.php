<?php
/** @var \App\Models\kendaraan $k */
/** @var  */
?>
@extends('template')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Rekomendasi Pengiriman untuk kendaraan {{$k->nama_kendaraan}} ({{$k->plat_kendaraan}})
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
                    <th>Barang</th>
                    <th>Harga</th>
                    <th>Berat</th>
                </tr>
                </thead>
                <tbody>
                <?php $totalVal = $totalWt = 0; ?>
                @foreach($pickedItems as $a => $key)
                    <tr>
                        <?php
                        /** @var array $hargas */
                        /** @var integer $key */
                        /** @var array $berats */
                        $totalVal += $hargas[$key];
                        $totalWt += $berats[$key]; ?>
                        <td>{{$a+1}}</td>
                        <td>{{$barangs[$key]}}</td>
                        <td>Rp. {{number_format($hargas[$key],2,',','.')}}</td>
                        <td>{{$berats[$key]}} Kg</td>
{{--                        <td><a href="{{url('/rekomendasi/kendaraan/'.$kendaraan->id_kendaraan)}}" class="btn btn-primary btn-sm">Rekomendasi Pengiriman</a> </td>--}}
                    </tr>
                @endforeach
                <tr><td colspan="2"><b>Total</b></td><td>Rp. {{number_format($totalVal,2,',','.')}}</td><td>{{$totalWt}} Kg</td></tr>
                </tbody>
            </table>
{{--                            <tr><td colspan="2"><b>Total</b></td><td>{{$totalVal}}</td><td>{{$totalWt}}</td></tr>--}}

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
