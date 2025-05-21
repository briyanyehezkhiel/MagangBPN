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
        Schema::create('pengendalians', function (Blueprint $table) {
            $table->id();
            $table->integer('tahun')->nullable();
            $table->longText('jenis_hak')->nullable();
            $table->longText('nomor')->nullable();
            $table->date('tanggal_terbit')->nullable();
            $table->date('tanggal_berakhir')->nullable();
            $table->longText('kota')->nullable();
            $table->longText('kecamatan')->nullable();
            $table->longText('kelurahan')->nullable();
            $table->longText('luas_hak')->nullable();
            $table->longText('penguasaan_tanah')->nullable();
            $table->longText('penggunaan_tanah')->nullable();
            $table->longText('pemanfaatan_tanah')->nullable();
            $table->longText('terindikasi_terlantar', 10, 2)->nullable();
            $table->longText('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengendalians');
    }
};
