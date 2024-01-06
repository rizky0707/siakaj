<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acara extends Model
{
    use HasFactory;

    protected $table = 'acara';

    protected $primaryKey = 'acara_id';

    public function ustadz()  {
        return $this->belongsTo(Ustadz::class, 'pemateri')->withDefault([
            'nama' => 'No category'
        ]);
    }

    protected $fillable = [
        'tgl_acara',
        'materi',
        'jam_acara',
        'tempat',
        'pemateri',
        'kehadiran',
    ];



}
