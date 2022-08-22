@section('title','FACULTE')

<div class="col-12 col-sm-12">
    <div class="card card-primary card-outline card-outline-tabs">
        <div class="card-header p-0 border-bottom-0">
            <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill"
                        href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home"
                        aria-selected="true">Liste Promotion</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill"
                        href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile"
                        aria-selected="false">Facultes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill"
                        href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages"
                        aria-selected="false">Annee Academique</a>
                </li>

            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content" id="custom-tabs-four-tabContent">
                <div class="tab-pane fade active show" id="custom-tabs-four-home" role="tabpanel"
                    aria-labelledby="custom-tabs-four-home-tab">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h3 class="card-title flex-grow-1"><i class="fa fa-users" aria-hidden="true"></i> Liste
                                PROMOTION
                            </h3>

                            <div class="card-tools d-flex align-items-center">
                                <button type="button" class="btn btn-default text-primary mr-4" data-toggle="modal"
                                    data-target="#modal-promotion">
                                    <i class="fas fa-user-plus"></i>
                                </button>
                                <div class="input-group input-group-sm" style="width: 150px;">
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
                                        @if(!empty($row->faculte->designation_faculte))
                                        <td class="text-center">{{$row->faculte->designation_faculte}}</td>
                                        @else
                                        <td class="text-center">no disponible</td>

                                        @endif
                                        <td class="text-center">
                                            <button class="btn btn-link"
                                                wire:click="confirmDeletePromo({{$row->id_promotion}},'{{$row->designation_promotion}}')"><i
                                                    class="fa fa-trash-alt" aria-hidden="true"></i></button>
                                            <button class="btn btn-link" wire:click="goToEdit({{$row->id_promotion}})"
                                                data-target="#modal-promotion-edit"><i class="fas fa-edit"></i></button>
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
                <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel"
                    aria-labelledby="custom-tabs-four-profile-tab">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h3 class="card-title flex-grow-1"><i class="fa fa-users" aria-hidden="true"></i> Liste
                                FACULTE
                            </h3>

                            <div class="card-tools d-flex align-items-center">
                                <button type="button" class="btn btn-default text-primary mr-4" data-toggle="modal"
                                    data-target="#modal-lg">
                                    <i class="fas fa-user-plus"></i>
                                </button>
                                <div class="input-group input-group-sm" style="width: 150px;">
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
                                            <button class="btn btn-link"
                                                wire:click="confirmDeleteFac({{$row->id_faculte}},'{{$row->designation_faculte}}')"><i
                                                    class="fa fa-trash-alt" aria-hidden="true"></i></button>
                                            <button class="btn btn-link"
                                                wire:click="goToEditFac({{$row->id_faculte}})"><i
                                                    class="fas fa-edit"></i></button>
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
                <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel"
                    aria-labelledby="custom-tabs-four-messages-tab">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h3 class="card-title flex-grow-1"><i class="fa fa-users" aria-hidden="true"></i> Annee
                                Academique
                            </h3>

                            <div class="card-tools d-flex align-items-center">
                                <button type="button" class="btn btn-default text-primary mr-4" data-toggle="modal"
                                    data-target="#modal-annee">
                                    <i class="fas fa-user-plus"></i>
                                </button>
                                <div class="input-group input-group-sm" style="width: 150px;">
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
                                            <button class="btn btn-link"><i class="fa fa-trash-alt"
                                                    aria-hidden="true"></i></button>
                                            <button class="btn btn-link"><i class="fas fa-edit"></i></button>
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
            </div>
            <!-- /.card -->
        </div>
    </div>

    @include('livewire.Faculte.edit');
    @include('livewire.Faculte.modal');


    <script>
        window.addEventListener('showEditModal', event=> {
   
            $("#modal-promotion-edit").modal('show');
             
            });
         window.addEventListener('showEditFac', event=> {
            
        $("#modal-lg-edit").modal('show');

       
        });


        window.addEventListener('showSuccessMessage', event=> {
         $("#modal-lg").modal('hide');
          $("#modal-promotion").modal('hide');
          $("#modal-promotion-edit").modal('hide');
          $("#modal-lg-edit").modal('hide');
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
    
    window.addEventListener('showErrorMessage', event=> {
        Swal.fire({

            icon:'error',

            title:"operation echoue",
            text:event.detail.message,


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
        @this.deleteFac(event.detail.message.data.user_id)
        }
        })
});
        window.addEventListener('showWarningMessagePromo', event=> {
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
        @this.deletePromo(event.detail.message.data.user_id)
        }
        })
});
    </script>