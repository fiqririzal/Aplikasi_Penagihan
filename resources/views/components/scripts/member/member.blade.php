<script>





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
                ]
            });
</script>
