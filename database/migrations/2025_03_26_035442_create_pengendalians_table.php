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
            $table->integer('tahun');
            $table->string('jenis_hak');
            $table->integer('nomor');
            $table->date('tanggal_terbit');
            $table->date('tanggal_berakhir');
            $table->string('kota');
            $table->string('kecamatan');
            $table->string('kelurahan');
            $table->string('luas_hak');
            $table->string('penguasaan_tanah');
            $table->string('penggunaan_tanah');
            $table->string('pemanfaatan_tanah');
            $table->decimal('terindikasi_terlantar', 10, 2);
            $table->string('keterangan');
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
