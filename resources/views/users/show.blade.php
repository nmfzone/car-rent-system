@extends('layouts.dashboard')

@section('content_header')
  <h3>Manajemen Pengguna</h3>
@endsection

@section('content')
  <div class="panel panel-primary">
    <div class="panel-heading">Pengguna</div>

    <div class="panel-body">
      @include('flash::message')

      <form class="form-horizontal" role="form" method="POST" action="#">
        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
          <label class="col-md-4 control-label">Username</label>

          <div class="col-md-6">
            <input type="text" class="form-control" value="{{ $user->username }}" disabled>

            @if ($errors->has('username'))
              <span class="help-block">
                <strong>{{ $errors->first('username') }}</strong>
              </span>
            @endif
          </div>
        </div>

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
          <label class="col-md-4 control-label">Nama</label>

          <div class="col-md-6">
            <input type="text" class="form-control" value="{{ $user->name }}" disabled>

            @if ($errors->has('name'))
              <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
              </span>
            @endif
          </div>
        </div>

        <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
          <label class="col-md-4 control-label">Tipe</label>

          <div class="col-md-6">
            <select class="form-control" disabled>
              <option value="1" {{ $user->type_in_number == 1 ? 'selected' : '' }}>Administrator</option>
              <option value="2" {{ $user->type_in_number == 2 ? 'selected' : '' }}>Pelanggan</option>
            </select>

            @if ($errors->has('type'))
              <span class="help-block">
                <strong>{{ $errors->first('type') }}</strong>
              </span>
            @endif
          </div>
        </div>

        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
          <label class="col-md-4 control-label">Nomor HP</label>

          <div class="col-md-6">
            <input type="text" class="form-control" value="{{ $user->phone }}" disabled>

            @if ($errors->has('phone'))
              <span class="help-block">
                <strong>{{ $errors->first('phone') }}</strong>
              </span>
            @endif
          </div>
        </div>

        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
          <label class="col-md-4 control-label">Alamat</label>

          <div class="col-md-6">
            <textarea class="form-control" name="address" disabled rows="4">{{ $user->address ??  '-' }}</textarea>

            @if ($errors->has('address'))
              <span class="help-block">
                <strong>{{ $errors->first('address') }}</strong>
              </span>
            @endif
          </div>
        </div>

        <div class="form-group m-t-lg">
          <div class="col-md-6 col-md-offset-4">
            <a href="{{ URL::previous() }}" class="btn btn-default">Kembali</a>
            <a href="{{ route('users.edit', $user) }}" class="btn btn-primary"><i class="fa fa-btn fa-edit"></i> Perbarui</a>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection
