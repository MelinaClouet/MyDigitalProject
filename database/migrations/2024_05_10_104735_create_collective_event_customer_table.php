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
        Schema::create('collective_event_customer', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('collective_event_id');
            $table->unsignedBigInteger('customer_id');
            $table->timestamps();

            // Clés étrangères
            $table->foreign('collective_event_id')->references('id')->on('collective_events');
            $table->foreign('customer_id')->references('id')->on('customers');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('collective_event_customer');
    }
};
