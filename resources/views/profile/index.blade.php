@extends('layouts.main')

@section('content')

<div class="row">

<div class="col-md-4">


  <div class="box box-danger">

    <div class="box-header">

    </div>

    <div class="box-body text-center">
      <div class="col-md-12">
        @if( Auth::user()->image === null)
        <img src="/images/default.png" class="img-responsive" width="300" alt="">
        @else
        <img src="/images/{{ Auth::user()->image }}" class="img-responsive" width="300" alt="">
        @endif
      </div>
      <div class="col-md-12">
        <h2>{{ Auth::user()->name }}</h2>
      </div>

    </div>

    <div class="modal fade" id="modalAdd">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">Edit Foto Profile</h4>
                </div>
                <div class="modal-body">
                  {!! Form::open(['route' => 'me.update.image', 'method' => 'POST', 'data-parsley-validate' => '', 'files' => true]) !!}
                    <fieldset>

                      <div class="col-md-12">
                        {{ Form::label('image', 'Berkas ( Gambar ):') }}
                        <div class="form-group">
                          <div class="btn btn-default btn-file">
                            <i class="fa fa-paperclip"></i> Upload File
                            {{ Form::file('image', ['accept' => 'image/*']) }}
                          </div>
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="form-group">
                          <button class="btn btn-success" type="submit">Simpan</button>
                          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        </div>
                      </div>
                    </fieldset>
                  {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalPassword">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">Edit Foto Profile</h4>
                </div>
                <div class="modal-body">
                  {!! Form::open(['route' => 'me.update.password', 'method' => 'POST', 'data-parsley-validate' => '', 'files' => true]) !!}
                    <fieldset>

                      <div class="col-md-12">
                        <div class="form-group">
                          {{ Form::label('password', 'Password :') }}
          			          {{ Form::password('password', ['class' => 'form-control', 'required' => '']) }}
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="form-group">
                          <button class="btn btn-success" type="submit">Simpan</button>
                          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        </div>
                      </div>
                    </fieldset>
                  {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

    <div class="box-footer">
      <div class="col-md-12">
        <a href="#!" data-toggle="modal" data-target="#modalPassword" class="btn btn-default"><i class="fa fa-edit"></i> Edit Password</a>
        <a href="#!" data-toggle="modal" data-target="#modalAdd" class="btn btn-default pull-right"><i class="fa fa-image"></i> Edit Picture</a>
        <!-- <a href="#" class="btn btn-danger pull-right">Blokir</a> -->
      </div>

    </div>

  </div>

</div>

<div class="col-md-8">


  <div class="box box-danger">

    <div class="box-header">
      <h3 class="box-title">Profile Detail</h3>
    </div>



    <div class="box-body">
      <div class="col-md-12 table-responsive">
        <table class="table">
          <tr>
            <td>Nama Lengkap</td>
            <td>:</td>
            <td>{{ $user->name }}</td>
          </tr>
          <tr>
            <td>E-mail</td>
            <td>:</td>
            <td>{{ $user->email }}</td>
          </tr>
          <tr>
            <td>NIP</td>
            <td>:</td>
            <td>{{ $user->nip }}</td>
          </tr>
          <tr>
            <td>Tempat, Tanggal Lahir</td>
            <td>:</td>
            <td>{{ $user->pob }}, {{ date('d M Y', strtotime($user->dob)) }}</td>
          </tr>
          <tr>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td>{{ $user->gender }}</td>
          </tr><tr>
            <td>Status Pernikahan</td>
            <td>:</td>
            <td>{{ $user->married }}</td>
          </tr>
          <tr>
            <td>Agama</td>
            <td>:</td>
            <td>{{ $user->religion }}</td>
          </tr>
          <tr>
            <td>Golongan</td>
            <td>:</td>
            <td>{{ $user->golongan }}</td>
          </tr>
          <tr>
            <td>PT</td>
            <td>:</td>
            <td>{{ $user->pt }}</td>
          </tr>
          <tr>
            <td>Alamat PT</td>
            <td>:</td>
            <td>{{ $user->pt_address }}</td>
          </tr>
          <tr>
            <td>Telepon PT</td>
            <td>:</td>
            <td>{{ $user->pt_telephone }}</td>
          </tr>
          <tr>
            <td>Alamat</td>
            <td>:</td>
            <td>{{ $user->address }}</td>
          </tr>
          <tr>
            <td>Telepon</td>
            <td>:</td>
            <td>{{ $user->telephone }}</td>
          </tr>

        </table>
      </div>
    </div>

    <div class="box-footer">
      <div class="col-md-12">
        <a href="{{ url('me/edit') }}" class="btn btn-default"><i class="fa fa-edit"></i> Edit Profile</a>
      </div>
    </div>

  </div>

</div>

</div>

@endsection
