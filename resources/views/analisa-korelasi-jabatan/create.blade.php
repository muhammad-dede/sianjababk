<form action="{{ route('analisa.korelasi-jabatan.store', $jabatan->id) }}" class="modal-form" method="POST">
    @csrf
    <div class="modal-header">
        <h5 class="modal-title">Tambah Korelasi Jabatan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <div class="alert alert-danger">
            <i>
                Input dengan tanda&nbsp;<span class="text-danger">*</span>&nbsp;Wajib diisi!
            </i>
        </div>
        <div class="mb-3">
            <label class="form-label required" for="nama_korelasi_jabatan">Nama Jabatan</label>
            <input type="text" class="form-control" name="nama_korelasi_jabatan" id="nama_korelasi_jabatan">
        </div>
        <div class="mb-3">
            <label class="form-label required" for="unit_kerja_korelasi_jabatan">Unit Kerja/Instansi</label>
            <input type="text" class="form-control" name="unit_kerja_korelasi_jabatan"
                id="unit_kerja_korelasi_jabatan">
        </div>
        <div class="mb-3">
            <label class="form-label required" for="dalam_hal">Dalam Hal</label>
            <input type="text" class="form-control" name="dalam_hal" id="dalam_hal">
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-link link-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary ms-auto btn-submit btn-save" id="btn-save">Simpan</button>
    </div>
</form>
