<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skpd extends Model
{
    use HasFactory;

    protected $table = 'skpd';
    public $timestamps = false;

    protected $guarded = [];

    public function unitKerja()
    {
        return $this->belongsTo(UnitKerja::class, 'id_unit_kerja', 'id');
    }

    public function jabatan()
    {
        return $this->hasMany(Jabatan::class, 'id_skpd', 'id');
    }
}
