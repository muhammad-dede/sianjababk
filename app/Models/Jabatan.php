<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jabatan extends Model
{
    use HasFactory;

    protected $table = 'jabatan';
    public $timestamps = false;

    protected $guarded = [];

    public function parent()
    {
        return $this->belongsTo(Jabatan::class, 'induk');
    }

    public function children()
    {
        return $this->hasMany(Jabatan::class, 'induk');
    }

    public function skpd()
    {
        return $this->belongsTo(Skpd::class, 'id_skpd', 'id');
    }

    public function analisa()
    {
        return $this->hasOne(Analisa::class, 'id_jabatan', 'id');
    }

    public function analisaTugasPokok()
    {
        return $this->hasMany(AnalisaTugasPokok::class, 'id_jabatan', 'id');
    }

    public function analisaBahanKerja()
    {
        return $this->hasMany(AnalisaBahanKerja::class, 'id_jabatan', 'id');
    }

    public function analisaPerangkatKerja()
    {
        return $this->hasMany(AnalisaPerangkatKerja::class, 'id_jabatan', 'id');
    }

    public function analisaTanggungJawab()
    {
        return $this->hasMany(AnalisaTanggungJawab::class, 'id_jabatan', 'id');
    }

    public function analisaWewenang()
    {
        return $this->hasMany(AnalisaWewenang::class, 'id_jabatan', 'id');
    }

    public function analisaKorelasiJabatan()
    {
        return $this->hasMany(AnalisaKorelasiJabatan::class, 'id_jabatan', 'id');
    }

    public function analisaLingkunganKerja()
    {
        return $this->hasMany(AnalisaLingkunganKerja::class, 'id_jabatan', 'id');
    }

    public function analisaResikoBahaya()
    {
        return $this->hasMany(AnalisaResikoBahaya::class, 'id_jabatan', 'id');
    }

    public function analisaPrestasiKerja()
    {
        return $this->hasMany(AnalisaPrestasiKerja::class, 'id_jabatan', 'id');
    }
}
