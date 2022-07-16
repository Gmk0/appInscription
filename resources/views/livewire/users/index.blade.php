<div>
    @if ($currentPage ==PAGECREATE)

    @include('livewire.users.create')
    @endif
        @if ($currentPage ==PAGELIST)

            @include('livewire.users.liste')
        @endif

        @if ($currentPage ==PAGEEDIT)

            @include('livewire.users.edit')
        @endif



</div>


<script>
    window.addEventListener('showSuccessMessage', event=> {
        Swal.fire({
            position: 'top-end',
            icon:'success',
            toast: true,
            title:"operation reussie",
            text:event.detail.message,
            showConfirmButton: false,
            timer:5000

        })

    });
    window.addEventListener('showWarningMessage', event=> {
        Swal.fire({
            title: event.detail.message.title,
            text: event.detail.message.text,
            icon: event.detail.message.type,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Continuer'
        }).then((result) => {
            if (result.isConfirmed) {
                @this.deleteUser(event.detail.message.data.user_id)
            }
        })
    });
    window.addEventListener('showErrorMessage', event=> {
        Swal.fire({

            icon:'error',

            title:"operation echoue",
            text:event.detail.message,


        })

    });

        {{--
           Swal.fire({
  title: 'Error!',
  text: 'Do you want to continue',
  icon: 'error',
  confirmButtonText: 'Cool'
})

        }).then((result)=>{
            if(result.isConfirmed){
                @this.deleteUser(event.detail.message.data.user_id)
            }
        })--}}

</script>



