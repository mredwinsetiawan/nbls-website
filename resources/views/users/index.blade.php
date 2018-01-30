@extends('layouts.main')

@section('content')

    <div class="row">

        <div class="modal fade" id="modalAdd">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="defaultModalLabel">Tambah User</h4>
                    </div>

                    <form class="" action="{{ route('users.store') }}" method="post" data-parsley-validate>

                        <div class="modal-body">
                            <fieldset>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> Foto : </label>
                                        <input type="file" name="company_logo">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label> Nama Lengkap : </label>
                                        <input type="text" name="fullname" class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> Nomot KTP : </label>
                                        <input type="number" name="ktp_id" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> Username : </label>
                                        <input type="text" name="username" class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> E-mail : </label>
                                        <input type="email" name="email" class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> Kata Sandi: </label>
                                        <input type="password" name="password" class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label> Telepon : </label>
                                        <input type="number" name="phone" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label> Nomor Handphone 1 : </label>
                                        <input type="number" name="mobile" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label> Nomor Handphone 2 : </label>
                                        <input type="number" name="mobile2" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label> PIN BBM : </label>
                                        <input type="text" name="pin_bb" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label> Kode Pos : </label>
                                        <input type="text" name="zipcode" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label> Alamat : </label>
                                        <textarea class="form-control" name="address" rows="3"></textarea>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label> Catatan : </label>
                                        <textarea class="form-control" name="notes" rows="3"></textarea>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label> Hobi : </label>
                                        <textarea class="form-control" name="hobby" rows="3"></textarea>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label> Alasan : </label>
                                        <textarea class="form-control" name="reason" rows="3"></textarea>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label> Facebook : </label>
                                        <input type="text" name="fb" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label> Twitter : </label>
                                        <input type="text" name="tw" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label> Website : </label>
                                        <input type="text" name="website" class="form-control">
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

            <div class="box box-primary">

                <div class="box-header">
                    <h3 class="box-title">Daftar User</h3>
                    <br>
                    <a class="btn btn-info pull-left col-md-1" href="#!" data-toggle="modal" data-target="#modalAdd">
                        <span class="fa fa-plus"></span>
                    </a>

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
                                <td>
                                    {!! Form::open(['route' => ['changeRole', $user->id], 'method' => 'PUT', 'data-parsley-validate' => '', 'files' => true]) !!}
                                    <fieldset>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <select class="form-control" name="role_id">
                                                    @foreach($roles as $role)
                                                        <option value="{{ $role->id }}" {{ $user->role->id === $role->id ? 'selected' : ''}}>{{ $role->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-info"><i class="fa fa-refresh"></i>
                                            </button>
                                        </div>

                                    </fieldset>
                                    {!! Form::close() !!}
                                </td>

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

@endsection

@section('script')
    <script type="text/javascript">
        function addRole(user_id, role_id) {

            $.ajax({
                method: 'POST',
                url: '/users/add-role/',
                data: {
                    user_id: user_id,
                    role_id: role_id
                },
                async: true,
                success: function (response) {
                    var data = response;
                    console.log(data.length);
                    $("a#user" + user_id).append('sss');
                },
                error: function (data) {
                    console.log(data);
                    alert("fail" + ' ' + this.data)
                },
            });

        }

        function deleteRole(user_id, role_id) {

            // $.ajax({
            //   method: 'POST',
            //   url: '/users/delete-role/',
            //   data: {
            //     user_id: user_id,
            //     role_id: role_id
            //   },
            //   async: true,
            //   success: function(response){
            //       $("#" + role_id).remove();
            //   },
            //   error: function(data){
            //       console.log(data);
            //       alert("fail" + ' ' + this.data)
            //   },
            // });

        }
    </script>
@endsection
