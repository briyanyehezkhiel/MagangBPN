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
            $table->integer('tahun')->nullable();
            $table->longText('pemohon')->nullable();
            $table->longText('termohon')->nullable();
            $table->longText('objek')->nullable();
            $table->longText('pokok_masalah')->nullable();
            $table->longText('progress_penyelesaian')->nullable();
            $table->longText('konseptor')->nullable();
            $table->longText('k1')->nullable();
            $table->longText('k2')->nullable();
            $table->longText('k3')->nullable();
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
