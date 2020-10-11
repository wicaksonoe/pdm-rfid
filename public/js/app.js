$('body').on('click', '.modal-show', function (event) {
    event.preventDefault();
    var me = $(this),
        url = me.attr('href'),
        title = me.attr('title');

    $('#modal .modal-title').text(title);
    $('#modal #modal-btn-save').text(me.hasClass('edit')? 'Update' : 'Create');

    $.ajax({
        url: url,
        dataType: 'html',
        success: function (response) {
            $('#modal .modal-body').html(response);
        }
    });
    $('#modal').modal('show');
});

$('#modal-btn-save').click(function (event) {
    event.preventDefault();

    var form = $('#modal-body form'),
        url = form.attr('action'),
        method = $('input[name=_method]').val() == undefined ? 'POST' : 'PUT';

    form.find('.help-block').remove();
    form.find('.form-group').removeClass('has-error');
console.log("form.serialize()", form.serialize())
    $.ajax({
        url : url,
        method: method,
        data : form.serialize(),
        success: function (response) {
            form.trigger('reset');
            $('#modal').modal('hide');
            $('#datatable').DataTable().ajax.reload();

            swal({
                icon: "success",
                type : 'success',
                title : 'Success!',
                text : 'Data has been saved!'
            });
        },
        error : function (xhr) {
            var res = xhr.responseJSON;
            if ($.isEmptyObject(res) == false) {
                $.each(res.errors, function (key, value) {
                    $('#' + key)
                        .closest('.form-group')
                        .addClass('has-error')
                        .append('<span class="help-block"><strong>' + value + '</strong></span>');
                });
            }
        }
    })
});

$('body').on('click', '.btn-delete', function (event) {
    event.preventDefault();

    var me = $(this),
        url = me.attr('href'),
        title = me.attr('title'),
        csrf_token = $('meta[name="csrf-token"]').attr('content');
    console.log("me >>>", me);
    console.log("url >>>", url);
    console.log("csrf_token >>>", csrf_token);
    swal({
        title: 'Are you sure want to delete ' + title + ' ?',
        text: 'You won\'t be able to revert this!',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: url,
                type: "POST",
                data: {
                    '_method': 'DELETE',
                    '_token': csrf_token
                },
                success: function (response) {
                    $('#datatable').DataTable().ajax.reload();
                    swal({
                        type: 'success',
                        title: 'Success!',
                        text: 'Data has been deleted!'
                    });
                },
                error: function (xhr) {
                    swal({
                        type: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!'
                    });
                }
            });
        }
    });
});

$('body').on('click', '.btn-show', function (event) {
    event.preventDefault();

    var me = $(this),
        url = me.attr('href'),
        title = me.attr('title');

    $('#modal .modal-title').text(title);
    $('#modal #modal-btn-save').addClass('hide');

    $.ajax({
        url: url,
        dataType: 'html',
        success: function (response) {
            $('#modal #modal-body').html(response);
        }
    });

    $('#modal').modal('show');
});