<?php

namespace App\Exports;

use App\Models\Absensi;
use Maatwebsite\Excel\Concerns\Exportable;
// use App\Exports\FormQuery;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AbsensiExport implements  FromQuery, WithMapping, ShouldAutoSize, WithHeadings
{
    Use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return Absensi::query();
    }

    public function map($absensi): array
    {
        return [
            $absensi->peserta_id,
            $absensi->acara_id,
            $absensi->kehadiran,
            $absensi->jam_absensi,
            $absensi->tgl_absen
        ];
    }

    public function headings(): array
    {
        return [
            'Nama',
            'Acara',
            'Kehadiran',
            'Jam Absensi',
            'Tanggal Absen'
        ];
    }
}
