<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        \App\Models\User::factory()->create([
            'firstname' => 'Demo',
            'email' => 'demo@demo.com',
        ]);
        \App\Models\User::factory(10)->create();
        \App\Models\Vehicle::factory(30)->create();
        \App\Models\Booking::factory(5)->create();
    }
}
