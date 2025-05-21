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
        Schema::create('p_n_s', function (Blueprint $table) {
            $table->id();
            $table->integer('tahun')->nullable();
            $table->longText('no_register_perkara')->nullable();
            $table->longText('penggugat')->nullable();
            $table->longText('tergugat')->nullable();
            $table->longText('objek_perkara')->nullable();
            $table->longText('tk1')->nullable();
            $table->longText('banding')->nullable();
            $table->longText('kasasi')->nullable();
            $table->longText('pk')->nullable();
            $table->longText('tipologi_kasus')->nullable();
            $table->longText('menang')->nullable();
            $table->longText('kalah')->nullable();
            $table->longText('keterangan')->nullable();
            $table->longText('justicia')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('p_n_s');
    }
};
