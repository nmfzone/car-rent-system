@extends('layouts.dashboard')

@section('content_header')
  <h3>Manajemen Mobil</h3>
@endsection

@section('content')
  <div class="panel panel-primary">
    <div class="panel-heading">Mobil</div>

    <div class="panel-body">
      <div class="row">
        <div class="pull-right m-b-lg m-r-lg">
          <a href="{{ route('cars.create') }}">
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
            <th>Nomor Plat</th>
            <th>Merek</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($cars as $index => $car)
            <tr>
              <td>{{ $car->id }}</td>
              <td>{{ $car->name }}</td>
              <td>{{ $car->car_number }}</td>
              <td>{{ $car->carType->name }}</td>
              <td>
                <a href="{{ route('cars.edit', $car) }}" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Perbarui</a>
                <a href="{{ route('cars.destroy', $car) }}" class="btn btn-xs btn-primary delete-this"><i class="glyphicon glyphicon-remove"></i> Hapus</a>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="6">
                <center class="m-t-lg">Data mobil belum tersedia.</center>
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>

      <div class="text-center">
        {{ $cars->links() }}
      </div>
    </div>
  </div>
@endsection
