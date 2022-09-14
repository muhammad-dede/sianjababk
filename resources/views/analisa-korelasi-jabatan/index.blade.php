<div id="table-default" class="table-responsive">
    <table class="table table-vcenter table-bordered" style="width:100%">
        <thead>
            <tr>
                <th class="w-1">No</th>
                <th>NAMA JABATAN</th>
                <th>UNIT KERJA/INSTANSI</th>
                <th>DALAM HAL</th>
                <th colspan="2"></th>
            </tr>
        </thead>
        <tbody class="table-body">
            @forelse ($data as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_korelasi_jabatan }}</td>
                    <td>{{ $item->unit_kerja_korelasi_jabatan }}</td>
                    <td>{{ $item->dalam_hal }}</td>
                    <td class="w-1">
                        <a href="{{ route('analisa.korelasi-jabatan.edit', $item->id) }}"
                            class="text-primary btn-modal-show">Edit</a>
                    </td>
                    <td class="w-1">
                        <a href="{{ route('analisa.korelasi-jabatan.destroy', $item->id) }}"
                            class="text-danger btn-destroy">Hapus</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="text-center">Tidak ada data</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
