@extends('layouts.main')

@section('content')

    <div class="row">

        <div class="modal fade" id="modalAdd">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="defaultModalLabel">Tambah Tenant</h4>
                    </div>

                    <form class="" action="{{ route('tenants.store') }}" method="post" data-parsley-validate>

                        <div class="modal-body">
                            <fieldset>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label> Nama : </label>
                                        <input type="text" name="name" class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label> Deskripsi : </label>
                                        <textarea type="text" name="description" class="form-control"
                                                  rows="4"></textarea>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> Subdomain : </label>
                                        <input type="text" name="subdomain" class="form-control" required
                                               maxlength="10">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> Logo Perusahaan : </label>
                                        <input type="file" name="company_logo">
                                    </div>
                                </div>

                            </fieldset>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i
                                        class="fa fa-close"></i> Tutup
                            </button>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="col-xs-12">

            @include('layouts.partials.message')

            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Daftar Tenant</h3>
                    <br>
                    <a class="btn btn-info pull-left col-md-1" href="#!" data-toggle="modal" data-target="#modalAdd">
                        <span class="fa fa-plus"></span>
                    </a>

                </div>
                <div class="box-body">
                    <table class="table js-basic-example dataTable">
                        <thead>
                        <tr>
                            <th>Tenant</th>
                            <th>Subdomain</th>
                            <th>Deskripsi</th>
                            <th>##</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tenants as $tenant)
                            <tr>
                                <td><b>{{ $tenant->name }}</b></td>
                                <td><i>{{ $tenant->subdomain }}</i></td>
                                <td>{{ $tenant->description }}</td>
                                <td>
                                    {{--<a href="#!" title="Open tenant" class="btn btn-success btn-xs"><i--}}
                                                {{--class="fa fa-user-plus"></i> Pilih Expert</a>--}}
                                    <a href="http://{{ $tenant->subdomain  }}.babastudio.test" target="_blank"
                                       class="btn btn-info btn-xs"><i
                                                class="fa fa-globe"></i> Website</a>
                                    <a href="{{ route('tenants.show', $tenant->id) }}" class="btn btn-info btn-xs"><i
                                                class="fa fa-search"></i> Detail</a>
                                    <a href="#!" data-toggle="modal" data-target="#modalDelete{{ $tenant->id }}"
                                       class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</a>
                                </td>
                            </tr>

                            <div class="modal fade" id="modalDelete{{ $tenant->id }}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="defaultModalLabel">Hapus {{ $tenant->name }}
                                                ?</h4>
                                        </div>
                                        <div class="modal-body">
                                            Anda yakin ingin menghapus data ini?
                                        </div>
                                        <div class="modal-footer">
                                            {!! Form::open(['route' => ['tenants.destroy', $tenant->id], 'method' => 'DELETE']) !!}
                                            <button type="button" class="btn btn-default" data-dismiss="modal"> Batal
                                            </button>
                                            <button type="submit" class="btn btn-danger"> Hapus</button>
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </tbody>
                    </table>

                </div>

            </div>

        </div>
    </div>

@endsection
