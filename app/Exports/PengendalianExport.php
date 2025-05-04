<?php

namespace App\Exports;

use App\Models\Pengendalian;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;

class PengendalianExport implements FromCollection, WithHeadings, WithCustomStartCell
{
    public function startCell(): string
    {
        return 'A4'; // Heading mulai dari baris ke-4, data mulai dari baris ke-5
    }

    public function collection()
    {
        return Pengendalian::select(
            'tahun',
            'jenis_hak',
            'nomor',
            'tanggal_terbit',
            'tanggal_berakhir',
            'kota',
            'kecamatan',
            'kelurahan',
            'luas_hak',
            'penguasaan_tanah',
            'penggunaan_tanah',
            'pemanfaatan_tanah',
            'terindikasi_terlantar',
            'keterangan'
        )->get();
    }

    public function headings(): array
    {
        return [
            'Tahun',
            'Jenis Hak',
            'Nomor',
            'Tanggal Terbit',
            'Tanggal Berakhir',
            'Kota',
            'Kecamatan',
            'Kelurahan',
            'Luas Hak',
            'Penguasaan Tanah',
            'Penggunaan Tanah',
            'Pemanfaatan Tanah',
            'Terindikasi Terlantar',
            'Keterangan',
        ];
    }
}
