<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ustadz extends Model
{
    use HasFactory;

    protected $table = 'ustadz';

    protected $primaryKey = 'ustadz_id';

    public function acara() {
        return $this->hasMany(Acara::class);
    }

    protected $fillable = [
        'nama',
        'no_hp',
        'alamat',

    ];
}
