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
            <!--------------------------
              | Your Page Content Here |
              -------------------------->
            {{$table}}
        </section>
        <!-- /.content -->
    </div>
@endsection
