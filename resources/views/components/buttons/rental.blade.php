{{-- @can('edit_rental') --}}
@role('Admin')
<button type="button" class="btn btn-gradient-dark btn-sm" onclick=" edit({{ $id }})"> Edit <i class="mdi mdi-file-check btn-icon-append"></i>
</button>
<button type="button" class="btn btn-gradient-warning btn-sm" onclick=" deleteData({{ $id }})">
<i class="mdi mdi-reload btn-icon-prepend"></i> Delete </button>
@endrole
@role('User')
<button type="button" class="btn btn-gradient-warning btn-sm" onclick=" sewa({{ $id }})">
<i class="mdi mdi-reload btn-icon-prepend"></i> Sewa </button>
@endrole
