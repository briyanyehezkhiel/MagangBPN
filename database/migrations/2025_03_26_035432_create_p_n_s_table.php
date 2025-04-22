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
            $table->integer('tahun');
            $table->string('no_register_perkara');
            $table->string('penggugat');
            $table->string('tergugat');
            $table->string('objek_perkara');
            $table->boolean('tk1')->nullable();
            $table->boolean('banding')->nullable();
            $table->boolean('kasasi')->nullable();
            $table->boolean('pk')->nullable();
            $table->string('tipologi_kasus');
            $table->boolean('menang');
            $table->boolean('kalah');
            $table->string('keterangan');
            $table->string('justicia');
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
