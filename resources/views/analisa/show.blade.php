@extends('layouts.app')

@section('title', __('Rincian Analisa'))

@section('content')
    <div class="container-xl">
        <div class="page-header d-print-none">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        {{ __('Rincian Analisa') }}
                    </h2>
                </div>
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="d-flex">
                        <ol class="breadcrumb breadcrumb-arrows" aria-label="breadcrumbs">
                            <li class="breadcrumb-item"><a href="{{ route('analisa.index') }}">{{ __('Analisa') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                {{ __('Rincian Analisa') }}
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row">
                <div class="col-12 mb-2">
                    <div class="card card-md">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col my-1">
                                    <h2 class="h2">Informasi Jabatan</h2>
                                    <p class="m-0 text-muted">
                                        Isi formulir dibawah ini untuk menganalisa jabatan dan beban kerja.
                                    </p>
                                </div>
                                <div class="col-auto my-1">
                                    <a href="{{ route('analisa.cetak', $jabatan->id) }}" class="btn btn-outline-success"
                                        target="_blank">
                                        Cetak
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <form action="{{ route('analisa.save', $jabatan->id) }}" class="card card-md form-analisa"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group mb-3 row">
                                <label class="form-label col-md-3 col-form-label" for="nama">
                                    Nama Jabatan
                                </label>
                                <div class="col">
                                    <input type="text" name="nama" id="nama" class="form-control"
                                        value="{{ $jabatan->nama }}" readonly>
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <label class="form-label col-md-3 col-form-label" for="kode">
                                    Kode Jabatan
                                </label>
                                <div class="col">
                                    <input type="text" name="kode" id="kode" class="form-control"
                                        value="{{ $jabatan->kode }}" readonly>
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <label class="form-label col-md-3 col-form-label" for="skpd">
                                    SKPD
                                </label>
                                <div class="col">
                                    <input type="text" name="skpd" id="skpd" class="form-control"
                                        value="{{ $jabatan->skpd ? $jabatan->skpd->nama : null }}" readonly>
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <label class="form-label col-md-3 col-form-label" for="unit_kerja">
                                    Unit Kerja
                                </label>
                                <div class="col">
                                    <input type="text" name="unit_kerja" id="unit_kerja" class="form-control"
                                        value="{{ $jabatan->skpd ? ($jabatan->skpd->unitKerja ? $jabatan->skpd->unitKerja->nama : null) : null }}"
                                        readonly>
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <label class="form-label col-md-3 col-form-label" for="jpt_utama">
                                    JPT Utama
                                </label>
                                <div class="col">
                                    <input type="text" name="jpt_utama" id="jpt_utama" class="form-control"
                                        value="{{ $jabatan->analisa ? $jabatan->analisa->jpt_utama : null }}">
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <label class="form-label col-md-3 col-form-label" for="jpt_madya">
                                    JPT Madya
                                </label>
                                <div class="col">
                                    <input type="text" name="jpt_madya" id="jpt_madya" class="form-control"
                                        value="{{ $jabatan->analisa ? $jabatan->analisa->jpt_madya : null }}">
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <label class="form-label col-md-3 col-form-label" for="jpt_pratama">
                                    JPT Pratama
                                </label>
                                <div class="col">
                                    <input type="text" name="jpt_pratama" id="jpt_pratama" class="form-control"
                                        value="{{ $jabatan->analisa ? $jabatan->analisa->jpt_pratama : null }}">
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <label class="form-label col-md-3 col-form-label" for="administrator">
                                    Administrator
                                </label>
                                <div class="col">
                                    <input type="text" name="administrator" id="administrator" class="form-control"
                                        value="{{ $jabatan->analisa ? $jabatan->analisa->administrator : null }}">
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <label class="form-label col-md-3 col-form-label" for="pengawas">
                                    Pengawas
                                </label>
                                <div class="col">
                                    <input type="text" name="pengawas" id="pengawas" class="form-control"
                                        value="{{ $jabatan->analisa ? $jabatan->analisa->pengawas : null }}">
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <label class="form-label col-md-3 col-form-label" for="pelaksana">
                                    Pelaksana
                                </label>
                                <div class="col">
                                    <input type="text" name="pelaksana" id="pelaksana" class="form-control"
                                        value="{{ $jabatan->analisa ? $jabatan->analisa->pelaksana : null }}">
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <label class="form-label col-md-3 col-form-label" for="jabatan_fungsional">
                                    Jabatan Fungsional
                                </label>
                                <div class="col">
                                    <input type="text" name="jabatan_fungsional" id="jabatan_fungsional"
                                        class="form-control"
                                        value="{{ $jabatan->analisa ? $jabatan->analisa->jabatan_fungsional : null }}">
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <label class="form-label col-md-3 col-form-label" for="ikhtisar">
                                    Ikhtisar Jabatan
                                </label>
                                <div class="col">
                                    <textarea name="ikhtisar" id="ikhtisar" cols="30" rows="3" class="form-control">{{ $jabatan->analisa ? $jabatan->analisa->ikhtisar : '' }}</textarea>
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <label class="form-label col-md-3 col-form-label" for="pendidikan_formal">
                                    Pendidikan Formal
                                </label>
                                <div class="col">
                                    <input type="text" name="pendidikan_formal" id="pendidikan_formal"
                                        class="form-control"
                                        value="{{ $jabatan->analisa ? $jabatan->analisa->pendidikan_formal : null }}">
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <label class="form-label col-md-3 col-form-label" for="pendidikan_pelatihan_penjenjangan">
                                    Penjenjangan Pendidikan dan Pelatihan
                                </label>
                                <div class="col">
                                    <input type="text" name="pendidikan_pelatihan_penjenjangan"
                                        id="pendidikan_pelatihan_penjenjangan" class="form-control"
                                        value="{{ $jabatan->analisa ? $jabatan->analisa->pendidikan_pelatihan_penjenjangan : null }}">
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <label class="form-label col-md-3 col-form-label" for="pendidikan_pelatihan_teknis">
                                    Teknis Pendidikan dan Pelatihan
                                </label>
                                <div class="col">
                                    <input type="text" name="pendidikan_pelatihan_teknis"
                                        id="pendidikan_pelatihan_teknis" class="form-control"
                                        value="{{ $jabatan->analisa ? $jabatan->analisa->pendidikan_pelatihan_teknis : null }}">
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <label class="form-label col-md-3 col-form-label" for="pengalaman_kerja_struktural">
                                    Pengalaman Kerja Struktural
                                </label>
                                <div class="col">
                                    <input type="text" name="pengalaman_kerja_struktural"
                                        id="pengalaman_kerja_struktural" class="form-control"
                                        value="{{ $jabatan->analisa ? $jabatan->analisa->pengalaman_kerja_struktural : null }}">
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <label class="form-label col-md-3 col-form-label" for="pengalaman_kerja_fungsional">
                                    Pengalaman Kerja Fungsional
                                </label>
                                <div class="col">
                                    <input type="text" name="pengalaman_kerja_fungsional"
                                        id="pengalaman_kerja_fungsional" class="form-control"
                                        value="{{ $jabatan->analisa ? $jabatan->analisa->pengalaman_kerja_fungsional : null }}">
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <label class="form-label col-md-3 col-form-label" for="pengalaman_kerja_bidang_jabatan">
                                    Pengalaman Kerja Bidang Jabatan
                                </label>
                                <div class="col">
                                    <input type="text" name="pengalaman_kerja_bidang_jabatan"
                                        id="pengalaman_kerja_bidang_jabatan" class="form-control"
                                        value="{{ $jabatan->analisa ? $jabatan->analisa->pengalaman_kerja_bidang_jabatan : null }}">
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <label class="form-label col-md-3 col-form-label" for="hasil_kerja">
                                    Hasil Kerja
                                </label>
                                <div class="col">
                                    <input type="text" name="hasil_kerja" id="hasil_kerja" class="form-control"
                                        value="{{ $jabatan->analisa ? $jabatan->analisa->hasil_kerja : null }}">
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <label class="form-label col-md-3 col-form-label" for="keterampilan_kerja">
                                    Keterampilan Kerja
                                </label>
                                <div class="col">
                                    <input type="text" name="keterampilan_kerja" id="keterampilan_kerja"
                                        class="form-control"
                                        value="{{ $jabatan->analisa ? $jabatan->analisa->keterampilan_kerja : null }}">
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <label class="form-label col-md-3 col-form-label" for="bakat_kerja">
                                    Bakat Kerja
                                </label>
                                <div class="col">
                                    <input type="text" name="bakat_kerja" id="bakat_kerja" class="form-control"
                                        value="{{ $jabatan->analisa ? $jabatan->analisa->bakat_kerja : null }}">
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <label class="form-label col-md-3 col-form-label" for="temperamen_kerja">
                                    Temperamen Kerja
                                </label>
                                <div class="col">
                                    <input type="text" name="temperamen_kerja" id="temperamen_kerja"
                                        class="form-control"
                                        value="{{ $jabatan->analisa ? $jabatan->analisa->temperamen_kerja : null }}">
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <label class="form-label col-md-3 col-form-label" for="minat_kerja">
                                    Minat Kerja
                                </label>
                                <div class="col">
                                    <input type="text" name="minat_kerja" id="minat_kerja" class="form-control"
                                        value="{{ $jabatan->analisa ? $jabatan->analisa->minat_kerja : null }}">
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <label class="form-label col-md-3 col-form-label" for="upaya_fisik">
                                    Upaya Fisik
                                </label>
                                <div class="col">
                                    <input type="text" name="upaya_fisik" id="upaya_fisik" class="form-control"
                                        value="{{ $jabatan->analisa ? $jabatan->analisa->upaya_fisik : null }}">
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <label class="form-label col-md-3 col-form-label" for="jk">
                                    Jenis Kelamin
                                </label>
                                <div class="col pt-1" id="jk">
                                    <label class="form-check form-check-inline">
                                        <input name="jk" class="form-check-input" type="radio" value="L"
                                            {{ $jabatan->analisa ? ($jabatan->analisa->jk == 'L' ? 'checked' : '') : '' }}>
                                        <span class="form-check-label">Laki-laki</span>
                                    </label>
                                    <label class="form-check form-check-inline">
                                        <input name="jk" class="form-check-input" type="radio" value="P"
                                            {{ $jabatan->analisa ? ($jabatan->analisa->jk == 'P' ? 'checked' : '') : '' }}>
                                        <span class="form-check-label">Perempuan</span>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <label class="form-label col-md-3 col-form-label" for="umur">
                                    Umur
                                </label>
                                <div class="col">
                                    <input type="text" name="umur" id="umur" class="form-control"
                                        value="{{ $jabatan->analisa ? $jabatan->analisa->umur : null }}">
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <label class="form-label col-md-3 col-form-label" for="tinggi_badan">
                                    Tinggi Badan
                                </label>
                                <div class="col">
                                    <input type="text" name="tinggi_badan" id="tinggi_badan" class="form-control"
                                        value="{{ $jabatan->analisa ? $jabatan->analisa->tinggi_badan : null }}">
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <label class="form-label col-md-3 col-form-label" for="berat_badan">
                                    Berat Badan
                                </label>
                                <div class="col">
                                    <input type="text" name="berat_badan" id="berat_badan" class="form-control"
                                        value="{{ $jabatan->analisa ? $jabatan->analisa->berat_badan : null }}">
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <label class="form-label col-md-3 col-form-label" for="postur_badan">
                                    Postur Badan
                                </label>
                                <div class="col">
                                    <input type="text" name="postur_badan" id="postur_badan" class="form-control"
                                        value="{{ $jabatan->analisa ? $jabatan->analisa->postur_badan : null }}">
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <label class="form-label col-md-3 col-form-label" for="penampilan">
                                    Penampilan
                                </label>
                                <div class="col">
                                    <input type="text" name="penampilan" id="penampilan" class="form-control"
                                        value="{{ $jabatan->analisa ? $jabatan->analisa->penampilan : null }}">
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <label class="form-label col-md-3 col-form-label" for="fungsi_pekerjaan">
                                    Fungsi Pekerjaan
                                </label>
                                <div class="col">
                                    <input type="text" name="fungsi_pekerjaan" id="fungsi_pekerjaan"
                                        class="form-control"
                                        value="{{ $jabatan->analisa ? $jabatan->analisa->fungsi_pekerjaan : null }}">
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <label class="form-label col-md-3 col-form-label" for="kelas_jabatan">
                                    Kelas Jabatan
                                </label>
                                <div class="col">
                                    <input type="text" name="kelas_jabatan" id="kelas_jabatan" class="form-control"
                                        value="{{ $jabatan->analisa ? $jabatan->analisa->kelas_jabatan : null }}">
                                </div>
                            </div>

                            <div class="form-group mb-3 row border rounded px-2 pb-3 pt-1">
                                <label class="form-label col-md-3 col-form-label">
                                    Tugas Pokok
                                </label>
                                <div class="col-12">
                                    <a href="{{ route('analisa.tugas-pokok.create', $jabatan->id) }}"
                                        class="text-success btn-modal-show">Tambah</a>
                                    <div id="table-tugas-pokok"></div>
                                </div>
                            </div>
                            <div class="form-group mb-3 row border rounded px-2 pb-3 pt-1">
                                <label class="form-label col-md-3 col-form-label">
                                    Bahan Kerja
                                </label>
                                <div class="col-12">
                                    <a href="{{ route('analisa.bahan-kerja.create', $jabatan->id) }}"
                                        class="text-success btn-modal-show">Tambah</a>
                                    <div id="table-bahan-kerja"></div>
                                </div>
                            </div>
                            <div class="form-group mb-3 row border rounded px-2 pb-3 pt-1">
                                <label class="form-label col-md-3 col-form-label">
                                    Perangkat Kerja
                                </label>
                                <div class="col-12">
                                    <a href="{{ route('analisa.perangkat-kerja.create', $jabatan->id) }}"
                                        class="text-success btn-modal-show">Tambah</a>
                                    <div id="table-perangkat-kerja"></div>
                                </div>
                            </div>
                            <div class="form-group mb-3 row border rounded px-2 pb-3 pt-1">
                                <label class="form-label col-md-3 col-form-label">
                                    Tanggung Jawab
                                </label>
                                <div class="col-12">
                                    <a href="{{ route('analisa.tanggung-jawab.create', $jabatan->id) }}"
                                        class="text-success btn-modal-show">Tambah</a>
                                    <div id="table-tanggung-jawab"></div>
                                </div>
                            </div>
                            <div class="form-group mb-3 row border rounded px-2 pb-3 pt-1">
                                <label class="form-label col-md-3 col-form-label">
                                    Wewenang
                                </label>
                                <div class="col-12">
                                    <a href="{{ route('analisa.wewenang.create', $jabatan->id) }}"
                                        class="text-success btn-modal-show">Tambah</a>
                                    <div id="table-wewenang"></div>
                                </div>
                            </div>
                            <div class="form-group mb-3 row border rounded px-2 pb-3 pt-1">
                                <label class="form-label col-md-3 col-form-label">
                                    Korelasi Jabatan
                                </label>
                                <div class="col-12">
                                    <a href="{{ route('analisa.korelasi-jabatan.create', $jabatan->id) }}"
                                        class="text-success btn-modal-show">Tambah</a>
                                    <div id="table-korelasi-jabatan"></div>
                                </div>
                            </div>
                            <div class="form-group mb-3 row border rounded px-2 pb-3 pt-1">
                                <label class="form-label col-md-3 col-form-label">
                                    Lingkungan Kerja
                                </label>
                                <div class="col-12">
                                    <a href="{{ route('analisa.lingkungan-kerja.create', $jabatan->id) }}"
                                        class="text-success btn-modal-show">Tambah</a>
                                    <div id="table-lingkungan-kerja"></div>
                                </div>
                            </div>
                            <div class="form-group mb-3 row border rounded px-2 pb-3 pt-1">
                                <label class="form-label col-md-3 col-form-label">
                                    Resiko Bahaya
                                </label>
                                <div class="col-12">
                                    <a href="{{ route('analisa.resiko-bahaya.create', $jabatan->id) }}"
                                        class="text-success btn-modal-show">Tambah</a>
                                    <div id="table-resiko-bahaya"></div>
                                </div>
                            </div>
                            <div class="form-group mb-3 row border rounded px-2 pb-3 pt-1">
                                <label class="form-label col-md-3 col-form-label">
                                    Prestasi Kerja Yang Diharapkan
                                </label>
                                <div class="col-12">
                                    <a href="{{ route('analisa.prestasi-kerja.create', $jabatan->id) }}"
                                        class="text-success btn-modal-show">Tambah</a>
                                    <div id="table-prestasi-kerja"></div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <div class="d-flex">
                                <a href="{{ route('analisa.index') }}" class="btn btn-link">Kembali</a>
                                <button type="submit" class="btn btn-primary ms-auto btn-save-change"
                                    id="btn-save-change">Simpan Perubahan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Form --}}
    <div class="modal modal-blur fade" id="modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" id="modal-content">
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(function() {
            fetchDataAnalisa();

            function fetchDataAnalisa() {
                $.get("{{ route('analisa.tugas-pokok.index', $jabatan->id) }}", {}, function(data, status) {
                    $('#table-tugas-pokok').html(data);
                });
                $.get("{{ route('analisa.bahan-kerja.index', $jabatan->id) }}", {}, function(data, status) {
                    $('#table-bahan-kerja').html(data);
                });
                $.get("{{ route('analisa.perangkat-kerja.index', $jabatan->id) }}", {}, function(data, status) {
                    $('#table-perangkat-kerja').html(data);
                });
                $.get("{{ route('analisa.tanggung-jawab.index', $jabatan->id) }}", {}, function(data, status) {
                    $('#table-tanggung-jawab').html(data);
                });
                $.get("{{ route('analisa.wewenang.index', $jabatan->id) }}", {}, function(data, status) {
                    $('#table-wewenang').html(data);
                });
                $.get("{{ route('analisa.korelasi-jabatan.index', $jabatan->id) }}", {}, function(data, status) {
                    $('#table-korelasi-jabatan').html(data);
                });
                $.get("{{ route('analisa.lingkungan-kerja.index', $jabatan->id) }}", {}, function(data, status) {
                    $('#table-lingkungan-kerja').html(data);
                });
                $.get("{{ route('analisa.resiko-bahaya.index', $jabatan->id) }}", {}, function(data, status) {
                    $('#table-resiko-bahaya').html(data);
                });
                $.get("{{ route('analisa.prestasi-kerja.index', $jabatan->id) }}", {}, function(data, status) {
                    $('#table-prestasi-kerja').html(data);
                });
            }

            $('body').on('click', '.btn-modal-show', function(event) {
                event.preventDefault();
                let url = $(this).attr('href');
                $.get(url, {}, function(data, status) {
                    $('#modal-content').html(data);
                    $('#modal').modal('show');
                });
            });

            $('body').on('submit', '.modal-form', function(event) {
                event.preventDefault();
                var form = $(this);
                $.ajax({
                    url: form.attr('action'),
                    type: form.attr('method'),
                    data: new FormData(form[0]),
                    processData: false,
                    contentType: false,
                    beforeSend: function() {
                        $(document).find('.text_error').text('');
                        $('.btn-save').attr('disabled', 'disabled');
                    },
                    success: function(response) {
                        if (response.failed) {
                            $.each(response.failed, function(key, val) {
                                if (key.indexOf(".") != -1) {
                                    var arr = key.split(".");
                                    name = $("[name='" + arr[0] + "[]']:eq(" + arr[
                                        1] + ")");
                                } else {
                                    var name = $('[name=' + key + ']');
                                }
                                name.parent().append(
                                    '<small class="text-danger text_error">' + val[
                                        0] + '</small>');
                            });
                        } else if (response.success) {
                            fetchDataAnalisa();
                            $('#modal').modal('hide');
                            Swal.fire(
                                'Success',
                                response.message,
                                'success'
                            )
                        }
                        $('.btn-save').removeAttr('disabled', 'disabled');
                    },
                    error: function(jqXHR, ajaxOptions, thrownError) {
                        $('.btn-save').removeAttr('disabled', 'disabled');
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: thrownError,
                        })
                    }
                });
            });

            $('body').on('click', '.btn-destroy', function(event) {
                event.preventDefault();

                Swal.fire({
                    title: 'Yakin ingin menghapus?',
                    text: "Data yang dihapus tidak dapat dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: $(this).attr('href'),
                            type: "POST",
                            data: {
                                '_method': 'DELETE',
                                '_token': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(response) {
                                if (response.success) {
                                    fetchDataAnalisa();
                                }
                            },
                            error: function(jqXHR, ajaxOptions, thrownError) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: thrownError,
                                })
                            }
                        });
                    }
                })
            });

            $('body').on('submit', '.form-analisa', function(event) {
                event.preventDefault();
                var form = $(this);
                $.ajax({
                    url: form.attr('action'),
                    type: form.attr('method'),
                    data: new FormData(form[0]),
                    processData: false,
                    contentType: false,
                    beforeSend: function() {
                        $(document).find('.text_error').text('');
                        $('.btn-save-change').attr('disabled', 'disabled');
                    },
                    success: function(response) {
                        if (response.failed) {
                            $.each(response.failed, function(key, val) {
                                if (key.indexOf(".") != -1) {
                                    var arr = key.split(".");
                                    name = $("[name='" + arr[0] + "[]']:eq(" + arr[
                                        1] + ")");
                                } else {
                                    var name = $('[name=' + key + ']');
                                }
                                name.parent().append(
                                    '<small class="text-danger text_error">' + val[
                                        0] + '</small>');
                                $('html, body').animate({
                                    scrollTop: name.offset().top - 200
                                });
                                return false;
                            });
                        } else if (response.success) {
                            Swal.fire(
                                response.success,
                                response.message,
                                'success'
                            )
                        }
                        $('.btn-save-change').removeAttr('disabled', 'disabled');
                    },
                    error: function(jqXHR, ajaxOptions, thrownError) {
                        $('.btn-save-change').removeAttr('disabled', 'disabled');
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: thrownError,
                        })
                    }
                });
            });
        });
    </script>
@endpush
