<?php
/** @var \App\Models\invoice[] $invoices */
?>
@extends('template')
@section('content')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Semua Invoice
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
            <div class="row mt-3">
                <div class="col-12">
                    <table id="table_id" class="display">
                        <thead>
                        <tr>
                            <th>ID Invoce</th>
                            <th>Tanggal Kirim</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($invoices as $invoice)
                            <tr>
                                <td>{{$invoice->id_invoice}}</td>
                                <td>{{$invoice->tgl_kirim}}</td>
                                <td>{{$invoice->status}}</td>
                                <td><a href="{{url('invoice/'.$invoice->id_invoice)}}" class="btn btn-primary btn-sm">Detail</a></td>
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
