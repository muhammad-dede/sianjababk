<form action="{{ route('analisa.resiko-bahaya.store', $jabatan->id) }}" class="modal-form" method="POST">
    @csrf
    <div class="modal-header">
        <h5 class="modal-title">Tambah Resiko Bahaya</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <div class="alert alert-danger">
            <i>
                Input dengan tanda&nbsp;<span class="text-danger">*</span>&nbsp;Wajib diisi!
            </i>
        </div>
        <div class="mb-3">
            <label class="form-label required" for="nama_resiko">Nama Resiko</label>
            <input type="text" class="form-control" name="nama_resiko" id="nama_resiko">
        </div>
        <div class="mb-3">
            <label class="form-label required" for="penyebab">Penyebab</label>
            <input type="text" class="form-control" name="penyebab" id="penyebab">
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-link link-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary ms-auto btn-submit btn-save" id="btn-save">Simpan</button>
    </div>
</form>
