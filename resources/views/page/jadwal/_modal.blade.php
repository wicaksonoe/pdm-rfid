<!-- Modal Create -->
<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Jadwal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <form id="formCreate" method="post">
                    <div class="form-group">
                        <label for="nidn">Kode Mata Kuliah</label>
                        <input type="text" id="create_kodemk" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="nama">NIDN</label>
                        <input type="text" id="create_nidn" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="nama">Kelas</label>
                        <input type="text" id="create_kelas" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="nama">Hari</label>
                        <input type="text" id="create_hari" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="nama">Kode Hari</label>
                        <input type="text" id="create_kode_hari" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="nama">Jam In</label>
                        <input type="time" id="create_jam_in" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="nama">Jam Out</label>
                        <input type="time" id="create_jam_out" class="form-control">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                <button type="button" class="btn btn-primary" onclick="createJadwal()">Tambah</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal View -->
<div class="modal fade" id="view" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Jadwal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <form id="formView" method="post">
                    <div class="form-group">
                        <label for="nidn">Kode Mata Kuliah</label>
                        <input type="text" id="view_kodemk" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label for="nama">NIDN</label>
                        <input type="text" id="view_nidn" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label for="nama">Kelas</label>
                        <input type="text" id="view_kelas" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label for="nama">Hari</label>
                        <input type="text" id="view_hari" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label for="nama">Kode Hari</label>
                        <input type="text" id="view_kode_hari" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label for="nama">Jam In</label>
                        <input type="time" id="view_jam_in" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label for="nama">Jam Out</label>
                        <input type="time" id="view_jam_out" class="form-control" disabled>
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
                        <label for="nidn">Kode Mata Kuliah</label>
                        <input type="text" id="update_kodemk" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="nama">NIDN</label>
                        <input type="text" id="update_nidn" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="nama">Kelas</label>
                        <input type="text" id="update_kelas" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="nama">Hari</label>
                        <input type="text" id="update_hari" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="nama">Kode Hari</label>
                        <input type="text" id="update_kode_hari" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="nama">Jam In</label>
                        <input type="time" id="update_jam_in" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="nama">Jam Out</label>
                        <input type="time" id="update_jam_out" class="form-control">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                <button type="button" class="btn btn-warning" onclick="updateJadwal()">Update</button>
            </div>
        </div>
    </div>
</div>
