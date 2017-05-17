@extends('layouts.dashboard')

@section('content_header')
  <h3>Manajemen Booking</h3>
@endsection

@section('content')
  <div class="panel panel-primary">
    <div class="panel-heading">Booking</div>

    <div class="panel-body">
      <div class="row">
        <div class="pull-right m-b-lg m-r-lg">
          <a href="{{ route('bookings.create') }}">
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
            <th>Nama Penyewa</th>
            <th>Nama Mobil</th>
            <th width="150px">Harga</th>
            <th width="220px">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($bookings as $index => $booking)
            <tr>
              <td>{{ $booking->id }}</td>
              <td>{{ $booking->user->name }}</td>
              <td>{{ $booking->car->name }} ({{ $booking->car->car_number }})</td>
              <td>Rp {{ number_format($booking->price, 2, ',', '.') }}</td>
              <td>
                <a href="{{ route('bookings.show', $booking) }}" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-zoom-in"></i> Detail</a>
                <a href="{{ route('bookings.edit', $booking) }}" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Perbarui</a>
                <a href="{{ route('bookings.destroy', $booking) }}" class="btn btn-xs btn-primary delete-this"><i class="glyphicon glyphicon-remove"></i> Hapus</a>
            </tr>
          @empty
            <tr>
              <td colspan="5">
                <center class="m-t-lg">Data booking belum tersedia.</center>
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>

      <div class="text-center">
        {{ $bookings->links() }}
      </div>
    </div>
  </div>
@endsection
