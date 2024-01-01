<?php

namespace App\Imports;

use App\Models\Absensi;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class AbsensiImport implements ToModel, WithHeadingRow, SkipsOnFailure, WithValidation
{
    use Importable, SkipsFailures;

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Absensi([
            'peserta_id' => $row['peserta_id'],
            'acara_id' => $row['acara_id'],
            'kehadiran' => $row['kehadiran'],
            'jam_absensi' => $row['jam_absensi'],
            'tgl_absen' => $row['tgl_absen'],
        ]);
    }

    public function rules(): array
    {
       return [
            'peserta_id' => 'required',
            'acara_id' => 'required',
            'kehadiran' => 'required',
            'jam_absensi' => 'required',
            'tgl_absen' => 'required',
        ];
    }
}
