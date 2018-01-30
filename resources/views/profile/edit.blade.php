@extends('layouts.main')

@section('content')

<div class="row">


<div class="col-xs-12">


  <div class="box box-danger">

    <div class="box-header">
      <h3 class="box-title">Edit Profile</h3>
    </div>

    <div class="box-body">
      {!! Form::model($user, ['route' => ['me.update'], 'method' => 'PUT', 'data-parsley-validate' => '', 'files' => 'true']) !!}
        <fieldset>
          <div class="col">
            <div class="col-md-12">
              <div class="form-group">
                {{ Form::label('name', 'Nama Lengkap:') }}
			          {{ Form::text('name', null, ["class" => 'form-control', 'required' => '']) }}
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                {{ Form::label('email', 'E-mail:') }}
			          {{ Form::text('email', null, ["class" => 'form-control', 'required' => '', 'disabled' => '']) }}
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                {{ Form::label('nip', 'NIP:') }}
			          {{ Form::text('nip', null, ["class" => 'form-control', 'required' => '']) }}
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                {{ Form::label('pob', 'Tempat Lahir:') }}
			          {{ Form::text('pob', null, ["class" => 'form-control', 'required' => '']) }}
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                {{ Form::label('dob', 'Tanggal Lahir:') }}
			          {{ Form::text('dob', null, ["class" => 'form-control datepicker', 'required' => '']) }}
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                {{ Form::label('gender', 'Status Perkawinan:') }}
			          <select class="form-control" name="gender">
                  <option value="L" {{ $user->gender === 'L' ? 'selected' : ''}}>Laki-laki</option>
                  <option value="P" {{ $user->gender === 'P' ? 'selected' : ''}}>Perempuan</option>
			          </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                {{ Form::label('married', 'Status Perkawinan:') }}
			          <select class="form-control" name="married">
                  <option value="BELUM" {{ $user->married === 'BELUM' ? 'selected' : ''}}>Belum Menikah</option>
                  <option value="MENIKAH" {{ $user->married === 'MENIKAH' ? 'selected' : ''}}>Menikah</option>
			          </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                {{ Form::label('religion', 'Agama:') }}
			          {{ Form::text('religion', null, ["class" => 'form-control', 'required' => '']) }}
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                {{ Form::label('golongan', 'Golongan( Pangkat ):') }}
			          {{ Form::text('golongan', null, ["class" => 'form-control', 'required' => '']) }}
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                {{ Form::label('pt', 'PT:') }}
			          {{ Form::text('pt', null, ["class" => 'form-control', 'required' => '']) }}
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                {{ Form::label('pt_address', 'Alamat PT:') }}
			          {{ Form::textarea('pt_address', null, ["class" => 'form-control', 'required' => '']) }}
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                {{ Form::label('pt_telephone', 'Nomor Telepon PT:') }}
			          {{ Form::text('pt_telephone', null, ["class" => 'form-control', 'required' => '']) }}
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                {{ Form::label('address', 'Alamat Lengkap:') }}
			          {{ Form::textarea('address', null, ["class" => 'form-control', 'required' => '']) }}
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                {{ Form::label('telephone', 'Telepon:') }}
			          {{ Form::text('telephone', null, ["class" => 'form-control', 'required' => '']) }}
              </div>
            </div>
            <!-- <div class="col-md-12">
              <div class="form-group">
                {{ Form::label('image', 'Upload Gambar') }}
				        {{ Form::file('featured_img') }}
              </div>
            </div> -->


            <div class="col-md-12">
              <div class="form-group">
                {{ Form::button('Simpan', array('type' => 'submit', 'class' => 'btn btn-success')) }}
                <a href="{{ url('me') }}" class="btn btn-default">Batal</a>
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

@section('script')
<script type="text/javascript">
$('.select2-multi').select2();

</script>
@endsection
