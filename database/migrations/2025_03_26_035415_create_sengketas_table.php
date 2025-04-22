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
        Schema::create('sengketas', function (Blueprint $table) {
            $table->id();
            $table->integer('tahun');
            $table->string('pemohon');
            $table->string('termohon');
            $table->string('objek');
            $table->string('pokok_masalah');
            $table->string('progress_penyelesaian');
            $table->string('konseptor');
            $table->string('k1')->nullable();
            $table->string('k2')->nullable();
            $table->string('k3')->nullable();
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sengketas');
    }
};
