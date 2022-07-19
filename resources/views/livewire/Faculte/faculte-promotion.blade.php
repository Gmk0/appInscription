@section('title','GESITON FACULTE')

<div class="col-12 col-sm-12">
    <div class="card card-primary card-outline card-outline-tabs">
        <div class="card-header p-0 border-bottom-0">
            <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Liste Promotion</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Facultes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">Annee Academique</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-settings-tab" data-toggle="pill" href="#custom-tabs-four-settings" role="tab" aria-controls="custom-tabs-four-settings" aria-selected="false">Settings</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content" id="custom-tabs-four-tabContent">
                <div class="tab-pane fade active show" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h3 class="card-title flex-grow-1"><i class="fa fa-users" aria-hidden="true"></i> Liste PROMOTION
                            </h3>

                            <div class="card-tools d-flex align-items-center">
                                <button type="button" class="btn btn-default text-primary mr-4" data-toggle="modal" data-target="#modal-promotion">
                                    <i class="fas fa-user-plus"></i>
                                </button>
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

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
                    </div>

                  </div>
                <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h3 class="card-title flex-grow-1"><i class="fa fa-users" aria-hidden="true"></i> Liste FACULTE
                            </h3>

                            <div class="card-tools d-flex align-items-center">
                                <button type="button" class="btn btn-default text-primary mr-4" data-toggle="modal" data-target="#modal-lg">
                                    <i class="fas fa-user-plus"></i>
                                </button>
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

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
                    </div>
                </div>
                <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
                   <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h3 class="card-title flex-grow-1"><i class="fa fa-users" aria-hidden="true"></i> Annee Academique
                            </h3>

                            <div class="card-tools d-flex align-items-center">
                                <button type="button" class="btn btn-default text-primary mr-4" data-toggle="modal" data-target="#modal-annee">
                                    <i class="fas fa-user-plus"></i>
                                </button>
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

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
                                    <th class="text-center" style="width:25%">Annee</th>
                                    <th class="text-center" style="width:25%">Creat</th>

                                </tr>
                                </thead>
                                <tbody>
                                {{Form::hidden('',$increment =1)}}
                                @foreach ($annees as $row )
                                    <tr>
                                        <td class="text-center">{{$increment}}</td>
                                        <td class="text-center">{{$row->designation_annee}}</td>
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
                </div>
                <div class="tab-pane fade" id="custom-tabs-four-settings" role="tabpanel" aria-labelledby="custom-tabs-four-settings-tab">
                    Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus turpis ac, ornare sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis vulputate. Morbi euismod molestie tristique. Vestibulum consectetur dolor a vestibulum pharetra. Donec interdum placerat urna nec pharetra. Etiam eget dapibus orci, eget aliquet urna. Nunc at consequat diam. Nunc et felis ut nisl commodo dignissim. In hac habitasse platea dictumst. Praesent imperdiet accumsan ex sit amet facilisis.
                </div>
            </div>
        </div>
        <!-- /.card -->
    </div>
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
            timer:3000

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



