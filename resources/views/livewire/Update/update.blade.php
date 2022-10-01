<div class="row P-2 m-4">
    <div class="col-12 col-sm wide-font-12">
        <div class="card card-primary card-outline card-outline-tabs">
            <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link @if(countDocument($etudiants->matricule_etudiant) == true) active @endif"
                            id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab"
                            aria-controls="custom-tabs-four-home"
                            aria-selected=" @if(countDocument($etudiants->matricule_etudiant) == true) true @endif">
                            PROFIL</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(countDocument($etudiants->matricule_etudiant)== false) active @endif"
                            id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile"
                            role="tab" aria-controls="custom-tabs-four-profile"
                            aria-selected=" @if(countDocument($etudiants->matricule_etudiant) == false) true @endif">DOCUMENT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill"
                            href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages"
                            aria-selected="false">ETUDES REALISER</a>
                    </li>
                    @if(!empty($etudiants->ecclesiaste->institut))
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-four-eglise-tab" data-toggle="pill"
                            href="#custom-tabs-four-eglise" role="tab" aria-controls="custom-tabs-four-eglise"
                            aria-selected="false">Etat Religieux</a>
                    </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-four-paiement-tab" data-toggle="pill"
                            href="#custom-tabs-four-paiement" role="tab" aria-controls="custom-tabs-four-paiement"
                            aria-selected="false">PAIEMENT</a>
                    </li>


                </ul>
            </div>
            <div class="card-body" style="min-height: 500px;">
                <div class="tab-content" id="custom-tabs-four-tabContent">
                    <div class="tab-pane fade  @if(countDocument($etudiants->matricule_etudiant) == true) active show @endif "
                        id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">

                        <div class="row">
                            <div class="col-md-3 border-right">
                                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img
                                        class="rounded-circle mt-5" width="150px"
                                        src="{{asset('/storage/students_images/'.$etudiants->Photo)}}"><span
                                        class="font-weight-bold">{{$etudiants->Prenom}}</span><span
                                        class="text-black-50">{{$etudiants->Email}}</span><span> </span></div>

                            </div>
                            <div class="col-md-5 border-right">
                                <div class="p-3 py-5">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h4 class="text-right">Profile</h4>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-6"><label class="labels">Matricule</label><input type="text"
                                                class="form-control form-control-sm wide-font" placeholder="first name"
                                                value="{{$etudiants->matricule_etudiants}}"></div>
                                        <div class="col-md-6"><label class="labels">Nom</label><input type="text"
                                                class="form-control form-control-sm wide-font" placeholder="surname"
                                                value="{{$etudiants->Nom}}"></div>
                                        <div class="col-md-6"><label class="labels">Postnom</label><input type="text"
                                                class="form-control form-control-sm wide-font" placeholder="surname"
                                                value="{{$etudiants->Postnom}}"></div>
                                        <div class="col-md-6"><label class="labels">Prenom</label><input type="text"
                                                class="form-control form-control-sm wide-font" placeholder="first name"
                                                value="{{$etudiants->Prenom}}"></div>

                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-6"><label class="labels">Genre</label><input type="text"
                                                class="form-control form-control-sm wide-font"
                                                placeholder="enter phone number" value="{{$etudiants->Genre}}"></div>
                                        <div class="col-md-6"><label class="labels">Nationalite</label><input
                                                type="text" class="form-control form-control-sm wide-font"
                                                placeholder="enter address line 1" value="{{$etudiants->Nationalite}}">
                                        </div>
                                        <div class="col-md-6"><label class="labels">Etat-civil</label><input type="text"
                                                class="form-control form-control-sm wide-font"
                                                placeholder="enter address line 2" value="{{$etudiants->Etat_civil}}">
                                        </div>


                                        <div class="col-md-6"><label class="labels">Telephone</label><input type="text"
                                                class="form-control form-control-sm wide-font"
                                                placeholder="enter address line 2" value="{{$etudiants->Telephone}}">
                                        </div>

                                        <div class="col-md-12"><label class="labels">Email</label><input type="text"
                                                class="form-control form-control-sm wide-font" placeholder="education"
                                                value="{{$etudiants->Email}}"></div>
                                        <div class="col-md-12"><label class="labels">Adresse Etudiants</label><input
                                                type="text" class="form-control form-control-sm wide-font"
                                                placeholder="enter address line 2"
                                                value="{{$etudiants->Adresse_etudiants['Avenue']}},{{$etudiants->Adresse_etudiants['Commune']}}">
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-12"><label class="labels">Lieu Naissance</label><input
                                                type="text" class="form-control form-control-sm wide-font"
                                                placeholder="country" value="{{$etudiants->Lieu_naiss}}"></div>
                                        <div class="col-md-12"><label class="labels">Date Naissance</label><input
                                                type="text" class="form-control form-control-sm wide-font"
                                                value="{{$etudiants->Date_naiss}}" placeholder="state"></div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="p-3 py-5">
                                    <div class="d-flex justify-content-between align-items-center experience">
                                        <h4 class="labels">PARENT ETUDIANTs</h4>
                                    </div>
                                    <div class="col-md-12"><label class="labels">Nom Pere</label><input type="text"
                                            class="form-control form-control-sm wide-font" placeholder="experience"
                                            value="{{$etudiants->Nom_Pere}}"></div>
                                    <div class="col-md-12"><label class="labels">Nom Mere</label><input type="text"
                                            class="form-control form-control-sm wide-font"
                                            placeholder="additional details" value="{{$etudiants->Nom_mere}}"></div>
                                    <div class="col-md-12"><label class="labels">Localisation</label><input type="text"
                                            class="form-control form-control-sm wide-font"
                                            placeholder="additional details"
                                            value="{{$etudiants->Localisation_parent['Province']}}{{$etudiants->Localisation_parent['District']}}{{$etudiants->Localisation_parent['Commune']}}">
                                    </div>


                                </div>
                                <div class="row p-2 py-3">
                                    <div class="col-md-6"><label class="labels">Nom Tuteur</label><input type="text"
                                            class="form-control form-control-sm wide-font" placeholder="experience"
                                            value="{{$etudiants->tuteur['nom_tuteur']}}"></div>
                                    <div class="col-md-6"><label class="labels">Telephone</label><input type="text"
                                            class="form-control form-control-sm wide-font"
                                            placeholder="additional details"
                                            value="{{$etudiants->tuteur['tel_tuteur']}}"></div>
                                    <div class="col-md-12"><label class="labels">Adresse</label><input type="text"
                                            class="form-control form-control-sm wide-font"
                                            placeholder="additional details"
                                            value="{{$etudiants->tuteur['Avenue']}} Q/{{$etudiants->tuteur['Quartier']}} C/{{$etudiants->tuteur['Commune']}}">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="tab-pane fade  @if(countDocument($etudiants->matricule_etudiant) == false) active show @endif"
                        id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                        <div>
                            <div class="card">
                                <div class="card-header card-primary card-outline d-flex align-items-center">
                                    <h3 class="card-title flex-grow-1"><i class="fa fa-users" aria-hidden="true"></i>
                                        Document
                                    </h3>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0" style="height: 400px;">

                                <table class="table table-head-fixed text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="width:5%">N</th>
                                            <th class="text-center" style="width:25%">Document</th>
                                            <th class="text-center" style="width:20%">Name</th>
                                            <th class="text-center" style="width:20%">Path</th>
                                            <th class="text-center" style="width:20%">Change</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center">1</td>
                                            <td class="text-center">Aptitude physique</td>
                                            @if (!empty($etudiants->dossierEtudiant->Aptitude_physique))
                                            <td class="text-center">{{$etudiants->dossierEtudiant->Aptitude_physique}}
                                            </td>
                                            <td class="text-center"><a class="btn  btn-outline-primary"
                                                    href="{{asset('/storage/students_doc/'.$etudiants->dossierEtudiant->Aptitude_physique)}}">VOIR</a>
                                            </td>
                                            <td class="text-center"> </td>
                                            @else
                                            <td class="text-center text-danger">Non disponible</td>
                                            <td class="text-center"><a class="btn  btn-outline-primary" href="">VOIR</a>
                                            </td>
                                            <td class="text-center"> <input type="file"
                                                    class="form-control form-control-sm"
                                                    wire:model.debounce.300ms="document.Aptitude_physique">
                                                <span class="text-danger">@error('document.Aptitude_physique')
                                                    {{$message}}@enderror</span>
                                                <div wire:loading class="spinner-border spinner-border-sm float-right"
                                                    role="status">
                                                    <span class="sr-only">loading</span>
                                                </div>
                                                <div wire:loading.remove> <button class="btn btn-outline-primary"><i
                                                            class="fas fa-edit"
                                                            wire:click="updateCertificat()"></i></button></div>


                                            </td>
                                            @endif


                                        </tr>
                                        <tr>
                                            <td class="text-center">2</td>
                                            <td class="text-center">Certificat Naissance</td>
                                            @if (!empty($etudiants->dossierEtudiant->Certificat_naiss))
                                            <td class="text-center">{{$etudiants->dossierEtudiant->Certificat_naiss}}
                                            </td>
                                            <td class="text-center"><a class="btn  btn-outline-primary"
                                                    href="{{asset('/storage/students_doc/'.$etudiants->dossierEtudiant->Certificat_naiss)}}">VOIR</a>
                                            </td>
                                            <td class="text-center"> </td>
                                            @else
                                            <td class="text-center text-danger">Non disponible</td>
                                            <td class="text-center"><a class="btn  btn-outline-primary" href="">VOIR</a>
                                            </td>
                                            <td class="text-center"> <input type="file"
                                                    class="form-control form-control-sm"
                                                    wire:model.debounce.300ms="document.Certificat_naiss">
                                                <span class="text-danger">@error('document.Certificat_naiss')
                                                    {{$message}}@enderror</span>
                                                <div wire:loading class="spinner-border spinner-border-sm float-right"
                                                    role="status">
                                                    <span class="sr-only">loading</span>
                                                </div>
                                                <div wire:loading.remove> <button class="btn btn-outline-primary"><i
                                                            class="fas fa-edit"
                                                            wire:click="updateCertificat()"></i></button></div>


                                            </td>

                                            @endif

                                        </tr>
                                        <tr>
                                            <td class="text-center">3</td>
                                            <td class="text-center">Diplome d'etat</td>
                                            @if (!empty($etudiants->dossierEtudiant->Diplome_etat))
                                            <td class="text-center">{{$etudiants->dossierEtudiant->Diplome_etat}}</td>
                                            <td class="text-center"><a class="btn  btn-outline-primary"
                                                    href="{{asset('/storage/students_doc/'.$etudiants->dossierEtudiant->Diplome_etat)}}">VOIR</a>
                                            </td>
                                            <td class="text-center"> </td>
                                            @else
                                            <td class="text-center text-danger">Non disponible</td>
                                            <td class="text-center"><a class="btn  btn-outline-primary" href="">VOIR</a>
                                            </td>
                                            <td class="text-center"> <input type="file"
                                                    class="form-control form-control-sm"
                                                    wire:model.debounce.300ms="document.Diplome_etat">
                                                <span class="text-danger">@error('document.Diplome_etat')
                                                    {{$message}}@enderror</span>
                                                <div wire:loading class="spinner-border spinner-border-sm float-right"
                                                    role="status">
                                                    <span class="sr-only">loading</span>
                                                </div>
                                                <div wire:loading.remove> <button class="btn btn-outline-primary"><i
                                                            class="fas fa-edit"
                                                            wire:click="updateBulletin()"></i></button></div>


                                            </td>
                                            @endif

                                        </tr>
                                        <tr>
                                            <td class="text-center">4</td>
                                            <td class="text-center">Bulletin</td>
                                            @IF(!empty($etudiants->dossierEtudiant->Bulletin))
                                            <td class="text-center">{{$etudiants->dossierEtudiant->Bulletin}}</td>
                                            <td class="text-center"><a class="btn  btn-outline-primary"
                                                    href="{{asset('/storage/students_doc/'.$etudiants->dossierEtudiant->Diplome_etat)}}">VOIR</a>
                                            </td>
                                            <td class="text-center"></td>
                                            @else
                                            <td class="text-center text-danger">Non disponible</td>
                                            <td class="text-center"><a class="btn  btn-outline-primary" href="">VOIR</a>
                                            </td>
                                            <td class="text-center"> <input type="file"
                                                    class="form-control form-control-sm"
                                                    wire:model.debounce.300ms="document.bulletin">
                                                <span class="text-danger">@error('document.bulletin')
                                                    {{$message}}@enderror</span>
                                                <div wire:loading class="spinner-border spinner-border-sm float-right"
                                                    role="status">
                                                    <span class="sr-only">loading</span>
                                                </div>
                                                <div wire:loading.remove> <button class="btn btn-outline-primary"><i
                                                            class="fas fa-edit"
                                                            wire:click="updateBulletin()"></i></button></div>


                                            </td>
                                            @endif


                                        </tr>
                                        <tr>
                                            <td class="text-center">5</td>
                                            <td class="text-center">Recommandation</td>
                                            @if (!empty($etudiants->dossierEtudiant->recommandation))
                                            <td class="text-center">{{$etudiants->dossierEtudiant->recommandation}}</td>
                                            <td class="text-center"><a class="btn btn-outline-primary"
                                                    href="{{asset('/storage/students_doc/'.$etudiants->dossierEtudiant->recommandation)}}">VOIR</a>
                                            </td>
                                            <td class="text-center"></td>
                                            @else
                                            <td class="text-center text-danger">Non disponible</td>
                                            <td class="text-center"><a class="btn btn-warning" href="">VOIR</a></td>
                                            <td class="text-center"> <input type="file"
                                                    class="form-control form-control-sm"
                                                    wire:model.debounce.300ms="document">
                                                <span class="text-danger">@error('document')
                                                    {{$message}}@enderror</span>
                                                <div wire:loading wire:target="document"
                                                    class="spinner-border spinner-border-sm float-right" role="status">
                                                    <span class="sr-only">loading</span>
                                                </div>
                                                <div wire:loading.remove> <button class="btn btn-outline-primary"><i
                                                            class="fas fa-edit" wire:click="updateRecom()"></i></button>
                                                </div>


                                            </td>
                                            @endif


                                        </tr>


                                    </tbody>
                                </table>


                            </div>
                            <form wire:submit.prevent="dossierUpdate">
                                <div class="card-footer">



                                </div>
                            </form>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel"
                        aria-labelledby="custom-tabs-four-messages-tab">

                        @include('livewire.Update.etudesRealiser')

                    </div>
                    @if(!empty($etudiants->ecclesiaste->institut))
                    <div class="tab-pane fade" id="custom-tabs-four-eglise" role="tabpanel"
                        aria-labelledby="custom-tabs-four-eglise-tab">

                        <div>
                            <div class="row mt-2">
                                @if(!empty($etudiants->ecclesiaste->institut))
                                <div class="col-md-6"><label class="labels">Institut</label><input type="text"
                                        class="form-control form-control-sm wide-font" placeholder="first name"
                                        value="{{$etudiants->ecclesiaste->institut}}"></div>
                                <div class="col-md-6"><label class="labels">SIGLE</label><input type="text"
                                        class="form-control form-control-sm wide-font" placeholder="surname"
                                        value="{{$etudiants->ecclesiaste->sigle}}"></div>
                                <div class="col-md-6"><label class="labels">ETAT</label><input type="text"
                                        class="form-control form-control-sm wide-font" placeholder="surname"
                                        value="{{$etudiants->ecclesiaste->etat}}"></div>
                                @endif
                            </div>
                        </div>

                    </div>
                    @endif
                    <div class="tab-pane fade" id="custom-tabs-four-paiement" role="tabpanel"
                        aria-labelledby="custom-tabs-four-paiement-tab">

                        <div>
                            <div>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla tempore libero molestias,
                                suscipit, deleniti saepe distinctio assumenda doloribus illum cupiditate reiciendis
                                dolor sunt iusto. Ducimus doloribus sunt sequi recusandae incidunt.
                                <a href="{{route('checkout',$matricule)}}" class="btn btn-outline-primary">Proceder au
                                    paiement de frais</a>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
            <div class="card-footer">
                <div class=" d-flex justify-content-between">
                    <a name="" id="" class="btn  btn-outline-primary"
                        href="{{route('formulaire',[$etudiants->matricule_etudiant])}}" role="button">TELECHARGE</a>


                    <a name="" id="" class="btn btn-warning" href="" role="button">RETOUR</a>

                </div>


            </div>
            <!-- /.card -->
        </div>
    </div>
</div>