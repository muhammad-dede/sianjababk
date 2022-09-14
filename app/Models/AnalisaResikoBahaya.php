<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnalisaResikoBahaya extends Model
{
    use HasFactory;

    protected $table = 'analisa_resiko_bahaya';
    public $timestamps = false;

    protected $guarded = [];

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'id_jabatan', 'id');
    }
}
