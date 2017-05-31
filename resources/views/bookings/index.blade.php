@extends('layouts.dashboard')

@push('stylesheets')
<style type="text/css">
  .form-inline .form-control {
    width: 100%;
  }
</style>
@endpush

@section('content_header')
  <h3>Manajemen Booking</h3>
@endsection

@section('content')
  <div class="panel panel-primary">
    <div class="panel-heading">Booking</div>

    <div class="panel-body">
      <div class="row">
        <div class="pull-left col-md-8">
          <form class="form-inline" role="form" method="GET" action="{{ route('bookings.index') }}">
            <div class="form-group col-md-10">
              <label class="col-md-2">Tanggal</label>

              <div class="col-md-10">
                <input type="text" class="form-control datepicker" name="date" value="{!! request()->get('date', sprintf('%s', date('d/m/Y'))) !!}" required>
              </div>
            </div>

            <div class="col-md-2">
              <button type="submit" class="btn btn-primary">
                <i class="fa fa-btn fa-save"></i> Cek
              </button>
            </div>
          </form>
        </div>
        <div class="pull-right col-md-2 m-b-lg m-r-lg">
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
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="5">
                @if (request()->get('date_range'))
                  <center class="m-t-lg">Data booking tidak tersedia.</center>
                @else
                  <center class="m-t-lg">Data booking belum tersedia.</center>
                @endif
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>

      <div class="text-center">
        {{ $bookings->appends('date', request()->get('date'))->links() }}
      </div>
    </div>
  </div>
@endsection

@push('javascripts')
<script type="text/javascript">
  $(document).ready(function () {
    $('input.datepicker').datepicker({
      format: "dd/mm/yyyy"
    });
  });
</script>
@endpush
