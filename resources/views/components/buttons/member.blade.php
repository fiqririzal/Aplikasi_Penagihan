@role('User')
@if($status == 'pending')
<a href="https://wa.me/6282319858335?text=I'Assalamualaikum A punten bade bayar" type="button" class="btn btn-gradient-warning btn-sm">
<i class="mdi mdi-reload btn-icon-prepend"></i> bayar </button>
@endif
@endrole
@role('Admin')
@if($status == 'pending')
<button type="button" class="btn btn-gradient-dark btn-sm" onclick=" editMember({{ $id }})"> Selesai <i class="mdi mdi-file-check btn-icon-append"></i>
@endif
@endrole
