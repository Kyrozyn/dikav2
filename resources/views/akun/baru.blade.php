@extends('template')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Input Akun Baru
                <small>Untuk penginputan akun baru</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">
            <!--------------------------
              | Your Page Content Here |
              -------------------------->
            {{Aire::open()->action(url('akun/baru'))}}
            <div class="row">
                <div class="col col-sm-12 col-lg-6">
                    {{Aire::input('username','Username')->id('username')->required()}}
                </div>
            </div>
            <div class="row">
                <div class="col col-sm-12 col-lg-6">
                    {{Aire::password('password','Password')->id('password')->required()}}
                </div>
            </div>
            <div class="row">
                <div class="col col-sm-12 col-lg-6">
                    {{Aire::select(['Direktur' => 'Direktur','Kepala Gudang' => 'Kepala Gudang'],'role','Role')->id('role')->required()}}
                </div>
            </div>
            <div class="row">
                <div class="col col-sm-12 col-lg-6">
                    {{Aire::submit('Input Akun Baru')}}
                </div>
            </div>
            {{ Aire::close() }}
        </section>
        <!-- /.content -->
    </div>
@endsection
