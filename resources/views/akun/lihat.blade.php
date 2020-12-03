<?php
/** @var \App\Models\akun[] $akuns */
?>
@extends('template')
@section('content')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Semua Akun
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
                        <th>Username</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($akuns as $akun)
                    <tr>
                        <td>{{$akun->username}}</td>
                        <td>{{$akun->role}}</td>
                        <td class="align-middle text-right">
                            <div class="d-flex justify-content-end">
                                <div id="edit-00471909" class="ml-2 edit-action">
                                    <a class="btn btn-link p-0 text-primary" href="{{url('akun/edit?'.$akun->username)}}" title="Edit">
                                        <i class="fas fa-edit fa-fw"></i>
                                    </a>
                                </div>
                                <form id="destroy-00471909" class="ml-2 destroy-action" role="form" method="POST" action="{{url('akun/destroy?'.$akun->username)}}">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">        <input type="hidden" name="_method" value="DELETE">        <button class="btn btn-link p-0 text-danger" type="submit" title="Destroy" onclick="return confirm('Apa kamu yakin ingin menghapus akun? ')">
                                        <i class="fas fa-trash fa-fw"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
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
