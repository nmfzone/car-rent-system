<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $booking = $this->route('booking');

        $rules = collect([
            'car' => 'required|exists:cars,id',
            'user' => 'required|exists:users,id',
            'price' => 'required|min:0',
            'booking_dates' => 'required|date_range_format:d/m/Y H:i|date_end_more_than_date_start:d/m/Y H:i',
        ]);

        switch ($this->method()) {
            case 'POST':
            case 'PUT':
            case 'PATCH':
                return $rules->toArray();
        }
    }
}
