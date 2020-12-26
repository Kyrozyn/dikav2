<?php
/** @var \DVDoug\BoxPacker\PackedBoxList $box */
/** @var \App\Models\kendaraan $k*/
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
            <div class="row">
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Total Berat</h5>
                            <p class="card-text text-bold">{{$box->getIterator()[$opsi]->getWeight()}} Kg</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title ">Total Volume Barang</h5>
                            <p class="card-text text-bold">{{$box->getIterator()[$opsi]->getUsedVolume()}} cm³</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title ">Aksi</h5>
{{--                            <p class="card-text text-bold">--}}
                            <div class="row">
                                <div class="col-6">
                                    <a href="{{url('/rekomendasi/kendaraan/'.$k->id_kendaraan.'/invoice')}}" class="btn btn-primary btn-sm" onclick="return confirm('Apakah anda yakin?')">Buat Invoice Pengiriman</a>
                                </div>
                                <div class="col-6">
                                    <a href="{{url('/rekomendasi')}}" class="btn btn-danger btn-sm">Batalkan Rekomendasi</a>
                                </div>
                            </div>
{{--                            </p>--}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <form class="form-horizontal">
                        <fieldset>
                            <!-- Select Basic -->
                            <div class="form-group">
                                <label class="col-md-12 control-label" for="rekomendasi">Opsi Rekomendasi</label>
                                <div class="col-md-12">
                                    <select id="rekomendasi" name="rekomendasi" class="form-control">
                                        @foreach($box as $key => $boxx)
                                            @if($opsi == $key)
                                                <option selected value="{{url('/rekomendasi/kendaraan'.'/'.$k->id_kendaraan.'/'.$key)}}">Rekomendasi {{$key+1}}</option>
                                            @else
                                                <option value="{{url('/rekomendasi/kendaraan'.'/'.$k->id_kendaraan.'/'.$key)}}">Rekomendasi {{$key+1}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                    <script>
                        document.getElementById("rekomendasi").addEventListener('change', function () {
                            window.location = this.value;
                        }, false);
                    </script>

                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12">
                    <table id="table_id" class="display">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>No Resi</th>
                            <th>Berat</th>
                            <th>Posisi X</th>
                            <th>Posisi Y</th>
                            <th>Posisi Z</th>
                            <th>Volume</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($box->getIterator()[$opsi]->getItems() as $a => $barang)
                            <tr>
                                <td>{{$a+1}}</td>
                                <td><a href="{{url('/pengiriman/show?')}}{{$barang->getItem()->getDescription()}}">{{$barang->getItem()->getDescription()}}</a></td>
                                <td>{{$barang->getItem()->getWeight()}} Kg</td>
                                <td>{{$barang->getX()}}</td>
                                <td>{{$barang->getY()}}</td>
                                <td>{{$barang->getZ()}}</td>
                                <td>{{$barang->getVolume()}} cm³</td>
                                {{--                        <td><a href="{{url('/rekomendasi/kendaraan/'.$kendaraan->id_kendaraan)}}" class="btn btn-primary btn-sm">Rekomendasi Pengiriman</a> </td>--}}
                            </tr>
                        @endforeach
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
