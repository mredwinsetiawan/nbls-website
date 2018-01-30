@extends('layouts.main')

@section('content')

@can('owner', $research)

<div class="row">

  <div class="modal fade" id="modalAssessment">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title" id="defaultModalLabel">Nilai</h4>
              </div>
              <div class="modal-body">

                <fieldset>
                  <div class="col">
                    <div class="col-md-12">
                      <div class="form-group">
                        {{ Form::label('name', 'Kejelasan:') }}
        			          <input type="text" class="form-control" value="{{ $research->assessment->clarity }}" disabled>
                      </div>

                      <div class="form-group">
                        {{ Form::label('name', 'Mutu:') }}
        			          <input type="text" class="form-control" value="{{ $research->assessment->quality }}" disabled>
                      </div>

                      <div class="form-group">
                        {{ Form::label('name', 'Kelayakan:') }}
        			          <input type="text" class="form-control" value="{{ $research->assessment->feasible }}" disabled>
                      </div>

                      <div class="form-group">
                        {{ Form::label('name', 'Luaran:') }}
        			          <input type="text" class="form-control" value="{{ $research->assessment->outcome }}" disabled>
                      </div>
                    </div>

                  </div>
                </fieldset>
              </div>
          </div>
      </div>
  </div>


  <div class="col-md-4">


    <div class="box box-danger">

      <div class="box-header">
        <h3 class="box-title"><i class="fa fa-user"></i> Peneliti</h3>
      </div>

      <div class="box-body text-center">
        <div class="col-md-12">
          @if( $research->leader->image === null)
          <img src="/images/default.png" class="img-responsive" width="300" alt="">
          @else
          <img src="/images/{{ $research->leader->image }}" class="img-responsive" width="300" alt="">
          @endif
          <h3>{{ $research->leader->name }}</h3>
        </div>
      </div>

    </div>

  </div>

  <div class="col-md-8">


    <div class="box box-danger">

      <div class="box-header">
        <h3 class="box-title"><i class="fa fa-book"></i> <strong>{{ $research->title }}</strong></h3>
      </div>

      <div class="box-body">
        <div class="col-md-12">
          <!-- <h3><strong>{{ $research->title }}</strong></h3> -->


          <p>{!! $research->abstract !!}</p>

          <h4><strong>Anggaran : Rp. {{ number_format($research->cost,0,',','.') }}</strong></h4>
        </div>
      </div>

      <div class="box-footer">
        <a href="/file/research/{{ $research->file }}" class="btn btn-success" download="Proposal {{ $research->title }}"><i class="fa fa-download"></i> Download Proposal</a>
        <a href="/file/research/{{ $research->file }}" target="_blank" class="btn btn-warning"><i class="fa fa-eye"></i> Lihat Proposal</a>
        <a href="#!" data-toggle="modal" data-target="#modalAssessment" class="btn btn-info"><i class="fa fa-eye"></i> Lihat Nilai</a>
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
            @foreach($comments as $comment)
            <li>
              <i class="fa fa-envelope bg-blue"></i>

              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> {{ $comment->created_at->diffForHumans() }}</span>
                <h3 class="timeline-header"><a href="#">{{ $comment->author }}</a>
                  <!-- <span class="label label-info">reviewer</span> -->
                </h3>

                <div class="timeline-body">
                  {{ $comment->comment }}
                </div>
                <div class="timeline-footer">
                  <!-- <a class="btn btn-primary btn-xs">Read more</a>
                  <a class="btn btn-danger btn-xs">Delete</a> -->
                </div>
              </div>
            </li>
            @endforeach

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

@endcan

@endsection

@section('script')
<script type="text/javascript">
$('.select2-multi').select2();

</script>
@endsection
