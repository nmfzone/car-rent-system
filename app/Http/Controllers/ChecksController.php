<?php

namespace App\Http\Controllers;

use App\Car;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ChecksController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cars = Car::with([
            'carType',
            'bookings',
        ]);

        $displayResult = false;

        if (! is_null($request->date_range)) {
            $dates = explode(' - ', $request->date_range);

            try {
                $cars = $cars->freeOn(
                    Carbon::createFromFormat('d/m/Y H:i', $dates[0]),
                    Carbon::createFromFormat('d/m/Y H:i', $dates[1])
                );
                $displayResult = true;
            } catch (\Exception $e) {
                //
            }
        }

        $cars = $cars->paginate(10);

        return view('checks.index', compact('cars', 'displayResult'));
    }
}
