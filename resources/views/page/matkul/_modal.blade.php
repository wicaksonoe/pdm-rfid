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
                        <label for="kodemk">Kode Mata Kuliah</label>
                        <input type="text" id="create_kodemk" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="namamk">Nama Mata Kuliah</label>
                        <input type="text" id="create_namamk" class="form-control">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                <button type="button" class="btn btn-primary" onclick="createMatkul()">Tambah</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal View -->
<div class="modal fade" id="view" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Mata Kuliah</h5>
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
                        <label for="namamk">Nama Mata Kuliah</label>
                        <input type="text" id="view_namamk" class="form-control" disabled>
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
                        <label for="namamk">Nama Mata Kuliah</label>
                        <input type="text" id="update_namamk" class="form-control">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                <button type="button" class="btn btn-warning" onclick="updateMatul()">Update</button>
            </div>
        </div>
    </div>
</div>
