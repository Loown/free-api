<?php

namespace App\Http\Requests\Vehicle;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'type' => ['required', 'string', Rule::in(['scooter', 'car'])],
            'brand' => ['required', 'string'],
            'model' => ['required', 'string'],
            'serial_number' => ['required', 'string'],
            'color' => ['required', Rule::in([
                'white',
                'grey',
                'black',
                'green',
                'red',
                'pink',
                'purple',
                'blue',
                'brown',
                'orange',
                'yellow',
            ])],
            'registration_number' => ['required', 'max:30'],
            'kilometers' => ['required', 'numeric'],
            'buying_date' => ['required', 'date:Y-m-d'],
            'price' => ['required', 'numeric'],
        ];
    }
}
