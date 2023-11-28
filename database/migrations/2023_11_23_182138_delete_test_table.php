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
        Schema::dropIfExists('test');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('test', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("description");
            $table->integer("varsta");
            $table->string("coloana1");
            $table->boolean('is_administrator');
            $table->timestamps();
        });
    }
};
