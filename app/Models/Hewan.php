<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hewan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_hewan',
        'jenis_hewan',
        'harga_hewan',
        'modal_hewan',
        'kontrak_hewan',
        'target_berat_hewan',
        'status_hewan',
        'gambar',
        'id_pemodal',
        'id_pengadas',
    ];
}
