<form action="{{ route('jabatan.update', $jabatan->id) }}" class="modal-form" method="POST">
    @csrf
    @method('put')
    <div class="modal-header">
        <h5 class="modal-title">Edit Jabatan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <div class="alert alert-danger">
            <i>
                Input dengan tanda&nbsp;<span class="text-danger">*</span>&nbsp;Wajib diisi!
            </i>
        </div>
        <div class="mb-3">
            <label class="form-label required" for="kode">Kode Jabatan</label>
            <input type="text" class="form-control" name="kode" id="kode" value="{{ $jabatan->kode }}">
        </div>
        <div class="mb-3">
            <label class="form-label required" for="nama">Nama Jabatan</label>
            <input type="text" class="form-control" name="nama" id="nama" value="{{ $jabatan->nama }}">
        </div>
        <div class="mb-3">
            <label class="form-label required" for="id_skpd">SKPD</label>
            <select class="form-select" name="id_skpd" id="id_skpd">
                <option selected value=""></option>
                @foreach (skpd() as $row)
                    <option value="{{ $row->id }}" {{ $jabatan->id_skpd == $row->id ? 'selected' : '' }}>
                        {{ $row->nama }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <input type="hidden" class="form-control" name="induk_selected" id="induk_selected"
                value="{{ $jabatan->induk }}">
            <label class="form-label" for="induk">Induk Jabatan</label>
            <select class="form-select" name="induk" id="induk">
            </select>
            <small class="form-hint">Pilih SKPD untuk menampilkan data Induk Jabatan</small>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-link link-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary ms-auto btn-submit">Simpan</button>
    </div>
</form>
