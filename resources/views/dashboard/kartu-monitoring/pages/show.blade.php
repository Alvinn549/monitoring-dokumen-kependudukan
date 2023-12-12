<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kartu Monitoring-{{ $kartuMonitoring->tanggal }}</title>
    <style>
        .a4-div {
            width: 21cm;
            height: 29.7cm;
            border: 1px solid black;
            box-sizing: border-box;
            position: relative;
        }

        .table-petugas {
            position: absolute;
            bottom: 0;
            width: 100%;
        }

        .table {
            border-collapse: collapse;
            width: 100%;
            border: 1px solid black;
        }


        .print-button {
            display: block;
            margin-bottom: 10px;
        }

        .data-petugas {
            margin-bottom: 3px;
        }

        .kop-surat {
            text-align: center;
            font-size: 15px;
        }

        .biodata-pemohon {
            padding: 10px;
            position: relative;
        }

        .biodata-row {
            margin-bottom: 3px;
        }

        .label-biodata {
            display: inline-block;
            width: 280px;
            text-transform: uppercase;
        }

        .label-petugas {
            display: inline-block;
            width: 130px;
        }

        .label-antrian {
            display: inline-block;
            width: 100px;
            text-transform: uppercase;
        }

        .antrian-container {
            border: 1px solid black;
            padding: 10px;
            text-align: left;
            font-size: 13px;
            position: absolute;
            top: 0px;
            right: 20px;
        }

        .row {
            display: flex;
        }

        .col1 {
            flex: 1;
        }

        .col2 {
            flex: 1.5;
        }

        .label {
            margin-left: 5px;
        }

        @media print {
            .print-button {
                display: none;
            }

            body,
            html {
                width: 21cm;
                height: 29.7cm;
                margin: 0;
                padding: 0.5px;
            }

        }
    </style>
</head>

