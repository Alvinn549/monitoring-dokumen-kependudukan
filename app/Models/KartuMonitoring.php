<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KartuMonitoring extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_lengkap',
        'no_hp',
        'nik_pemohon',
        'ttl',
        'alamat',
        'kk',
        'ktp',
        'akta',
        'skp_skpd',
        'tanggal',
        'no_antrian',
        'jadi_tanggal',
    ];

    public function petugas_pelayanan()
    {
        return $this->hasOne(PetugasPelayanan::class);
    }
    public function kasir()
    {
        return $this->hasOne(Kasir::class);
    }
    public function pencatat_buku_regester()
    {
        return $this->hasOne(PencatatBukuRegester::class);
    }
    public function supervisor_berkas_kasi()
    {
        return $this->hasOne(SupervisorBerkasKasi::class);
    }
    public function operator_komputer_kk()
    {
        return $this->hasOne(OperatorKomputerKk::class);
    }
    public function operator_komputer_ktp()
    {
        return $this->hasOne(OperatorKomputerKtp::class);
    }
    public function operator_komputer_akta()
    {
        return $this->hasOne(OperatorKomputerAkta::class);
    }
    public function operator_komputer_skp_skpd()
    {
        return $this->hasOne(OperatorKomputerSkpSkpd::class);
    }
    public function supervisor_dokumen_kasi()
    {
        return $this->hasOne(SupervisorDokumenKasi::class);
    }
    public function petugas_distribusi()
    {
        return $this->hasOne(PetugasDistribusi::class);
    }
    public function pemohon()
    {
        return $this->hasOne(Pemohon::class);
    }
    public function petugas_arsip()
    {
        return $this->hasOne(PetugasArsip::class);
    }
    public function catatan_penting()
    {
        return $this->hasOne(CatatanPenting::class);
    }
}
