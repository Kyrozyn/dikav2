<?php
/** @var array $pengirimans */
/** @var \App\Models\pengiriman $pengiriman */
?>
@extends('template')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Lihat Data Pengiriman
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
            {{$table}}
        </section>
        <!-- /.content -->
    </div>
@endsection
