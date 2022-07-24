@section('css')
  <link rel="stylesheet" href="{{asset('styleProfile.css')}}">  
@endsection
<div>
    @foreach ($etudiants as $etudiant)
        
    <div class="col-12 col-sm wide-font-12">
        <div class="card card-primary card-outline card-outline-tabs">
            <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true"> PROFIL</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">DOCUMENT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">ETUDES REALISER</a>
                    </li>
                    
                </ul>
            </div>
            <div class="card-body" style="min-height: 500px;">
                <div class="tab-content" id="custom-tabs-four-tabContent">
                    <div class="tab-pane fade active show" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">

                            <div class="row">
                            <div class="col-md-3 border-right">
                                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="{{asset('/storage/students_images/'.$etudiant->etudiant->Photo)}}"><span class="font-weight-bold">{{$etudiant->etudiant->Prenom}}</span><span class="text-black-50">{{$etudiant->etudiant->Email}}</span><span> </span></div>
                    
                            </div>
                            <div class="col-md-5 border-right">
                                <div class="p-3 py-5">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h4 class="text-right">Profile</h4>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-6"><label class="labels">Matricule</label><input type="text" class="form-control form-control-sm wide-font" placeholder="first name" value="{{$etudiant->etudiant->matricule_etudiant}}"></div>
                                        <div class="col-md-6"><label class="labels">Nom</label><input type="text" class="form-control form-control-sm wide-font"  placeholder="surname"value="{{$etudiant->etudiant->Nom}}"></div>
                                        <div class="col-md-6"><label class="labels">Postnom</label><input type="text" class="form-control form-control-sm wide-font"  placeholder="surname" value="{{$etudiant->etudiant->Postnom}}"></div>
                                        <div class="col-md-6"><label class="labels">Prenom</label><input type="text" class="form-control form-control-sm wide-font" placeholder="first name" value="{{$etudiant->etudiant->Prenom}}"></div>
                                        
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-6"><label class="labels">Genre</label><input type="text" class="form-control form-control-sm wide-font" placeholder="enter phone number" value="{{$etudiant->etudiant->Genre}}"></div>
                                        <div class="col-md-6"><label class="labels">Nationalite</label><input type="text" class="form-control form-control-sm wide-font" placeholder="enter address line 1" value="{{$etudiant->etudiant->Nationalite}}"></div>
                                        <div class="col-md-6"><label class="labels">Etat-civil</label><input type="text" class="form-control form-control-sm wide-font" placeholder="enter address line 2" value="{{$etudiant->etudiant->Etat_civil}}"></div>
                                    
                                       
                                        <div class="col-md-6"><label class="labels">Telephone</label><input type="text" class="form-control form-control-sm wide-font" placeholder="enter address line 2" value="{{$etudiant->etudiant->Telephone}}"></div>
                        
                                        <div class="col-md-12"><label class="labels">Email</label><input type="text" class="form-control form-control-sm wide-font" placeholder="education" value="{{$etudiant->etudiant->Email}}"></div>
                                        <div class="col-md-12"><label class="labels">Adresse Etudiant</label><input type="text" class="form-control form-control-sm wide-font" placeholder="enter address line 2" value="{{$etudiant->etudiant->Adresse_etudiant['Avenue']}},{{$etudiant->etudiant->Adresse_etudiant['Commune']}}"></div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-12"><label class="labels">Lieu Naissance</label><input type="text" class="form-control form-control-sm wide-font" placeholder="country" value="{{$etudiant->etudiant->Lieu_naiss}}" ></div>
                                        <div class="col-md-12"><label class="labels">Date Naissance</label><input type="text" class="form-control form-control-sm wide-font" value="{{$etudiant->etudiant->Date_naiss}}" placeholder="state"></div>
                                    </div>
                                   
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="p-3 py-5">
                                    <div class="d-flex justify-content-between align-items-center experience"><h4 class="labels">PARENT ETUDIANT</h4></div>
                                    <div class="col-md-12"><label class="labels">Nom Pere</label><input type="text" class="form-control form-control-sm wide-font" placeholder="experience" value="{{$etudiant->etudiant->Nom_Pere}}"></div> 
                                    <div class="col-md-12"><label class="labels">Nom Mere</label><input type="text" class="form-control form-control-sm wide-font" placeholder="additional details" value="{{$etudiant->etudiant->Nom_mere}}"></div>
                                    <div class="col-md-12"><label class="labels">Localisation</label><input type="text" class="form-control form-control-sm wide-font" placeholder="additional details" value="{{$etudiant->etudiant->Localisation_parent['Province']}}{{$etudiant->etudiant->Localisation_parent['District']}}{{$etudiant->etudiant->Localisation_parent['Commune']}}"></div>
                                    
                                
                                </div>
                                <div class="row p-2 py-3">
                                    <div class="d-flex justify-content-between align-items-center experience"><h4 class="labels">TUTEUR ETUDIANT</h4></div>
                                    <div class="col-md-6"><label class="labels">Nom Tuteur</label><input type="text" class="form-control form-control-sm wide-font" placeholder="experience" value="{{$etudiant->etudiant->tuteurEtudiant->Nom_tuteur}}"></div> 
                                    <div class="col-md-6"><label class="labels">Telephone</label><input type="text" class="form-control form-control-sm wide-font" placeholder="additional details" value="{{$etudiant->etudiant->tuteurEtudiant->Telephone_tuteur}}"></div>
                                    <div class="col-md-12"><label class="labels">Adresse</label><input type="text" class="form-control form-control-sm wide-font" placeholder="additional details" value="{{$etudiant->etudiant->tuteurEtudiant->Adresse_tuteur['Avenue']}} Q/{{$etudiant->etudiant->tuteurEtudiant->Adresse_tuteur['Quartier']}} C/{{$etudiant->etudiant->tuteurEtudiant->Adresse_tuteur['Commune']}}"></div>
                                  
                                </div>
                        </div></div>
    
                    </div>    

                    <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                        <div>
                            <div class="card">
                                <div class="card-header card-primary card-outline d-flex align-items-center">
                                    <h3 class="card-title flex-grow-1"><i class="fa fa-users" aria-hidden="true"></i> Document
                                    </h3>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0" style="height: 300px;">
                                <table class="table table-head-fixed text-nowrap">
                                    <thead>
                                    <tr>
                                        <th class="text-center" style="width:5%">N</th>
                                        <th class="text-center" style="width:25%">Document</th>
                                        <th class="text-center" style="width:20%">Name</th>
                                        <th class="text-center" style="width:20%">Path</th>
                                    </tr>
                                    </thead>
                                    <tbody>                                
                                        <tr>
                                            <td class="text-center">1</td>
                                            <td class="text-center">Aptitude physique</td>
                                            @if (!empty($etudiant->etudiant->dossierEtudiant->Aptitude_physique))
                                            <td class="text-center">{{$etudiant->etudiant->dossierEtudiant->Aptitude_physique}}</td>
                                            <td class="text-center"><a class="btn btn-primary" href="{{asset('/storage/students_doc/'.$etudiant->etudiant->dossierEtudiant->Aptitude_physique)}}">VOIR</a></td>
                                            @else
                                            <td class="text-center text-danger">Non disponible</td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <td class="text-center">2</td>
                                            <td class="text-center">Certificat Naissance</td>
                                            @if (!empty($etudiant->etudiant->dossierEtudiant->Certificat_naiss))
                                            <td class="text-center">{{$etudiant->etudiant->dossierEtudiant->Certificat_naiss}}</td>
                                            <td class="text-center"><a class="btn btn-primary" href="{{asset('/storage/students_doc/'.$etudiant->etudiant->dossierEtudiant->Certificat_naiss)}}">VOIR</a></td>
                                            @else
                                            <td class="text-center text-danger">Non disponible</td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <td class="text-center">3</td>
                                            <td class="text-center">Diplome d'etat</td>
                                            @if (!empty($etudiant->etudiant->dossierEtudiant->Diplome_etat))
                                            <td class="text-center">{{$etudiant->etudiant->dossierEtudiant->Diplome_etat}}</td>
                                            <td class="text-center"><a class="btn btn-primary" href="{{asset('/storage/students_doc/'.$etudiant->etudiant->dossierEtudiant->Diplome_etat)}}">VOIR</a></td>
                                            @else
                                            <td class="text-center text-danger">Non disponible</td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <td class="text-center">4</td>
                                            <td class="text-center">Bulletin</td>
                                            <td class="text-center">{{$etudiant->etudiant->dossierEtudiant->Bulletin}}</td>
                                            <td class="text-center"><a class="btn btn-primary" href="{{asset('/storage/students_doc/'.$etudiant->etudiant->dossierEtudiant->Diplome_etat)}}">VOIR</a></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">5</td>
                                            <td class="text-center">Recommandation</td>
                                            @if (!empty($etudiant->etudiant->dossierEtudiant->recommandation))
                                            <td class="text-center">{{$etudiant->etudiant->dossierEtudiant->recommandation}}</td>
                                            <td class="text-center"><a class="btn btn-primary" href="{{asset('/storage/students_doc/'.$etudiant->etudiant->dossierEtudiant->recommandation)}}">VOIR</a></td>
                                                
                                            @else
                                            <td class="text-center text-danger">Non disponible</td>
                                            @endif
                                           
                                        </tr>
                    
                    
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                
                            </div>
                        </div>
                     
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
                      
                    @include('livewire.etudiant.etudesRealiser')

                    </div>
                   
                </div>
            </div>
            <div class="card-footer">
                <div class=" d-flex justify-content-between">
                    <a name="" id="" class="btn btn-primary" href="{{route('formulaire',[$etudiant->etudiant->matricule_etudiant])}}" role="button">TELECHARGE</a>
                    @if($etudiant->statut_etudiant == 0)
                    <button wire:click="changeStatut({{$etudiant->id_inscrit}})" class="btn btn-success" role="button">CONFIRMER L'ADMISSION
                       
                    </button> 

                    <button wire:click="confirmDelete({{$etudiant->etudiant->id}},'{{$etudiant->etudiant->Nom}}')" class="btn btn-danger" role="button">Delete
                       
                    </button> 
                    @else
                    <a name="" id="" class="btn btn-success" href="#"role="button">DEJA ADMIS</a> 
                   
                    @endif
                   
                    <a name="" id="" class="btn btn-warning" href="{{route('users.etudiant')}}" role="button">RETOUR</a>

                </div>
               

            </div>
            <!-- /.card -->
        </div>
    </div>
    @endforeach

</div>

<script>
    window.addEventListener('showSuccessMessage', event=> {
    Swal.fire({
        
        icon:'success',
       
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
            @this.deleteEtudiant(event.detail.message.data.id)
        }
    })
});

</script>  


