<?php
/** @var \App\Models\pengiriman $pengiriman */
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
        <h4 class="text-center">No Resi #{{$pengiriman->no_resi}}</h4>
    </div>
</div>
<hr>
<div class="container">
    <div class="row">
        <table class="table table-bordered table-condensed text-sm">
            <tr>
                <td style="width: 20%">Tanggal Masuk</td>
                <td style="width: 1%;">:</td>
                <td colspan="4">{{$pengiriman->tgl_masuk}}</td>
            </tr>
            <tr>
                <td style="width: 20%">Nama Pengirim</td>
                <td style="width: 1%;">:</td>
                <td>{{$pengiriman->nama_pengirim}}</td>
                <td style="width: 20%">No Telp Pengirim</td>
                <td style="width: 1%;">:</td>
                <td>{{$pengiriman->no_telp_pengirim}}</td>
            </tr>
            <tr>
                <td style="width: 20%">Nama Penerima</td>
                <td style="width: 1%;">:</td>
                <td>{{$pengiriman->nama_penerima}}</td>
                <td style="width: 20%">No Telp Penerima</td>
                <td style="width: 1%;">:</td>
                <td>{{$pengiriman->no_telp_penerima}}</td>
            </tr>
            <tr>
                <td style="width: 20%">Alamat Tujuan</td>
                <td style="width: 1%;">:</td>
                <td colspan="4">{{$pengiriman->alamat}}</td>
            </tr>
            <tr>
                <td style="width: 20%">Deskripsi Barang</td>
                <td style="width: 1%;">:</td>
                <td colspan="4">{{$pengiriman->deskripsi}}</td>
            </tr>
            <tr>
                <td style="width: 20%">Lebar</td>
                <td style="width: 1%;">:</td>
                <td>{{$pengiriman->lebar}} cm</td>
                <td style="width: 20%">Panjang</td>
                <td style="width: 1%;">:</td>
                <td>{{$pengiriman->panjang}} cm</td>
            </tr>
            <tr>
                <td style="width: 20%">Tinggi</td>
                <td style="width: 1%;">:</td>
                <td>{{$pengiriman->tinggi}} cm</td>
                <td style="width: 20%">Berat</td>
                <td style="width: 1%;">:</td>
                <td>{{$pengiriman->berat}} kg</td>
            </tr>
            <tr>
                <td style="width: 20%">Harga</td>
                <td style="width: 1%;">:</td>
                <td colspan="4">Rp. {{$pengiriman->harga}}</td>
            </tr>
        </table>
    </div>
    <div class="row">
        <h6>Dicetak pada tanggal {{date('d-m-Y')}} jam {{date("h:i:sa")}}</h6>
    </div>
</div>
<script type="text/javascript">
    window.print();
</script>
</body>
</html>
