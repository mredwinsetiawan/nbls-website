@extends('layouts.main')

@section('content')
<div class="row">


<div class="col-md-12">


  <div class="box box-danger">

    <div class="box-header">
      <h3 class="box-title">Daftar Laporan Monitoring dan Evaluasi</h3>
    </div>
    <div class="box-body">

        <table class="table js-basic-example dataTable">
          <thead>
            <tr>
              <th>Judul</th>
              <th>Penelitian</th>
              <th>Peneliti</th>
              <th>Tanggal</th>
              <th>Status</th>
              <th>##</th>
            </tr>
          </thead>
          <tbody>
            @foreach($monevs as $monev)


            <tr>
              <td><strong>{{ $monev->title }}</strong></td>
              <td>{{ $monev->research->title }}</td>
              <td>{{ $monev->research->leader->name }}</td>
              <td>{{ date('d F Y', strtotime($monev->created_at)) }}</td>
              <td>
                @if($monev->approved == true)
                {!! Form::open(['route' => ['unapproveMonev', $monev->id], 'method' => 'PUT', 'data-parsley-validate' => '', 'files' => true]) !!}
                <label class="label label-success">APPROVED</label>
                <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-close"></i></button>
                {!! Form::close() !!}
                @else
                {!! Form::open(['route' => ['approveMonev', $monev->id], 'method' => 'PUT', 'data-parsley-validate' => '', 'files' => true]) !!}
                <label class="label label-warning">PENDING</label>
                <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
                {!! Form::close() !!}
                @endif
              </td>
              <td>
                <a href="#!" class="btn btn-info btn-xs" data-toggle="modal" data-target="#modalDetail{{ $monev->id }}" title="detail laporan"><i class="fa fa-list"></i></a>
                <a href="/file/research/monev/{{ $monev->monev_url }}" class="btn btn-info btn-xs" target="_blank" title="lihat laporan"><i class="fa fa-eye"></i></a>
                <a href="/file/research/monev/{{ $monev->monev_url }}" class="btn btn-success btn-xs" download="Laporan {{ $monev->title }}" title="download laporan"><i class="fa fa-download"></i></a>
              </td>
            </tr>

            @endforeach

            @foreach($monevs as $monev)
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
                          @if($monev->approved == true)
                          {!! Form::open(['route' => ['unapproveMonev', $monev->id], 'method' => 'PUT', 'data-parsley-validate' => '', 'files' => true]) !!}
                          <button type="submit" class="btn btn-danger"><i class="fa fa-close"></i> Batal Approve</button>
                          {!! Form::close() !!}
                          @else
                          {!! Form::open(['route' => ['approveMonev', $monev->id], 'method' => 'PUT', 'data-parsley-validate' => '', 'files' => true]) !!}
                          <button class="btn btn-success"><i class="fa fa-check"></i> Approve</button>
                          {!! Form::close() !!}
                          @endif
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
@endsection
