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
            $table->string('drive_type')->nullable();
            $table->string('top_speed')->nullable();
            $table->string('max_torque')->nullable();
            $table->string('max_power')->nullable();
            $table->string('cooling_system')->nullable();

            // Dimension
            $table->string('wheel_base')->nullable();
            $table->string('length')->nullable();
            $table->string('width')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->string('seat_capacity')->nullable();

            // Gear & Transmission
            $table->string('transmission')->nullable();
            $table->string('gearbox')->nullable();

            // Chassis & Suspension
            $table->string('front_suspension')->nullable();
            $table->string('rear_suspension')->nullable();

            // Wheels & Tyres
            $table->string('type_tyre')->nullable();
            $table->string('front_tyre')->nullable();
            $table->string('rear_tyre')->nullable();
            $table->string('front_wheel_size')->nullable();
            $table->string('rear_wheel_size')->nullable();

            // Brake
            $table->string('front_brake')->nullable();
            $table->string('rear_brake')->nullable();

            // Electrical
            $table->string('battery_capacity')->nullable();
            $table->string('battery_charging_time')->nullable();
            $table->string('battery_weight')->nullable();
            $table->string('battery_slot')->nullable();
            $table->string('motor_type')->nullable();
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
