<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $fillable = [
        'tgl_transaksi',
        'jumlah_bayar',
        'nomor_bank',
        'nama_rekening',
        'nama_bank',
        'bukti_transaksi',
        'id_pemodal',
        'id_pengadas',
        'status_transaksi',
    ];
}
