<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'start_at' => $this->faker->date(),
            'end_at' => $this->faker->date(),
            'status' => 'booked',
            'kilometers' => 500,
            'user_id' => User::where('email', 'demo@demo.com')->first()->id,
            'vehicle_id' => Vehicle::inRandomOrder()->first()->id,
        ];
    }
}
