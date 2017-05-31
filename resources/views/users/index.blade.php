@extends('layouts.dashboard')

@section('content_header')
  <h3>Manajemen Pengguna</h3>
@endsection

@section('content')
  <div class="panel panel-primary">
    <div class="panel-heading">Pengguna</div>

    <div class="panel-body">
      <div class="row">
        <div class="pull-right m-b-lg m-r-lg">
          <a href="{{ route('users.create') }}">
            <div class="btn btn-primary">
              Tambah
            </div>
          </a>
        </div>
      </div>

      @include('flash::message')

      <table class="table the-tables">
        <thead>
          <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Nomor HP</th>
            <th>Tipe</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($users as $index => $user)
            <tr>
              <td>{{ $user->id }}</td>
              <td>{{ $user->name }}</td>
              <td>{{ $user->phone }}</td>
              <td>
                @if ($user->isOwner())
                  <p class="label label-danger">Administrator</p>
                @elseif ($user->isCustomer())
                  <p class="label label-success">Pelanggan</p>
                @endif
              </td>
              <td>
                <a href="{{ route('users.edit', $user) }}" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Perbarui</a>
                <a href="{{ route('users.destroy', $user) }}" class="btn btn-xs btn-primary delete-this"><i class="glyphicon glyphicon-remove"></i> Hapus</a>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="5">
                <center class="m-t-lg">Data pengguna belum tersedia.</center>
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>

      <div class="text-center">
        {{ $users->links() }}
      </div>
    </div>
  </div>
@endsection
