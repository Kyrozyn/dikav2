<?php
/** @var array $pengirimans */
/** @var \App\Models\pengiriman $pengiriman */
?>
@extends('template')
@section('content')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Lihat Data Dalam Gudang (Belum Terkirim)
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
                            <th>No Resi</th>
                            <th>Nama Pengirim</th>
                            <th>Nama Penerima</th>
                            <th>Tanggal Masuk</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($pengirimans as $pengiriman)
                            <tr>
                                <td>{{$pengiriman->no_resi}}</td>
                                <td>{{$pengiriman->nama_pengirim}}</td>
                                <td>{{$pengiriman->nama_penerima}}</td>
                                <td>{{$pengiriman->tgl_masuk}}</td>
                                <td>{{$pengiriman->status}}</td>
                                <td class="align-middle text-right">
                                    <div class="d-flex justify-content-end">
                                        <div id="show-00471909" class="show-action">
                                            <a class="btn btn-link p-0 text-primary" href="{{url('pengiriman/show?'.$pengiriman->no_resi)}}" title="Show">
                                                <i class="fas fa-eye fa-fw"></i>
                                            </a>
                                        </div>
                                        <div id="edit-00471909" class="ml-2 edit-action">
                                            <a class="btn btn-link p-0 text-primary" href="{{url('pengiriman/edit?'.$pengiriman->no_resi)}}" title="Edit">
                                                <i class="fas fa-edit fa-fw"></i>
                                            </a>
                                        </div>
                                        <form id="destroy-00471909" class="ml-2 destroy-action" role="form" method="POST" action="{{url('pengiriman/destroy?'.$pengiriman->no_resi)}}">
                                            <input type="hidden" name="_token" value="{{csrf_token()}}">        <input type="hidden" name="_method" value="DELETE">        <button class="btn btn-link p-0 text-danger" type="submit" title="Destroy" onclick="return confirm('Apa kamu yakin ingin menghapus resi? ')">
                                                <i class="fas fa-trash fa-fw"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
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
