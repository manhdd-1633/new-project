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
});
