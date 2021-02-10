@extends('template')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Laporan Pengiriman
                <small></small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">
            <form method="post" action="{{route('laporankirimpost')}}">
                {{csrf_field()}}
                <div class="form-group row">
                    <label for="text" class="col-4 col-form-label">Tanggal Awal</label>
                    <div class="col-8">
                        <div class="input-group">
                            <input id="tanggal_awal" name="tanggal_awal" type="date" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="text" class="col-4 col-form-label">Tanggal Akhir</label>
                    <div class="col-8">
                        <div class="input-group">
                            <input id="tanggal_akhir" name="tanggal_akhir" type="date" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="offset-4 col-8">
                        <button name="submit" type="submit" class="btn btn-primary">Cetak</button>
                    </div>
                </div>
            </form>
        </section>
        <!-- /.content -->
    </div>
@endsection
