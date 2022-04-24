<div>
<button class="btn btn-danger fs-4 d-none d-md-block " wire:click="$emit('triggerDelete',{{ $listId }})"> 
    Eliminar
</button>
<button class="btn btn-danger d-md-none" wire:click="$emit('triggerDelete',{{ $listId }})"> 
    Eliminar
</button>
</div>
@push('scripts')
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {
        @this.on('triggerDelete', listId => {
            Swal.fire({
                title: '¿Estás seguro?',
                text: 'No podrás recuperar esta lista si la eliminas',
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: '#ff0e0e',
                cancelButtonColor: '#01276d',
                confirmButtonText: 'Eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
         //if user clicks on delete
                if (result.value) {
             // calling destroy method to delete
                    @this.call('destroy',listId)
             // success response
                    Swal.fire({title: 'La publicación se elimino correctamente', icon: 'success'});
                } else {
                    Swal.fire({
                        title: '¡Excelente has conservado esta publicación!',
                        icon: 'success',
                        confirmButtonColor: '#01276d',
                    });
                }
            });
        });
    })
</script>
@endpush

