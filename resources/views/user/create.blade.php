<form action="{{ route('user.store') }}" class="modal-form" method="POST">
    @csrf
    <div class="modal-header">
        <h5 class="modal-title">Tambah User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <div class="alert alert-danger">
            <i>
                Input dengan tanda&nbsp;<span class="text-danger">*</span>&nbsp;Wajib diisi!
            </i>
        </div>
        <div class="mb-3">
            <label class="form-label required" for="name">Nama</label>
            <input type="text" class="form-control" name="name" id="name">
        </div>
        <div class="mb-3">
            <label class="form-label required" for="username">Username</label>
            <input type="text" class="form-control" name="username" id="username">
        </div>
        <div class="mb-3">
            <label class="form-label required" for="email">Email</label>
            <input type="text" class="form-control" name="email" id="email">
        </div>
        <div class="mb-3">
            <label class="form-label required" for="password">Password</label>
            <input type="password" class="form-control" name="password" id="password">
            <small class="form-hint">
                Kata sandi harus terdiri dari 8-20 karakter, berisi huruf dan angka, dan
                tidak boleh mengandung spasi, karakter khusus, atau emoji.
            </small>
        </div>
        <div class="mb-3">
            <label class="form-label required" for="role">Role</label>
            <select class="form-select" name="role" id="role">
                <option selected value=""></option>
                @foreach (roles() as $row)
                    <option value="{{ $row->name }}">
                        {{ $row->name }}
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
