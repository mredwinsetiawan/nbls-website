@extends('layouts.main')

@section('content')

<div class="row">

  <div class="col-md-12">
    <div class="box box-danger">
      <div class="box-header">
        <h3 class="box-title">Filter</h3>
      </div>
      <div class="box-body">
        <div class="input-group">
          <input class="form-control" type="text" name="" value="">
          <span class="input-group-btn">
            <button class="btn btn-danger btn-flat" type="button" name="button"><i class="fa fa-search"></i></button>
          </span>

        </div>
      </div>
    </div>
  </div>

@foreach($researches as $research)
<div class="col-md-3">


  <div class="box box-danger" style="min-height:180px;">

    <div class="box-header">
      <h3 class="box-title">{{ $research->title }}</h3>
      <p>
        @if($research->approved == true)
        <label class="label label-success">DISETUJUI</label>
        @else
        <label class="label label-warning">PENDING</label>
        @endif
      </p>
      <p>
        <strong>ketua :</strong> {{ $research->leader->name }}
      </p>

    </div>
    <div class="box-body">

    </div>
    <div class="box-body">
      <p style="position:absolute;bottom:0;">
        <a href="#" class="btn btn-success btn-xs">Gabung</a>
        <a href="#" class="btn btn-info btn-xs" style="margin-right:5px;">Detail</a>
      </p>
    </div>


  </div>

</div>
@endforeach


</div>

@endsection
