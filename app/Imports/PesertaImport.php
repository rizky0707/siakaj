<?php

namespace App\Imports;

use App\Models\Peserta;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;


class PesertaImport implements ToModel, WithHeadingRow, SkipsOnFailure, WithValidation 
{
    use Importable, SkipsFailures;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Peserta([
            'nama' => $row['nama'],
            'status' => $row['status'],
            'alamat' => $row['alamat'],
            'no_hp' => $row['no_hp'],
            'tgl_daftar' => $row['tgl_daftar'],
            'jam_daftar' => $row['jam_daftar'],
        ]);
    }

    public function rules(): array
    {
       return [
            'nama' => 'required|unique:peserta',
            'status' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'tgl_daftar' => 'required',
            'jam_daftar' => 'required',
        ];
    }

}
