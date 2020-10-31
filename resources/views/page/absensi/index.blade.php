@extends('adminlte::page')

@section('content')
@include('page.absensi._modal')
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Data Absensi</h3>
        <button class="btn btn-primary mb-4" data-toggle="modal" data-target="#create"><i class="fa fa-plus-square mr-2"></i>Tambah Absensi</button>
    </div>
    <div class="panel-body">
        <table id="datatable" class="table table-hover" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Kode MK</th>
                    <th>Kelas</th>
                    <th>NIDN</th>
                    <th>Hari</th>
                    <th>Tanggal</th>
                    <th>Check In</th>
                    <th>Check Out</th>
                    <th width= 130px>Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('js')
@include('page.absensi._script')
@endpush
