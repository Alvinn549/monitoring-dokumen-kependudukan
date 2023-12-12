<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatatanPenting extends Model
{
    use HasFactory;

    protected $fillable = ['kartu_monitoring_id', 'isi'];

    public function kartu_monitoring()
    {
        return $this->belongsTo(KartuMonitoring::class);
    }
}
