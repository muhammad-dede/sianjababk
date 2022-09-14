<form action="{{ route('analisa.tugas-pokok.update', $tugas_pokok->id) }}" class="modal-form" method="POST">
    @csrf
    @method('put')
    <div class="modal-header">
        <h5 class="modal-title">Edit Tugas Pokok</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <div class="alert alert-danger">
            <i>
                Input dengan tanda&nbsp;<span class="text-danger">*</span>&nbsp;Wajib diisi!
            </i>
        </div>
        <div class="mb-3">
            <label class="form-label required" for="uraian_tugas_pokok">Uraian Tugas</label>
            <input type="text" class="form-control" name="uraian_tugas_pokok" id="uraian_tugas_pokok"
                value="{{ $tugas_pokok->uraian_tugas_pokok }}">
        </div>
        <div class="mb-3">
            <label class="form-label required" for="hasil_kerja_tugas_pokok">Hasil Kerja</label>
            <input type="text" class="form-control" name="hasil_kerja_tugas_pokok" id="hasil_kerja_tugas_pokok"
                value="{{ $tugas_pokok->hasil_kerja_tugas_pokok }}">
        </div>
        <div class="mb-3">
            <label class="form-label required" for="jumlah_hasil">Jumlah Hasil</label>
            <input type="text" class="form-control" name="jumlah_hasil" id="jumlah_hasil"
                value="{{ $tugas_pokok->jumlah_hasil }}">
        </div>
        <div class="mb-3">
            <label class="form-label required" for="waktu_penyelesaian">Waktu Penyelesaian (JAM)</label>
            <input type="text" class="form-control" name="waktu_penyelesaian" id="waktu_penyelesaian"
                value="{{ $tugas_pokok->waktu_penyelesaian }}">
        </div>
        <div class="mb-3">
            <label class="form-label required" for="waktu_efektif">Waktu Efektif</label>
            <input type="text" class="form-control" name="waktu_efektif" id="waktu_efektif"
                value="{{ $tugas_pokok->waktu_efektif }}">
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-link link-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary ms-auto btn-submit btn-save" id="btn-save">Simpan</button>
    </div>
</form>
