<form action="{{ route('analisa.lingkungan-kerja.update', $lingkungan_kerja->id) }}" class="modal-form" method="POST">
    @csrf
    @method('put')
    <div class="modal-header">
        <h5 class="modal-title">Edit Lingkungan Kerja</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <div class="alert alert-danger">
            <i>
                Input dengan tanda&nbsp;<span class="text-danger">*</span>&nbsp;Wajib diisi!
            </i>
        </div>
        <div class="mb-3">
            <label class="form-label required" for="aspek">Aspek</label>
            <input type="text" class="form-control" name="aspek" id="aspek"
                value="{{ $lingkungan_kerja->aspek }}">
        </div>
        <div class="mb-3">
            <label class="form-label required" for="faktor">Faktor</label>
            <input type="text" class="form-control" name="faktor" id="faktor"
                value="{{ $lingkungan_kerja->faktor }}">
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-link link-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary ms-auto btn-submit btn-save" id="btn-save">Simpan</button>
    </div>
</form>
