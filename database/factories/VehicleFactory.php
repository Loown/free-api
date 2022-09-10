<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'type' => Arr::random(['scooter', 'car']),
            'brand' => Arr::random(['Hyunday', 'Toyota', 'Tesla']),
            'model' => $this->faker->word(),
            'serial_number' => $this->faker->uuid(),
            'color' => Arr::random([
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
            ]),
            'registration_number' => $this->faker->word(),
            'kilometers' => $this->faker->randomNumber(7),
            'buying_date' => $this->faker->date(),
            'price' =>  $this->faker->randomNumber(8)
        ];
    }
}
