@section('title','Liste Etudiant')
<div>
    <div class="card-body bg-white pt-5">


        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-2">
                    <label for="">Show</label>
                    <select class="form-control form-control-sm" title="" style="width: 80px;" wire:model="pageN">

                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="30">30</option>
                    </select>

                </div>

                <div class="col-md-2">
                    <label for="">Order</label>
                    <select class="form-control form-control-sm" title="" style="width: 80px;" wire:model="order">

                        <option value="asc">ascendant</option>
                        <option value="desc">descedant</option>

                    </select>
                </div>

                <div class="col-md-4">
                    <label for="">Search</label>
                    <input type="text" class="form-control form-control-sm" wire:model.debounce.500ms="search"
                        placeholder="search Name or Matricule">

                </div>
                <div class="col-md-4">
                    <label for="">Faculte</label>
                    <select class="form-control form-control-sm  @error('promotion.id_faculte') is-invalid @enderror"
                        wire:model="byPromotion">
                        <option value="">---Faculte-----</option>
                        @foreach($facultes as $row)
                        <option value="{{$row->id_faculte}}">{{$row->designation_faculte}}</option>
                        @endforeach
                    </select>
                    @error('promotion.designation_promotion')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>
                <div class="col-md-2 mt-3">
                    <label for="">
                        @if(!empty($byPromotion))
                        {{$faculteName->designation_faculte}} :{{$count->count()}}
                        @else
                        Total : {{$count->count()}}
                        @endif
                    </label>
                </div>
                <div class="mb-4 d-flex justify-content-between">
                    <div class="">
                        <button type="button" wire:click="print()" class="btn btn-outline-primary"><i
                                class="fa fa-print"></i></button>
                        <button class="btn btn-outline-primary" type="button" onClick="printReceipt()"><i
                                class="fa fa-print">Excel</i></button>
                    </div>
                </div>
            </div>

            <div wire:loading>
                <div class="spinner-border float-right" role="status">
                    <span class="sr-only">loading</span>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table bg-gradient-white table-striped">
                    <thead>
                        <tr>
                            <th>action</th>
                            <th>N°</th>
                            <th>Matricule</th>
                            <th>Nom</th>
                            <th>Prenom</th>

                            <th>Telephone</th>

                            <th>Faculte</th>
                            <th>promotion</th>
                            <th>date</th>
                            <th>Document</th>
                            <th>Statut</th>

                        </tr>
                    </thead>
                    <tbody>



                        {{Form::hidden('',$increment =1)}}
                        @foreach ($etudiants as $etudiant )
                        <tr>
                            <td class="text-center">
                                <a class="btn btn-link" href="{{route('FindEtudiant',[$etudiant->id])}}"><i
                                        class="fa fa-eye" aria-hidden="true"></i></a>

                            </td>
                            <td>{{$increment}}</td>
                            <td>{{$etudiant->matricule_etudiant}}</td>
                            <td>{{$etudiant->Nom}}</td>
                            <td>{{$etudiant->Prenom}}</td>

                            <td>{{$etudiant->Telephone}}</td>
                            <td>{{$etudiant->inscription->promotion->faculte->designation_faculte}}</td>
                            <td>{{$etudiant->inscription->promotion->designation_promotion}}</td>
                            <td>{{$etudiant->inscription->created_at}}</td>
                            @if(countDocument($etudiant->matricule_etudiant))
                            <td><span class="badge badge-pill badge-success">Complet</span></td>
                            @else
                            <td><button class="btn btn-link" id="click" type="button"> <span
                                        class="badge badge-pill badge-warning">Incomplet</span>

                                </button></td>
                            @endif
                            @if($etudiant->id==1)
                            <td><span class="badge badge-pill badge-success">Admis</span></td>
                            @else
                            <td><button class="btn btn-link" id="" type="button"> <span
                                        class="badge badge-pill badge-warning">No
                                        Admis</span>

                                </button></td>
                            @endif

                        </tr>
                        {{Form::hidden('',$increment =$increment+1)}}
                        @endforeach

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>action</th>
                            <th>N°</th>
                            <th>Matricule</th>
                            <th>Nom</th>
                            <th>Prenom</th>

                            <th>Telephone</th>

                            <th>Faculte</th>
                            <th>promotion</th>
                            <th>date</th>
                            <th>Document</th>
                            <th>Statut</th>

                        </tr>
                    </tfoot>
                </table>
            </div>

        </div>

        {{$etudiants->links()}}
    </div>
    <div class="modal">
        <div id="print">
            @include('PDF.listeEtudiant')
        </div>
    </div>
</div>






@section('script')

<script>
    window.addEventListener('print', event=> {

       
   var data ='<input type="button" id="printPageButton" class="hidden-print" style="display:block ;width:100% ;border:none;background-color:#008B8B;color:#fff; padding:14px 28px;font-size:16px;cursor:pointer;text-align:center"value="IMPRIMER" onClick="window.print()" />';
    data += document.getElementById('print').innerHTML;
            myReceipt=window.open("", "myWin","left=200, top =200, width=1000, height =800");
            myReceipt.screnX =0;
            myReceipt.screnY = 0;
            myReceipt.document.write(data);
            myReceipt.document.title ="Liste";
            myReceipt.focus();
            setTimeout(()=>{
            myReceipt.close();
            },10000) 
            
     });

</script>
@endsection