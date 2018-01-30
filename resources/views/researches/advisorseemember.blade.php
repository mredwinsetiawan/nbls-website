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
            </tr>
          </thead>
          <tbody>
            @foreach($research->members as $user)
            <tr>
              <td>{{ $user->name }}</td>
              <td>{{ $user->email }}</td>
              <td>{{ $user->address }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>

    </div>

  </div>

</div>


</div>

@endsection
