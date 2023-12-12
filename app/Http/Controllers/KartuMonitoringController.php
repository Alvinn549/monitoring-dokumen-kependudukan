<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;

use App\Models\KartuMonitoring;
use App\Models\CatatanPenting;
use App\Models\Kasir;
use App\Models\OperatorKomputerAkta;
use App\Models\OperatorKomputerKk;
use App\Models\OperatorKomputerKtp;
use App\Models\OperatorKomputerSkpSkpd;
use App\Models\Pemohon;
use App\Models\PencatatBukuRegester;
use App\Models\PetugasArsip;
use App\Models\PetugasDistribusi;
use App\Models\PetugasPelayanan;
use App\Models\SupervisorBerkasKasi;
use App\Models\SupervisorDokumenKasi;

use Illuminate\Http\Request;

class KartuMonitoringController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kartuMonitorings = KartuMonitoring::orderBy('created_at', 'desc')->get();

        return view('dashboard.kartu-monitoring.index', compact('kartuMonitorings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.kartu-monitoring.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->catatan_penting);

        $validate = $request->validate([
            'nama_lengkap' => 'required',
            'no_hp' => 'required',
            'nik_pemohon' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'tanggal' => 'required',
            'no_antrian' => 'required',
            'jadi_tanggal' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'desa' => 'required',
            'kecamatan' => 'required',
            'kk' => 'required',
            'ktp' => 'required',
            'akta' => 'required',
            'skp_skpd' => 'required',
        ]);

        $alamat = [
            'rt' => $validate['rt'],
            'rw' => $validate['rw'],
            'desa' => $validate['desa'],
            'kecamatan' => $validate['kecamatan'],
        ];

        $tempatTanggalLahir = [
            'tempat_lahir' => $validate['tempat_lahir'],
            'tanggal_lahir' => $validate['tanggal_lahir'],
        ];

        $alamatString = implode(', ', $alamat);
        $tempatTanggalLahirString = implode(', ', $tempatTanggalLahir);

        $kartuMonitoring = KartuMonitoring::create([
            'nama_lengkap' => $validate['nama_lengkap'],
            'no_hp' => $validate['no_hp'],
            'nik_pemohon' => $validate['nik_pemohon'],
            'ttl' => $tempatTanggalLahirString,
            'tanggal' => $validate['tanggal'],
            'no_antrian' => $validate['no_antrian'],
            'jadi_tanggal' => $validate['jadi_tanggal'],
            'alamat' => $alamatString,
            'kecamatan' => $validate['kecamatan'],
            'kk' => $validate['kk'],
            'ktp' => $validate['ktp'],
            'akta' => $validate['akta'],
            'skp_skpd' => $validate['skp_skpd'],
        ]);

        CatatanPenting::create([
            'kartu_monitoring_id' => $kartuMonitoring->id,
        ]);

        Kasir::create([
            'kartu_monitoring_id' => $kartuMonitoring->id,
        ]);

        OperatorKomputerAkta::create([
            'kartu_monitoring_id' => $kartuMonitoring->id,
        ]);

        OperatorKomputerKk::create([
            'kartu_monitoring_id' => $kartuMonitoring->id,
        ]);

        OperatorKomputerKtp::create([
            'kartu_monitoring_id' => $kartuMonitoring->id,
        ]);

        OperatorKomputerSkpSkpd::create([
            'kartu_monitoring_id' => $kartuMonitoring->id,
        ]);

        Pemohon::create([
            'kartu_monitoring_id' => $kartuMonitoring->id,
        ]);

        PencatatBukuRegester::create([
            'kartu_monitoring_id' => $kartuMonitoring->id,
        ]);

        PetugasArsip::create([
            'kartu_monitoring_id' => $kartuMonitoring->id,
        ]);

        PetugasDistribusi::create([
            'kartu_monitoring_id' => $kartuMonitoring->id,
        ]);

        PetugasPelayanan::create([
            'kartu_monitoring_id' => $kartuMonitoring->id,
        ]);

        SupervisorBerkasKasi::create([
            'kartu_monitoring_id' => $kartuMonitoring->id,
        ]);

        SupervisorDokumenKasi::create([
            'kartu_monitoring_id' => $kartuMonitoring->id,
        ]);

        if (
            collect($request->input('petugas_pelayanan'))
                ->filter()
                ->isNotEmpty()
        ) {
            $petugasPelayananData = $request->input('petugas_pelayanan');

            $kartuMonitoring->petugas_pelayanan->update($petugasPelayananData);
        }

        if (
            collect($request->input('opk_ktp'))
                ->filter()
                ->isNotEmpty()
        ) {
            $opkKtpData = $request->input('opk_ktp');

            $kartuMonitoring->operator_komputer_ktp->update($opkKtpData);
        }

        if (
            collect($request->input('opk_akta'))
                ->filter()
                ->isNotEmpty()
        ) {
            $opkAktaData = $request->input('opk_akta');

            $kartuMonitoring->operator_komputer_akta->update($opkAktaData);
        }

        if (
            collect($request->input('kasir'))
                ->filter()
                ->isNotEmpty()
        ) {
            $kasirData = $request->input('kasir');

            $kartuMonitoring->kasir->update($kasirData);
        }

        if (
            collect($request->input('opk_skp_skpd'))
                ->filter()
                ->isNotEmpty()
        ) {
            $opkSkpSkpdData = $request->input('opk_skp_skpd');

            $kartuMonitoring->operator_komputer_skp_skpd->update($opkSkpSkpdData);
        }

        if (
            collect($request->input('pencatat_buku_regester'))
                ->filter()
                ->isNotEmpty()
        ) {
            $pencatatBukuRegesterData = $request->input('pencatat_buku_regester');

            $kartuMonitoring->pencatat_buku_regester->update($pencatatBukuRegesterData);
        }

        if (
            collect($request->input('spv_dokumen_kasi'))
                ->filter()
                ->isNotEmpty()
        ) {
            $supervisorDokumenKasiData = $request->input('spv_dokumen_kasi');

            $kartuMonitoring->supervisor_dokumen_kasi->update($supervisorDokumenKasiData);
        }

        if (
            collect($request->input('spv_berkas_kasi'))
                ->filter()
                ->isNotEmpty()
        ) {
            $supervisorBerkasKasiData = $request->input('spv_berkas_kasi');

            $kartuMonitoring->supervisor_berkas_kasi->update($supervisorBerkasKasiData);
        }

        if (
            collect($request->input('petugas_distribusi'))
                ->filter()
                ->isNotEmpty()
        ) {
            $petugasDistribusiData = $request->input('petugas_distribusi');

            $kartuMonitoring->petugas_distribusi->update($petugasDistribusiData);
        }

        if (
            collect($request->input('opk_kk'))
                ->filter()
                ->isNotEmpty()
        ) {
            $opkKkData = $request->input('opk_kk');

            $kartuMonitoring->operator_komputer_kk->update($opkKkData);
        }

        if (
            collect($request->input('pemohon'))
                ->filter()
                ->isNotEmpty()
        ) {
            $pemohonData = $request->input('pemohon');

            $kartuMonitoring->pemohon->update($pemohonData);
        }

        if (
            collect($request->input('catatan_penting'))
                ->filter()
                ->isNotEmpty()
        ) {
            $catatanPentingData = $request->input('catatan_penting');

            $kartuMonitoring->catatan_penting->update($catatanPentingData);
        }

        if (
            collect($request->input('petugas_arsip'))
                ->filter()
                ->isNotEmpty()
        ) {
            $petugasArsipData = $request->input('petugas_arsip');

            $kartuMonitoring->petugas_arsip->update($petugasArsipData);
        }

        Alert::toast(
            '<p style="color: white; margin-top: 10px;">' . $kartuMonitoring->nama_lengkap . ' berhasil disimpan</p>',
            'success'
        )
            ->toHtml()
            ->background('#212529')
            ->position($position = 'bottom-right');

        return redirect()->route('kartu-monitoring.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KartuMonitoring  $kartuMonitoring
     * @return \Illuminate\Http\Response
     */
    public function show(KartuMonitoring $kartuMonitoring)
    {
        $kartuMonitoring->with([
            'petugas_pelayanan',
            'kasir',
            'pencatat_buku_regester',
            'supervisor_berkas_kasi',
            'operator_komputer_kk',
            'operator_komputer_ktp',
            'operator_komputer_akta',
            'operator_komputer_skp_skpd',
            'supervisor_dokumen_kasi',
            'petugas_distribusi',
            'pemohon',
            'petugas_arsip',
            'catatan_penting',
        ]);

        $ttlString = $kartuMonitoring->ttl;
        $ttlArray = explode(', ', $ttlString);
        $tempatLahir = $ttlArray[0];
        $tanggalLahir = $ttlArray[1];

        $alamatString = $kartuMonitoring->alamat;
        $alamatArray = explode(', ', $alamatString);
        $rt = $alamatArray[0];
        $rw = $alamatArray[1];
        $desa = $alamatArray[2];
        $kecamatan = $alamatArray[3];

        return view(
            'dashboard.kartu-monitoring.pages.show',
            compact('kartuMonitoring', 'tempatLahir', 'tanggalLahir', 'rt', 'rw', 'desa', 'kecamatan')
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KartuMonitoring  $kartuMonitoring
     * @return \Illuminate\Http\Response
     */
    public function edit(KartuMonitoring $kartuMonitoring)
    {
        $kartuMonitoring->with([
            'petugas_pelayanan',
            'kasir',
            'pencatat_buku_regester',
            'supervisor_berkas_kasi',
            'operator_komputer_kk',
            'operator_komputer_ktp',
            'operator_komputer_akta',
            'operator_komputer_skp_skpd',
            'supervisor_dokumen_kasi',
            'petugas_distribusi',
            'pemohon',
            'petugas_arsip',
            'catatan_penting',
        ]);

        // dd($kartuMonitoring);

        $ttlString = $kartuMonitoring->ttl;
        $ttlArray = explode(', ', $ttlString);
        $tempatLahir = $ttlArray[0];
        $tanggalLahir = $ttlArray[1];

        $alamatString = $kartuMonitoring->alamat;
        $alamatArray = explode(', ', $alamatString);
        $rt = $alamatArray[0];
        $rw = $alamatArray[1];
        $desa = $alamatArray[2];
        $kecamatan = $alamatArray[3];

        return view(
            'dashboard.kartu-monitoring.pages.edit',
            compact('kartuMonitoring', 'tempatLahir', 'tanggalLahir', 'rt', 'rw', 'desa', 'kecamatan')
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KartuMonitoring  $kartuMonitoring
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KartuMonitoring $kartuMonitoring)
    {
        // dd($request->catatan_penting);

        $validate = $request->validate([
            'nama_lengkap' => 'required',
            'no_hp' => 'required',
            'nik_pemohon' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'tanggal' => 'required',
            'no_antrian' => 'required',
            'jadi_tanggal' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'desa' => 'required',
            'kecamatan' => 'required',
            'kk' => 'required',
            'ktp' => 'required',
            'akta' => 'required',
            'skp_skpd' => 'required',
        ]);

        $alamat = [
            'rt' => $validate['rt'],
            'rw' => $validate['rw'],
            'desa' => $validate['desa'],
            'kecamatan' => $validate['kecamatan'],
        ];

        $tempatTanggalLahir = [
            'tempat_lahir' => $validate['tempat_lahir'],
            'tanggal_lahir' => $validate['tanggal_lahir'],
        ];

        $alamatString = implode(', ', $alamat);
        $tempatTanggalLahirString = implode(', ', $tempatTanggalLahir);

        $kartuMonitoring->update([
            'nama_lengkap' => $validate['nama_lengkap'],
            'no_hp' => $validate['no_hp'],
            'nik_pemohon' => $validate['nik_pemohon'],
            'ttl' => $tempatTanggalLahirString,
            'tanggal' => $validate['tanggal'],
            'no_antrian' => $validate['no_antrian'],
            'jadi_tanggal' => $validate['jadi_tanggal'],
            'alamat' => $alamatString,
            'kecamatan' => $validate['kecamatan'],
            'kk' => $validate['kk'],
            'ktp' => $validate['ktp'],
            'akta' => $validate['akta'],
            'skp_skpd' => $validate['skp_skpd'],
        ]);

        // dd($kartuMonitoring->id);

        if (
            collect($request->input('petugas_pelayanan'))
                ->filter()
                ->isNotEmpty()
        ) {
            $petugasPelayananData = $request->input('petugas_pelayanan');

            $kartuMonitoring->petugas_pelayanan->update($petugasPelayananData);
        }

        if (
            collect($request->input('opk_ktp'))
                ->filter()
                ->isNotEmpty()
        ) {
            $opkKtpData = $request->input('opk_ktp');

            $kartuMonitoring->operator_komputer_ktp->update($opkKtpData);
        }

        if (
            collect($request->input('opk_akta'))
                ->filter()
                ->isNotEmpty()
        ) {
            $opkAktaData = $request->input('opk_akta');

            $kartuMonitoring->operator_komputer_akta->update($opkAktaData);
        }

        if (
            collect($request->input('kasir'))
                ->filter()
                ->isNotEmpty()
        ) {
            $kasirData = $request->input('kasir');

            $kartuMonitoring->kasir->update($kasirData);
        }

        if (
            collect($request->input('opk_skp_skpd'))
                ->filter()
                ->isNotEmpty()
        ) {
            $opkSkpSkpdData = $request->input('opk_skp_skpd');

            $kartuMonitoring->operator_komputer_skp_skpd->update($opkSkpSkpdData);
        }

        if (
            collect($request->input('pencatat_buku_regester'))
                ->filter()
                ->isNotEmpty()
        ) {
            $pencatatBukuRegesterData = $request->input('pencatat_buku_regester');

            $kartuMonitoring->pencatat_buku_regester->update($pencatatBukuRegesterData);
        }

        if (
            collect($request->input('spv_dokumen_kasi'))
                ->filter()
                ->isNotEmpty()
        ) {
            $supervisorDokumenKasiData = $request->input('spv_dokumen_kasi');

            $kartuMonitoring->supervisor_dokumen_kasi->update($supervisorDokumenKasiData);
        }

        if (
            collect($request->input('spv_berkas_kasi'))
                ->filter()
                ->isNotEmpty()
        ) {
            $supervisorBerkasKasiData = $request->input('spv_berkas_kasi');

            $kartuMonitoring->supervisor_berkas_kasi->update($supervisorBerkasKasiData);
        }

        if (
            collect($request->input('petugas_distribusi'))
                ->filter()
                ->isNotEmpty()
        ) {
            $petugasDistribusiData = $request->input('petugas_distribusi');

            $kartuMonitoring->petugas_distribusi->update($petugasDistribusiData);
        }

        if (
            collect($request->input('opk_kk'))
                ->filter()
                ->isNotEmpty()
        ) {
            $opkKkData = $request->input('opk_kk');

            $kartuMonitoring->operator_komputer_kk->update($opkKkData);
        }

        if (
            collect($request->input('pemohon'))
                ->filter()
                ->isNotEmpty()
        ) {
            $pemohonData = $request->input('pemohon');

            $kartuMonitoring->pemohon->update($pemohonData);
        }

        if (
            collect($request->input('catatan_penting'))
                ->filter()
                ->isNotEmpty()
        ) {
            $catatanPentingData = $request->input('catatan_penting');

            $kartuMonitoring->catatan_penting->update($catatanPentingData);
        }

        if (
            collect($request->input('petugas_arsip'))
                ->filter()
                ->isNotEmpty()
        ) {
            $petugasArsipData = $request->input('petugas_arsip');

            $kartuMonitoring->petugas_arsip->update($petugasArsipData);
        }

        Alert::toast(
            '<p style="color: white; margin-top: 10px;">' . $kartuMonitoring->nama_lengkap . ' berhasil dirubah</p>',
            'success'
        )
            ->toHtml()
            ->background('#212529')
            ->position($position = 'bottom-right');

        return redirect()->route('kartu-monitoring.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KartuMonitoring  $kartuMonitoring
     * @return \Illuminate\Http\Response
     */
    public function destroy(KartuMonitoring $kartuMonitoring)
    {
        $kartuMonitoring->petugas_pelayanan()->delete();
        $kartuMonitoring->kasir()->delete();
        $kartuMonitoring->pencatat_buku_regester()->delete();
        $kartuMonitoring->supervisor_dokumen_kasi()->delete();
        $kartuMonitoring->supervisor_berkas_kasi()->delete();
        $kartuMonitoring->petugas_distribusi()->delete();
        $kartuMonitoring->operator_komputer_kk()->delete();
        $kartuMonitoring->operator_komputer_ktp()->delete();
        $kartuMonitoring->operator_komputer_akta()->delete();
        $kartuMonitoring->operator_komputer_skp_skpd()->delete();
        $kartuMonitoring->pemohon()->delete();
        $kartuMonitoring->catatan_penting()->delete();
        $kartuMonitoring->petugas_arsip()->delete();

        $kartuMonitoring->delete();

        Alert::toast(
            '<p style="color: white; margin-top: 10px;">' . $kartuMonitoring->nama_lengkap . ' berhasil di hapus</p>',
            'success'
        )
            ->toHtml()
            ->background('#212529')
            ->position($position = 'bottom-right');

        return redirect()->route('kartu-monitoring.index');
    }
}
