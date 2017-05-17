@extends('layouts.dashboard')

@section('content_header')
  <h3>Manajemen Mobil</h3>
@endsection

@section('content')
  <div class="panel panel-primary">
    <div class="panel-heading">Mobil</div>

    <div class="panel-body">
      @include('flash::message')

      <form class="form-horizontal" role="form" method="POST" action="#">
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
          <label class="col-md-4 control-label">Nama</label>

          <div class="col-md-6">
            <input type="text" class="form-control" value="{{ $car->name }}" disabled>

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
            <input type="text" class="form-control" value="{{ $car->car_number }}" disabled>

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
            <input type="text" class="form-control" value="{{ $car->carType->name }}" disabled>

            @if ($errors->has('type'))
              <span class="help-block">
                <strong>{{ $errors->first('type') }}</strong>
              </span>
            @endif
          </div>
        </div>

        <div class="form-group m-t-lg">
          <div class="col-md-6 col-md-offset-4">
            <a href="{{ URL::previous() }}" class="btn btn-default">Kembali</a>
            <a href="{{ route('cars.edit', $car) }}" class="btn btn-primary"><i class="fa fa-btn fa-edit"></i> Perbarui</a>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection
