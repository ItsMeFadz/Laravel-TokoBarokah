<!-- File: resources/views/users/create.blade.php -->
<!-- Modal Create -->
<div class="modal fade" id="largeModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title btn-sm" id="exampleModalLabel3">Tambah User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <!-- Isi modal create sesuai kebutuhan -->
                    <div class="col mb-3">
                        <label for="nameLarge" class="form-label">Nama</label>
                        <input type="text" id="nameLarge" class="form-control" placeholder="">
                    </div>
                    <div class="col mb-3">
                        <label for="emailLarge" class="form-label">Email</label>
                        <input type="text" id="emailLarge" class="form-control" placeholder="">
                    </div>
                    <div class="col mb-3">
                        <label for="passwordLarge" class="form-label">Password</label>
                        <input type="password" id="passwordLarge" class="form-control" placeholder="">
                    </div>
                    <div class="col mb-3">
                        <label for="confirmPasswordLarge" class="form-label">Konfirmasi Password</label>
                        <input type="password" id="confirmPasswordLarge" class="form-control"
                            placeholder="Konfirmasi Password">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-warning btn-label-secondary" data-bs-dismiss="modal">Kembali</button>
                <button type="button" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>
