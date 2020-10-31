<!-- Modal Create -->
<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Absensi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <form id="formCreate" method="post">
                    <div class="form-group">
                        <label for="kodemk">Kode Mata Kuliah</label>
                        <input type="text" id="create_kodemk" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <input type="text" id="create_kelas" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="nidn">NIDN</label>
                        <input type="text" id="create_nidn" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="hari">Hari</label>
                        <input type="text" id="create_hari" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" id="create_tanggal" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="checkin">Check In</label>
                        <input type="time" id="create_checkin" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="checkout">Check Out</label>
                        <input type="time" id="create_checkout" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="idjadwal">ID Jadwal</label>
                        <input type="text" id="create_idjadwal" class="form-control">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                <button type="button" class="btn btn-primary" onclick="createAbsensi()">Tambah</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal View -->
<div class="modal fade" id="view" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Absensi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <form id="formView" method="post">
                    <div class="form-group">
                        <label for="kodemk">Kode Mata Kuliah</label>
                        <input type="text" id="view_kodemk" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <input type="text" id="view_kelas" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label for="nidn">NIDN</label>
                        <input type="text" id="view_nidn" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label for="hari">Hari</label>
                        <input type="text" id="view_hari" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" id="view_tanggal" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label for="checkin">Check In</label>
                        <input type="time" id="view_checkin" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label for="checkout">Check Out</label>
                        <input type="time" id="view_checkout" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label for="idjadwal">ID Jadwal</label>
                        <input type="text" id="view_idjadwal" class="form-control" disabled>
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
                        <label for="kodemk">Kode Mata Kuliah</label>
                        <input type="text" id="update_kodemk" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <input type="text" id="update_kelas" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="nidn">NIDN</label>
                        <input type="text" id="update_nidn" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="hari">Hari</label>
                        <input type="text" id="update_hari" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" id="update_tanggal" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="checkin">Check In</label>
                        <input type="time" id="update_checkin" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="checkout">Check Out</label>
                        <input type="time" id="update_checkout" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="idjadwal">ID Jadwal</label>
                        <input type="text" id="update_idjadwal" class="form-control">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                <button type="button" class="btn btn-warning" onclick="updateAbsensi()">Update</button>
            </div>
        </div>
    </div>
</div>
