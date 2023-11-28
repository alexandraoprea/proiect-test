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
        Schema::table('test', function (Blueprint $table) {
            $table->string("coloana1")->nullable()->after('varsta');
        });
        Schema::table('test', function (Blueprint $table) {
            $table->string("coloana2")->nullable()->after('coloana1');
            $table->renameColumn('title2', 'title');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('test', function (Blueprint $table) {
            $table->dropColumn(['coloana1', 'coloana2']);
            $table->renameColumn('title', 'title2');
        });
    }
};
