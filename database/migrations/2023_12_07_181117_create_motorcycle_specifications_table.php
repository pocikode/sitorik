<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('motorcycle_specifications', function (Blueprint $table) {
            $table->foreignId('motorcycle_id')->unique()->constrained();
            // Engine & Performances
            $table->string('drive_type');
            $table->string('top_speed');
            $table->string('max_torque');
            $table->string('max_power');
            $table->string('cooling_system');

            // Dimension
            $table->string('category');
            $table->string('wheel_base');
            $table->string('length');
            $table->string('width');
            $table->string('height');
            $table->string('kerb_weight');
            $table->string('gross_weight');
            $table->string('seat_capacity');

            // Gear & Transmission
            $table->string('transmission');
            $table->string('gearbox');

            // Chassis & Suspension
            $table->string('front_suspension');
            $table->string('rear_suspension');

            // Wheels & Tyres
            $table->string('type_tyre');
            $table->string('front_tyre');
            $table->string('rear_tyre');
            $table->string('front_wheel_size');
            $table->string('rear_wheel_size');

            // Brake
            $table->string('front_brake');
            $table->string('rear_brake');

            // Electrical
            $table->string('battery_capacity');
            $table->string('battery_charging_time');
            $table->string('battery_weight');
            $table->string('motor_type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('motorcycle_specifications');
    }
};
