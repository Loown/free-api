<?php

namespace App\Http\Requests\Vehicle;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
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
            'type' => ['string', Rule::in(['scooter', 'car'])],
            'brand' => ['string'],
            'model' => ['string'],
            'serial_number' => ['string'],
            'color' => [Rule::in([
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
            'registration_number' => ['max:30'],
            'kilometers' => ['numeric'],
            'buying_date' => ['date:Y-m-d'],
            'price' => ['numeric'],
        ];
    }
}
