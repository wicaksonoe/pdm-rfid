<script>
    const BASE_URL = `{{ route('jadwal.index') }}/`;
    const CSRF = $(`meta[name='csrf-token']`).attr("content");

    function refreshTable() {
        $('#datatable').DataTable().clear().destroy();
        $('#datatable').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: "{{ route('table.Jadwal') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'id', orderable:false, searchable:false, className: 'text-center'},
                    {data: 'kodemk', name: 'kodemk'},
                    {data: 'nidn', name: 'nidn'},
                    {data: 'kelas', name: 'kelas'},
                    {data: 'hari', name: 'hari'},
                    {data: 'jam_in', name: 'jam_in'},
                    {data: 'jam_out', name: 'jam_out'},
                    {data: 'action', name: 'action', orderable:false, searchable:false, className: 'text-center'}
                ]
            });
    }

    function viewJadwal(id) {
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
            $('#view_nidn').val(response.nidn);
            $('#view_kelas').val(response.kelas);
            $('#view_hari').val(response.hari);
            $('#view_kode_hari').val(response.kode_hari);
            $('#view_jam_in').val(response.jam_in);
            $('#view_jam_out').val(response.jam_out);
            $('#view').modal('show');
        }).fail(function (response) {
            swal.fire({
                title: 'Error!',
                text: response.responseJSON.message,
                type: "error"
            });
        });
    }

    function editJadwal(id) {
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
            $('#update_nidn').val(response.nidn);
            $('#update_kelas').val(response.kelas);
            $('#update_hari').val(response.hari);
            $('#update_kode_hari').val(response.kode_hari);
            $('#update_jam_in').val(response.jam_in);
            $('#update_jam_out').val(response.jam_out);
            $('#update').modal('show');
        }).fail(function (response) {
            swal.fire({
                title: 'Error!',
                text: response.responseJSON.message,
                type: "error"
            });
        });
    }

    function deleteJadwal(id) {
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

    function createJadwal() {
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
                nidn: $('#create_nidn').val(),
                kelas: $('#create_kelas').val(),
                hari: $('#create_hari').val(),
                kode_hari: $('#create_kode_hari').val(),
                jam_in: $('#create_jam_in').val(),
                jam_out: $('#create_jam_out').val(),
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

    function updateJadwal() {
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
                nidn: $('#update_nidn').val(),
                kelas: $('#update_kelas').val(),
                hari: $('#update_hari').val(),
                kode_hari: $('#update_kode_hari').val(),
                jam_in: $('#update_jam_in').val(),
                jam_out: $('#update_jam_out').val(),
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
