<?php
/** @var \App\Models\pengiriman[] $pengirimans */
?>
@extends('template')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dashboard
                <small></small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">
            @if(session('pesan'))
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    {{session('pesan')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
        @endif
        <!--------------------------
          | Your Page Content Here |
          -------------------------->
            <div class="row">
                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Grafik Semua Pengiriman</h5>
                            <canvas id="pengiriman" ></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Grafik Pengiriman Pending</h5>
                            <canvas id="pengiriman_pending" ></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Grafik Pengiriman Terkirim</h5>
                            <canvas id="pengiriman_terkirim" ></canvas>
                        </div>
                    </div>
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

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
    <script>
        var ctx = document.getElementById('pengiriman').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [
                    @foreach($pengirimans as $key => $pengiriman)
                    @if($key == array_key_last($pengirimans))
                    "{{$pengiriman->tgl_masuk}}"
                    @else
                    "{{$pengiriman->tgl_masuk}}",
                    @endif
                    @endforeach
                ],
                datasets: [{
                    label: 'Jumlah Pengiriman',
                    data: [
                        @foreach($pengirimans as $key => $pengiriman)
                        @if($key == array_key_last($pengirimans))
                        {{$pengiriman->jumlah}}
                        @else
                        {{$pengiriman->jumlah.","}}
                        @endif
                        @endforeach],
                    borderWidth: 1
                }]
            },
        });
        var myLineChart = new Chart(ctx, {
            type: 'line',
            data: data,
            options: options
        });
    </script>
    <script>
        var ctx = document.getElementById('pengiriman_pending').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [
                    @foreach($pengirimans_pending as $key => $pengiriman)
                        @if($key == array_key_last($pengirimans))
                        "{{$pengiriman->tgl_masuk}}"
                    @else
                        "{{$pengiriman->tgl_masuk}}",
                    @endif
                    @endforeach
                ],
                datasets: [{
                    label: 'Jumlah Pengiriman Pending',
                    data: [
                        @foreach($pengirimans_pending as $key => $pengiriman)
                        @if($key == array_key_last($pengirimans))
                        {{$pengiriman->jumlah}}
                        @else
                        {{$pengiriman->jumlah.","}}
                        @endif
                        @endforeach],
                    borderWidth: 1
                }]
            },
        });
        var myLineChart = new Chart(ctx, {
            type: 'line',
            data: data,
            options: options
        });
    </script>
    <script>
        var ctx = document.getElementById('pengiriman_terkirim').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [
                    @foreach($pengirimans_terkirim as $key => $pengiriman)
                        @if($key == array_key_last($pengirimans))
                        "{{$pengiriman->tgl_masuk}}"
                    @else
                        "{{$pengiriman->tgl_masuk}}",
                    @endif
                    @endforeach
                ],
                datasets: [{
                    label: 'Jumlah Pengiriman Terkirim',
                    data: [
                        @foreach($pengirimans_terkirim as $key => $pengiriman)
                        @if($key == array_key_last($pengirimans))
                        {{$pengiriman->jumlah}}
                        @else
                        {{$pengiriman->jumlah.","}}
                        @endif
                        @endforeach],
                    borderWidth: 1
                }]
            },
        });
        var myLineChart = new Chart(ctx, {
            type: 'line',
            data: data,
            options: options
        });
    </script>
@endsection
