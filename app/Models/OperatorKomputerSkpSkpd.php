<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OperatorKomputerSkpSkpd extends Model
{
    use HasFactory;

    protected $fillable = ['kartu_monitoring_id', 'nama', 'tanggal', 'jam_masuk', 'jam_keluar'];

    public function kartu_monitoring()
    {
        return $this->belongsTo(KartuMonitoring::class);
    }
}
