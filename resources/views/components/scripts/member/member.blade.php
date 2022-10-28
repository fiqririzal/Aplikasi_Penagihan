<script>
    let rental_id;
    const editMember = (id) => {
        Swal.fire({
            title: 'Mohon tunggu',
            showConfirmButton: false,
            allowOutsideClick: false,
            willOpen: () => {
                Swal.showLoading()
            }
        });
        transaksi_id = id;
        $.ajax({
            type: "get",
            url: `/transaksi/${transaksi_id}/edit`,
            dataType: "json",
            success: function(response) {
                Swal.close();

                alert('status updated');

                $('#table').DataTable().ajax.reload();
            }
        });
    }
$(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });
    });
    $('#table').DataTable({
                order: [],
                lengthMenu: [[10, 25, 50, 100, -1], ['Sepuluh', 'Salawe', 'lima puluh', 'cepe', 'kabeh']],
                filter: true,
                processing: true,
                responsive: true,
                serverSide: true,
                ajax: {
                    url: '/member/kumahaaingwe'
                },
                "columns":
                [
                    { data: 'DT_RowIndex', orderable: false, searchable: false},
                    { data: 'name', name:'user.name'},
                    { data: 'address', name:'user.address'},
                    { data: 'phone', name:'user.phone'},
                    { data: 'name_car', name:'rental.name_car'},
                    { data: 'pinjaman', orderable: false, searchable: false},
                    { data: 'total', orderable: false, searchable: false},
                    { data: 'created_at', orderable: false, searchable: false},
                    { data: 'status', orderable: false, searchable: false},
                    { data: 'actions', orderable: false, searchable: false},
                ]
            });

</script>
