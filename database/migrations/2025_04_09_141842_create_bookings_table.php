<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    

    // public function up(): void
    // {
    //     Schema::create('bookings', function (Blueprint $table) {
    //         $table->id();
    //         $table->timestamps();
    //     });
    // }
    

    // public function down(): void
    // {
    //     Schema::dropIfExists('bookings');
    // }





    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('event_id')->constrained()->onDelete('cascade');
            $table->timestamps();

            $table->unique(['user_id', 'event_id']); // One booking per user per event
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
