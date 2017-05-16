@extends('layouts.dashboard')

@push('stylesheets')
  <link href="{{ asset('plugins/select2/css/select2.min.css') }}" rel="stylesheet">
@endpush

@section('content_header')
  <h3>Manajemen Booking</h3>
@endsection

@section('content')
  <div class="panel panel-primary">
    <div class="panel-heading">Booking</div>

    <div class="panel-body">
      @include('flash::message')

      <form class="form-horizontal" role="form" action="#">
        <div class="form-group{{ $errors->has('user') ? ' has-error' : '' }}">
          <label class="col-md-4 control-label">User</label>

          <div class="col-md-6">
            <input type="text" class="form-control" value="{{ $booking->user->name }}" disabled />

            @if ($errors->has('user'))
              <span class="help-block">
                <strong>{{ $errors->first('user') }}</strong>
              </span>
            @endif
          </div>
        </div>

        <div class="form-group{{ $errors->has('car') ? ' has-error' : '' }}">
          <label class="col-md-4 control-label">Mobil</label>

          <div class="col-md-6">
            <input type="text" class="form-control" value="{{ $booking->car->name }} ({{ $booking->car->car_number }})" disabled />

            @if ($errors->has('car'))
              <span class="help-block">
                <strong>{{ $errors->first('car') }}</strong>
              </span>
            @endif
          </div>
        </div>

        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
          <label class="col-md-4 control-label">Harga</label>

          <div class="col-md-6">
            <div class="input-group">
              <span class="input-group-addon">Rp</span>
              <input type="text" class="form-control currency" value="{{ number_format($booking->price, 2, ',', '.') }}" disabled />
            </div>

            @if ($errors->has('price'))
              <span class="help-block">
                <strong>{{ $errors->first('price') }}</strong>
              </span>
            @endif
          </div>
        </div>

        <div class="form-group{{ $errors->has('dates') ? ' has-error' : '' }}">
          <label class="col-md-4 control-label">Tanggal Penggunaan Dari</label>

          <div class="col-md-6">
            <input type="text" class="form-control" value="{{ Date::parse($booking->date_start)->format('l, d F Y H:i') }}" disabled />

            @if ($errors->has('dates'))
              <span class="help-block">
                <strong>{{ $errors->first('dates') }}</strong>
              </span>
            @endif
          </div>
        </div>

        <div class="form-group{{ $errors->has('dates') ? ' has-error' : '' }}">
          <label class="col-md-4 control-label">Tanggal Penggunaan Sampai</label>

          <div class="col-md-6">
            <input type="text" class="form-control" value="{{ Date::parse($booking->date_finish)->format('l, d F Y H:i') }}" disabled />

            @if ($errors->has('dates'))
              <span class="help-block">
                <strong>{{ $errors->first('dates') }}</strong>
              </span>
            @endif
          </div>
        </div>

        <div class="form-group{{ $errors->has('note') ? ' has-error' : '' }}">
          <label class="col-md-4 control-label">Catatan</label>

          <div class="col-md-6">
            <textarea class="form-control" name="note" rows="4" disabled>{{ $booking->note ?? '-' }}</textarea>

            @if ($errors->has('note'))
              <span class="help-block">
                <strong>{{ $errors->first('note') }}</strong>
              </span>
            @endif
          </div>
        </div>

        {!! csrf_field() !!}

        <div class="form-group m-t-lg">
          <div class="col-md-6 col-md-offset-4">
            <a href="{{ URL::previous() }}" class="btn btn-default">Kembali</a>
            <a href="{{ route('bookings.edit', $booking) }}" class="btn btn-primary"><i class="fa fa-btn fa-edit"></i> Perbarui</a>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection

@push('javascripts')
  <script type="text/javascript" src="{{ asset('plugins/select2/js/select2.min.js') }}"></script>

  <script type="text/javascript">
    $(document).ready(function () {
      $('select.select2').select2();

      $('input.daterange-picker').daterangepicker({
        timePicker: true,
        timePicker24Hour: true,
        timePickerIncrement: 10,
        locale: {
          format: 'DD/MM/YYYY h:mm'
        }
      });
    });
  </script>
@endpush
