<form action="{{ route('unit-kerja.update', $unit_kerja->id) }}" class="modal-form" method="POST">
    @csrf
    @method('put')
    <div class="modal-header">
        <h5 class="modal-title">Edit Unit Kerja</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <div class="alert alert-danger">
            <i>
                Input dengan tanda&nbsp;<span class="text-danger">*</span>&nbsp;Wajib diisi!
            </i>
        </div>
        <div class="mb-3">
            <label class="form-label required" for="nama">Nama</label>
            <input type="text" class="form-control" name="nama" id="nama" value="{{ $unit_kerja->nama }}">
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-link link-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary ms-auto btn-submit">Simpan</button>
    </div>
</form>
