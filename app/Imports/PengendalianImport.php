<?php

namespace App\Imports;

use App\Models\Pengendalian;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;


class PengendalianImport implements ToModel, WithStartRow
{
    protected $tahun;
    protected $timestamp;

    // Menerima tahun dari form input
    public function __construct($tahun)
    {
        $this->tahun = $tahun;
        $this->timestamp = now();
    }

     /**
     * Mengatur baris pertama yang digunakan untuk membaca data.
     *
     * @return int
     */
    public function startRow(): int
    {
        return 5; // Mulai membaca dari baris ke-2 untuk mengambil data
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Pengendalian([
            'tahun' =>  $this->tahun ?? $row[13],  // Gunakan tahun dari form input
            'jenis_hak' => $row[0] ?? null, // Jenis Hak, misalnya B2
            'nomor' => $row[1] ?? null, // Nomor, misalnya C2
            'tanggal_terbit' => \Carbon\Carbon::parse($row[2])->format('Y-m-d'),
            'tanggal_berakhir' => \Carbon\Carbon::parse($row[3])->format('Y-m-d'),
            'kota' => $row[4] ?? null, // Kota, misalnya F2
            'kecamatan' => $row[5] ?? null, // Kecamatan, misalnya G2
            'kelurahan' => $row[6] ?? null, // Kelurahan, misalnya H2
            'luas_hak' => $row[7] ?? null, // Luas Hak, misalnya I2
            'penguasaan_tanah' => $row[8] ?? null, // Penguasaan Tanah, misalnya J2
            'penggunaan_tanah' => $row[9] ?? null, // Penggunaan Tanah, misalnya K2
            'pemanfaatan_tanah' => $row[10] ?? null, // Pemanfaatan Tanah, misalnya L2
            'terindikasi_terlantar' => $row[11] ?? null, // Terindikasi Terlantar, misalnya M2
            'keterangan' => $row[12] ?? null, // Keterangan, misalnya N2
            'created_at' => $this->timestamp,
            'updated_at' => $this->timestamp,

        ]);
    }
}
