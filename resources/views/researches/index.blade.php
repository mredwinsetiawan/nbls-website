@extends('layouts.main')

@section('content')

<div class="row">


<div class="col-xs-12">


  <div class="box box-danger">

    <div class="box-header">
      <!-- <h3 class="box-title">Daftar tag</h3> -->
        <!-- <a class="btn btn-danger pull-left col-md-1" href="#!" data-toggle="modal" data-target="#modalAdd">
          <span class="fa fa-plus"></span>
        </a> -->


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
                <th>reviewer</th>
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
                  @if($research->granted == true)
                  <label class="label label-success">DINILAI</label>
                  @else
                  <label class="label label-warning">PENDING</label>
                  @endif
                </td>
                <td>
                  {!! Form::model($research, ['route' => ['selectReviewer', $research->id], 'method' => 'PUT', 'data-parsley-validate' => '']) !!}
    			          <select class="form-control" name="reviewer_id">
                      @foreach($reviewers as $reviewer)
                      <option value="{{ $reviewer->id }}" {{ $research->reviewer_id === $reviewer->id ? 'selected' : ''}}>{{ $reviewer->name }}</option>
                      @endforeach
    			          </select>
                    <button type="submit" class="btn btn-info"><i class="fa fa-refresh"></i></button>
                  {!! Form::close() !!}
                </td>
                <td>
                  <a href="{{ route('operator.research.detail', $research->id) }}" class="btn btn-xs btn-info" title="Detail"><span class="fa fa-info-circle"></span></a>
                  <!-- <a href="#!" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modalDelete{{ $research->id }}"><span class="fa fa-trash"></span></a> -->
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
