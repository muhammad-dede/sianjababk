<div id="table-default" class="table-responsive">
    <table class="table table-vcenter table-bordered" style="width:100%">
        <thead>
            <tr>
                <th class="w-1">No</th>
                <th>BAHAN KERJA</th>
                <th>PENGGUNAAN DALAM TUGAS</th>
                <th colspan="2"></th>
            </tr>
        </thead>
        <tbody class="table-body">
            @forelse ($data as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->bahan_kerja }}</td>
                    <td>{{ $item->penggunaan_bahan_kerja }}</td>
                    <td class="w-1">
                        <a href="{{ route('analisa.bahan-kerja.edit', $item->id) }}"
                            class="text-primary btn-modal-show">Edit</a>
                    </td>
                    <td class="w-1">
                        <a href="{{ route('analisa.bahan-kerja.destroy', $item->id) }}"
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
