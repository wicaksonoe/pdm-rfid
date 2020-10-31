<a href="{{ $url_show }}" class="btn-show" title="Detail: {{ $model->name }}"><i class="fas fa-eye text-primary"></i></a> | 
<a href="{{ $url_edit }}" class="modal-show edit" title="Edit {{ $model->name }}"><i class="fas fa-edit text-warning"></i></a> | 
<a href="{{ $url_destroy }}" class="btn-delete" title="{{ $model->name }}"><i class="fas fa-trash-alt text-danger"></i></a>