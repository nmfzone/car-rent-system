@extends('layouts.dashboard')

@section('content_header')
  <h3>Manajemen Mobil</h3>
@endsection

@section('content')
  <div class="panel panel-primary">
    <div class="panel-heading">Mobil</div>

    <div class="panel-body">
      @include('flash::message')

      <form class="form-horizontal" role="form" method="POST" action="{{ route('cars.store') }}">
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
          <label class="col-md-4 control-label">Nama</label>

          <div class="col-md-6">
            <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>

            @if ($errors->has('name'))
              <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
              </span>
            @endif
          </div>
        </div>

        <div class="form-group{{ $errors->has('car_number') ? ' has-error' : '' }}">
          <label class="col-md-4 control-label">Nomor Plat</label>

          <div class="col-md-6">
            <input type="text" class="form-control" name="car_number" value="{{ old('car_number') }}" required>

            @if ($errors->has('car_number'))
              <span class="help-block">
                <strong>{{ $errors->first('car_number') }}</strong>
              </span>
            @endif
          </div>
        </div>

        <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
          <label class="col-md-4 control-label">Merek</label>

          <div class="col-md-6">
            <select class="form-control" name="type" required>
              @foreach(\App\CarType::all() as $type)
                <option value="{{ $type->id }}" {{ old('type') == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
              @endforeach
            </select>

            @if ($errors->has('type'))
              <span class="help-block">
                <strong>{{ $errors->first('type') }}</strong>
              </span>
            @endif
          </div>
        </div>

        {!! csrf_field() !!}

        <div class="form-group">
          <div class="col-md-6 col-md-offset-4">
            <a href="{{ URL::previous() }}" class="btn btn-default">Kembali</a>
            <button type="submit" class="btn btn-primary">
              <i class="fa fa-btn fa-user"></i> Simpan
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection
