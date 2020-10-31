<script>
    const BASE_URL = `{{ route('absensi.index') }}/`;
    const CSRF = $(`meta[name='csrf-token']`).attr("content");

    function refreshTable() {
        $('#datatable').DataTable().clear().destroy();
        $('#datatable').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: "{{ route('table.Absensi') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'id', orderable:false, searchable:false, className: 'text-center'},
                    {data: 'kodemk', name: 'kodemk'},
                    {data: 'kelas', name: 'kelas'},
                    {data: 'nidn', name: 'nidn'},
                    {data: 'hari', name: 'hari'},
                    {data: 'tanggal', name: 'tanggal'},
                    {data: 'checkin', name: 'checkin'},
                    {data: 'checkout', name: 'checkout'},
                    {data: 'action', name: 'action', orderable:false, searchable:false, className: 'text-center'}
                ]
            });
    }

    function viewAbsensi(id) {
        let settings = {
            "url": BASE_URL + id,
            "method": "GET",
            "timeout": 0,
            "headers": {
                "Accept": "application/json",
                "Content-Type": "application/x-www-form-urlencoded",
            },
        };

        document.getElementById('formView').reset();

        $.ajax(settings).done(function (response) {
            $('#view_kodemk').val(response.kodemk);
            $('#view_kelas').val(response.kelas);
            $('#view_nidn').val(response.nidn);
            $('#view_hari').val(response.hari);
            $('#view_tanggal').val(response.tanggal);
            $('#view_checkin').val(response.checkin);
            $('#view_checkout').val(response.checkout);
            $('#view_idjadwal').val(response.idjadwal);
            $('#view').modal('show');
        }).fail(function (response) {
            swal.fire({
                title: 'Error!',
                text: response.responseJSON.message,
                type: "error"
            });
        });
    }

    function editAbsensi(id) {
        let settings = {
            "url": BASE_URL + id,
            "method": "GET",
            "timeout": 0,
            "headers": {
                "Accept": "application/json",
                "Content-Type": "application/x-www-form-urlencoded",
            },
        };

        document.getElementById('formUpdate').reset();

        $.ajax(settings).done(function (response) {
            $('#update_id').val(id);
            $('#update_kodemk').val(response.kodemk);
            $('#update_kelas').val(response.kelas);
            $('#update_nidn').val(response.nidn);
            $('#update_hari').val(response.hari);
            $('#update_tanggal').val(response.tanggal);
            $('#update_checkin').val(response.checkin);
            $('#update_checkout').val(response.checkout);
            $('#update_idjadwal').val(response.idjadwal);
            $('#update').modal('show');
        }).fail(function (response) {
            swal.fire({
                title: 'Error!',
                text: response.responseJSON.message,
                type: "error"
            });
        });
    }

    function deleteAbsensi(id) {
        let settings = {
            "url": BASE_URL + id,
            "method": "DELETE",
            "timeout": 0,
            "headers": {
                "Accept": "application/json",
                "Content-Type": "application/x-www-form-urlencoded",
            },
            data: {
                _token: CSRF
            }
        };

        swal.fire({
            title: 'Apakan anda yakin akan menghapus mata kuliah ini?',
            text: "Mata kuliah yang sudah diapus, tidak dapat dikembalikan!",
            type: 'warning',
            showCancelButton: true,
            cancelButtonText: 'Batal',
            confirmButtonText: 'Yakin',
        }).then((result) => {
            if (result.value) {
                $.ajax(settings).done(function (response) {
                    refreshTable();
                }).fail(function (response) {
                    swal.fire({
                        title: 'Error!',
                        text: response.responseJSON.message,
                        type: "error"
                    });
                });
            }
        });
    }

    function createAbsensi() {
        let settings = {
            "url": BASE_URL,
            "method": "POST",
            "timeout": 0,
            "headers": {
                "Accept": "application/json",
                "Content-Type": "application/x-www-form-urlencoded",
            },
            data: {
                _token: CSRF,
                kodemk: $('#create_kodemk').val(),
                kelas: $('#create_kelas').val(),
                nidn: $('#create_nidn').val(),
                hari: $('#create_hari').val(),
                tanggal: $('#create_tanggal').val(),
                checkin: $('#create_checkin').val(),
                checkout: $('#create_checkout').val(),
                idjadwal: $('#create_idjadwal').val(),
            }
        };

        $.ajax(settings).done(function (response) {
            swal.fire({
                title: 'Berhasil!',
                text: response.message,
                type: "success"
            });
            $('#create').modal('hide');
            document.getElementById('formCreate').reset();
            refreshTable();
        }).fail(function (response) {
            swal.fire({
                title: 'Error!',
                text: response.responseJSON.message,
                type: "error"
            });
        });
    }

    function updateAbsensi() {
        let id = $('#update_id').val();
        let settings = {
            "url": BASE_URL + id,
            "method": "PUT",
            "timeout": 0,
            "headers": {
                "Accept": "application/json",
                "Content-Type": "application/x-www-form-urlencoded",
            },
            data: {
                _token: CSRF,
                kodemk: $('#update_kodemk').val(),
                kelas: $('#update_kelas').val(),
                nidn: $('#update_nidn').val(),
                hari: $('#update_hari').val(),
                tanggal: $('#update_tanggal').val(),
                checkin: $('#update_checkin').val(),
                checkout: $('#update_checkout').val(),
                idjadwal: $('#update_idjadwal').val(),
            }
        };

        $.ajax(settings).done(function (response) {
            swal.fire({
                title: 'Berhasil!',
                text: response.message,
                type: "success"
            });
            $('#update').modal('hide');
            document.getElementById('formUpdate').reset();
            refreshTable();
        }).fail(function (response) {
            swal.fire({
                title: 'Error!',
                text: response.responseJSON.message,
                type: "error"
            });
        });
    }

    $(document).ready(() => {
        refreshTable();
    });

    $('.modal').on('hidden.bs.modal', function (e) {
        $('form').each((index, elem) => elem.reset());
    })
</script>
