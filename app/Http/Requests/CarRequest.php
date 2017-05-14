<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarRequest extends FormRequest
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
        $car = $this->route('car');

        $rules = collect([
            'name' => 'required|max:255',
            'car_number' => 'required|max:255|unique:cars',
            'type' => 'required|exists:car_types,id'
        ]);

        switch ($this->method()) {
            case 'POST':
                return $rules->toArray();
            case 'PUT':
            case 'PATCH':
                return $rules->merge([
                    'car_number' => 'required|max:255|unique:cars,car_number,'.$car->id,
                ])->toArray();
        }
    }
}
