<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group_hewan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_group',
        'jenis_group',
        'harga_group',
        'modal_group',
        'kontrak_group',
        'target_berat_group',
        'status_group',
        'gambar_group',
        'banyak_sapi',
    ];
}