<!-- Modal Create -->
<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Mata Kuliah</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <form id="formCreate" method="post">
                    <div class="form-group">
                        <label for="nidn">NIDN</label>
                        <input type="text" id="create_nidn" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" id="create_nama" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="programstudi">Nama Program Studi</label>
                        <input type="text" id="create_programstudi" class="form-control">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                <button type="button" class="btn btn-primary" onclick="createDosen()">Tambah</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal View -->
<div class="modal fade" id="view" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Dosen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <form id="formView" method="post">
                    <div class="form-group">
                        <label for="nidn">NIDN</label>
                        <input type="text" id="view_nidn" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" id="view_nama" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label for="programstudi">Program Studi</label>
                        <input type="text" id="view_programstudi" class="form-control" disabled>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Update -->
<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Mata Kuliah</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <form id="formUpdate" method="post">
                    <input type="hidden" id="update_id" readonly>
                    <div class="form-group">
                        <label for="nidn">NIDN</label>
                        <input type="text" id="update_nidn" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" id="update_nama" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="programstudi">Nama Program Studi</label>
                        <input type="text" id="update_programstudi" class="form-control">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                <button type="button" class="btn btn-warning" onclick="updateDosen()">Update</button>
            </div>
        </div>
    </div>
</div>
