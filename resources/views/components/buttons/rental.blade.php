{{-- @can('edit_rental') --}}
<button type="button" class="btn btn-gradient-dark btn-sm" onclick=" edit({{ $id }})"> Edit <i class="mdi mdi-file-check btn-icon-append"></i>
</button>
<button type="button" class="btn btn-gradient-warning btn-sm" onclick=" deleteData({{ $id }})">
<i class="mdi mdi-reload btn-icon-prepend"></i> Delete </button>
    {{-- <button type="button" onclick="edit({{ $id }})"class="btn btn-gradient-warning btn-rounded btn-fw">Edit</button>
    <button type="button" onclick="deleteData({{ $id }})" class="btn btn-gradient-danger btn-rounded btn-fw">Hapus</button> --}}
{{-- @endcan --}}
{{-- @can('delete_rental') --}}
{{-- @endcan --}}
