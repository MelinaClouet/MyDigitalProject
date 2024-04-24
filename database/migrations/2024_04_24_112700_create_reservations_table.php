<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('customer_id');
            $table->string('event_id');
            $table->string('event_categorie_id');
            $table->string('event_variation_id');
            $table->dateTime('startDate');
            $table->dateTime('endDate');
            $table->string('time');
            $table->string('status');
            $table->integer('price');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
