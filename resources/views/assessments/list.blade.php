@extends('layouts.main')

@section('content')

<div class="row">
<div class="col-xs-12">


  <div class="box box-danger">

    <div class="box-header">

    </div>

    <div class="box-body table-responsive">

      <table class="table js-basic-example dataTable">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Biaya</th>
                <th>Tanggal</th>
                <th>Ketua</th>
                <!-- <th>reviewer</th> -->
                <th>Status</th>
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
                  <a href="{{ url('assessment', $research->id) }}" class="btn btn-xs btn-warning" title="Detail"><span class="fa fa-sort-numeric-asc"></span></a>
                  <!-- <a href="{{ route('research.show', $research->id) }}" class="btn btn-xs btn-info" title="Detail"><span class="fa fa-info-circle"></span></a> -->
                  <!-- <a href="#!" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modalDelete{{ $research->id }}"><span class="fa fa-trash"></span></a> -->
                </td>
            </tr>

            <div class="modal fade" id="modalDelete{{ $research->id }}">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h4 class="modal-title" id="defaultModalLabel">Hapus {{ $research->title }}?</h4>
                      </div>
                      <div class="modal-body">
                          Anda yakin ingin menghapus data ini?
                      </div>
                      <div class="modal-footer">
                        {!! Form::open(['route' => ['researches.destroy', $research->id], 'method' => 'DELETE']) !!}
                          <a>
                            {!! Form::button('Iya', array('type' => 'submit', 'class' => 'btn btn-info')) !!}
                          </a>
                          <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                        {!! Form::close() !!}
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
