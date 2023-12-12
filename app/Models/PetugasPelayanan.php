<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetugasPelayanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'kartu_monitoring_id',
        'kk_lama',
        'photo_berwarna',
        'skp',
        'skpd',
        'fc_surat_nikah',
        'fc_kk',
        'fc_ktp',
        'fc_akta_kelahiran',
        'f1_01',
        'f1_15',
        'f1_16',
        'f1_21',
        'f2_01',
        'f2_29',
        'f2_38',
        'nama',
        'tanggal',
        'jam_masuk',
        'jam_keluar',
    ];

    public function kartu_monitoring()
    {
        return $this->belongsTo(KartuMonitoring::class);
    }
}
