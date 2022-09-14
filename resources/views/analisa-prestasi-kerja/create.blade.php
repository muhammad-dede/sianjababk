<form action="{{ route('analisa.prestasi-kerja.store', $jabatan->id) }}" class="modal-form" method="POST">
    @csrf
    <div class="modal-header">
        <h5 class="modal-title">Tambah Prestasi Kerja</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <div class="alert alert-danger">
            <i>
                Input dengan tanda&nbsp;<span class="text-danger">*</span>&nbsp;Wajib diisi!
            </i>
        </div>
        <div class="mb-3">
            <label class="form-label required" for="hasil_prestasi_kerja">Hasil Kerja</label>
            <input type="text" class="form-control" name="hasil_prestasi_kerja" id="hasil_prestasi_kerja">
        </div>
        <div class="mb-3">
            <label class="form-label required" for="jumlah_hasil_prestasi_kerja">Jumlah Hasil</label>
            <input type="text" class="form-control" name="jumlah_hasil_prestasi_kerja"
                id="jumlah_hasil_prestasi_kerja">
        </div>
        <div class="mb-3">
            <label class="form-label required" for="jam_prestasi_kerja">Jam</label>
            <input type="text" class="form-control" name="jam_prestasi_kerja" id="jam_prestasi_kerja">
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-link link-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary ms-auto btn-submit btn-save" id="btn-save">Simpan</button>
    </div>
</form>
