<div class="d-flex justify-content-center">
    <button class="btn btn-outline-danger fs-4 d-none d-lg-block " wire:click="$emit('triggerDelete',{{ $contactId }})"> 
        Eliminar
    </button>
    <button class="btn btn-outline-danger d-lg-none " wire:click="$emit('triggerDelete',{{ $contactId }})"> 
        Eliminar
    </button>
</div>
@push('scripts')
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {
        @this.on('triggerDelete', contactId => {
            Swal.fire({
                title: '¿Estás seguro?',
                text: 'No podrás recuperar este contacto si lo eliminas',
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
                    @this.call('destroy', contactId)
             // success response
                    Swal.fire({title: 'El contacto se elimino correctamente', icon: 'success'});
                } else {
                    Swal.fire({
                        title: '¡Excelente has conservado este contacto!',
                        icon: 'success',
                        confirmButtonColor: '#01276d',
                    });
                }
            });
        });
    })
</script>
@endpush
