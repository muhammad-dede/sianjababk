<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>{{ $jabatan->nama }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style>
        .page-break {
            page-break-after: always;
        }

        .no-wrap {
            white-space: nowrap;
        }

        .table-jabatan td,
        .table-jabatan td * {
            vertical-align: top;
        }

        .table-jabatan td {
            padding: 5px 3px 8px;
        }

        table.table-border th {
            border: 1px solid black;
            border-collapse: collapse;
            vertical-align: middle;
        }

        table.table-border td {
            border: 1px solid black;
            border-collapse: collapse;
            vertical-align: middle;
        }
    </style>
</head>

<body>
    <div class="text-center">
        <img src="{{ asset('') }}logo.png" alt="logo" class="img-fluid" width="75" height="75">
        <br>
        <br>
        <h3>PEMERINTAH PROVINSI BANTEN</h3>
    </div>
    <hr>
    <h2 class="text-center">INFORMASI JABATAN</h2>
    <br>
    <br>
    <table class="table-jabatan">
        <tr>
            <td><strong>1.</strong></td>
            <td><strong>NAMA JABATAN</strong></td>
            <td>:</td>
            <td>{{ $jabatan->nama }}</td>
        </tr>
        <tr>
            <td><strong>2.</strong></td>
            <td><strong>KODE JABATAN</strong></td>
            <td>:</td>
            <td>{{ $jabatan->kode }}</td>
        </tr>
        <tr>
            <td><strong>3.</strong></td>
            <td><strong>UNIT KERJA</strong></td>
            <td>:</td>
            <td>{{ $jabatan->skpd ? $jabatan->skpd->nama : '' }}</td>
        </tr>
        <tr>
            <td></td>
            <td>a.&nbsp;&nbsp;JPT Utama</td>
            <td>:</td>
            <td>{{ $jabatan->analisa ? $jabatan->analisa->jpt_utama : '' }}</td>
        </tr>
        <tr>
            <td></td>
            <td>b.&nbsp;&nbsp;JPT Madya</td>
            <td>:</td>
            <td>{{ $jabatan->analisa ? $jabatan->analisa->jpt_madya : '' }}</td>
        </tr>
        <tr>
            <td></td>
            <td>c.&nbsp;&nbsp;JPT Pratama</td>
            <td>:</td>
            <td>{{ $jabatan->analisa ? $jabatan->analisa->jpt_pratama : '' }}</td>
        </tr>
        <tr>
            <td></td>
            <td>d.&nbsp;&nbsp;Administrator</td>
            <td>:</td>
            <td>{{ $jabatan->analisa ? $jabatan->analisa->administrator : '' }}</td>
        </tr>
        <tr>
            <td></td>
            <td>e.&nbsp;&nbsp;Pengawas</td>
            <td>:</td>
            <td>{{ $jabatan->analisa ? $jabatan->analisa->pengawas : '' }}</td>
        </tr>
        <tr>
            <td></td>
            <td>f.&nbsp;&nbsp;Pelaksana</td>
            <td>:</td>
            <td>{{ $jabatan->analisa ? $jabatan->analisa->pelaksana : '' }}</td>
        </tr>
        <tr>
            <td></td>
            <td>g.&nbsp;&nbsp;Jabatan Fungsional</td>
            <td>:</td>
            <td>{{ $jabatan->analisa ? $jabatan->analisa->jabatan_fungsional : '' }}</td>
        </tr>
        <tr>
            <td><strong>4.</strong></td>
            <td><strong>IKHTISAR JABATAN</strong></td>
            <td>:</td>
            <td>{{ $jabatan->analisa ? $jabatan->analisa->ikhtisar : '' }}</td>
        </tr>
        <tr>
            <td><strong>5.</strong></td>
            <td><strong>KUALIFIKASI JABATAN</strong></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td>a.&nbsp;&nbsp;Pendidikan Formal</td>
            <td>:</td>
            <td>{{ $jabatan->analisa ? $jabatan->analisa->pendidikan_formal : '' }}</td>
        </tr>
        <tr>
            <td></td>
            <td>b.&nbsp;&nbsp;Pendidikan dan Pelatihan</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;b.1.&nbsp;&nbsp;Penjenjangan</td>
            <td>:</td>
            <td>{{ $jabatan->analisa ? $jabatan->analisa->pendidikan_pelatihan_penjenjangan : '' }}</td>
        </tr>
        <tr>
            <td></td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;b.2.&nbsp;&nbsp;Teknis</td>
            <td>:</td>
            <td>{{ $jabatan->analisa ? $jabatan->analisa->pendidikan_pelatihan_teknis : '' }}</td>
        </tr>
        <tr>
            <td></td>
            <td>c.&nbsp;&nbsp;Pengalaman Kerja</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;c.1.&nbsp;&nbsp;Struktural</td>
            <td>:</td>
            <td>{{ $jabatan->analisa ? $jabatan->analisa->pengalaman_kerja_struktural : '' }}</td>
        </tr>
        <tr>
            <td></td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;c.2.&nbsp;&nbsp;Fungsional</td>
            <td>:</td>
            <td>{{ $jabatan->analisa ? $jabatan->analisa->pengalaman_kerja_fungsional : '' }}</td>
        </tr>
        <tr>
            <td></td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;c.3.&nbsp;&nbsp;Bidang Jabatan</td>
            <td>:</td>
            <td>{{ $jabatan->analisa ? $jabatan->analisa->pengalaman_kerja_bidang_jabatan : '' }}</td>
        </tr>
        <tr>
            <td><strong>6.</strong></td>
            <td><strong>TUGAS POKOK</strong></td>
            <td>:</td>
            <td>
                <table class="table-border" style="width: 100%;">
                    <tr>
                        <td class="text-center" style="width: 2%;">NO</td>
                        <td class="text-center">URAIAN TUGAS</td>
                        <td class="text-center">HASIL KERJA</td>
                        <td class="text-center">JUMLAH KERJA</td>
                        <td class="text-center">WAKTU</td>
                        <td class="text-center">WAKTU</td>
                        <td class="text-center">KEBUTUHAN</td>
                    </tr>
                    @php
                        $jumlah_waktu_efektif = 0;
                        $jumlah_waktu_penyelesaian = 0;
                        $jumlah_pegawai = 0;
                    @endphp
                    @forelse ($jabatan->analisaTugasPokok as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $item->uraian_tugas_pokok }}</td>
                            <td class="text-center">{{ $item->hasil_kerja_tugas_pokok }}</td>
                            <td class="text-center">{{ $item->jumlah_hasil }}</td>
                            <td class="text-center">{{ $item->waktu_penyelesaian }}</td>
                            <td class="text-center">{{ $item->waktu_efektif }}</td>
                            <td class="text-center">{{ $item->kebutuhan_pegawai }}</td>
                        </tr>
                        @php
                            $jumlah_waktu_efektif += $item->waktu_efektif;
                            $jumlah_pegawai += $item->kebutuhan_pegawai;
                            $jumlah_waktu_penyelesaian = ($jumlah_waktu_efektif / $jabatan->analisaTugasPokok->count()) * $jumlah_pegawai;
                        @endphp
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Tidak ada data</td>
                        </tr>
                    @endforelse
                    <tr>
                        <td colspan="6">
                            <strong>JUMLAH WAKTU PENYELESAIAN (JAM)</strong>
                        </td>
                        <td class="text-center">
                            <strong>{{ $jumlah_waktu_penyelesaian }}</strong>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6">
                            <strong>JUMLAH PEGAWAI (ORANG)</strong>
                        </td>
                        <td class="text-center">
                            <strong>{{ $jumlah_pegawai }}</strong>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td><strong>7.</strong></td>
            <td><strong>HASIL KERJA</strong></td>
            <td>:</td>
            <td>{{ $jabatan->analisa ? $jabatan->analisa->hasil_kerja : '' }}</td>
        </tr>
        <tr>
            <td><strong>8.</strong></td>
            <td><strong>BAHAN KERJA</strong></td>
            <td>:</td>
            <td>
                <table class="table-border" style="width: 100%;">
                    <tr>
                        <td class="text-center" style="width: 2%;">NO</td>
                        <td class="text-center">BAHAN KERJA</td>
                        <td class="text-center">PENGGUNAAN DALAM TUGAS</td>
                    </tr>
                    @forelse ($jabatan->analisaBahanKerja as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $item->bahan_kerja }}</td>
                            <td>{{ $item->penggunaan_bahan_kerja }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">Tidak ada data</td>
                        </tr>
                    @endforelse
                </table>
            </td>
        </tr>
        <tr>
            <td><strong>9.</strong></td>
            <td><strong>PERANGKAT KERJA</strong></td>
            <td>:</td>
            <td>
                <table class="table-border" style="width: 100%;">
                    <tr>
                        <td class="text-center" style="width: 2%;">NO</td>
                        <td class="text-center">PERANGKAT KERJA</td>
                        <td class="text-center">PENGGUNAAN DALAM TUGAS</td>
                    </tr>
                    @forelse ($jabatan->analisaPerangkatKerja as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $item->perangkat_kerja }}</td>
                            <td>{{ $item->penggunaan_perangkat_kerja }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">Tidak ada data</td>
                        </tr>
                    @endforelse
                </table>
            </td>
        </tr>
        <tr>
            <td><strong>10.</strong></td>
            <td><strong>TANGGUNG JAWAB</strong></td>
            <td>:</td>
            <td>
                <table class="table-border" style="width: 100%;">
                    <tr>
                        <td class="text-center" style="width: 2%;">NO</td>
                        <td class="text-center">URAIAN</td>
                    </tr>
                    @forelse ($jabatan->analisaTanggungJawab as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $item->uraian_tanggung_jawab }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="text-center">Tidak ada data</td>
                        </tr>
                    @endforelse
                </table>
            </td>
        </tr>
        <tr>
            <td><strong>11.</strong></td>
            <td><strong>WEWENANG</strong></td>
            <td>:</td>
            <td>
                <table class="table-border" style="width: 100%;">
                    <tr>
                        <td class="text-center" style="width: 2%;">NO</td>
                        <td class="text-center">URAIAN</td>
                    </tr>
                    @forelse ($jabatan->analisaWewenang as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $item->uraian_wewenang }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="text-center">Tidak ada data</td>
                        </tr>
                    @endforelse
                </table>
            </td>
        </tr>
        <tr>
            <td><strong>12.</strong></td>
            <td><strong>KORELASI JABATAN</strong></td>
            <td>:</td>
            <td>
                <table class="table-border" style="width: 100%;">
                    <tr>
                        <td class="text-center" style="width: 2%;">NO</td>
                        <td class="text-center">NAMA JABATAN</td>
                        <td class="text-center">UNIT KERJA/INSTANSI</td>
                        <td class="text-center">DALAM HAL</td>
                    </tr>
                    @forelse ($jabatan->analisaKorelasiJabatan as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_korelasi_jabatan }}</td>
                            <td>{{ $item->unit_kerja_korelasi_jabatan }}</td>
                            <td>{{ $item->dalam_hal }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Tidak ada data</td>
                        </tr>
                    @endforelse
                </table>
            </td>
        </tr>
        <tr>
            <td><strong>13.</strong></td>
            <td><strong>KONDISI LINGKUNGAN KERJA</strong></td>
            <td>:</td>
            <td>
                <table class="table-border" style="width: 100%;">
                    <tr>
                        <td class="text-center" style="width: 2%;">NO</td>
                        <td class="text-center">ASPEK</td>
                        <td class="text-center">FAKTOR</td>
                    </tr>
                    @forelse ($jabatan->analisaLingkunganKerja as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $item->aspek }}</td>
                            <td>{{ $item->faktor }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">Tidak ada data</td>
                        </tr>
                    @endforelse
                </table>
            </td>
        </tr>
        <tr>
            <td><strong>14.</strong></td>
            <td><strong>RESIKO BAHAYA</strong></td>
            <td>:</td>
            <td>
                <table class="table-border" style="width: 100%;">
                    <tr>
                        <td class="text-center" style="width: 2%;">NO</td>
                        <td class="text-center">NAMA RESIKO</td>
                        <td class="text-center">PENYEBAB</td>
                    </tr>
                    @forelse ($jabatan->analisaResikoBahaya as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_resiko }}</td>
                            <td>{{ $item->penyebab }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">Tidak ada data</td>
                        </tr>
                    @endforelse
                </table>
            </td>
        </tr>
        <tr>
            <td><strong>15.</strong></td>
            <td><strong>SYARAT JABATAN</strong></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td>a.&nbsp;&nbsp;Keterampilan Kerja</td>
            <td>:</td>
            <td>{{ $jabatan->analisa ? $jabatan->analisa->keterampilan_kerja : '' }}</td>
        </tr>
        <tr>
            <td></td>
            <td>b.&nbsp;&nbsp;Bakat Kerja</td>
            <td>:</td>
            <td>{{ $jabatan->analisa ? $jabatan->analisa->bakat_kerja : '' }}</td>
        </tr>
        <tr>
            <td></td>
            <td>c.&nbsp;&nbsp;Temperamen Kerja</td>
            <td>:</td>
            <td>{{ $jabatan->analisa ? $jabatan->analisa->temperamen_kerja : '' }}</td>
        </tr>
        <tr>
            <td></td>
            <td>d.&nbsp;&nbsp;Minat Kerja</td>
            <td>:</td>
            <td>{{ $jabatan->analisa ? $jabatan->analisa->minat_kerja : '' }}</td>
        </tr>
        <tr>
            <td></td>
            <td>e.&nbsp;&nbsp;Upaya Fisik</td>
            <td>:</td>
            <td>{{ $jabatan->analisa ? $jabatan->analisa->upaya_fisik : '' }}</td>
        </tr>
        <tr>
            <td></td>
            <td>f.&nbsp;&nbsp;Kondisi Fisik</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;f.1.&nbsp;&nbsp;Jenis Kelamin</td>
            <td>:</td>
            <td>{{ $jabatan->analisa ? ($jabatan->analisa->jk ? ($jabatan->analisa->jk == 'L' ? 'Laki-laki' : 'Perempuan') : '') : '' }}
            </td>
        </tr>
        <tr>
            <td></td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;f.2.&nbsp;&nbsp;Umur</td>
            <td>:</td>
            <td>{{ $jabatan->analisa ? ($jabatan->analisa->umur ? $jabatan->analisa->umur . ' tahun' : '') : '' }}
            </td>
        </tr>
        <tr>
            <td></td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;f.3.&nbsp;&nbsp;Tinggi Badan</td>
            <td>:</td>
            <td>{{ $jabatan->analisa ? ($jabatan->analisa->tinggi_badan ? $jabatan->analisa->tinggi_badan . ' cm' : '') : '' }}
            </td>
        </tr>
        <tr>
            <td></td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;f.4.&nbsp;&nbsp;Berat Badan</td>
            <td>:</td>
            <td>{{ $jabatan->analisa ? ($jabatan->analisa->berat_badan ? $jabatan->analisa->berat_badan . ' kg' : '') : '' }}
            </td>
        </tr>
        <tr>
            <td></td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;f.5.&nbsp;&nbsp;Postur Badan</td>
            <td>:</td>
            <td>{{ $jabatan->analisa ? $jabatan->analisa->postur_badan : '' }}
            </td>
        </tr>
        <tr>
            <td></td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;f.6.&nbsp;&nbsp;Penampilan</td>
            <td>:</td>
            <td>{{ $jabatan->analisa ? $jabatan->analisa->penampilan : '' }}
            </td>
        </tr>
        <tr>
            <td></td>
            <td>g.&nbsp;&nbsp;Fungsi Pekerjaan</td>
            <td>:</td>
            <td>{{ $jabatan->analisa ? $jabatan->analisa->fungsi_pekerjaan : '' }}</td>
        </tr>
        <tr>
            <td><strong>16.</strong></td>
            <td><strong>PRESTASI KERJA YANG DIHARAPKAN</strong></td>
            <td>:</td>
            <td>
                <table class="table-border" style="width: 100%;">
                    <tr>
                        <td class="text-center" style="width: 2%;">NO</td>
                        <td class="text-center">HASIL KERJA</td>
                        <td class="text-center">JUMLAH HASIL</td>
                        <td class="text-center">JAM</td>
                    </tr>
                    @forelse ($jabatan->analisaPrestasiKerja as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $item->hasil_prestasi_kerja }}</td>
                            <td class="text-center">{{ $item->jumlah_hasil_prestasi_kerja }}</td>
                            <td class="text-center">{{ $item->jam_prestasi_kerja }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Tidak ada data</td>
                        </tr>
                    @endforelse
                </table>
            </td>
        </tr>
        <tr>
            <td><strong>17.</strong></td>
            <td><strong>KELAS JABATAN</strong></td>
            <td>:</td>
            <td>{{ $jabatan->analisa ? $jabatan->analisa->kelas_jabatan : '' }}</td>
        </tr>
    </table>
    <br>
    <br>
    <br>
    <br>
    <br>
    <table class="table-footer" style="width: 100%;">
        <tbody>
            <tr>
                <td class="text-center">
                    <span>Mengetahui,</span>
                    <br>
                    <span>KEPALA PERANGKAT DAERAH</span>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <span>..................................</span>
                    <br>
                    <span>NIP:..............................</span>
                </td>
                <td style="width: 30%;"></td>
                <td class="text-center">
                    <span>Serang,.............................{{ date('Y') }}</span>
                    <br>
                    <span>Penyusun</span>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <span>..................................</span>
                    <br>
                    <span>NIP:..............................</span>
                </td>
            </tr>
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>
