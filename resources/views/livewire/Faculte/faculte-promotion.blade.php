<div class="row p-4 pt-5">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-secondary text-white d-flex align-items-center">
                <h3 class="card-title flex-grow-1"><i class="fa fa-users" aria-hidden="true"></i> Liste Faculte
                </h3>

                <div class="card-tools d-flex align-items-center">
                    <button type="button" class="btn btn-default text-white mr-4" data-toggle="modal" data-target="#modal-lg">
                        <i class="fas fa-user-plus"></i>
                    </button>

                    <div class="input-group input-group-md" 50px;">
                    <input type="text" name="table_search" class="form-control float-right"
                           placeholder="Search">

                    <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0" style="height: 300px;">
            <table class="table table-head-fixed text-nowrap">
                <thead>
                <tr>
                    <th class="text-center" style="width:5%">N°</th>
                    <th class="text-center" style="width:25%">Designation </th>
                    <th class="text-center" style="width:30%">Action</th>
                </tr>
                </thead>
                <tbody>
                     {{Form::hidden('',$increment =1)}}
                @foreach ($facultes as $row )
                    <tr>
                        <td class="text-center">{{$increment}}</td>
                        <td class="text-center">{{$row->designation_faculte}}</td>
                        <td class="text-center">
                            <button class="btn btn-link" wire:click="confirmDelete({{$row->id}},'{{$row->designation_name}}')"><i class="fa fa-trash-alt" aria-hidden="true"></i></button>
                            <button class="btn btn-link" wire:click="goToEdit({{$row->id}})"><i class="fas fa-edit"></i></button>
                        </td>
                    </tr>
                     {{Form::hidden('',$increment =$increment+1)}}
                @endforeach


                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            l
        </div>
    </div>
    <!-- /.card -->
</div>
<div class="row p-4 pt-5">
    <div class="col"></div>
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-secondary text-white d-flex align-items-center">
                <h3 class="card-title flex-grow-1"><i class="fa fa-users" aria-hidden="true"></i> Liste PROMOTION
                </h3>

                <div class="card-tools d-flex align-items-center">
                 <button type="button" class="btn btn-default text-white mr-4" data-toggle="modal" data-target="#modal-promotion">
                        <i class="fas fa-user-plus"></i>
                    </button>
                    <div class="input-group input-group-md" 50px;">
                    <input type="text" name="table_search" class="form-control float-right"
                           placeholder="Search">

                    <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0" style="height: 300px;">
            <table class="table table-head-fixed text-nowrap">
                <thead>
                <tr>
                    <th class="text-center" style="width:5%">N°</th>
                    <th class="text-center" style="width:25%">Faculte</th>
                    <th class="text-center" style="width:25%">Promotion</th>
                    <th class="text-center" style="width:30%">Action</th>
                </tr>
                </thead>
                <tbody>
                    {{Form::hidden('',$increment =1)}}
                @foreach ($promotions as $row )
                    <tr>
                        <td class="text-center">{{$increment}}</td>
                        <td class="text-center">{{$row->designation_promotion}}</td>
                        <td class="text-center">{{$row->faculte->designation_faculte}}</td>
                        <td class="text-center">
                            <button class="btn btn-link" ><i class="fa fa-trash-alt" aria-hidden="true"></i></button>
                            <button class="btn btn-link" ><i class="fas fa-edit"></i></button>
                        </td>
                    </tr>
                     {{Form::hidden('',$increment =$increment+1)}}
                @endforeach


                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            l
        </div>
    </div>
    <!-- /.card -->
</div>

@include('livewire.Faculte.modal');


<script>

    window.addEventListener('showSuccessMessage', event=> {
         $("#modal-lg").modal('hide');
          $("#modal-promotion").modal('hide');
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



