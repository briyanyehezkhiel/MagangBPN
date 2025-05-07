<?php

namespace App\Imports;

use App\Models\Sengketa;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;


class SengketaImport implements ToCollection, WithStartRow
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
        return 4; // Mulai membaca dari baris ke-2 untuk mengambil data
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        foreach ($rows->reverse() as $row) {
            Sengketa::create([
            'tahun' =>  $this->tahun ?? $row[0],  // Gunakan tahun dari form input
            'pemohon' => $row[1] ?? null,
            'termohon' => $row[2] ?? null,
            'objek' => $row[3] ?? null,
            'pokok_masalah' => $row[4] ?? null,
            'progress_penyelesaian' => $row[5] ?? null,
            'konseptor' => $row[6] ?? null,
            'k1' => $row[7] ?? null,
            'k2' => $row[8] ?? null,
            'k3' => $row[9] ?? null,
            'created_at' => $this->timestamp,
            'updated_at' => $this->timestamp
        ]);
    }
}
}
