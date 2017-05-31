@extends('layouts.dashboard')

@push('stylesheets')
<style type="text/css">
.form-inline .form-control {
  width: 100%;
}
</style>
@endpush

@section('content_header')
  <h3>Cek Ketersediaan</h3>
@endsection

@section('content')
  <div class="panel panel-primary">
    <div class="panel-heading">Cek Ketersediaan Mobil</div>

    <div class="panel-body">
      <form class="form-inline" role="form" method="GET" action="{{ route('checks.index') }}">
        <div class="form-group col-md-8">
          <label class="col-md-2">Rentang</label>

          <div class="col-md-10">
            <input type="text" class="form-control daterange-picker" name="date_range" value="{!! request()->get('date_range', sprintf('%s 00:00 - %s 23:00', date('d/m/Y'), date('d/m/Y'))) !!}" required>
          </div>
        </div>

        <div class="col-md-2">
          <button type="submit" class="btn btn-primary">
            <i class="fa fa-btn fa-save"></i> Cek
          </button>
        </div>
      </form>

      @if ($displayResult)
        <br><br>
        <div class="m-t-lg">
          <h3>Daftar Mobil Tersedia</h3>

          <table class="table the-tables">
            <thead>
            <tr>
              <th>#</th>
              <th>Nama</th>
              <th>Nomor Plat</th>
              <th>Merek</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($cars as $index => $car)
              <tr>
                <td>{{ $car->id }}</td>
                <td>{{ $car->name }}</td>
                <td>{{ $car->car_number }}</td>
                <td>{{ $car->carType->name }}</td>
              </tr>
            @empty
              <tr>
                <td colspan="6">
                  <center class="m-t-lg">Tidak ada mobil tersedia.</center>
                </td>
              </tr>
            @endforelse
            </tbody>
          </table>

          <div class="text-center">
            {{ $cars->appends('date_range', request()->get('date_range'))
              ->appends('page', request()->get('page'))
              ->links() }}
          </div>
        </div>
      @endif
    </div>
  </div>
@endsection

@push('javascripts')
<script type="text/javascript">
  $(document).ready(function () {
    $('input.daterange-picker').daterangepicker({
      timePicker: true,
      timePicker24Hour: true,
      timePickerIncrement: 10,
      locale: {
        format: 'DD/MM/YYYY H:mm'
      }
    });
  });
</script>
@endpush
