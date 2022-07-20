@section('css')
  <link rel="stylesheet" href="{{asset('styleProfile.css')}}">  
@endsection
<div>
    @foreach ($etudiants as $etudiant)
        
    <div class="col-12 col-sm-12">
        <div class="card card-primary card-outline card-outline-tabs">
            <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true"> Profil</a>
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
            <div class="card-body" style="min-height: 500px;">
                <div class="tab-content" id="custom-tabs-four-tabContent">
                    <div class="tab-pane fade active show" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">

                            <div class="row">
                            <div class="col-md-3 border-right">
                                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="{{asset('/storage/students_images/'.$etudiant->etudiant->Photo)}}"><span class="font-weight-bold">Edogaru</span><span class="text-black-50">edogaru@mail.com.my</span><span> </span></div>
                    
                            </div>
                            <div class="col-md-5 border-right">
                                <div class="p-3 py-5">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h4 class="text-right">Profile Settings</h4>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-6"><label class="labels">Matricule</label><input type="text" class="form-control form-control-sm" placeholder="first name" value="{{$etudiant->etudiant->matricule_etudiant}}"></div>
                                        <div class="col-md-6"><label class="labels">Nom</label><input type="text" class="form-control form-control-sm"  placeholder="surname"value="{{$etudiant->etudiant->Nom}}"></div>
                                        <div class="col-md-6"><label class="labels">Postnom</label><input type="text" class="form-control form-control-sm"  placeholder="surname" value="{{$etudiant->etudiant->Postnom}}"></div>
                                        <div class="col-md-6"><label class="labels">Prenom</label><input type="text" class="form-control form-control-sm" placeholder="first name" value="{{$etudiant->etudiant->Prenom}}"></div>
                                        
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-6"><label class="labels">Genre</label><input type="text" class="form-control form-control-sm" placeholder="enter phone number" value="{{$etudiant->etudiant->Genre}}"></div>
                                        <div class="col-md-6"><label class="labels">Nationalite</label><input type="text" class="form-control form-control-sm" placeholder="enter address line 1" value="{{$etudiant->etudiant->Nationalite}}"></div>
                                        <div class="col-md-6"><label class="labels">Etat-civil</label><input type="text" class="form-control form-control-sm" placeholder="enter address line 2" value="{{$etudiant->etudiant->Etat_civil}}"></div>
                                    
                                       
                                        <div class="col-md-6"><label class="labels">Telephone</label><input type="text" class="form-control form-control-sm" placeholder="enter address line 2" value="{{$etudiant->etudiant->Telephone}}"></div>
                        
                                        <div class="col-md-12"><label class="labels">Email</label><input type="text" class="form-control form-control-sm" placeholder="education" value="{{$etudiant->etudiant->Email}}"></div>
                                        <div class="col-md-12"><label class="labels">Adresse Etudiant</label><input type="text" class="form-control form-control-sm" placeholder="enter address line 2" value="{{$etudiant->etudiant->Adresse_etudiant['Avenue']}},{{$etudiant->etudiant->Adresse_etudiant['Commune']}}"></div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-12"><label class="labels">Lieu Naissance</label><input type="text" class="form-control form-control-sm" placeholder="country" value="{{$etudiant->etudiant->Lieu_naiss}}" ></div>
                                        <div class="col-md-12"><label class="labels">Date Naissance</label><input type="text" class="form-control form-control-sm" value="{{$etudiant->etudiant->Date_naiss}}" placeholder="state"></div>
                                    </div>
                                    <div class="mt-2 text-center"><button class="btn btn-primary profile-button" type="button">Save Profile</button></div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="p-3 py-5">
                                    <div class="d-flex justify-content-between align-items-center experience"><span class="labels">PARENT ETUDIANT</span></div>
                                    <div class="col-md-12"><label class="labels">Nom Pere</label><input type="text" class="form-control form-control-sm" placeholder="experience" value="{{$etudiant->etudiant->Nom_Pere}}"></div> 
                                    <div class="col-md-12"><label class="labels">Nom Mere</label><input type="text" class="form-control form-control-sm" placeholder="additional details" value="{{$etudiant->etudiant->Nom_mere}}"></div>
                                    <div class="col-md-12"><label class="labels">Localisation</label><input type="text" class="form-control form-control-sm" placeholder="additional details" value="{{$etudiant->etudiant->Localisation_parent['Province']}}{{$etudiant->etudiant->Localisation_parent['District']}}{{$etudiant->etudiant->Localisation_parent['Commune']}}"></div>
                                    
                                
                                </div>
                                <div class="row p-2 py-3">
                                    <div class="d-flex justify-content-between align-items-center experience"><span class="labels">TUTEUR ETUDIANT</span></div>
                                    <div class="col-md-6"><label class="labels">Nom Tuteur</label><input type="text" class="form-control form-control-sm" placeholder="experience" value="{{$etudiant->etudiant->tuteurEtudiant->Nom_tuteur}}"></div> 
                                    <div class="col-md-6"><label class="labels">Telephone</label><input type="text" class="form-control form-control-sm" placeholder="additional details" value="{{$etudiant->etudiant->tuteurEtudiant->Telephone_tuteur}}"></div>
                                    <div class="col-md-12"><label class="labels">Adresse</label><input type="text" class="form-control form-control-sm" placeholder="additional details" value="{{$etudiant->etudiant->tuteurEtudiant->Adresse_tuteur['Avenue']}} Q/{{$etudiant->etudiant->tuteurEtudiant->Adresse_tuteur['Quartier']}} C/{{$etudiant->etudiant->tuteurEtudiant->Adresse_tuteur['Commune']}}"></div>
                                  
                                </div>
                        </div></div>
    
                    </div>    

                    <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                        dddddddddd
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
                      
                       dddddddddddddddd    
                            <!-- /.card-body -->
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-four-settings" role="tabpanel" aria-labelledby="custom-tabs-four-settings-tab">
                        Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus turpis ac, ornare sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis vulputate. Morbi euismod molestie tristique. Vestibulum consectetur dolor a vestibulum pharetra. Donec interdum placerat urna nec pharetra. Etiam eget dapibus orci, eget aliquet urna. Nunc at consequat diam. Nunc et felis ut nisl commodo dignissim. In hac habitasse platea dictumst. Praesent imperdiet accumsan ex sit amet facilisis.
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class=" d-flex justify-content-between">
                    <a name="" id="" class="btn btn-primary" href="#" role="button">TELECHARGE</a>
                    <a name="" id="" class="btn btn-success" href="#" wire:click="statusChange('{{$etudiant->id_inscrit}}')" role="button">CONFIRMER L'ADMISSION</a>
                    <a name="" id="" class="btn btn-warning" href="{{route('users.etudiant')}}" role="button">RETOUR</a>


                </div>
               

            </div>
            <!-- /.card -->
        </div>
    </div>
    @endforeach

</div>
