<script>
    const BASE_URL = `{{ route('matkul.index') }}/`;
    const CSRF = $(`meta[name='csrf-token']`).attr("content");

    function refreshTable() {
        $('#datatable').DataTable().clear().destroy();
        $('#datatable').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: "{{ route('table.Matkul') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'id', orderable:false, searchable:false, className: 'text-center'},
                    {data: 'kodemk', name: 'kodemk'},
                    {data: 'namamk', name: 'namamk'},
                    {data: 'action', name: 'action', orderable:false, searchable:false, className: 'text-center'}
                ]
            });
    }

    function viewMatkul(id) {
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
            $('#view_namamk').val(response.namamk);
            $('#view').modal('show');
        }).fail(function (response) {
            swal.fire({
                title: 'Error!',
                text: response.responseJSON.message,
                type: "error"
            });
        });
    }

    function editMatkul(id) {
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
            $('#update_namamk').val(response.namamk);
            $('#update').modal('show');
        }).fail(function (response) {
            swal.fire({
                title: 'Error!',
                text: response.responseJSON.message,
                type: "error"
            });
        });
    }

    function deleteMatkul(id) {
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

    function createMatkul() {
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
                namamk: $('#create_namamk').val(),
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

    function updateMatul() {
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
                namamk: $('#update_namamk').val(),
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
