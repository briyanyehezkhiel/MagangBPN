<?php

namespace App\Imports;

use App\Models\Pengendalian;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;


class PengendalianImport implements ToModel, WithHeadingRow, WithStartRow
{
    protected $tahun;

    // Menerima tahun dari form input
    public function __construct($tahun)
    {
        $this->tahun = $tahun;
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
            'tahun' => $this->tahun,  // Gunakan tahun dari form input
            'jenis_hak' => $row[1] ?? null, // Jenis Hak, misalnya B2
            'nomor' => $row[2] ?? null, // Nomor, misalnya C2
            'tanggal_terbit' => $row[3] ? \Carbon\Carbon::parse($row[3])->format('Y-m-d') : null, // Tanggal Terbit, misalnya D2
            'tanggal_berakhir' => $row[4] ? \Carbon\Carbon::parse($row[4])->format('Y-m-d') : null, // Tanggal Berakhir, misalnya E2
            'kota' => $row[5] ?? null, // Kota, misalnya F2
            'kecamatan' => $row[6] ?? null, // Kecamatan, misalnya G2
            'kelurahan' => $row[7] ?? null, // Kelurahan, misalnya H2
            'luas_hak' => $row[8] ?? null, // Luas Hak, misalnya I2
            'penguasaan_tanah' => $row[9] ?? null, // Penguasaan Tanah, misalnya J2
            'penggunaan_tanah' => $row[10] ?? null, // Penggunaan Tanah, misalnya K2
            'pemanfaatan_tanah' => $row[11] ?? null, // Pemanfaatan Tanah, misalnya L2
            'terindikasi_terlantar' => $row[12] ?? null, // Terindikasi Terlantar, misalnya M2
            'keterangan' => $row[13] ?? null, // Keterangan, misalnya N2

        ]);
    }
}
