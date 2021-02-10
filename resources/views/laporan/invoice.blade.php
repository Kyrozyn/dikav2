<?php
/** @var \App\Models\invoice $invoice */
/** @var \App\Models\kendaraan $kendaraan */
?>
    <!doctype html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print Invoice</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>
        body{
            -webkit-print-color-adjust:exact;
        }
    </style>
</head>
<body>
<div class="row">
    <div class="col-1"><img style="height: 100px" src="{{url('logo.jpg')}}"></div>
    <div class="col-11">
        <h4 class="text-center">Lasusua Foundation</h4>
        <h5 class="text-center">Jl. Sungai Sadang Baru No 7, Kota Makassar.</h5>
        <h6 class="text-center">Telp. 085242317777 & 082333388883</h6>
    </div>
</div>
<hr>
<hr>
<div class="row">
    <div class="col-12">
        <h4 class="text-center">Invoice #{{$invoice->id_invoice}}</h4>
    </div>
</div>
<hr>
<div class="container">
    <div class="row">
        <table class="table table-bordered">
            <tr>
                <td style="width: 20%">Plat No Kendaraan</td>
                <td style="width: 1%;">:</td>
                <td>{{$kendaraan->plat_kendaraan}}</td>
            </tr>
            <tr>
                <td style="width: 20%">Nama Kendaraan</td>
                <td style="width: 1%;">:</td>
                <td>{{$kendaraan->nama_kendaraan}}</td>
            </tr>
        </table>
    </div>
    <div class="row">
        <h5>Daftar Barang : </h5>
    </div>
    <hr>
    <div class="row">
        <table class="table table-bordered">
            <thead>
            <tr class="text-center">
                <th>No</th>
                <th>No Resi</th>
                <th>Nama Penerima</th>
                <th>Alamat</th>
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
            @foreach($invoice->pengiriman as $no => $pengiriman)
            <tr>
                <td>{{$no+1}}</td>
                <td>{{$pengiriman->no_resi}}</td>
                <td>{{$pengiriman->nama_penerima}}</td>
                <td>{{$pengiriman->alamat}}</td>
                <td>{{$pengiriman->berat}} kg</td>
                <td>{{$pengiriman->pivot->posisix}}</td>
                <td>{{$pengiriman->pivot->posisiy}}</td>
                <td>{{$pengiriman->pivot->posisiz}}</td>
                <td>{{$pengiriman->pivot->volume}} cm³</td>
                <td style="background-color: {{$pengiriman->pivot->warna}};color: {{$pengiriman->pivot->warna}}">{{$pengiriman->pivot->warna}}</td>
                @if($pengiriman->pivot->posisiz ==0)
                    @php($jumlahx = $jumlahx+$pengiriman->pivot->posisix)
                    @php($jumlahy = $jumlahy+$pengiriman->pivot->posisiy)
                @endif
            </tr>
            @endforeach
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
<div class="row">
    <h6>Dicetak pada tanggal {{date('d-m-Y')}} jam {{date("h:i:sa")}}</h6>
</div>
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
    @foreach($invoice->pengiriman  as $a => $barang)
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
    <script type="text/javascript">
        window.print();
</script>
</body>
</html>
