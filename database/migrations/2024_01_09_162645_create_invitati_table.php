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
        Schema::create('invitati', function (Blueprint $table) {
            $table->id();
            $table->integer('invitation_id');
            $table->string('name');
            $table->text('confirmation');
            $table->boolean('need_accommodation');
            $table->text('food_prefferences');
            $table->integer('adults_number');
            $table->integer('kids_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invitati');
    }
};
