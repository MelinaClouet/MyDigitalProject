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
        Schema::create('collective_events', function (Blueprint $table) {
            $table->id();
            $table->string('event_id');
            $table->string('event_categorie_id');
            $table->string('event_variation_id');
            $table->dateTime('startDate');
            $table->dateTime('endDate');
            $table->integer('price');
            $table->string('address');
            $table->string('city');
            $table->string('zipCode');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('collective_events');
    }
};
