@extends('layouts.dashboard')

@section('content_header')
  <h3>Manajemen Pengguna</h3>
@endsection

@section('content')
  <div class="panel panel-primary">
    <div class="panel-heading">Pengguna</div>

    <div class="panel-body">
      @include('flash::message')

      <form class="form-horizontal" role="form" method="POST" action="{{ route('users.update', $user) }}">
        {{ method_field('PUT') }}

        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
          <label class="col-md-4 control-label">Username</label>

          <div class="col-md-6">
            <input type="text" class="form-control" name="username" value="{{ old('username', $user->username) }}" required>

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
            <input type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}" required>

            @if ($errors->has('name'))
              <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
              </span>
            @endif
          </div>
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
          <label class="col-md-4 control-label">Password</label>

          <div class="col-md-6">
            <input type="password" class="form-control" name="password">

            <span class="help-block">
              Biarkan kosong jika Anda tidak berniat untuk merubah Password.
            </span>

            @if ($errors->has('password'))
              <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
              </span>
            @endif
          </div>
        </div>

        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
          <label class="col-md-4 control-label">Konfirmasi Password</label>

          <div class="col-md-6">
            <input type="password" class="form-control" name="password_confirmation">

            @if ($errors->has('password_confirmation'))
              <span class="help-block">
                <strong>{{ $errors->first('password_confirmation') }}</strong>
              </span>
            @endif
          </div>
        </div>

        <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
          <label class="col-md-4 control-label">Tipe</label>

          <div class="col-md-6">
            <select class="form-control" name="type" required>
              <option value="1" {{ old('type', $user->type_in_number) == 1 ? 'selected' : '' }}>Administrator</option>
              <option value="2" {{ old('type', $user->type_in_number) == 2 ? 'selected' : '' }}>Pelanggan</option>
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
            <input type="text" class="form-control" name="phone" value="{{ old('phone', $user->phone) }}">

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
            <textarea class="form-control" name="address" rows="4">{{ old('address', $user->address) }}</textarea>

            @if ($errors->has('address'))
              <span class="help-block">
                <strong>{{ $errors->first('address') }}</strong>
              </span>
            @endif
          </div>
        </div>

        {!! csrf_field() !!}

        <div class="form-group m-t-lg">
          <div class="col-md-6 col-md-offset-4">
            <a href="{{ URL::previous() }}" class="btn btn-default">Kembali</a>
            <button type="submit" class="btn btn-primary">
              <i class="fa fa-btn fa-save"></i> Perbarui
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection
