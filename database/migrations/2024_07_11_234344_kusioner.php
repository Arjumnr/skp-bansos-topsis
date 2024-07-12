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
        Schema::create('kusioner', function (Blueprint $table) {
            $table->id();
            $table->integer('kepala_keluarga_id');
            $table->integer('kriteria_id');
            $table->integer('bobot_kriteria');
            $table->integer('bobot_jawaban');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
