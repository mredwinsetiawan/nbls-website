@extends('layouts.main')

@section('content')

<div class="row">

  <div class="modal fade" id="modalAdd">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title" id="defaultModalLabel">Tambah Penelitian</h4>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                    {!! Form::open(['route' => 'research.store', 'method' => 'POST', 'data-parsley-validate' => '', 'files' => true]) !!}
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
                              {{ Form::file('file', ['accept' => 'application/pdf']) }}
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            {{ Form::label('cost', 'Biaya ( Rp ):') }}
                            {{ Form::number('cost', null, ['class' => 'form-control']) }}
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            {{ Form::label('date', 'Tanggal:') }}
                            {{ Form::text('date', null, ['class' => 'form-control datepicker']) }}
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            {{ Form::label('abstract', 'Abstrak:') }}
                            {{ Form::textarea('abstract', null, ['class' => 'form-control text-editor']) }}
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


<div class="col-xs-12">


  <div class="box box-danger">

    <div class="box-header">
      <!-- <h3 class="box-title">Daftar tag</h3> -->
        <a class="btn btn-danger pull-left col-md-1" href="#!" data-toggle="modal" data-target="#modalAdd">
          <span class="fa fa-plus"></span>
        </a>


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
                <th>##</th>
            </tr>
        </thead>
        <tbody>
        @foreach($researches as $research)

        <!-- Modal Add Member -->

        <!-- <div class="modal fade" id="modalSeeMember{{ $research->id }}">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="defaultModalLabel">Tambah Anggota</h4>
                    </div>
                    <div class="modal-body">
                      <div class="row">

                      </div>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- END Modal Add Member -->

        <div class="modal fade" id="modalEdit{{ $research->id }}">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="defaultModalLabel">Tambah Penelitian</h4>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-md-12">
                          {!! Form::model($research, ['route' => ['research.update', $research->id, 'data-parsley-validate' => ''], 'method' => 'PUT', 'files' => true]) !!}
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
                                    {{ Form::file('file', ['accept' => 'application/pdf']) }}
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  {{ Form::label('cost', 'Biaya ( Rp ):') }}
                                  {{ Form::number('cost', null, ['class' => 'form-control']) }}
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  {{ Form::label('date', 'Tanggal:') }}
                                  {{ Form::text('date', null, ['class' => 'form-control datepicker']) }}
                                </div>
                              </div>
                              <div class="col-md-12">
                                <div class="form-group">
                                  {{ Form::label('abstract', 'Abstrak:') }}
                                  {{ Form::textarea('abstract', null, ['class' => 'form-control text-editor']) }}
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

            <tr>
                <td>{{ $research->title }}</td>
                <td>Rp. {{ number_format($research->cost,0,',','.') }}</td>
                <td>{{ $research->date }}</td>
                <td><strong>{{ $research->leader->name }}</strong></td>
                <td>
                  @if($research->approved == true)
                  <label class="label label-success">DISETUJUI</label>
                  @else
                  <label class="label label-warning">PENDING</label>
                  @endif
                </td>
                <td>
                  <a href="{{ route('research.addmember', $research->id) }}" class="btn btn-xs btn-warning" title="Tambah Anggota"><span class="fa fa-user-plus"></span></a>
                  <a href="{{ route('research.reports', $research->id) }}" class="btn btn-info btn-xs" title="Monev"><span class="fa fa-envelope"></span></a>
                  <a href="#!" data-toggle="modal" data-target="#modalEdit{{ $research->id }}" class="btn btn-xs btn-success" title="Detail"><span class="fa fa-edit"></span></a>
                  <a href="{{ route('research.detail', $research->id) }}" class="btn btn-xs btn-info" title="Detail"><span class="fa fa-info-circle"></span></a>
                  <a href="#!" data-toggle="modal" data-target="#modalDelete{{ $research->id }}" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></a>
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
