<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $user = $this->route('user');

        $rules = collect([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'type' => 'required|in:1,2',
            'phone' => 'required_if:type,2',
        ]);

        switch ($this->method()) {
            case 'POST':
                return $rules->toArray();
            case 'PUT':
            case 'PATCH':
                return $rules->merge([
                    'username' => 'required|string|max:255|unique:users,username,'.$user->id,
                    'password' => '',
                ])->toArray();
        }
    }

    /**
     * Configure the validator instance.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return void
     */
    public function withValidator($validator)
    {
        $validator->sometimes('phone', 'min:6|max:20', function ($input) {
            return $input->type == 2;
        });

        if (in_array($this->method(), ['PUT', 'PATCH'])) {
            $validator->sometimes('password', 'required|string|min:6|confirmed', function ($input) {
                return ! is_null($input->password);
            });
        }
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'phone.required_if' => 'Kolom :attribute harus diisi bila tipe pengguna "Pelanggan".'
        ];
    }
}
