<form action="{{ route('skpd.store') }}" class="modal-form" method="POST">
    @csrf
    <div class="modal-header">
        <h5 class="modal-title">Tambah SKPD</h5>
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
            <input type="text" class="form-control" name="nama" id="nama">
        </div>
        <div class="mb-3">
            <label class="form-label required" for="id_unit_kerja">Unit Kerja</label>
            <select class="form-select" name="id_unit_kerja" id="id_unit_kerja">
                <option selected value=""></option>
                @foreach (unitKerja() as $row)
                    <option value="{{ $row->id }}">
                        {{ $row->nama }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-link link-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary ms-auto btn-submit">Simpan</button>
    </div>
</form>
