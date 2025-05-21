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
            $table->integer('tahun')->nullable();
            $table->longText('lokus_dan_register_perkara')->nullable();
            $table->longText('penggugat')->nullable();
            $table->longText('tergugat')->nullable();
            $table->longText('objek_perkara_letak')->nullable();
            $table->longText('tk1')->nullable();
            $table->longText('banding')->nullable();
            $table->longText('kasasi')->nullable();
            $table->longText('pk')->nullable();
            $table->longText('amar_putusan_akhir')->nullable();
            $table->longText('keterangan')->nullable();
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
