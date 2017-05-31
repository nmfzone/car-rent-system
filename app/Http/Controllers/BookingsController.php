<?php

namespace App\Http\Controllers;

use App\Car;
use App\Booking;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\BookingRequest;

class BookingsController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware(['auth', 'owner']);
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $bookings = Booking::with([
            'car', 'user',
        ]);

        if (! is_null($request->date)) {
            try {
                $bookings = $bookings->where('date_start', '>=',
                    Carbon::createFromFormat('d/m/Y H:i', $request->date . " 00:00")
                );
            } catch (\Exception $e) {
                //
            }
        }

        $bookings = $bookings->paginate(10);

        return view('bookings.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bookings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\BookingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookingRequest $request)
    {
        $booking = new Booking($request->all());
        $booking = $this->fillBooking($booking, $request);

        if (! $booking instanceof Booking) {
            return $booking;
        }

        $booking->save();

        flash('Booking berhasil di simpan.')->success()->important();

        return redirect(route('bookings.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        return view('bookings.show', compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        return view('bookings.edit', compact('booking'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\BookingRequest  $request
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(BookingRequest $request, Booking $booking)
    {
        $booking->fill($request->all());
        $booking = $this->fillBooking($booking, $request);

        if (! $booking instanceof Booking) {
            return $booking;
        }

        $booking->save();

        flash('Booking berhasil di perbarui.')->success()->important();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        $booking->delete();
        flash('Booking berhasil di hapus.')->success()->important();

        return redirect()->back();
    }

    /**
     * Fill the booking with specified value.
     *
     * @param  \App\Booking  $booking
     * @param  mixed  $request
     * @return \App\Booking
     */
    protected function fillBooking(Booking $booking, $request)
    {
        try {
            $date = explode(' - ', $request->booking_dates);

            $booking->user_id = $request->user;
            $booking->car_id = $request->car;
            $booking->date_start = Carbon::createFromFormat('d/m/Y H:i', $date[0]);
            $booking->date_finish = Carbon::createFromFormat('d/m/Y H:i', $date[1]);

            if (is_null(Car::freeOn($booking->date_start, $booking->date_finish)->whereId($request->car)->first())) {
                flash('Mobil sudah ada yang booking.')->error()->important();

                return redirect()->back();
            }
        } catch (\Exception $e) {
            flash('Terjadi kesalahan, silahkan coba lagi.')->error()->important();

            return redirect()->back();
        }

        return $booking;
    }
}
