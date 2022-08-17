<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kasus extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_kategori_kasus',
        'jumlah_laporan',
        'jumlah_selesai',
        'id_jalan',
        'keterangan',
        'cara',
    ];

    public function kategori_rol()
    {
        return $this->belongsTo(KategoriKasus::class, 'id_kategori_kasus');
    }

    public function jalan_rol()
    {
        return $this->belongsTo(Jalan::class, 'id_jalan');
    }
}
