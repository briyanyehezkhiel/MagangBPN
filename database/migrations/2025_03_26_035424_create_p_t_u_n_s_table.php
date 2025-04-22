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
        Schema::create('p_t_u_n_s', function (Blueprint $table) {
            $table->id();
            $table->integer('tahun');
            $table->string('likus_dan_register_perkara');
            $table->string('penggugat');
            $table->string('tergugat');
            $table->string('objek_perkara_letak');
            $table->string('tk1')->nullable();
            $table->string('banding')->nullable();
            $table->string('kasasi')->nullable();
            $table->string('pk')->nullable();
            $table->string('amar_putusan_akhir');
            $table->string('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('p_t_u_n_s');
    }
};
