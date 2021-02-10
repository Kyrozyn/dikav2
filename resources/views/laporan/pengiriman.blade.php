<?php
/** @var \App\Models\pengiriman[] $pengirimans */
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
        <h4 class="text-center">Laporan Pengiriman dari tanggal {{$tanggal_awal}} s/d {{$tanggal_akhir}}</h4>
    </div>
</div>
<hr>
<div class="container">
    <div class="row">
        <table class="table table-bordered">
            <tr>
                <td style="width: 20%">Jumlah Pengiriman</td>
                <td style="width: 1%;">:</td>
                <td>{{count($pengirimans)}}</td>
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
                <th>Tanggal Masuk</th>
                <th>Nama Penerima</th>
                <th>Alamat</th>
                <th>Berat</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            @foreach($pengirimans as $no => $pengiriman)
                <tr>
                    <td>{{$no+1}}</td>
                    <td>{{$pengiriman->no_resi}}</td>
                    <td>{{$pengiriman->tgl_masuk}}</td>
                    <td>{{$pengiriman->nama_penerima}}</td>
                    <td>{{$pengiriman->alamat}}</td>
                    <td>{{$pengiriman->berat}} kg</td>
                    <td>{{$pengiriman->status}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="row">
    <h6>Dicetak pada tanggal {{date('d-m-Y')}} jam {{date("h:i:sa")}}</h6>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pixi.js/5.1.3/pixi.min.js"></script>
<script type="text/javascript">
    window.print();
</script>
</body>
</html>
