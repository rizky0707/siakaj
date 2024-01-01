<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $table = 'absensi';

    protected $primaryKey = 'absensi_id';

    // public function ustadz()  {
    //     return $this->belongsTo(Ustadz::class, 'pemateri')->withDefault([
    //         'nama' => 'No category'
    //     ]);
    // }

    protected $fillable = [
        'peserta_id',
        'acara_id',
        'kehadiran',
        'jam_absensi',
        'tgl_absen',
    ];
}
