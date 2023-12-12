@extends('dashboard.layouts.main')

@section('css')
    <style>
        @media print {
            body {
                width: 210mm;
                height: 297mm;
                margin: 0;
            }
        }

        table {
            border-collapse: collapse;
            border-spacing: 0;
            width: 100%;
            border: 1px solid black;
        }

        table,
        th,
        td {
            border: 1px solid black;
            vertical-align: top;
        }

        .custom-border {
            border: 2px solid black;
            padding: 15px;
            border-radius: 8px;
        }

         .btn-circle {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        text-align: center;
        padding: 12px 0; /* Adjust the padding as needed */
    }

    .floating-btn {
        position: fixed;
        bottom: 20px; /* Adjust the distance from the bottom */
        padding: 10px;
    }

    .bottom-right {
        right: 20px; /* Adjust the distance from the right */
    }
    </style>
@endsection

@section('content')
    <h1 class="mt-4">Kartu Monitorinng</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('kartu-monitoring.index') }}">Kartu Monitoring<Main></Main></a></li>
        <li class="breadcrumb-item active">Tambah</li>
    </ol>

    <form id="kartuMonitoringForm" action="{{ route('kartu-monitoring.store') }}" method="post" class="custom-border mb-4"
        onsubmit="return confirmSubmission()">
        @csrf
       <div class="position-fixed floating-btn bottom-right">
    <div class="btn-group">
        <button class="btn btn-danger btn-circle" type="button" onclick="confirmReset()">
            <i class="fas fa-undo"></i> <!-- FontAwesome undo icon -->
        </button>
        <button class="btn btn-success btn-circle" type="submit">
            <i class="fas fa-save"></i> <!-- FontAwesome save icon -->
        </button>
    </div>