<body>

    <button class="print-button " onclick="window.print()">Print</button>

    <div class="a4-div">
        <div class="kop-surat">
            <h3>KARTU MONITORING<br>PELAYANAN PENERBITAN DOKUMEN KEPENDUDUKAN</h3>
        </div>

        <div class="biodata-pemohon">
            <div class="antrian-container">
                <div class="biodata-row">
                    <span class="label-antrian">TANGGAL</span>
                    <span>: {{ \Carbon\Carbon::parse($kartuMonitoring->tanggal)->format('d-m-Y') }}</span>
                </div>
                <div class="biodata-row">
                    <span class="label-antrian">NO. ANTRIAN</span>
                    <span>: {{ $kartuMonitoring->no_antrian }}</span>
                </div>
                <div class="biodata-row">
                    <span class="label-antrian">JADI TANGGAL</span>
                    <span>: {{ \Carbon\Carbon::parse($kartuMonitoring->jadi_tanggal)->format('d-m-Y') }}</span>
                </div>
            </div>

            <span>Biodata pemohon <small><strong>(diisi oleh petugas pelayanan)</strong></small></span>

            <div class="biodata-row">
                <span class="label-biodata">Nama Lengkap</span>
                <span>: {{ $kartuMonitoring->nama_lengkap }}</span>
            </div>
            <div class="biodata-row">
                <span class="label-biodata">No Hp</span>
                <span>: {{ $kartuMonitoring->no_hp }}</span>
            </div>
            <div class="biodata-row">
                <span class="label-biodata">Nik Pemohon</span>
                <span>: {{ $kartuMonitoring->nik_pemohon }}</span>
            </div>
            <div class="biodata-row">
                <span class="label-biodata">Tempat Tanggal Lahir</span>
                <span>: {{ $tempatLahir }}, {{\Carbon\Carbon::parse($tanggalLahir)->format('d-m-Y') }}</span>
            </div>
            <div class="biodata-row">
                <span class="label-biodata">Alamat</span>
                <span>: RT : {{ $rt }} RW : {{ $rw }} DESA/KELURAHAN : {{ $desa }}</span>
            </div>
            <div class="biodata-row">
                <span class="label-biodata"></span>
                <span> KECAMATAN : {{ $kecamatan }}</span>
            </div>
            <div class="biodata-row">
                <span class="label-biodata">Jumlah Dokumen Yang Diminta</span>
                <span>: 1. KK : {{ $kartuMonitoring->kk }}, 2. KTP : {{ $kartuMonitoring->ktp }}, 3. AKTA :
                    {{ $kartuMonitoring->akta }}, 4. SKP/SKPD : {{ $kartuMonitoring->skp_skpd }}</span>
            </div>
        </div>

        <div class="table-petugas">
            <table class="table" style="width: 100%;" border="1px">
                <tbody>
                    <tr>
                        <td rowspan="2" style=" vertical-align: top; padding: 7px;">1</td>
                        <td rowspan="2">
                            <p style="margin-left: 5px; margin-top: -0px; font-size: 18px; font-weight: bold;">Petugas
                                Pelayanan</p>

                            <div class="row" style="margin-top: -10px;">
                                <div class="col1">
                                    <div class="form-check">
                                        <input name="petugas_pelayanan[kk_lama]"
                                            {{ optional(optional($kartuMonitoring->petugas_pelayanan))->kk_lama ? 'checked' : '' }}
                                            class="form-check-input" type="checkbox" value="kk_lama"
                                            id="flexCheckDefault" />
                                        <label class="label">
                                            KK Lama
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input name="petugas_pelayanan[photo_berwarna]"
                                            {{ optional(optional($kartuMonitoring->petugas_pelayanan))->photo_berwarna ? 'checked' : '' }}
                                            class="form-check-input" type="checkbox" value="photo_berwarna"
                                            id="flexCheckDefault" />
                                        <label class="label">
                                            Photo Berwarna
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input name="petugas_pelayanan[skp]"
                                            {{ optional(optional($kartuMonitoring->petugas_pelayanan))->skp ? 'checked' : '' }}
                                            class="form-check-input" type="checkbox" value="skp"
                                            id="flexCheckDefault" />
                                        <label class="label">
                                            SKP
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input name="petugas_pelayanan[skpd]"
                                            {{ optional($kartuMonitoring->petugas_pelayanan)->skpd ? 'checked' : '' }}
                                            class="form-check-input" type="checkbox" value="skpd"
                                            id="flexCheckDefault" />
                                        <label class="label">
                                            SKPD
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input name="petugas_pelayanan[fc_surat_nikah]"
                                            {{ optional($kartuMonitoring->petugas_pelayanan)->fc_surat_nikah ? 'checked' : '' }}
                                            class="form-check-input" type="checkbox" value="fc_surat_nikah"
                                            id="flexCheckDefault" />
                                        <label class="label">
                                            Fc. Surat Nikah
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input name="petugas_pelayanan[fc_kk]"
                                            {{ optional($kartuMonitoring->petugas_pelayanan)->fc_kk ? 'checked' : '' }}
                                            class="form-check-input" type="checkbox" value="fc_kk"
                                            id="flexCheckDefault" />
                                        <label class="label">
                                            Fc. KK
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input name="petugas_pelayanan[fc_ktp]"
                                            {{ optional($kartuMonitoring->petugas_pelayanan)->fc_ktp ? 'checked' : '' }}
                                            class="form-check-input" type="checkbox" value="fc_ktp"
                                            id="flexCheckChecked" />
                                        <label class="label" for="flexCheckChecked">
                                            Fc. KTP
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input name="petugas_pelayanan[fc_akta_kelahiran]"
                                            {{ optional($kartuMonitoring->petugas_pelayanan)->fc_akta_kelahiran ? 'checked' : '' }}
                                            class="form-check-input" type="checkbox" value="fc_akta_kelahiran"
                                            id="flexCheckDefault" />
                                        <label class="label">
                                            Fc. Akta Kelahiran
                                        </label>
                                    </div>
                                </div>
                                <div class="col2">
                                    <div class="form-check">
                                        <input name="petugas_pelayanan[f1_01]"
                                            {{ optional($kartuMonitoring->petugas_pelayanan)->f1_01 ? 'checked' : '' }}
                                            class="form-check-input" type="checkbox" value="f1_01"
                                            id="flexCheckDefault" />
                                        <label class="label">
                                            F-1.01 <small>(form. Biodata penduduk WNI)</small>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input name="petugas_pelayanan[f1_15]"
                                            {{ optional($kartuMonitoring->petugas_pelayanan)->f1_15 ? 'checked' : '' }}
                                            class="form-check-input" type="checkbox" value="f1_15"
                                            id="flexCheckDefault" />
                                        <label class="label">
                                            F-1.15 <small>(KK baru)</small>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input name="petugas_pelayanan[f1_16]"
                                            {{ optional($kartuMonitoring->petugas_pelayanan)->f1_16 ? 'checked' : '' }}
                                            class="form-check-input" type="checkbox" value="f1_16"
                                            id="flexCheckDefault" />
                                        <label class="label">
                                            F-1.16 <small>Perubahan KK</small>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input name="petugas_pelayanan[f1_21]"
                                            {{ optional($kartuMonitoring->petugas_pelayanan)->f1_21 ? 'checked' : '' }}
                                            class="form-check-input" type="checkbox" value="f1_21"
                                            id="flexCheckDefault" />
                                        <label class="label">
                                            F-1.21 (KTP)
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input name="petugas_pelayanan[f2_01]"
                                            {{ optional($kartuMonitoring->petugas_pelayanan)->f2_01 ? 'checked' : '' }}
                                            class="form-check-input" type="checkbox" value="f2_01"
                                            id="flexCheckDefault" />
                                        <label class="label">
                                            F-2.01 <small>(Surat Keterangan Kelahiran)</small>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input name="petugas_pelayanan[f2_29]"
                                            {{ optional($kartuMonitoring->petugas_pelayanan)->f2_29 ? 'checked' : '' }}
                                            class="form-check-input" type="checkbox" value="f2_29"
                                            id="flexCheckChecked" />
                                        <label class="label" for="flexCheckChecked">
                                            F-2.29 <small>(Surat Ket. Kematian)</small>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input name="petugas_pelayanan[f2_38]"
                                            {{ optional($kartuMonitoring->petugas_pelayanan)->f2_38 ? 'checked' : '' }}
                                            class="form-check-input" type="checkbox" value="f2_38"
                                            id="flexCheckChecked" />
                                        <label class="label" for="flexCheckChecked">
                                            F-2.38 <small>(Pengakuan Anak)</small>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="data-petugas" style="margin-top:5px; margin-left:5px; ">
                                <div class="petugas-row">
                                    <span class="label-petugas">Nama</span>
                                    <span>: {{ $kartuMonitoring->petugas_pelayanan->nama }}</span>
                                </div>
                                <div class="petugas-row">
                                    <span class="label-petugas">Hari / Tanggal</span>
                                    <span>: {{  \Carbon\Carbon::parse($kartuMonitoring->petugas_pelayanan->tanggal)->format('d-m-Y') }}</span>
                                </div>
                                <div class="petugas-row">
                                    <span class="label-petugas">Berkas Masuk Jam</span>
                                    <span>: {{ $kartuMonitoring->petugas_pelayanan->jam_masuk }}</span>
                                </div>
                                <div class="petugas-row">
                                    <span class="label-petugas">Berkas Selesai Jam</span>
                                    <span>: {{ $kartuMonitoring->petugas_pelayanan->jam_keluar }}</span>
                                </div>
                            </div>
                        </td>
                        <td style=" vertical-align: top; padding: 7px;">6</td>
                        <td>
                            <p style="margin-left: 5px; font-size: 18px; margin-top: -10px; font-weight: bold">Operator
                                Komputer KTP</p>
                            <div class="data-petugas" style="margin-left:5px; ">
                                <div class="petugas-row">
                                    <span class="label-petugas">Nama</span>
                                    <span>: {{ $kartuMonitoring->operator_komputer_ktp->nama }}</span>
                                </div>
                                <div class="petugas-row">
                                    <span class="label-petugas">Hari / Tanggal</span>
                                    <span>: {{  \Carbon\Carbon::parse($kartuMonitoring->operator_komputer_ktp->tanggal)->format('d-m-Y') }}</span>
                                </div>
                                <div class="petugas-row">
                                    <span class="label-petugas">Berkas Masuk Jam</span>
                                    <span>: {{ $kartuMonitoring->operator_komputer_ktp->jam_masuk }}</span>
                                </div>
                                <div class="petugas-row">
                                    <span class="label-petugas">Berkas Selesai Jam</span>
                                    <span>: {{ $kartuMonitoring->operator_komputer_ktp->jam_keluar }}</span>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style=" vertical-align: top; padding: 7px;">7</td>
                        <td>
                            <p style="margin-left: 5px; font-size: 18px; margin-top: -10px; font-weight: bold">Operator
                                Komputer Akta</p>
                            <div class="data-petugas" style="margin-top:-5px; margin-left:5px; ">
                                <div class="petugas-row">
                                    <span class="label-petugas">Nama</span>
                                    <span>: {{ $kartuMonitoring->operator_komputer_akta->nama }}</span>
                                </div>
                                <div class="petugas-row">
                                    <span class="label-petugas">Hari / Tanggal</span>
                                    <span>: {{ \Carbon\Carbon::parse($kartuMonitoring->operator_komputer_akta->tanggal)->format('d-m-Y') }}</span>
                                </div>
                                <div class="petugas-row">
                                    <span class="label-petugas">Berkas Masuk Jam</span>
                                    <span>: {{ $kartuMonitoring->operator_komputer_akta->jam_masuk }}</span>
                                </div>
                                <div class="petugas-row">
                                    <span class="label-petugas">Berkas Selesai Jam</span>
                                    <span>: {{ $kartuMonitoring->operator_komputer_akta->jam_keluar }}</span>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style=" vertical-align: top; padding: 10px;">2</td>
                        <td>
                            <p style="margin-left: 5px; font-size: 18px; margin-top:-0px; font-weight: bold">Kasir
                            </p>
                            <div class="data-petugas" style="margin-top:-12px; margin-left:5px;">
                                <div class="petugas-row">
                                    <span class="label-petugas">Nama</span>
                                    <span>: {{ $kartuMonitoring->kasir->nama }}</span>
                                </div>
                                <div class="petugas-row">
                                    <span class="label-petugas">Hari / Tanggal</span>
                                    <span>: {{ \Carbon\Carbon::parse($kartuMonitoring->kasir->tanggal)->format('d-m-Y') }}</span>
                                </div>
                                <div class="petugas-row">
                                    <span class="label-petugas">Berkas Masuk Jam</span>
                                    <span>: {{ $kartuMonitoring->kasir->jam_masuk }}</span>
                                </div>
                                <div class="petugas-row">
                                    <span class="label-petugas">Berkas Selesai Jam</span>
                                    <span>: {{ $kartuMonitoring->kasir->jam_keluar }}</span>
                                </div>
                            </div>
                        </td>
                        <td style=" vertical-align: top; padding: 7px;">8</td>
                        <td>
                            <p style="margin-left: 5px; font-size: 18px; margin-top:-0px; font-weight: bold">
                                Operator Komputer SKP/SKPD</p>
                            <div class="data-petugas" style="margin-top:-12px; margin-left:5px; ">
                                <div class="petugas-row">
                                    <span class="label-petugas">Nama</span>
                                    <span>: {{ $kartuMonitoring->operator_komputer_skp_skpd->nama }}</span>
                                </div>
                                <div class="petugas-row">
                                    <span class="label-petugas">Hari / Tanggal</span>
                                    <span>: {{ \Carbon\Carbon::parse($kartuMonitoring->operator_komputer_skp_skpd->tanggal)->format('d-m-Y') }}</span>
                                </div>
                                <div class="petugas-row">
                                    <span class="label-petugas">Berkas Masuk Jam</span>
                                    <span>: {{ $kartuMonitoring->operator_komputer_skp_skpd->jam_masuk }}</span>
                                </div>
                                <div class="petugas-row">
                                    <span class="label-petugas">Berkas Selesai Jam</span>
                                    <span>: {{ $kartuMonitoring->operator_komputer_skp_skpd->jam_keluar }}</span>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style=" vertical-align: top; padding: 7px;">3</td>
                        <td>
                            <p style="margin-left: 5px; font-size: 18px; margin-top: -0px; font-weight: bold">Pencatat
                                Buku Regester</p>
                            <div class="data-petugas" style="margin-top:-5px; margin-left:5px; ">
                                <div class="petugas-row">
                                    <span class="label-petugas">Nama</span>
                                    <span>: {{ $kartuMonitoring->pencatat_buku_regester->nama }}</span>
                                </div>
                                <div class="petugas-row">
                                    <span class="label-petugas">Hari / Tanggal</span>
                                    <span>: {{ \Carbon\Carbon::parse($kartuMonitoring->pencatat_buku_regester->tanggal)->format('d-m-Y') }}</span>
                                </div>
                                <div class="petugas-row">
                                    <span class="label-petugas">Berkas Masuk Jam</span>
                                    <span>: {{ $kartuMonitoring->pencatat_buku_regester->jam_masuk }}</span>
                                </div>
                                <div class="petugas-row">
                                    <span class="label-petugas">Berkas Selesai Jam</span>
                                    <span>: {{ $kartuMonitoring->pencatat_buku_regester->jam_keluar }}</span>
                                </div>
                            </div>
                        </td>
                        <td style=" vertical-align: top; padding: 7px;">9</td>
                        <td>
                            <p style="margin-left: 5px; font-size: 18px; margin-top: -0px; font-weight: bold">
                                Supervisor Dokumen Kasi</p>
                            <div class="data-petugas" style="margin-top:-5px; margin-left:5px; ">
                                <div class="petugas-row">
                                    <span class="label-petugas">Nama</span>
                                    <span>: {{ $kartuMonitoring->supervisor_dokumen_kasi->nama }}</span>
                                </div>
                                <div class="petugas-row">
                                    <span class="label-petugas">Hari / Tanggal</span>
                                    <span>: {{ \Carbon\Carbon::parse($kartuMonitoring->supervisor_dokumen_kasi->tanggal)->format('d-m-Y') }}</span>
                                </div>
                                <div class="petugas-row">
                                    <span class="label-petugas">Berkas Masuk Jam</span>
                                    <span>: {{ $kartuMonitoring->supervisor_dokumen_kasi->jam_masuk }}</span>
                                </div>
                                <div class="petugas-row">
                                    <span class="label-petugas">Berkas Selesai Jam</span>
                                    <span>: {{ $kartuMonitoring->supervisor_dokumen_kasi->jam_keluar }}</span>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style=" vertical-align: top; padding: 7px;">4</td>
                        <td>
                            <p style="margin-left: 5px; font-size: 18px; margin-top: -0px; font-weight: bold">
                                Supervisor Berkas Kasi</p>
                            <div class="data-petugas" style="margin-top:-5px; margin-left:5px; ">
                                <div class="petugas-row">
                                    <span class="label-petugas">Nama</span>
                                    <span>: {{ $kartuMonitoring->supervisor_berkas_kasi->nama }}</span>
                                </div>
                                <div class="petugas-row">
                                    <span class="label-petugas">Hari / Tanggal</span>
                                    <span>: {{ \Carbon\Carbon::parse($kartuMonitoring->supervisor_berkas_kasi->tanggal)->format('d-m-Y') }}</span>
                                </div>
                                <div class="petugas-row">
                                    <span class="label-petugas">Berkas Masuk Jam</span>
                                    <span>: {{ $kartuMonitoring->supervisor_berkas_kasi->jam_masuk }}</span>
                                </div>
                                <div class="petugas-row">
                                    <span class="label-petugas">Berkas Selesai Jam</span>
                                    <span>: {{ $kartuMonitoring->supervisor_berkas_kasi->jam_keluar }}</span>
                                </div>
                            </div>
                        </td>
                        <td style=" vertical-align: top; padding: 7px;">10</td>
                        <td>
                            <p style="margin-left: 5px; font-size: 18px; margin-top: -0px; font-weight: bold">Petugas
                                Distribusi</p>
                            <div class="data-petugas" style="margin-top:-5px; margin-left:5px; ">
                                <div class="petugas-row">
                                    <span class="label-petugas">Nama</span>
                                    <span>: {{ $kartuMonitoring->petugas_distribusi->nama }}</span>
                                </div>
                                <div class="petugas-row">
                                    <span class="label-petugas">Hari / Tanggal</span>
                                    <span>: {{ \Carbon\Carbon::parse($kartuMonitoring->petugas_distribusi->tanggal)->format('d-m-Y') }}</span>
                                </div>
                                <div class="petugas-row">
                                    <span class="label-petugas">Berkas Masuk Jam</span>
                                    <span>: {{ $kartuMonitoring->petugas_distribusi->jam_masuk }}</span>
                                </div>
                                <div class="petugas-row">
                                    <span class="label-petugas">Berkas Selesai Jam</span>
                                    <span>: {{ $kartuMonitoring->petugas_distribusi->jam_keluar }}</span>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style=" vertical-align: top; padding: 7px;">5</td>
                        <td>
                            <p style="margin-left: 5px; font-size: 18px; margin-top: -0px; font-weight: bold">Operator
                                Komputer KK</p>
                            <div class="data-petugas" style="margin-top:-5px; margin-left:5px; ">
                                <div class="petugas-row">
                                    <span class="label-petugas">Nama</span>
                                    <span>: {{ $kartuMonitoring->operator_komputer_kk->nama }}</span>
                                </div>
                                <div class="petugas-row">
                                    <span class="label-petugas">Hari / Tanggal</span>
                                    <span>: {{ \Carbon\Carbon::parse($kartuMonitoring->operator_komputer_kk->tanggal)->format('d-m-Y') }}</span>
                                </div>
                                <div class="petugas-row">
                                    <span class="label-petugas">Berkas Masuk Jam</span>
                                    <span>: {{ $kartuMonitoring->operator_komputer_kk->jam_masuk }}</span>
                                </div>
                                <div class="petugas-row">
                                    <span class="label-petugas">Berkas Selesai Jam</span>
                                    <span>: {{ $kartuMonitoring->operator_komputer_kk->jam_keluar }}</span>
                                </div>
                            </div>
                        </td>
                        <td style=" vertical-align: top; padding: 7px;">11</td>
                        <td>
                            <p style="margin-left: 5px; font-size: 18px; margin-top: -0px; font-weight: bold">Pemohon
                            </p>
                            <div class="data-petugas" style="margin-top:-5px; margin-left:5px; ">
                                <div class="petugas-row">
                                    <span class="label-petugas">Nama</span>
                                    <span>: {{ $kartuMonitoring->pemohon->nama }}</span>
                                </div>
                                <div class="petugas-row">
                                    <span class="label-petugas">Hari / Tanggal</span>
                                    <span>: {{ \Carbon\Carbon::parse($kartuMonitoring->pemohon->tanggal)->format('d-m-Y') }}</span>
                                </div>
                                <div class="petugas-row">
                                    <span class="label-petugas">Berkas Masuk Jam</span>
                                    <span>: {{ $kartuMonitoring->pemohon->jam_masuk }}</span>
                                </div>
                                <div class="petugas-row">
                                    <span class="label-petugas">Berkas Selesai Jam</span>
                                    <span>: {{ $kartuMonitoring->pemohon->jam_keluar }}</span>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style=" vertical-align: top; padding: 7px;"></td>
                        <td>
                            <p style="margin-left: 5px; font-size: 18px; margin-top: -30px; font-weight: bold">Catatan
                                Penting
                            </p>
                            <p style="margin-left: 5px; margin-top: -10px;">
                                {{ $kartuMonitoring->catatan_penting->isi }}</p>
                        </td>
                        <td style=" vertical-align: top; padding: 7px;">12</td>
                        <td>
                            <p style="margin-left: 5px; font-size: 18px; margin-top: -0px; font-weight: bold">Petugas
                                Arsip</p>
                            <div class="data-petugas" style="margin-top:-5px; margin-left:5px; ">
                                <div class="petugas-row">
                                    <span class="label-petugas">Nama</span>
                                    <span>: {{ $kartuMonitoring->petugas_arsip->nama }}</span>
                                </div>
                                <div class="petugas-row">
                                    <span class="label-petugas">Hari / Tanggal</span>
                                    <span>: {{ \Carbon\Carbon::parse($kartuMonitoring->petugas_arsip->tanggal)->format('d-m-Y') }}</span>
                                </div>
                                <div class="petugas-row">
                                    <span class="label-petugas">Berkas Masuk Jam</span>
                                    <span>: {{ $kartuMonitoring->petugas_arsip->jam_masuk }}</span>
                                </div>
                                <div class="petugas-row">
                                    <span class="label-petugas">Berkas Selesai Jam</span>
                                    <span>: {{ $kartuMonitoring->petugas_arsip->jam_keluar }}</span>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <!-- DivTable.com -->
        </div>
    </div>

</body>

</html>
