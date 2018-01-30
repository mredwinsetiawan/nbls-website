@extends('layouts.main')

@section('content')

@can('owner', $research)

<div class="row">

  <div class="modal fade" id="modalAdd">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title" id="defaultModalLabel">Tambah Laporan</h4>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                    {!! Form::open(['route' => ['research.report', $research->id], 'method' => 'POST', 'data-parsley-validate' => '', 'files' => true]) !!}
      								<fieldset>
                        <div class="col-md-12">
                          <div class="form-group">
                            {{ Form::label('title', 'Judul:') }}
                            {{ Form::text('title', null, ['class' => 'form-control']) }}
                          </div>
                        </div>
                        <div class="col-md-12">
                          {{ Form::label('file', 'Berkas ( PDF / docx ):') }}
                          <div class="form-group">
                            <div class="btn btn-default btn-file">
                              <i class="fa fa-paperclip"></i> Upload File
                              {{ Form::file('monev_url', ['accept' => 'application/pdf']) }}
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            {{ Form::label('description', 'Deskripsi:') }}
                            {{ Form::textarea('description', null, ['class' => 'form-control text-editor']) }}
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
      </div>
  </div>


<div class="col-md-12">


  <div class="box box-danger">

    <div class="box-header">
      <h3 class="box-title">Daftar Laporan Monitoring dan Evaluasi <strong>( {{ $research->title }} )</strong></h3>
    </div>
    <div class="box-header">
      <a class="btn btn-danger pull-left col-md-1" href="#!" data-toggle="modal" data-target="#modalAdd">
        <span class="fa fa-plus"></span>
      </a>
    </div>

    <div class="box-body">

        <table class="table js-basic-example dataTable">
          <thead>
            <tr>
              <th>Judul</th>
              <th>Peneliti</th>
              <th>Status</th>
              <th>##</th>
            </tr>
          </thead>
          <tbody>
            @foreach($research->monevs as $monev)
            <tr>
              <td><strong>{{ $monev->title }}</strong></td>
              <td>{{ $monev->research->leader->name }}</td>
              <td>
                @if($monev->approved == true)
                <label class="label label-success">APPROVED</label>
                @else
                <label class="label label-warning">PENDING</label>
                @endif
              </td>
              <td>
                <a href="#!" class="btn btn-info btn-xs" data-toggle="modal" data-target="#modalDetail{{ $monev->id }}" title="detail laporan"><i class="fa fa-list"></i></a>
                <a href="/file/research/monev/{{ $monev->monev_url }}" class="btn btn-info btn-xs" target="_blank" title="lihat laporan"><i class="fa fa-eye"></i></a>
                <a href="/file/research/monev/{{ $monev->monev_url }}" class="btn btn-success btn-xs" download="Laporan {{ $monev->title }}" title="download laporan"><i class="fa fa-download"></i></a>
              </td>
            </tr>
            @endforeach

            @foreach($research->monevs as $monev)
            <div class="modal fade" id="modalDetail{{ $monev->id }}">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Detail Laporan</h4>
                            @if($monev->approved == true)
                            <label class="label label-success pull-right">APPROVED</label>
                            @else
                            <label class="label label-warning pull-right">PENDING</label>
                            @endif
                            <p>{{ date('d F Y', strtotime($monev->created_at)) }}</p>
                        </div>
                        <div class="modal-body">
                          <div class="row">
                            <div class="col-md-12">

                              <label>Judul : </label>
                              <h4><strong>{{ $monev->title }}</strong></h4>
                              <hr>
                              <label>Deskripsi : </label>
                              <p>{!! $monev->description !!}</p>
                              <hr>
                              <label>Laporan : </label>
                              <p><a href="/file/research/monev/{{ $monev->monev_url }}" class="btn btn-success btn-xs" download="Laporan {{ $monev->title }}" title="download laporan"><i class="fa fa-download"></i> Download</a></p>
                            </div>
                          </div>
                        </div>

                        <div class="modal-footer">
                          <a href="#!" data-dismiss="modal" class="btn btn-default"> Batal</a>
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
@endcan
@endsection
