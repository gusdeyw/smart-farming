<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;
    protected $fillable = [
        'jenis',
        'keterangan',
        'jumlah',
        'id_pemodal',
        'id_pengadas',
    ];

}
