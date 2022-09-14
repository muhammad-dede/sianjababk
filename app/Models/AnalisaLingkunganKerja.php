<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnalisaLingkunganKerja extends Model
{
    use HasFactory;

    protected $table = 'analisa_lingkungan_kerja';
    public $timestamps = false;

    protected $guarded = [];

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'id_jabatan', 'id');
    }
}
