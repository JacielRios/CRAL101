<div class="d-flex justify-content-center">
    <button class="btn btn-outline-danger fs-4 d-none d-md-block " wire:click="$emit('triggerDelete',{{ $homework_senId }})"> 
        Eliminar
    </button>
    <button class="btn btn-outline-danger d-md-none " wire:click="$emit('triggerDelete',{{ $homework_senId }})"> 
        Eliminar
    </button>
</div>
@push('scripts')
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {
        @this.on('triggerDelete', homework_senId => {
            Swal.fire({
                title: '¿Estás seguro?',
                text: 'No podrás recuperar la publicación si la eliminas',
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
                    @this.call('destroy',homework_senId)
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
