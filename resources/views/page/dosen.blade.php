@extends('adminlte::page')

@section('content')
{{-- @include('layouts._modalmobil') --}}
<div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title">Datatable
          <a href="{{ route('dosen.create') }}" class="btn btn-success pull-right modal-show" style="margin-top: -8px;" title="Create Dosen"><i class="icon-plus"></i> Create</a>
      </h3>
    </div>
    <div class="panel-body">
          <table id="datatable" class="table table-hover" style="width:100%">
              <thead>
                  <tr>
                    <th>ID</th>
                    <th>NIDN</th>
                    <th>Nama</th>
                    <th>Program Studi</th>
                      <th></th>
                  </tr>
              </thead>
              <tbody>

              </tbody>
              <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>NIDN</th>
                    <th>Nama</th>
                    <th>Program Studi</th>
                      <th></th>
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
            ajax: "{{ route('table.mdosens') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'id'},
                {data: 'nidn', name: 'nidn'},
                {data: 'nama', name: 'nama'},
                {data: 'programstudi', name: 'programstudi'},
                {data: 'action', name: 'action'}
            ]
        });
    </script>
@endpush
