@extends('layouts.main')

@section('content')

    <div class="modal fade" id="modalAdd">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">Pilih Expert</h4>
                </div>
                <div class="modal-body">
                    <table class="table js-basic-example dataTable">
                        <thead>
                        <tr>
                            <th>Nama</th>
                            <th>##</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->fullname }}</td>
                                <td>
                                    <form method="post" action="{{ route('users.selectExpert') }}">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="tenant_id" value="{{ $tenant->id }}">
                                        <input type="hidden" name="user_id" value="{{ $user->id }}">

                                        <button type="submit" class="btn btn-success btn-xs pull-right"> Pilih</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <section class="content-header">
        <h1>
            Detail Tenant
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tenants</a></li>
            <li class="active"> {{ $tenant->name }}</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle"
                             src="../../dist/img/user4-128x128.jpg" alt="User profile picture">

                        <h3 class="profile-username text-center"> {{ $tenant->name }}</h3>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b> Courses</b> <a class="pull-right">322</a>
                            </li>
                            <li class="list-group-item">
                                <b> Users</b> <a class="pull-right">5,043</a>
                            </li>
                            <li class="list-group-item">
                                <b> Expert</b> <a class="pull-right"> Tenant Expert</a>
                            </li>
                        </ul>

                        <a href="#!" data-toggle="modal" data-target="#modalAdd" class="btn btn-primary btn-block"><b>
                                Pilih Expert</b></a>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- About Me Box -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"> About</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <strong><i class="fa fa-globe margin-r-5"></i> Laman</strong>

                        <p class="text-muted">
                            <a target="_blank"
                               href="http://{{ $tenant->subdomain }}.babastudio.test">{{ $tenant->subdomain }}
                                .babastudio.test</a>
                        </p>

                        <hr>

                        <strong><i class="fa fa-file-text-o margin-r-5"></i> Deskripsi</strong>

                        <p>{{ $tenant->description }}</p>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->

            <div class="col-md-9">
                <div class="box box-primary">

                    <div class="box-header">
                        <h3 class="box-title">Daftar User</h3>
                    </div>

                    <div class="box-body">
                        <table class="table js-basic-example dataTable">
                            <thead>
                            <tr>
                                <th>Nama</th>
                                <th>E-Mail</th>
                                <th>Peran</th>
                                <th>##</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->fullname }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role->name }}</td>

                                    <td>
                                        <a href="#!" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>

                    </div>

                </div>

            </div>


        </div>
        <!-- /.row -->

    </section>
@endsection
