@extends('adminlte::page')

@section('content')
@include('layouts._modal')
<div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title">Data Jadwal
      </h3>
    </div>
    <div class="panel-body">
          <table id="datatable" class="table table-hover" class="table table-striped table-bordered" style="width:100%">
              <thead>
                  <tr>
                    <th>ID</th>
                    <th>Kode MK</th>
                    <th>NIDN</th>
                    <th>Kelas</th>
                    <th>Jam in</th>
                    <th>Jam Out</th>
                    <th>Action</th>
                  </tr>
              </thead>
              <tbody>

              </tbody>
              <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Kode MK</th>
                    <th>NIDN</th>
                    <th>Kelas</th>
                    <th>Jam in</th>
                    <th>Jam Out</th>
                    <th>Action</th>
                  </tr>
              </tfoot>
          </table>
    </div>
</div>
@endsection

@push('js')
    <script>
        $('#datatable').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: "{{ route('table.Jadwal') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'id'},
                {data: 'kodemk', name: 'kodemk'},
                {data: 'kelas', name: 'kelas'},
                {data: 'hari', name: 'hari'},
                {data: 'jam_in', name: 'jam_in'},
                {data: 'jam_out', name: 'jam_out'},
                {data: 'action', name: 'action', orderable:false, searchable:false}
            ]
        });     
    </script>
@endpush
