$(document).ready(function() {
    $(document).on('click', '.user-delete', function() {
        Swal({
            title: 'Are you sure?',
            text: "You really want to delete this data !",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.value) {
                var id = $(this).attr('id');
                var $this = $(this);
                var url = route('user.destroy', id);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    asyns: false,
                    type: 'DELETE',
                    url: url,
                    data: { id: id},
                    success: function(data) {
                        if (data) {
                            $this.closest('tr').remove();
                            Swal({
                                type: 'success',
                                title: 'Delete User Successfully !',
                                showConfirmButton: false,
                                timer: 1500
                            });
                        };
                    }
                });
            }
        })
        
    });

    $( '#list_role' ).change(function () {
        $( '#list_role option:selected').each(function() {
            if ($( '#list_role option:selected').val() != 0) {
                var html = $( '#list_role option:selected' ).text();
                var role_id = $( '#list_role option:selected' ).val();
                $("#add_list").append('<span class="badge badge-primary" name="list_role" id="'+role_id+'">'+html+'&#32; <i class="fa fa-times delete_role" data-unicode="f00d"></i></span></span>&#32;');
            }
        });
    }).change();

    function in_array(a, obj) {
        for (var i = 0; i < a.length; i++) {
            if (a[i] === obj) {
                return true;
            }
        }
        return false;
    }

    $( '#list_role_edit' ).change(function () {
        var list_add = $('span[name="list_role"]');
        var arrayRoles = [];
        for (var i = 0; i < list_add.length ; i++) {
            arrayRoles.push($(list_add[i]).attr('id'));
        }
        $( '#list_role_edit option:selected').each(function() {
            var selected = $( '#list_role_edit option:selected').val();

            if (in_array(arrayRoles, selected) == true ) {
                Swal(
                    'Invalid data ?',
                    'That thing is still around?',
                    'question'
                )
            }else if(selected != 0 && in_array(arrayRoles, selected) == false) {
                var html = $( '#list_role_edit option:selected' ).text();
                var role_id = $( '#list_role_edit option:selected' ).val();
                $("#add_list").append('<span class="badge badge-primary" name="list_role" id="'+role_id+'">'+html+'&#32; <i class="fa fa-times delete_role" data-unicode="f00d"></i></span></span>&#32;');
            }

        });
    }).change();


    $('.myForm').submit(function(){
        var list_add = $('span[name="list_role"]');
        var value_key = '';
        for (var i = 0; i < list_add.length ; i++) {
            value_key += $(list_add[i]).attr('id')+',';
        }
        $('input[name="role_id"]').val(value_key);

        return true;
    });

    $(' #add_list ').on('click', '.delete_role', function() {
        Swal({
            title: 'Are you sure?',
            text: "You really want to delete this data !",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                $(this).closest('span').remove();
                Swal({
                    type: 'success',
                    title: 'Delete User Successfully !',
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        });
    });

});
