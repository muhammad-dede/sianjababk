<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnalisaKorelasiJabatan extends Model
{
    use HasFactory;

    protected $table = 'analisa_korelasi_jabatan';
    public $timestamps = false;

    protected $guarded = [];

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'id_jabatan', 'id');
    }
}
