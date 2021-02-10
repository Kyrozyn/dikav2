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
                            <th>Warna</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($jumlahx= $jumlahy= 0 )
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
                                    @if($key->pivot->posisiz ==0)
                                        @php($jumlahx = $jumlahx+$key->pivot->posisix)
                                        @php($jumlahy = $jumlahy+$key->pivot->posisiy)
                                    @endif
                                    <td style="background-color: {{$key->pivot->warna}}">{{$key->pivot->warna}}</td>
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
            <section class="content-header">
                <h1>
                    Rekomendasi Penataan
                    <small></small>
                </h1>
            </section>
            <div class="row mt-3">
                <div id="visualize" style="padding: 30px"></div>
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pixi.js/5.1.3/pixi.min.js"></script>
        <script>
            let vs = document.getElementById('visualize');
            const app = new PIXI.Application({
                antialias: true,
                transparent: true,
                width: {{$jumlahx}},
                {{--height: {{$jumlahy}}--}}
            });
            vs.appendChild(app.view);
            const graph = new PIXI.Graphics;
            @foreach($pengirimans as $a => $barang)
            var randomColor = "{{$barang->pivot->warna}}"
            var rc = randomColor.replace("#", "0x")
            var color = rc;
            graph.lineStyle(0.5, color, 1);
            // graph.beginFill(color);
            graph.drawRect({{$barang->pivot->posisix}}, {{$barang->pivot->posisiy}}, {{$barang->pivot->width}}, {{$barang->pivot->length}});
            // graph.endFill();
            @endforeach
                app.stage.scale.x = 8
            app.stage.scale.y = 8
            app.stage.addChild(graph);
        </script>
        <!-- /.content -->
    </div>
@endsection
