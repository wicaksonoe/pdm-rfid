{!! Form::model($model,[
    'route' => $model->exists ? ['dosen.update',$model->id] : 'dosen.store',
    'method' => $model->exists ? 'PUT' : 'POST'
    ])!!}
  
  <div class="form-group">
    <label for="" class="control-label">NIDN</label>
    {!! Form::text('nidn', null,['class' => 'form-control','id' => 'nidn'])!!}
  </div>
  <div class="form-group">
    <label for="" class="control-label">Nama</label>
    {!! Form::text('nama', null,['class' => 'form-control','id' => 'nama'])!!}
  </div>
  <div class="form-group">
    <label for="" class="control-label">Program Studi</label>
    {!! Form::text('programstudi', null,['class' => 'form-control','id' => 'programstudi'])!!}
  </div>
  
  
    {!! Form::close()!!}
   