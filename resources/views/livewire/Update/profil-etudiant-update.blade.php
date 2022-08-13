<div class="container">
    @if($etudiants == null)
    <div class="">
        <form wire:submit.prevent="findStudent">
            <div class="row p-5">
                <div class="form-group ">
                    <label for="">MATRICULE</label>
                    <input type="text" class="form-control @error('matricule') is-invalid @enderror" name="" id="" aria-describedby="" value="3500/PH22" placeholder="" wire:model="matricule">
              
                    <span class="text-danger">@error('matricule') {{$message}}@enderror</span>
                  </div>
    
                  <div>
                      <input class ="btn btn-outline-primary"type="submit">
                  </div>
            </div>
            
        </form>
    </div>
 @else
    @include('livewire.update.update')
@endif
</div>
@section('script')
<script>
    window.addEventListener('error', event=> {

     
Swal.fire({
   
   icon:'warning',
  
   title:"operation reussie",
   text:event.detail.message,
   showConfirmButton: true,
   timer:3000

   })

   });

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
</script>
@endsection

    


