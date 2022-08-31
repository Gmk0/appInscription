@section('title','RAPPORT')
<div>

    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">Chart</div>
                    @livewire('chart.paiement-views')
                </div>
            </div>
        </div>
    </div>


    <div class="card bg-white m-2">


        <div class="card-header">
            <h3 class="card-title">
                <i class="far fa-chart-bar"></i>
                Tables
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

        <div class="card-body pt-5">
            <div class="shadow rounded p-4 border bg-white flex-1">
                <div class="form-group col-md-3">
                    <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder="search"
                        wire:model.debounce.800ms="search">
                </div>
                <table class="table isfullwidth has-text-grey" id="example1">
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
                            <td>{{$paiment->id_paiement}}</td>
                            <td>{{$paiment->montant}}</td>
                            <td>{{$paiment->created_at->diffforhumans()}}</td>
                            <td>
                                <button class="btn btn-outline-primary" data-toggle="modal"
                                    data-target="#modal-promotion" wire:click="editPaye({{$paiment->id}})">edit</button>

                                <button type="button" wire:click="print('{{$paiment->matricule_etudiant}}')"
                                    class="btn btn-outline-primary"><i class="fa fa-print"></i></button>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>

                </table>
            </div>


        </div>
        <div class="m-2">
            {{$paimentListe->links()}}
        </div>


    </div>



</div>
@section('script')

</script>

@endsection