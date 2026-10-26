<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('booking_enquiries', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('phone', 32);
            $table->string('email')->nullable();
            $table->string('from_location', 100);
            $table->string('to_location', 100);
            $table->date('travel_date');
            $table->string('time_slot', 20);
            $table->unsignedSmallInteger('seats');
            $table->string('vehicle_type', 100)->nullable();
            $table->string('status', 20)->default('new')->index();
            $table->string('email_status', 20)->default('pending')->index();
            $table->text('email_error')->nullable();
            $table->string('ip', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->timestamps();

            $table->index(['created_at', 'status']);
            $table->index(['travel_date', 'from_location', 'to_location'], 'booking_enquiries_route_date_idx');
            $table->index(['name', 'phone']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('booking_enquiries');
    }
};