</div>

        <!-- Kop -->
        <div class="row mt-3">
            <div class="col">
                <h3 class="text-center">KARTU MONITORING</h3>
                <h3 class="text-center">
                    PELAYANAN PENERBITAN DOKUMEN KEPENDUDUKAN
                </h3>
            </div>
        </div>
        <!-- End Kop -->

        <!-- Biodata Pemohon -->
        <div class="row mt-5">
            <div class="col-lg-8">
                <div class="row">
                    <p>
                        Bidodata pemohon
                        <strong>(diisi oleh petugas pelayanan)</strong>
                    </p>
                    <div class="col-sm-8">
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="nama_lengkap" class="col-form-label">NAMA LENGKAP</label>
                            </div>
                            <div class="col-sm">
                                <div class="row">
                                    <div class="col-sm-1 col-form-label">
                                        <p>:</p>
                                    </div>
                                    <div class="col">
                                        <input type="text" id="nama_lengkap" name="nama_lengkap"
                                            class="form-control @error('nama_lengkap') is-invalid @enderror"
                                            value="{{ old('nama_lengkap') }}" />
                                        @error('no_hp')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="row">
                            <div class="col-sm-2">
                                <label for="no_hp" class="col-form-label">HP</label>
                            </div>
                            <div class="col-sm">
                                <div class="row">
                                    <div class="col-sm-1 col-form-label">
                                        <p>:</p>
                                    </div>
                                    <div class="col">
                                        <input type="number" name="no_hp"
                                            class="form-control @error('no_hp') is-invalid @enderror" id="no_hp"
                                            value="{{ old('no_hp') }}" />
                                        @error('no_hp')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-8">
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="nik_pemohon" class="col-form-label">NIK PEMOHON</label>
                            </div>
                            <div class="col-sm">
                                <div class="row">
                                    <div class="col-sm-1 col-form-label">
                                        <p>:</p>
                                    </div>
                                    <div class="col">
                                        <input type="number" name="nik_pemohon"
                                            class="form-control @error('nik_pemohon') is-invalid @enderror" id="nik_pemohon"
                                            value="{{ old('nik_pemohon') }}" />
                                        @error('nik_pemohon')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-8">
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="tanggal_lahir" class="col-form-label">TEMPAT / TGL. LAHIR
                                </label>
                            </div>
                            <div class="col-sm">
                                <div class="row">
                                    <div class="col-sm-1 col-form-label">
                                        <p>:</p>
                                    </div>
                                    <div class="col">
                                        <input type="text" name="tempat_lahir"
                                            class="form-control @error('tempat_lahir') is-invalid @enderror"
                                            id="tempat_lahir" value="{{ old('tempat_lahir') }}" />
                                        @error('tempat_lahir')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="row">
                            <div class="col-sm">
                                <input type="date" name="tanggal_lahir"
                                    class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir"
                                    value="{{ old('tanggal_lahir') }}" />
                                @error('tanggal_lahir')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg">
                <div class="row mt-4">
                    <div class="col-sm-4">
                        <label for="tanggal" class="col-form-label">Tanggal</label>
                    </div>
                    <div class="col-sm-8">
                        <div class="row">
                            <div class="col-sm-1 col-form-label">
                                <p>:</p>
                            </div>
                            <div class="col">
                                <input type="date" name="tanggal"
                                    class="form-control @error('tanggal') is-invalid @enderror" id="tanggal"
                                    value="{{ old('tanggal') }}" />
                                @error('tanggal')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <label for="no_antrian" class="col-form-label">No Antrian</label>
                    </div>
                    <div class="col-sm-8">
                        <div class="row">
                            <div class="col-sm-1 col-form-label">
                                <p>:</p>
                            </div>
                            <div class="col">
                                <input type="number" name="no_antrian"
                                    class="form-control @error('no_antrian') is-invalid @enderror" id="no_antrian"
                                    value="{{ old('no_antrian') }}" />
                                @error('no_antrian')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <label for="jadi_tanggal" class="col-form-label">Jadi Tanggal</label>
                    </div>
                    <div class="col-sm-8">
                        <div class="row">
                            <div class="col-sm-1 col-form-label">
                                <p>:</p>
                            </div>
                            <div class="col">
                                <input type="date" name="jadi_tanggal"
                                    class="form-control @error('jadi_tanggal') is-invalid @enderror" id="jadi_tanggal"
                                    value="{{ old('jadi_tanggal') }}" />
                                @error('jadi_tanggal')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-2">
                <div class="row">
                    <div class="col">
                        <label for="alamat" class="col-form-label">ALAMAT</label>
                    </div>
                    <div class="col col-form-label">
                        <p class="text-end">:</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="row">
                    <div class="col-sm-2">
                        <label for="rt" class="col-form-label">RT</label>
                    </div>
                    <div class="col-sm">
                        <div class="row">
                            <div class="col-sm-1 col-form-label">
                                <p>:</p>
                            </div>
                            <div class="col">
                                <input type="number" name="rt"
                                    class="form-control @error('rt') is-invalid @enderror" id="rt"
                                    value="{{ old('rt') }}" />
                                @error('rt')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="row">
                    <div class="col-sm-2">
                        <label for="rw" class="col-form-label">RW</label>
                    </div>
                    <div class="col-sm">
                        <div class="row">
                            <div class="col-sm-1 col-form-label">
                                <p>:</p>
                            </div>
                            <div class="col">
                                <input type="number" name="rw"
                                    class="form-control @error('rw') is-invalid @enderror" id="rw"
                                    value="{{ old('rw') }}" />
                                @error('rw')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm">
                <div class="row">
                    <div class="col-sm-3">
                        <label for="desa" class="col-form-label">DESA/KELURAHAN</label>
                    </div>
                    <div class="col">
                        <div class="row">
                            <div class="col-sm-1 col-form-label">
                                <p class="text-end">:</p>
                            </div>
                            <div class="col">
                                <input type="text" name="desa"
                                    class="form-control @error('desa') is-invalid @enderror" id="desa"
                                    value="{{ old('desa') }}" />
                                @error('desa')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="row">
                    <div class="col-sm-4">
                        <!-- <label for="nama-lengkap" class="col-form-label">ALAMAT</label> -->
                    </div>
                    <div class="col">
                        <div class="row">
                            <div class="col-sm-3">
                                <label for="kecamatan" class="col-form-label">KECAMATAN</label>
                            </div>
                            <div class="col">
                                <div class="row">
                                    <div class="col-sm-1 col-form-label">
                                        <p>:</p>
                                    </div>
                                    <div class="col">
                                        <input type="text" name="kecamatan"
                                            class="form-control @error('kecamatan') is-invalid @enderror" id="kecamatan"
                                            value="{{ old('kecamatan') }}" />
                                        @error('kecamatan')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-3">
                <label for="jumlah_dokumen" class="col-form-label">JUMLAH DOKUMEN YANG DIMINTA
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
            </div>
            <div class="col-sm-2">
                <div class="row">
                    <div class="col-sm-2">
                        <label for="kk" class="col-form-label">KK</label>
                    </div>
                    <div class="col-sm">
                        <div class="row">
                            <div class="col-sm-1 col-form-label">
                                <p>:</p>
                            </div>
                            <div class="col">
                                <input type="number" name="kk"
                                    class="form-control @error('kk') is-invalid @enderror" id="kk"
                                    value="{{ old('kk') }}" />
                                @error('kk')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="row">
                    <div class="col-sm-2">
                        <label for="ktp" class="col-form-label">KTP</label>
                    </div>
                    <div class="col-sm">
                        <div class="row">
                            <div class="col-sm-1 col-form-label">
                                <p>:</p>
                            </div>
                            <div class="col">
                                <input type="number" name="ktp"
                                    class="form-control @error('ktp') is-invalid @enderror" id="ktp"
                                    value="{{ old('ktp') }}" />
                                @error('ktp')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="row">
                    <div class="col-sm-3">
                        <label for="akta" class="col-form-label">AKTA</label>
                    </div>
                    <div class="col-sm">
                        <div class="row">
                            <div class="col-sm-1 col-form-label">
                                <p>:</p>
                            </div>
                            <div class="col">
                                <input type="number" name="akta"
                                    class="form-control @error('akta') is-invalid @enderror" id="akta"
                                    value="{{ old('akta') }}" />
                                @error('akta')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="row">
                    <div class="col-sm-4">
                        <label for="skp_skpd" class="col-form-label">SKP / SKPD</label>
                    </div>
                    <div class="col-sm">
                        <div class="row">
                            <div class="col-sm-1 col-form-label">
                                <p>:</p>
                            </div>
                            <div class="col">
                                <input type="number" name="skp_skpd"
                                    class="form-control @error('skp_skpd') is-invalid @enderror" id="skp_skpd"
                                    value="{{ old('skp_skpd') }}" />
                                @error('skp_skpd')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- <hr style="border: 2px solid black" /> -->

        <table class="table" style="width: 100%" border="1">
            <tbody>
                <tr>
                    {{-- 1. Petugas Pelayanan --}}
                    <td rowspan="2">
                        <div class="container mt-3">
                            <div class="row">
                                <div class="col">
                                    <strong>1. PETUGAS PELAYANAN</strong>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-sm-5">
                                    <div class="form-check">
                                        <input name="petugas_pelayanan[kk_lama]" class="form-check-input" type="checkbox"
                                            value="kk_lama" id="flexCheckDefault" />
                                        <label class="form-check-label" for="flexCheckDefault">
                                            KK Lama
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input name="petugas_pelayanan[photo_berwarna]" class="form-check-input"
                                            type="checkbox" value="photo_berwarna" id="flexCheckDefault" />
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Photo Berwarna
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input name="petugas_pelayanan[skp]" class="form-check-input" type="checkbox"
                                            value="skp" id="flexCheckDefault" />
                                        <label class="form-check-label" for="flexCheckDefault">
                                            SKP
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input name="petugas_pelayanan[skpd]" class="form-check-input" type="checkbox"
                                            value="skpd" id="flexCheckDefault" />
                                        <label class="form-check-label" for="flexCheckDefault">
                                            SKPD
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input name="petugas_pelayanan[fc_surat_nikah]" class="form-check-input"
                                            type="checkbox" value="fc_surat_nikah" id="flexCheckDefault" />
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Fc. Surat Nikah
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input name="petugas_pelayanan[fc_kk]" class="form-check-input" type="checkbox"
                                            value="fc_kk" id="flexCheckDefault" />
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Fc. KK
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input name="petugas_pelayanan[fc_ktp]" class="form-check-input" type="checkbox"
                                            value="fc_ktp" id="flexCheckChecked" />
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Fc. KTP
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input name="petugas_pelayanan[fc_akta_kelahiran]" class="form-check-input"
                                            type="checkbox" value="fc_akta_kelahiran" id="flexCheckDefault" />
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Fc. Akta Kelahiran
                                        </label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-check">
                                        <input name="petugas_pelayanan[f1_01]" class="form-check-input" type="checkbox"
                                            value="f1_01" id="flexCheckDefault" />
                                        <label class="form-check-label" for="flexCheckDefault">
                                            F-1.01 <small>(form. Biodata penduduk WNI)</small>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input name="petugas_pelayanan[f1_15]" class="form-check-input" type="checkbox"
                                            value="f1_15" id="flexCheckDefault" />
                                        <label class="form-check-label" for="flexCheckDefault">
                                            F-1.15 <small>(KK baru)</small>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input name="petugas_pelayanan[f1_16]" class="form-check-input" type="checkbox"
                                            value="f1_16" id="flexCheckDefault" />
                                        <label class="form-check-label" for="flexCheckDefault">
                                            F-1.16 <small>Perubahan KK</small>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input name="petugas_pelayanan[f1_21]" class="form-check-input" type="checkbox"
                                            value="f1_21" id="flexCheckDefault" />
                                        <label class="form-check-label" for="flexCheckDefault">
                                            F-1.21 (KTP)
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input name="petugas_pelayanan[f2_01]" class="form-check-input" type="checkbox"
                                            value="f2_01" id="flexCheckDefault" />
                                        <label class="form-check-label" for="flexCheckDefault">
                                            F-2.01 <small>(Surat Keterangan Kelahiran)</small>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input name="petugas_pelayanan[f2_29]" class="form-check-input" type="checkbox"
                                            value="f2_29" id="flexCheckChecked" />
                                        <label class="form-check-label" for="flexCheckChecked">
                                            F-2.29 <small>(Surat Ket. Kematian)</small>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input name="petugas_pelayanan[f2_38]" class="form-check-input" type="checkbox"
                                            value="f2_38" id="flexCheckChecked" />
                                        <label class="form-check-label" for="flexCheckChecked">
                                            F-2.38 <small>(Pengakuan Anak)</small>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="nama_pl" class="col-form-label">
                                                Nama</label>
                                        </div>
                                        <div class="col-sm">
                                            <div class="row">
                                                <div class="col-sm-1 col-form-label">
                                                    <p>:</p>
                                                </div>
                                                <div class="col">
                                                    <input name="petugas_pelayanan[nama]" type="text"
                                                        class="form-control " id="petugas_pelayanan[nama]" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="tanggal" class="col-form-label">
                                                Hari / Tanggal</label>
                                        </div>
                                        <div class="col-sm">
                                            <div class="row d-flex">
                                                <div class="col-sm-1 col-form-label">
                                                    <p>:</p>
                                                </div>
                                                <div class="col">
                                                    <input name="petugas_pelayanan[tanggal]" type="date"
                                                        class="form-control " id="petugas_pelayanan[tanggal]" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="hp" class="col-form-label">
                                                Berkas Masuk Jam</label>
                                        </div>
                                        <div class="col-sm">
                                            <div class="row">
                                                <div class="col-sm-1 col-form-label">
                                                    <p>:</p>
                                                </div>
                                                <div class="col">
                                                    <input name="petugas_pelayanan[jam_masuk]" type="time"
                                                        class="form-control " id="petugas_pelayanan[tanggal]" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="hp" class="col-form-label">
                                                Berkas Selesai Jam</label>
                                        </div>
                                        <div class="col-sm">
                                            <div class="row">
                                                <div class="col-sm-1 col-form-label">
                                                    <p>:</p>
                                                </div>
                                                <div class="col">
                                                    <input name="petugas_pelayanan[jam_keluar]" type="time"
                                                        class="form-control " id="hp" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    {{-- 6. Operator Komputer : KTP --}}
                    <td>
                        <div class="container mt-3">
                            <div class="row">
                                <div class="col">
                                    <strong>6. OPERATOR KOMPUTER : KTP</strong>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="nama-opk-ktp" class="col-form-label">
                                                Nama</label>
                                        </div>
                                        <div class="col-sm">
                                            <div class="row">
                                                <div class="col-sm-1 col-form-label">
                                                    <p>:</p>
                                                </div>
                                                <div class="col">
                                                    <input name="opk_ktp[nama]" type="text" class="form-control "
                                                        id="opk_ktp[nama]" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="hari-tgl-opk-ktp" class="col-form-label">
                                                Hari / Tanggal</label>
                                        </div>
                                        <div class="col-sm">
                                            <div class="row">
                                                <div class="col-sm-1 col-form-label">
                                                    <p>:</p>
                                                </div>
                                                <div class="col">
                                                    <input name="opk_ktp[tanggal]" type="date" class="form-control "
                                                        id="opk_ktp[hari_tgl]" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="hp" class="col-form-label">
                                                Berkas Masuk Jam</label>
                                        </div>
                                        <div class="col-sm">
                                            <div class="row">
                                                <div class="col-sm-1 col-form-label">
                                                    <p>:</p>
                                                </div>
                                                <div class="col">
                                                    <input name="opk_ktp[jam_masuk]" type="time" class="form-control "
                                                        id="opk_ktp[jam_masuk]" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="hp" class="col-form-label">
                                                Berkas Selesai Jam</label>
                                        </div>
                                        <div class="col-sm">
                                            <div class="row">
                                                <div class="col-sm-1 col-form-label">
                                                    <p>:</p>
                                                </div>
                                                <div class="col">
                                                    <input name="opk_ktp[jam_keluar]" type="time"
                                                        class="form-control " id="opk_ktp[jam_keluar]" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    {{-- 7. Operator Komputer : Akta --}}
                    <td>
                        <div class="container mt-3">
                            <div class="row">
                                <div class="col">
                                    <strong>7. OPERATOR KOMPUTER : AKTA</strong>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="nama-opk-akta" class="col-form-label">
                                                Nama</label>
                                        </div>
                                        <div class="col-sm">
                                            <div class="row">
                                                <div class="col-sm-1 col-form-label">
                                                    <p>:</p>
                                                </div>
                                                <div class="col">
                                                    <input name="opk_akta[nama]" type="text" class="form-control "
                                                        id="opk_akta[nama]" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="hari-tgl-opk-akta" class="col-form-label">
                                                Hari / Tanggal</label>
                                        </div>
                                        <div class="col-sm">
                                            <div class="row">
                                                <div class="col-sm-1 col-form-label">
                                                    <p>:</p>
                                                </div>
                                                <div class="col">
                                                    <input name="opk_akta[tanggal]" type="date" class="form-control "
                                                        id="opk_akta[hari_tgl]" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="hp" class="col-form-label">
                                                Berkas Masuk Jam</label>
                                        </div>
                                        <div class="col-sm">
                                            <div class="row">
                                                <div class="col-sm-1 col-form-label">
                                                    <p>:</p>
                                                </div>
                                                <div class="col">
                                                    <input name="opk_akta[jam_masuk]" type="time"
                                                        class="form-control " id="opk_akta[jam_masuk]" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="hp" class="col-form-label">
                                                Berkas Selesai Jam</label>
                                        </div>
                                        <div class="col-sm">
                                            <div class="row">
                                                <div class="col-sm-1 col-form-label">
                                                    <p>:</p>
                                                </div>
                                                <div class="col">
                                                    <input name="opk_akta[jam_keluar]" type="time"
                                                        class="form-control " id="opk_akta[jam_keluar]" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    {{-- 2. KASIR --}}
                    <td>
                        <div class="container mt-3">
                            <div class="row">
                                <div class="col">
                                    <strong>2. KASIR</strong>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="kasir" class="col-form-label">
                                                Nama</label>
                                        </div>
                                        <div class="col-sm">
                                            <div class="row">
                                                <div class="col-sm-1 col-form-label">
                                                    <p>:</p>
                                                </div>
                                                <div class="col">
                                                    <input name="kasir[nama]" type="text" class="form-control "
                                                        id="kasir[nama]" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="hari-tgl-opk-ktp" class="col-form-label">
                                                Hari / Tanggal</label>
                                        </div>
                                        <div class="col-sm">
                                            <div class="row">
                                                <div class="col-sm-1 col-form-label">
                                                    <p>:</p>
                                                </div>
                                                <div class="col">
                                                    <input name="kasir[tanggal]" type="date" class="form-control "
                                                        id="kasir[hari_tgl]" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="hp" class="col-form-label">
                                                Berkas Masuk Jam</label>
                                        </div>
                                        <div class="col-sm">
                                            <div class="row">
                                                <div class="col-sm-1 col-form-label">
                                                    <p>:</p>
                                                </div>
                                                <div class="col">
                                                    <input name="kasir[jam_masuk]" type="time" class="form-control "
                                                        id="kasir[jam_masuk]" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="hp" class="col-form-label">
                                                Berkas Selesai Jam</label>
                                        </div>
                                        <div class="col-sm">
                                            <div class="row">
                                                <div class="col-sm-1 col-form-label">
                                                    <p>:</p>
                                                </div>
                                                <div class="col">
                                                    <input name="kasir[jam_keluar]" type="time" class="form-control "
                                                        id="kasir[jam_keluar]" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    {{-- 8. OPERATOR KOMPUTER : SKP / SKPD --}}
                    <td>
                        <div class="container mt-3">
                            <div class="row">
                                <div class="col">
                                    <strong>8. OPERATOR KOMPUTER : SKP / SKPD</strong>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="opk_skp_skpd" class="col-form-label">
                                                Nama</label>
                                        </div>
                                        <div class="col-sm">
                                            <div class="row">
                                                <div class="col-sm-1 col-form-label">
                                                    <p>:</p>
                                                </div>
                                                <div class="col">
                                                    <input name="opk_skp_skpd[nama]" type="text" class="form-control "
                                                        id="opk_skp_skpd[nama]" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="hari-tgl-opk-skp_skpd" class="col-form-label">
                                                Hari / Tanggal</label>
                                        </div>
                                        <div class="col-sm">
                                            <div class="row">
                                                <div class="col-sm-1 col-form-label">
                                                    <p>:</p>
                                                </div>
                                                <div class="col">
                                                    <input name="opk_skp_skpd[tanggal]" type="date"
                                                        class="form-control " id="opk_skp_skpd[hari_tgl]" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="hp" class="col-form-label">
                                                Berkas Masuk Jam</label>
                                        </div>
                                        <div class="col-sm">
                                            <div class="row">
                                                <div class="col-sm-1 col-form-label">
                                                    <p>:</p>
                                                </div>
                                                <div class="col">
                                                    <input name="opk_skp_skpd[jam_masuk]" type="time"
                                                        class="form-control " id="opk_skp_skpd[jam_masuk]" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="hp" class="col-form-label">
                                                Berkas Selesai Jam</label>
                                        </div>
                                        <div class="col-sm">
                                            <div class="row">
                                                <div class="col-sm-1 col-form-label">
                                                    <p>:</p>
                                                </div>
                                                <div class="col">
                                                    <input name="opk_skp_skpd[jam_keluar]" type="time"
                                                        class="form-control " id="opk_skp_skpd[jam_keluar]" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    {{-- 3. PENCATAT BUKU REGESTER --}}
                    <td>
                        <div class="container mt-3">
                            <div class="row">
                                <div class="col">
                                    <strong>3. PENCATAT BUKU REGESTER</strong>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="pencatat_buku_regester" class="col-form-label">
                                                Nama</label>
                                        </div>
                                        <div class="col-sm">
                                            <div class="row">
                                                <div class="col-sm-1 col-form-label">
                                                    <p>:</p>
                                                </div>
                                                <div class="col">
                                                    <input name="pencatat_buku_regester[nama]" type="text"
                                                        class="form-control " id="pencatat_buku_regester[nama]" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="hari-tgl-opk-ktp" class="col-form-label">
                                                Hari / Tanggal</label>
                                        </div>
                                        <div class="col-sm">
                                            <div class="row">
                                                <div class="col-sm-1 col-form-label">
                                                    <p>:</p>
                                                </div>
                                                <div class="col">
                                                    <input name="pencatat_buku_regester[tanggal]" type="date"
                                                        class="form-control " id="pencatat_buku_regester[hari_tgl]" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="hp" class="col-form-label">
                                                Berkas Masuk Jam</label>
                                        </div>
                                        <div class="col-sm">
                                            <div class="row">
                                                <div class="col-sm-1 col-form-label">
                                                    <p>:</p>
                                                </div>
                                                <div class="col">
                                                    <input name="pencatat_buku_regester[jam_masuk]" type="time"
                                                        class="form-control " id="pencatat_buku_regester[jam_masuk]" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="hp" class="col-form-label">
                                                Berkas Selesai Jam</label>
                                        </div>
                                        <div class="col-sm">
                                            <div class="row">
                                                <div class="col-sm-1 col-form-label">
                                                    <p>:</p>
                                                </div>
                                                <div class="col">
                                                    <input name="pencatat_buku_regester[jam_keluar]" type="time"
                                                        class="form-control " id="pencatat_buku_regester[jam_keluar]" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    {{-- 9. SUPERVISOR DOKUMEN / KASI --}}
                    <td>
                        <div class="container mt-3">
                            <div class="row">
                                <div class="col">
                                    <strong>9. SUPERVISOR DOKUMEN / KASI</strong>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="supervisor_dokumen_kasi" class="col-form-label">
                                                Nama</label>
                                        </div>
                                        <div class="col-sm">
                                            <div class="row">
                                                <div class="col-sm-1 col-form-label">
                                                    <p>:</p>
                                                </div>
                                                <div class="col">
                                                    <input name="spv_dokumen_kasi[nama]" type="text"
                                                        class="form-control " id="spv_dokumen_kasi[nama]" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="hari-tgl-opk-ktp" class="col-form-label">
                                                Hari / Tanggal</label>
                                        </div>
                                        <div class="col-sm">
                                            <div class="row">
                                                <div class="col-sm-1 col-form-label">
                                                    <p>:</p>
                                                </div>
                                                <div class="col">
                                                    <input name="spv_dokumen_kasi[tanggal]" type="date"
                                                        class="form-control " id="spv_dokumen_kasi[hari_tgl]" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="hp" class="col-form-label">
                                                Berkas Masuk Jam</label>
                                        </div>
                                        <div class="col-sm">
                                            <div class="row">
                                                <div class="col-sm-1 col-form-label">
                                                    <p>:</p>
                                                </div>
                                                <div class="col">
                                                    <input name="spv_dokumen_kasi[jam_masuk]" type="time"
                                                        class="form-control " id="spv_dokumen_kasi[jam_masuk]" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="hp" class="col-form-label">
                                                Berkas Selesai Jam</label>
                                        </div>
                                        <div class="col-sm">
                                            <div class="row">
                                                <div class="col-sm-1 col-form-label">
                                                    <p>:</p>
                                                </div>
                                                <div class="col">
                                                    <input name="spv_dokumen_kasi[jam_keluar]" type="time"
                                                        class="form-control " id="spv_dokumen_kasi[jam_keluar]" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    {{-- 4. SUPERVISOR BERKAS / KASI --}}
                    <td>
                        <div class="container mt-3">
                            <div class="row">
                                <div class="col">
                                    <strong>4. SUPERVISOR BERKAS / KASI</strong>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="supervisor_berkas_kasi" class="col-form-label">
                                                Nama</label>
                                        </div>
                                        <div class="col-sm">
                                            <div class="row">
                                                <div class="col-sm-1 col-form-label">
                                                    <p>:</p>
                                                </div>
                                                <div class="col">
                                                    <input name="spv_berkas_kasi[nama]" type="text"
                                                        class="form-control " id="spv_berkas_kasi[nama]" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="hari-tgl-opk-ktp" class="col-form-label">
                                                Hari / Tanggal</label>
                                        </div>
                                        <div class="col-sm">
                                            <div class="row">
                                                <div class="col-sm-1 col-form-label">
                                                    <p>:</p>
                                                </div>
                                                <div class="col">
                                                    <input name="spv_berkas_kasi[tanggal]" type="date"
                                                        class="form-control " id="spv_berkas_kasi[hari_tgl]" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="hp" class="col-form-label">
                                                Berkas Masuk Jam</label>
                                        </div>
                                        <div class="col-sm">
                                            <div class="row">
                                                <div class="col-sm-1 col-form-label">
                                                    <p>:</p>
                                                </div>
                                                <div class="col">
                                                    <input name="spv_berkas_kasi[jam_masuk]" type="time"
                                                        class="form-control " id="spv_berkas_kasi[jam_masuk]" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="hp" class="col-form-label">
                                                Berkas Selesai Jam</label>
                                        </div>
                                        <div class="col-sm">
                                            <div class="row">
                                                <div class="col-sm-1 col-form-label">
                                                    <p>:</p>
                                                </div>
                                                <div class="col">
                                                    <input name="spv_berkas_kasi[jam_keluar]" type="time"
                                                        class="form-control " id="spv_berkas_kasi[jam_keluar]" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    {{-- 10. PETUGAS DISTRIBUSI --}}
                    <td>
                        <div class="container mt-3">
                            <div class="row">
                                <div class="col">
                                    <strong>10. PETUGAS DISTRIBUSI</strong>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="petugas_distribusi" class="col-form-label">
                                                Nama</label>
                                        </div>
                                        <div class="col-sm">
                                            <div class="row">
                                                <div class="col-sm-1 col-form-label">
                                                    <p>:</p>
                                                </div>
                                                <div class="col">
                                                    <input name="petugas_distribusi[nama]" type="text"
                                                        class="form-control " id="petugas_distribusi[nama]" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="hari-tgl-opk-ktp" class="col-form-label">
                                                Hari / Tanggal</label>
                                        </div>
                                        <div class="col-sm">
                                            <div class="row">
                                                <div class="col-sm-1 col-form-label">
                                                    <p>:</p>
                                                </div>
                                                <div class="col">
                                                    <input name="petugas_distribusi[tanggal]" type="date"
                                                        class="form-control " id="petugas_distribusi[hari_tgl]" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="hp" class="col-form-label">
                                                Berkas Masuk Jam</label>
                                        </div>
                                        <div class="col-sm">
                                            <div class="row">
                                                <div class="col-sm-1 col-form-label">
                                                    <p>:</p>
                                                </div>
                                                <div class="col">
                                                    <input name="petugas_distribusi[jam_masuk]" type="time"
                                                        class="form-control " id="petugas_distribusi[jam_masuk]" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="hp" class="col-form-label">
                                                Berkas Selesai Jam</label>
                                        </div>
                                        <div class="col-sm">
                                            <div class="row">
                                                <div class="col-sm-1 col-form-label">
                                                    <p>:</p>
                                                </div>
                                                <div class="col">
                                                    <input name="petugas_distribusi[jam_keluar]" type="time"
                                                        class="form-control " id="petugas_distribusi[jam_keluar]" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    {{-- 5. OPERATOR KOMPUTER : KK --}}
                    <td>
                        <div class="container mt-3">
                            <div class="row">
                                <div class="col">
                                    <strong>5. OPERATOR KOMPUTER : KK</strong>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="opk_kk" class="col-form-label">
                                                Nama</label>
                                        </div>
                                        <div class="col-sm">
                                            <div class="row">
                                                <div class="col-sm-1 col-form-label">
                                                    <p>:</p>
                                                </div>
                                                <div class="col">
                                                    <input name="opk_kk[nama]" type="text" class="form-control "
                                                        id="opk_kk[nama]" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="hari-tgl-opk-ktp" class="col-form-label">
                                                Hari / Tanggal</label>
                                        </div>
                                        <div class="col-sm">
                                            <div class="row">
                                                <div class="col-sm-1 col-form-label">
                                                    <p>:</p>
                                                </div>
                                                <div class="col">
                                                    <input name="opk_kk[tanggal]" type="date" class="form-control "
                                                        id="opk_kk[hari_tgl]" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="hp" class="col-form-label">
                                                Berkas Masuk Jam</label>
                                        </div>
                                        <div class="col-sm">
                                            <div class="row">
                                                <div class="col-sm-1 col-form-label">
                                                    <p>:</p>
                                                </div>
                                                <div class="col">
                                                    <input name="opk_kk[jam_masuk]" type="time" class="form-control "
                                                        id="opk_kk[jam_masuk]" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="hp" class="col-form-label">
                                                Berkas Selesai Jam</label>
                                        </div>
                                        <div class="col-sm">
                                            <div class="row">
                                                <div class="col-sm-1 col-form-label">
                                                    <p>:</p>
                                                </div>
                                                <div class="col">
                                                    <input name="opk_kk[jam_keluar]" type="time" class="form-control "
                                                        id="opk_kk[jam_keluar]" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    {{-- 11. PEMOHON --}}
                    <td>
                        <div class="container mt-3">
                            <div class="row">
                                <div class="col">
                                    <strong>11. PEMOHON</strong>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="pemohon" class="col-form-label">
                                                Nama</label>
                                        </div>
                                        <div class="col-sm">
                                            <div class="row">
                                                <div class="col-sm-1 col-form-label">
                                                    <p>:</p>
                                                </div>
                                                <div class="col">
                                                    <input name="pemohon[nama]" type="text" class="form-control "
                                                        id="pemohon[nama]" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="hari-tgl-opk-ktp" class="col-form-label">
                                                Hari / Tanggal</label>
                                        </div>
                                        <div class="col-sm">
                                            <div class="row">
                                                <div class="col-sm-1 col-form-label">
                                                    <p>:</p>
                                                </div>
                                                <div class="col">
                                                    <input name="pemohon[tanggal]" type="date" class="form-control "
                                                        id="pemohon[hari_tgl]" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="hp" class="col-form-label">
                                                Berkas Masuk Jam</label>
                                        </div>
                                        <div class="col-sm">
                                            <div class="row">
                                                <div class="col-sm-1 col-form-label">
                                                    <p>:</p>
                                                </div>
                                                <div class="col">
                                                    <input name="pemohon[jam_masuk]" type="time" class="form-control "
                                                        id="pemohon[jam_masuk]" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="hp" class="col-form-label">
                                                Berkas Selesai Jam</label>
                                        </div>
                                        <div class="col-sm">
                                            <div class="row">
                                                <div class="col-sm-1 col-form-label">
                                                    <p>:</p>
                                                </div>
                                                <div class="col">
                                                    <input name="pemohon[jam_keluar]" type="time"
                                                        class="form-control " id="pemohon[jam_keluar]" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    {{-- CATATAN PENTING --}}
                    <td>
                        <div class="container">
                            <div class="row mt-3">
                                <div class="col">
                                    <strong>CATATAN PENTING</strong>
                                    <small class="text-danger"><br>Max 55 karakter</small>
                                    <textarea name="catatan_penting[isi]" rows="9"maxlength="55" class="form-control mt-3"
                                        placeholder="Masukkan catatan penting"></textarea>
                                </div>
                            </div>
                        </div>
                    </td>
                    {{-- 12. PETUGAS ARSIP --}}
                    <td>
                        <div class="container mt-3">
                            <div class="row">
                                <div class="col">
                                    <strong>12. PETUGAS ARSIP</strong>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="petugas_arsip" class="col-form-label">
                                                Nama</label>
                                        </div>
                                        <div class="col-sm">
                                            <div class="row">
                                                <div class="col-sm-1 col-form-label">
                                                    <p>:</p>
                                                </div>
                                                <div class="col">
                                                    <input name="petugas_arsip[nama]" type="text"
                                                        class="form-control " id="petugas_arsip[nama]" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="hari-tgl-opk-ktp" class="col-form-label">
                                                Hari / Tanggal</label>
                                        </div>
                                        <div class="col-sm">
                                            <div class="row">
                                                <div class="col-sm-1 col-form-label">
                                                    <p>:</p>
                                                </div>
                                                <div class="col">
                                                    <input name="petugas_arsip[tanggal]" type="date"
                                                        class="form-control " id="petugas_arsip[hari_tgl]" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="hp" class="col-form-label">
                                                Berkas Masuk Jam</label>
                                        </div>
                                        <div class="col-sm">
                                            <div class="row">
                                                <div class="col-sm-1 col-form-label">
                                                    <p>:</p>
                                                </div>
                                                <div class="col">
                                                    <input name="petugas_arsip[jam_masuk]" type="time"
                                                        class="form-control " id="petugas_arsip[jam_masuk]" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="hp" class="col-form-label">
                                                Berkas Selesai Jam</label>
                                        </div>
                                        <div class="col-sm">
                                            <div class="row">
                                                <div class="col-sm-1 col-form-label">
                                                    <p>:</p>
                                                </div>
                                                <div class="col">
                                                    <input name="petugas_arsip[jam_keluar]" type="time"
                                                        class="form-control " id="petugas_arsip[jam_keluar]" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
@endsection

@section('js')
    <script>
        function confirmSubmission() {
            return confirm("Are you sure you want to submit the form?");
        }

        function confirmReset() {
            if (confirm("Are you sure you want to reset the form?")) {
                document.getElementById("kartuMonitoringForm").reset();
            }
        }
    </script>
@endsection
