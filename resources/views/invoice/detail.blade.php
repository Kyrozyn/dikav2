<?php
/** @var \App\Models\pengiriman[] $pengirimans */
/** @var \App\Models\invoice $invoice */
/** @var */
?>
@extends('template')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Detail Invoice {{$invoice->id_invoice}}
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
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Total Berat</h5>
                            <p class="card-text text-bold">{{$berat}} Kg</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title ">Total Harga</h5>
                            <p class="card-text text-bold">Rp. {{number_format($harga,0,',','.')}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title ">Status</h5>
                            <p class="card-text text-bold">{{$invoice->status}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title ">Kendaraan</h5>
                            <p class="card-text text-bold">{{$invoice->id_kendaraan}}</p>
                        </div>
                    </div>
                </div>
            </div>
            @if($invoice->status == 'Diterima')
            <div class="row" style="padding-top: 10px">
                <div class="col-12">
                    <a href="{{url('/laporaninvoice/'.$invoice->id_invoice)}}" class="btn btn-block btn-primary">Cetak Invoice</a>
                </div>
            </div>
            @endif
            <div class="row mt-3">
                <div class="col-12">
                    <table id="table_id" class="display">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>No Resi</th>
                            <th>Harga</th>
                            <th>Berat</th>
                            <th>Posisi X</th>
                            <th>Posisi Y</th>
                            <th>Posisi Z</th>
                            <th>Volume</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($pengirimans as $a => $key)
                            <tr>
                                <?php
                                /** @var array $hargas */
                                /** @var integer $key */
                                /** @var array $berats */
                                ?>
                                <td>{{$a+1}}</td>
                                <td><a href="{{url('/pengiriman/show?')}}{{$key->no_resi}}">{{$key->no_resi}}</a></td>
                                <td>Rp. {{number_format($key->harga,0,',','.')}}</td>
                                <td>{{$key->berat}} Kg</td>
                                <td>{{$key->pivot->posisix}}</td>
                                <td>{{$key->pivot->posisiy}}</td>
                                <td>{{$key->pivot->posisiz}}</td>
                                <td>{{$key->pivot->volume}}</td>
                                {{--                        <td><a href="{{url('/rekomendasi/kendaraan/'.$kendaraan->id_kendaraan)}}" class="btn btn-primary btn-sm">Rekomendasi Pengiriman</a> </td>--}}
                            </tr>
                        @endforeach
                        {{--                    <tr>--}}
                        {{--                        <td colspan="2"><b>Total</b></td>--}}
                        {{--                        <td>Rp. {{number_format($totalVal,0,',','.')}}</td>--}}
                        {{--                        <td>{{$totalWt}} Kg</td>--}}
                        {{--                    </tr>--}}
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script type="text/javascript" charset="utf8"
                src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
        <script>
            $(document).ready(function () {
                $.noConflict();
                $('#table_id').DataTable();
            });
        </script>
        <!-- /.content -->
    </div>
@endsection
