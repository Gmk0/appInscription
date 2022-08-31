@section('title','PAIEMENT')

<div>

    <div class="container">

        <!--  -->

        <div class="card-body bg-white mb-3">
            <div class="row">
                <div class="col-md-6">
                    <form wire:submit.prevent="findStudent">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="">MATRICULE</label>
                                <input type="text" class="form-control @error('matricule') is-invalid @enderror" name=""
                                    id="" aria-describedby="" value="" placeholder="" wire:model.defer="matricule">

                                <span class="text-danger">@error('matricule') {{$message}}@enderror</span>
                            </div>

                            <div wire:loading.remove wire:target="findStudent">
                                <button type="submit" class="btn btn-outline-primary">FIND</button>
                            </div>
                            <div wire:loading wire:target="findStudent">
                                <button type="button" class="btn btn-outline-primary">
                                    <span class="spinner-border spinner-border-sm" role="status"
                                        aria-hidden="true"></span>
                                    Loading..
                                </button>
                            </div>
                        </div>

                    </form>
                </div>

                <div class="col-md-6">
                    <form wire:submit.prevent="paiement">
                        @if($etudiants != null)
                        <div class="row">

                            <div class="form-group col-md-6">
                                <label for="">Matricule</label>
                                <input type="text" name="matriucle" id="matricule" class="form-control" placeholder=""
                                    aria-describedby="helpId" value="{{$etudiants->matricule_etudiant}}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Nom</label>
                                <input type="text" name="nom" id="Nom" class="form-control" placeholder=""
                                    aria-describedby="helpId" value="{{$etudiants->Nom}}">
                            </div>

                            <div class="form-group col-md-6">
                                <label for=""></label>
                                <input type="text" name="" id="promo" class="form-control" placeholder=""
                                    value="{{$etudiants->inscription->promotion->designation_promotion}}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for=""></label>
                                <input type="text" name="m" id="fac" class="form-control" placeholder=""
                                    value="{{$etudiants->inscription->promotion->faculte->designation_faculte}}">
                            </div>
                        </div>

                        @endif



                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="">MONTANT</label>
                                <input type="number" name="montant" id="montant" class="form-control" placeholder=""
                                    wire:model.defer="paiement.montant">
                                <span class="text-danger">@error('paiement.montant') {{$message}}@enderror</span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">LIBELLE</label>

                                <select class="form-control" name="" wire:model.defer="paiement.libelle">
                                    <option selected>-- motif --</option>
                                    <option value="Frais inscription">Frais inscription</option>
                                    <option value="enrolement">enrolement</option>
                                    <option value="Releves de cotes">Releves de cotes</option>
                                </select>



                                <span class="text-danger">@error('paiement.libelle') {{$message}}@enderror</span>
                            </div>

                            <div wire:loading.remove wire:target="paiement">

                                <button type="submit" class="btn btn-outline-primary" @if($etudiants==null) disabled
                                    @endif>Paiment</button>
                                <button type="button" class="btn btn-outline-warning"
                                    wire:click="clear()">ANNULER</button>
                            </div>
                            <div wire:loading wire:target="paiement">
                                <button type="button" class="btn btn-outline-primary">
                                    <span class="spinner-border spinner-border-sm" role="status"
                                        aria-hidden="true"></span>
                                    Loading..
                                </button>
                            </div>

                        </div>
                    </form>
                </div>



            </div>
        </div>



        <br>
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="far fa-chart-bar"></i>
                    PAIEMENT
                </h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="bg-white pt-5">
                    <div>
                        <div class="form-group col-md-3">
                            <input type="text" class="form-control" name="" id="" aria-describedby="helpId"
                                placeholder="search" wire:model.debounce.800ms="search">
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table " id="example1">
                            <thead>
                                <tr>
                                    <th>N</th>
                                    <th>Matricule</th>
                                    <th>Nom</th>
                                    <th>bordereau</th>
                                    <th>Montant</th>
                                    <th>created</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($paimentListe as $paiment)
                                <tr>
                                    <td scope="row">{{$paiment->id}}</td>
                                    <td>
                                        {{$paiment->matricule_etudiant}} <br>
                                        <small id="helpId"
                                            class="form-text text-muted">{{$paiment->inscriptionCheck->promotion->faculte->designation_faculte}}</small>
                                    </td>
                                    <td>{{$paiment->libelle}}</td>
                                    <td>{{$paiment->id_payement}}</td>
                                    <td>{{$paiment->montant}}</td>
                                    <td>{{$paiment->created_at->diffforhumans()}}</td>
                                    <td>
                                        <button class="btn btn-outline-primary" data-toggle="modal"
                                            data-target="#modal-promotion"
                                            wire:click="editPaye({{$paiment->id}})">edit</button>

                                        <button type="button" wire:click="print('{{$paiment->matricule_etudiant}}')"
                                            class="btn btn-outline-primary"><i class="fa fa-print"></i></button>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>

                        </table>
                    </div>


                </div>

                <div class="p-2">
                    {{$paimentListe->links()}}
                </div>
            </div>



            <!-- /.card-body-->
        </div>


    </div>


    @include('livewire.Checkout.paiementModal')

    <div class="modal">
        <div id="print">
            @include('PDF.invoice')
        </div>

    </div>

</div>

@section('script')
<script>
    window.addEventListener('error', event=> {
Swal.fire({
   
   icon:'warning',
  
   title:"operation failed",
   text:event.detail.message,
   showConfirmButton: true,
  

   })

   });
//print script

window.addEventListener('print', event=> {


    var data ='<input type="button" id ="printPageButton" class="" style="display:block ;width:100% ;border:none; background-color:#008B8B;color:#fff; padding:14px 28px;font-size:16px;cursor:pointer;text-align:center" value="Print Invoice" onClick="window.print()"/>';
        data += document.getElementById('print').innerHTML;
    myReceipt=window.open("", "myWin","left=150, top =130, width=600, height =600");
    myReceipt.screnX =0;
    myReceipt.screnY = 0;
    myReceipt.document.write(data);
    myReceipt.document.title ="Print Invoice";
    myReceipt.focus();
    setTimeout(()=>{
            myReceipt.close();
    },10000)


});


   window.addEventListener('showSuccessMessage', event=> {
    $("#modal-promotion").modal('hide');
        Swal.fire({
            position: 'top-end',
            icon:'success',
            toast: true,
            title:"operatione reussie",
            text:event.detail.message,
            showConfirmButton: false,
            timer:6000

        });

    });
    window.addEventListener('tables', event=> {
    

    });



    
  

</script>
@endsection