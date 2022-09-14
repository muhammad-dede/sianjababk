<div id="table-default" class="table-responsive">
    <table class="table table-vcenter table-bordered" style="width:100%">
        <thead>
            <tr>
                <th class="w-1">No</th>
                <th>Uraian Tugas</th>
                <th class="text-center">Hasil Kerja</th>
                <th class="text-center">Jumlah Hasil</th>
                <th class="text-center">Waktu Penyelesaian (JAM)</th>
                <th class="text-center">Waktu Efektif</th>
                <th class="text-center">Kebutuhan Pegawai</th>
                <th colspan="2"></th>
            </tr>
        </thead>
        <tbody class="table-body">
            @php
                $jumlah_waktu_efektif = 0;
                $jumlah_waktu_penyelesaian = 0;
                $jumlah_pegawai = 0;
            @endphp
            @forelse ($data as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->uraian_tugas_pokok }}</td>
                    <td class="text-center">{{ $item->hasil_kerja_tugas_pokok }}</td>
                    <td class="text-center">{{ $item->jumlah_hasil }}</td>
                    <td class="text-center">{{ $item->waktu_penyelesaian }}</td>
                    <td class="text-center">{{ $item->waktu_efektif }}</td>
                    <td class="text-center">{{ $item->kebutuhan_pegawai }}</td>
                    <td class="w-1">
                        <a href="{{ route('analisa.tugas-pokok.edit', $item->id) }}"
                            class="text-primary btn-modal-show">Edit</a>
                    </td>
                    <td class="w-1">
                        <a href="{{ route('analisa.tugas-pokok.destroy', $item->id) }}"
                            class="text-danger btn-destroy">Hapus</a>
                    </td>
                </tr>

                @php
                    $jumlah_waktu_efektif += $item->waktu_efektif;
                    $jumlah_pegawai += $item->kebutuhan_pegawai;
                    $jumlah_waktu_penyelesaian = ($jumlah_waktu_efektif / $data->count()) * $jumlah_pegawai;
                @endphp
            @empty
                <tr>
                    <td colspan="9" class="text-center">Tidak ada data</td>
                </tr>
            @endforelse
        </tbody>
        <tfoot>
            <tr>
                <td colspan="6">
                    <strong>JUMLAH WAKTU PENYELESAIAN (JAM)</strong>
                </td>
                <td class="text-center" colspan="3">
                    <strong>{{ $jumlah_waktu_penyelesaian }}</strong>
                </td>
            </tr>
            <tr>
                <td colspan="6">
                    <strong>JUMLAH PEGAWAI (ORANG)</strong>
                </td>
                <td class="text-center" colspan="3">
                    <strong>{{ $jumlah_pegawai }}</strong>
                </td>
            </tr>
        </tfoot>
    </table>
</div>
<small class="form-hint mt-2">Catatan: Hanya tugas pokok jabatan yang diisikan.</small>
