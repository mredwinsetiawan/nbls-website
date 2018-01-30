@extends('layouts.main')

@section('content')

<div class="row">


  <div class="col-md-4">


    <div class="box box-danger">

      <div class="box-header">
        <h3 class="box-title"><i class="fa fa-user"></i> Peneliti</h3>
      </div>

      <div class="box-body text-center">
        <div class="col-md-12">
          <img src="/images/profile.jpg" class="img-responsive" width="300" alt="">
          <h3>{{ $author->name }}</h3>
        </div>
      </div>

    </div>

  </div>

  <div class="col-md-8">


    <div class="box box-danger">

      <div class="box-header">
        <h3 class="box-title"><i class="fa fa-book"></i> Hibah Penelitian Muhammadiyah</h3>
      </div>

      <div class="box-body">
        <div class="col-md-12">
          <h3><strong>{{ $research->title }}</strong></h3>

          <p>{!! $research->abstract !!}</p>
        </div>
      </div>

      <div class="box-footer">
        <a href="/file/research/{{ $research->file }}" class="btn btn-success" download="Proposal {{ $research->title }}"><i class="fa fa-download"></i> Download Proposal</a>
        <a href="/file/research/{{ $research->file }}" target="_blank" class="btn btn-warning"><i class="fa fa-eye"></i> Lihat Proposal</a>
        <a href="#!" class="btn btn-info"><i class="fa fa-eye"></i> Lihat Nilai</a>
      </div>

    </div>

  </div>

  <div class="col-md-12">


    <div class="box box-danger">

      <div class="box-header">
        <h3 class="box-title"><i class="fa fa-comments"></i> Pesan Untuk Anda dari Panitia dan Reviewer Hibah Penelitian Muhammadiyah</h3>
      </div>

      <div class="box-body">

        <div class="col-md-12">
          {!! Form::open(['url' => ['comments/post', $research->id], 'method' => 'POST', 'data-parsley-validate' => '', 'files' => true]) !!}
          <fieldset>
            <div class="col">

              <div class="col-md-12">
                <div class="form-group">
                  {{ Form::textarea('comment', null, array('class' => 'form-control', 'rows' => '3')) }}
                </div>
                <div class="form-group">
                  {{ Form::button('Kirim <i class="fa fa-send"></i>', array('type' => 'submit', 'class' => 'btn btn-success col-md-1 col-xs-12 pull-right', 'style' => 'margin-top: 10px;')) }}
                </div>
              </div>

            </div>
          </fieldset>
          {!! Form::close() !!}

        </div>




      </div>

      <div class="box-footer">
        <div class="col-md-12">
          <!-- The time line -->
          <ul class="timeline">

            <li>
              <i class="fa fa-clock-o bg-gray"></i>
            </li>




          </ul>
        </div>

      </div>
<!-- END Footer -->

    </div>

  </div>


</div>

@endsection

@section('script')
<script type="text/javascript">
$('.select2-multi').select2();

</script>
@endsection
