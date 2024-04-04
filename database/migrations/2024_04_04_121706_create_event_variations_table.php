<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('event_variations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('eventCategorie_id')->unsigned();
            $table->string('duration');
            $table->string('price');
            $table->integer('max_capacity');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('event_variations');
    }
};
