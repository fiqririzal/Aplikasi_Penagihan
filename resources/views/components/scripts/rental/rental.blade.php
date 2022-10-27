<script>
    let rental_id;

    const create = () => {
        $('#createForm').trigger('reset');
        $('#createModal').modal('show');
    }
    const edit = (id) => {
        Swal.fire({
            title: 'Mohon tunggu',
            showConfirmButton: false,
            allowOutsideClick: false,
            willOpen: () => {
                Swal.showLoading()
            }
        });

        rental_id = id;

        $.ajax({
            type: "get",
            url: `/rental/${rental_id}`,
            dataType: "json",
            success: function (response) {
                $('#name_car').val(response.name_car);
                $('#price').val(response.price);
                $('#description').val(response.description);
                $('#image').val(response.image);

                Swal.close();
                $('#editModal').modal('show');
            }
        });
    }
    const deleteData = (id) =>{
        Swal.fire({
            title: 'Apa anda yakin untuk menghapus ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'ya',
            cancelButtonText: 'tidak'
        }).then((result) => {
            Swal.close();

            if(result.value) {
                Swal.fire({
                    title: 'Mohon tunggu',
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    willOpen: () => {
                        Swal.showLoading()
                    }
                });

                $.ajax({
                    type: "delete",
                    url: `/rental/${id}`,
                    dataType: "json",
                    success: function (response) {
                        Swal.close();
                        if(response.status){
                            Swal.fire(
                                'Success!',
                                response.msg,
                                'success'
                            )
                            $('#rental').DataTable().ajax.reload();
                        }else{
                            Swal.fire(
                                'Error!',
                                response.msg,
                                'warning'
                            )
                        }
                    }
                });
            }
        });
    }
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });


        @if(Auth::user()->getRoleNames()[0] == 'Admin')
        $('#rental').DataTable({
            order: [],
            lengthMenu: [
                [10, 25, 50, 100, -1],
                ['Sepuluh', 'Salawe', 'lima puluh', 'cepe', 'kabeh']
            ],
            filter: true,
            processing: true,
            responsive: true,
            serverSide: true,
            ajax: {
                url: '/rental/bebas'
            },
            "columns": [{
                    data: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'name_car',
                    name: 'rental.name_car'
                },
                {
                    data: 'description',
                    name: 'rental.description'
                },
                {
                    data: 'image',
                    name: 'rental.image'
                },
                {
                    data: 'price',
                    name: 'rental.price'
                },
                {
                    data: 'status',
                    name: 'rental.status'
                },
                { data: 'action',
                  orderable: false,
                  searchable: false
                },

            ]
        });
        @else
        $('#rental').DataTable({
            order: [],
            lengthMenu: [
                [10, 25, 50, 100, -1],
                ['Sepuluh', 'Salawe', 'lima puluh', 'cepe', 'kabeh']
            ],
            filter: true,
            processing: true,
            responsive: true,
            serverSide: true,
            ajax: {
                url: '/rental/bebas'
            },
            "columns": [{
                    data: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'name_car',
                    name: 'rental.name_car'
                },
                {
                    data: 'description',
                    name: 'rental.description'
                },
                {
                    data: 'image',
                    name: 'rental.image'
                },
                {
                    data: 'price',
                    name: 'rental.price'
                },
                {
                    data: 'status',
                    name: 'rental.status'
                },
            ]
        });
        @endif
        $('#createSubmit').click(function(e) {
            e.preventDefault();

            var formData = new FormData($('#createForm')[0]);

            $.ajax({
                type: "post",
                url: "/rental",
                data: formData,
                dataType: "json",
                cache: false,
                processData: false,
                contentType: false,
                success: function(data) {
                    if (data.status) {
                        $('#createModal').modal('hide');
                        $('#rental').DataTable().ajax.reload();
                    } else {
                        alert('error');
                    }
                }
            })
        });
        $('#editSubmit').click(function (e) {
            e.preventDefault();

            var formData = $('#editForm').serialize();

            Swal.fire({
                title: 'Mohon tunggu',
                showConfirmButton: false,
                allowOutsideClick: false,
                willOpen: () => {
                    Swal.showLoading()
                }
            });

            $.ajax({
                type: "post",
                url: `/rental/${rental_id}`,
                data: formData,
                dataType: "json",
                cache: false,
                processData: false,
                success: function(data) {
                    Swal.close();

                    if(data.status) {
                        Swal.fire(
                            'Success!',
                            data.msg,
                            'success'
                        )

                        rental_id = null;
                        $('#editModal').modal('hide');
                        $('#rental').DataTable().ajax.reload();
                    } else {
                        Swal.fire(
                            'Error!',
                            data.msg,
                            'warning'
                        )
                    }
                }
            })
        });
    });
</script>
