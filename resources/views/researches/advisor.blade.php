@extends('layouts.main')

@section('content')

<div class="row">


<div class="col-xs-12">


  <div class="box box-danger">

    <div class="box-header">
      <h3 class="box-title">Daftar Penelitian</h3>

    </div>

    <div class="box-body table-responsive">

      <table class="table js-basic-example dataTable">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Biaya</th>
                <th>Tanggal</th>
                <th>Ketua</th>
                <th>Status</th>
                <th>Penilaian</th>
                <th>##</th>
            </tr>
        </thead>
        <tbody>
        @foreach($researches as $research)
            <tr>
                <td>{{ $research->title }}</td>
                <td>Rp. {{ number_format($research->cost,0,',','.') }}</td>
                <td>{{ $research->date }}</td>
                <td><strong>{{ $research->leader->name }}</strong></td>
                <td>
                  @if($research->approved == true)
                  {!! Form::open(['route' => ['unapproveResearch', $research->id], 'method' => 'PUT', 'data-parsley-validate' => '', 'files' => true]) !!}
                  <label class="label label-success">APPROVED</label>
                  <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-close"></i></button>
                  {!! Form::close() !!}
                  @else
                  {!! Form::open(['route' => ['approveResearch', $research->id], 'method' => 'PUT', 'data-parsley-validate' => '', 'files' => true]) !!}
                  <label class="label label-warning">PENDING</label>
                  <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
                  {!! Form::close() !!}
                  @endif
                </td>
                <td>
                  @if($research->granted == true)
                  <label class="label label-success">DINILAI</label>
                  @else
                  <label class="label label-warning">PENDING</label>
                  @endif
                </td>
                <td>
                  <a href="{{ route('advisor.research.seemember', $research->id) }}" class="btn btn-xs btn-warning" title="Lihat Anggota"><span class="fa fa-eye"></span></a>
                  <a href="{{ route('advisor.research.reports', $research->id) }}" class="btn btn-info btn-xs" title="Monev"><span class="fa fa-envelope"></span></a>
                  <a href="{{ route('advisor.research.detail', $research->id) }}" class="btn btn-xs btn-info" title="Detail"><span class="fa fa-info-circle"></span></a>
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
