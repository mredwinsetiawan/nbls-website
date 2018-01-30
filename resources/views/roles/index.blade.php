@extends('layouts.main')

@section('content')

<div class="row">

    <div class="modal fade" id="modalAdd">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">Tambah Peran</h4>
                </div>
                <div class="modal-body">

                </div>
            </div>
        </div>
    </div>


    <div class="col-xs-12">


        <div class="box box-primary">
            <div class="box-body">
                <table class="table js-basic-example dataTable">
                    <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Deskripsi</th>
                        <th>##</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($roles as $role)
                    <tr>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->description }}</td>
                        <td></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>

        </div>

    </div>
</div>

@endsection
