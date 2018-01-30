@extends('layouts.main')

@section('content')

<div class="row">


<div class="col-md-12">


  <div class="box box-danger">

    <div class="box-header">
      <h3 class="box-title">Daftar Anggota</h3>


    </div>

    <div class="box-body">

        <table class="table js-basic-example dataTable">
          <thead>
            <tr>
              <th>Nama</th>
              <th>Email</th>
              <th>Alamat</th>
              <th>##</th>
            </tr>
          </thead>
          <tbody>
            @foreach($research->members as $user)
            <tr>
              <td>{{ $user->name }}</td>
              <td>{{ $user->email }}</td>
              <td>{{ $user->address }}</td>
              <td>
                {!! Form::open(['route' => ['research.removemember', $research->id], 'method' => 'POST']) !!}
                <input type="hidden" name="user_id" value="{{ $user->id }}">
                <button type="submit" class="btn btn-danger btn-xs" title="keluarkan anggota"><i class="fa fa-close"></i></button>
                {!! Form::close() !!}
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>

    </div>

  </div>

</div>

<div class="col-md-12">


  <div class="box box-danger">

    <div class="box-header">
      <h3 class="box-title">Tambah Anggota</h3>


    </div>

    <div class="box-body">

        <table class="table js-basic-example dataTable">
          <thead>
            <tr>
              <th>Nama</th>
              <th>Email</th>
              <th>Alamat</th>
              <th>##</th>
            </tr>
          </thead>
          <tbody>
            @foreach($users as $user)
            <tr>
              <td>{{ $user->name }}</td>
              <td>{{ $user->email }}</td>
              <td>{{ $user->address }}</td>
              <td>
                {!! Form::open(['route' => ['research.addingmember', $research->id], 'method' => 'POST', 'data-parsley-validate' => '', 'files' => true]) !!}
                <input type="hidden" name="user_id" value="{{ $user->id }}">
                <button type="submit" class="btn btn-info btn-xs" title="tambah anggota"><i class="fa fa-plus"></i></button>
                {!! Form::close() !!}
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
