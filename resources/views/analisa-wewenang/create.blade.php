<form action="{{ route('analisa.wewenang.store', $jabatan->id) }}" class="modal-form" method="POST">
    @csrf
    <div class="modal-header">
        <h5 class="modal-title">Tambah Wewenang</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <div class="alert alert-danger">
            <i>
                Input dengan tanda&nbsp;<span class="text-danger">*</span>&nbsp;Wajib diisi!
            </i>
        </div>
        <div class="mb-3">
            <label class="form-label required" for="uraian_wewenang">Uraian</label>
            <textarea name="uraian_wewenang" id="uraian_wewenang" cols="30" rows="3" class="form-control"></textarea>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-link link-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary ms-auto btn-submit btn-save" id="btn-save">Simpan</button>
    </div>
</form>
