<script>
    const BASE_URL = `{{ route('matkul.index') }}`;
    const CSRF = $(`meta[name='csrf-token']`).attr("content");

    function refreshTable() {
        $('#datatable').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: "{{ route('table.Matkul') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'id'},
                    {data: 'kodemk', name: 'kodemk'},
                    {data: 'namamk', name: 'namamk'},
                    {data: 'action', name: 'action', orderable:false, searchable:false, className: 'text-center'}
                ]
            });
    }

    function viewMatkul(id) {
        console.log('view', id);
    }

    function editMatkul(id) {

    }

    function deleteMatkul(id) {

    }

    function createMatkul() {

    }

    function updateMatul() {

    }

    $(document).ready(() => {
        refreshTable();
    });
</script>
