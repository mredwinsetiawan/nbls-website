@extends('layouts.main')

@section('content')

<div class="row">


<div class="col-xs-12">


  <div class="box">

    <div class="box-header">
      <h3 class="box-title">Comment</h3>
    </div>

    <div class="box-body">
      {!! Form::open(array('route' => 'comments.store', 'method' => 'POST', 'data-parsley-validate' => '', 'files' => true)) !!}
        <fieldset>
          <div class="col">

            <div class="col-md-12">
              <div class="form-group">
                {{ Form::label('comment', "Comment Body:") }}
				        {{ Form::textarea('comment', null, array('class' => 'form-control')) }}
              </div>
            </div>


            <div class="col-md-12">
              <div class="form-group">
                {{ Form::button('Save', array('type' => 'submit', 'class' => 'btn btn-success col-md-1 col-xs-12', 'style' => 'margin-top: 10px;')) }}
              </div>
            </div>



          </div>
        </fieldset>
      {!! Form::close() !!}
    </div>

  </div>

</div>
</div>

@endsection
