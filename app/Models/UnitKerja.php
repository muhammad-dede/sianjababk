<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitKerja extends Model
{
    use HasFactory;

    protected $table = 'unit_kerja';
    public $timestamps = false;

    protected $guarded = [];

    public function skpd()
    {
        return $this->hasMany(Skpd::class, 'id_unit_kerja', 'id');
    }
}
