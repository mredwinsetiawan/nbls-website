@extends('layouts.main')

@section('content')

<div class="row">


  <div class="col-md-9">


    <div class="box box-danger">

      <div class="box-header">
        <h3 class="box-title"><i class="fa fa-book"></i> Proposal</h3>
      </div>

      <div class="box-body">
        <object type="application/pdf" data="/file/research/{{ $research->file }}" style="width:100%;height:800px;">

        </object>
      </div>

    </div>

  </div>

  <div class="col-md-3">


    <div class="box box-danger">

      <div class="box-header">
        <h3 class="box-title"><i class="fa fa-sort-numeric-asc"></i> Form Penilaian</h3>
      </div>

      <div class="box-body">
        <div class="col-md-12">
          {!! Form::model($research->assessment, ['route' => ['assessment', $research->assessment->id, 'data-parsley-validate' => ''], 'method' => 'PUT', 'files' => true]) !!}
            <fieldset>
              <div class="form-group">
                <label>Kejelasan</label>
                {{ Form::text('clarity', null, ['class' => 'form-control']) }}
              </div>
              <div class="form-group">
                <label>Mutu</label>
                {{ Form::text('quality', null, ['class' => 'form-control']) }}
              </div>
              <div class="form-group">
                <label>Kelayakan</label>
                {{ Form::text('feasible', null, ['class' => 'form-control']) }}
              </div>
              <div class="form-group">
                <label>Luaran</label>
                {{ Form::text('outcome', null, ['class' => 'form-control']) }}
              </div>
              <input name="research_id" type="hidden" class="form-control" value="{{ $research->id }}">
            </fieldset>

        </div>
      </div>

      <div class="box-footer">
        <div class="col-md-12">
          <button class="btn btn-success" type="submit" name="button"><i class="fa fa-save"></i> Simpan</button>
        </div>
      </div>
      {!! Form::close() !!}

    </div>

  </div>




</div>

@endsection

@section('script')
<script type="text/javascript">
$('.select2-multi').select2();

</script>
@endsection
