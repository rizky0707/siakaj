<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    use HasFactory;

    protected $table = 'peserta';

    protected $primaryKey = 'peserta_id';

    protected $fillable = [
        'nama',
        'status',
        'alamat',
        'no_hp',
        'tgl_daftar',
        'jam_daftar',
    ];

}
