<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['scooter', 'car']);
            $table->string('brand');
            $table->string('model');
            $table->string('serial_number');
            $table->enum('color', [
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
            ]);
            $table->string('registration_number', 30);
            $table->unsignedBigInteger('kilometers');
            $table->date('buying_date');
            $table->unsignedBigInteger('price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
};
