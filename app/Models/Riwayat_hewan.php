<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riwayat_hewan extends Model
{
    use HasFactory;

    protected $fillable = [
        'tgl_riwayat',
        'kondisi_hewan',
        'status_jual',
        'berat_hewan',
        'foto_kondisi',
        'id_pemodal',
        'id_pengadas',
        'id_hewan',
    ];
}
