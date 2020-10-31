<script>
    const BASE_URL = `{{ route('dosen.index') }}/`;
    const CSRF = $(`meta[name='csrf-token']`).attr("content");

    function refreshTable() {
        $('#datatable').DataTable().clear().destroy();
        $('#datatable').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: "{{ route('table.Mdosens') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'id', orderable:false, searchable:false, className: 'text-center'},
                    {data: 'nidn', name: 'nidn'},
                    {data: 'nama', name: 'nama'},
                    {data: 'programstudi', name: 'programstudi'},
                    {data: 'action', name: 'action', orderable:false, searchable:false, className: 'text-center'}
                ]
            });
    }

    function viewDosen(id) {
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
            $('#view_nidn').val(response.nidn);
            $('#view_nama').val(response.nama);
            $('#view_programstudi').val(response.programstudi);
            $('#view').modal('show');
        }).fail(function (response) {
            swal.fire({
                title: 'Error!',
                text: response.responseJSON.message,
                type: "error"
            });
        });
    }

    function editDosen(id) {
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
            $('#update_nidn').val(response.nidn);
            $('#update_nama').val(response.nama);
            $('#update_programstudi').val(response.programstudi);
            $('#update').modal('show');
        }).fail(function (response) {
            swal.fire({
                title: 'Error!',
                text: response.responseJSON.message,
                type: "error"
            });
        });
    }

    function deleteDosen(id) {
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

    function createDosen() {
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
                nidn: $('#create_nidn').val(),
                nama: $('#create_nama').val(),
                programstudi: $('#create_programstudi').val(),
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

    function updateDosen() {
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
                nidn: $('#update_nidn').val(),
                nama: $('#update_nama').val(),
                programstudi: $('#update_programstudi').val(),
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
