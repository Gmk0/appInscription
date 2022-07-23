<div>
    @if(date('m') < 10 && date('m')>= 6 )
        @if(Session::has('status'))
            <div class="alert alert-danger" role="alert">
                <button type="button" class="close primary" data-dismiss="alert" aria-label="close">
                    <span aria-label="true">&times;</span>
                </button>
                <p> {{Session::get('status')}}</p>
                {{---Session::put('message',null)---}}
            </div>

        @endif
        <form wire:submit.prevent="register" action="" enctype="multipart/form-data"
              onsubmit="if(document.getElementById('file').value==='')return false">
            <div id="box-inscription" class="row">
                <div id="box-step" class="col-md-12">
                    <h2 class="text-center">INSCRIPTION</h2>
                    <hr>
                    {{-- Step one --}}
                    @if($currentStep == 1)
                        <div class="step-one">
                            <div class="card">
                                <div class="card-header bg-secondary text-white">Step 1/4 Personnal identity </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name" class="form-label">NOM <span>*</span></label>
                                                <input type="text" class="form-control form-control-sm @error('nom') is-invalid @enderror" placeholder=""
                                                       wire:model="nom">
                                                <span class="text-danger">@error('nom') {{$message}}@enderror</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name" class="form-label">POST-NOM<span>*</span></label>
                                                <input type="text" class="form-control form-control-sm" placeholder=""
                                                       wire:model="Postnom">
                                                <span class="text-danger">@error('Postnom') {{$message}}@enderror</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name" class="form-label">PRENOM<span>*</span></label>
                                                <input type="text" class="form-control form-control-sm" placeholder=""
                                                       wire:model="prenom">
                                                <span class="text-danger">@error('prenom') {{$message}}@enderror</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">

                                                <label for="" class="form-label">GENRE<span>*</span></label>
                                                <select class="form-control form-control-sm" name="" id=""
                                                        wire:model="genre">
                                                    <option Selected>--Gender--</option>
                                                    <option value="male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                                <span class="text-danger">@error('genre') {{$message}}@enderror</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">

                                                <label for="" class="form-label">ETAT CIVIL<span>*</span></label>
                                                <select class="form-control form-control-sm select2"
                                                        wire:model="etat_civil">
                                                    <option Selected>--Etat Civil--</option>
                                                    <option value="Celibataire">Celibataire</option>
                                                    <option value="Marier">Marier</option>
                                                </select>
                                                <span class="text-danger">@error('etat_civil') {{$message}}@enderror</span>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name" class="form-label">Nationalite<span>*</span></label>
                                                <input type="text" class="form-control form-control-sm" placeholder=""
                                                       wire:model="nationalite">
                                                <span class="text-danger">@error('nationalite') {{$message}}@enderror</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name" class="form-label">Lieu De Naissance<span>*</span></label>
                                                <input type="text" class="form-control form-control-sm" placeholder=""
                                                       wire:model="lieu_naiss">
                                                <span class="text-danger">@error('lieu_naiss') {{$message}}@enderror</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name" class="form-label">Date Naissance<span>*</span></label>
                                                <input type="date" class="form-control form-control-sm" placeholder=""
                                                       wire:model="date_naiss">
                                                <span class="text-danger">@error('date_naiss') {{$message}}@enderror</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name" class="form-label">Adresse Mail<span>*</span></label>
                                                <input type="email" class="form-control form-control-sm" placeholder=""
                                                       wire:model="email">
                                                <span class="text-danger">@error('email') {{$message}}@enderror</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name" class="form-label">Telephone<span>*</span></label>
                                                <input type="text" class="form-control form-control-sm" placeholder=""
                                                       wire:model="telephone">
                                                <span class="text-danger">@error('telephone') {{$message}}@enderror</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name" class="form-label">Adresse<span>*</span></label>
                                            <div class="input-group">

                                                <input type="text" class="form-control form-control-sm" placeholder="N"
                                                       wire:model="adresse.Numero">
                                                <input type="text" class="form-control form-control-sm" placeholder="Avenue"
                                                       wire:model="adresse.Avenue">
                                                <input type="text" class="form-control form-control-sm"
                                                       placeholder="Quartier" wire:model="adresse.Quartier">
                                                <input type="text" class=" form-control form-control-sm"
                                                       placeholder="Commune" wire:model="adresse.Commune">

                                            </div>
                                            <span class="text-danger">@error('adresse') {{$message}}@enderror</span>
                                            <span class="text-danger">@error('adresse.Commune') {{$message}}@enderror</span>


                                        </div>
                                    </div>
                                    <hr>
                                    <h6>Pour les ecclésiastiques</h6>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="name" class="form-label">Institut Religieux</label>
                                                <input type="text" class="form-control form-control-sm" placeholder=""
                                                       wire:model="institut_rel">

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="name" class="form-label">Sigle</label>
                                                <input type="text" class="form-control form-control-sm" placeholder=""
                                                       wire:model="sigle">

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="name" class="form-label">Etat eclesial</label>

                                                <select class="form-control form-control-sm" name="" id=""
                                                        wire:model="etat_eclesial">
                                                    <option Selected>--Etat eclesial--</option>
                                                    <option>pretre</option>
                                                    <option>religieuse</option>
                                                </select>


                                            </div>
                                        </div>

                                    </div>


                                </div>
                            </div>
                        </div>
                    @endif
                    {{--setp deux--}}
                    @if($currentStep ==2)
                        <div class="step-two">
                            <div class="card">
                                <div class="card-header bg-secondary text-white">Step 2/4 contact En cas d'urgence</div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="" class="form-label">Nom Du Pere</label>
                                                <input type="text" class="form-control form-control-sm" placeholder=""
                                                       wire:model="nom_pere">
                                                <span class="text-danger">@error('nom_pere') {{$message}}@enderror</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="" class="form-label">Nom Du mere</label>
                                                <input type="email" class="form-control form-control-sm" placeholder=""
                                                       wire:model="nom_mere">
                                                <span class="text-danger">@error('nom_mere') {{$message}}@enderror</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="" class="form-label">Province D'origine des Parens</label>
                                                <input type="text" class="form-control form-control-sm" placeholder=""
                                                       wire:model="localisation_parent.Province">
                                                <span class="text-danger">@error('localisation_parent.Province')
                                                    {{$message}}@enderror</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="" class="form-label">District</label>
                                                <input type="text" class="form-control form-control-sm" placeholder=""
                                                       wire:model="localisation_parent.District">
                                                D<span class="text-danger">@error('localisation_parent.District')
                                                    {{$message}}@enderror</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="" class="form-label">Territoire/Commune</label>
                                                <input type="text" class="form-control form-control-sm" placeholder=""
                                                       wire:model="localisation_parent.Commune">
                                                <span class="text-danger">@error('localisation_parent.Commune')
                                                    {{$message}}@enderror</span>
                                            </div>
                                        </div>
                                    </div><br>
                                    <hr>
                                    <h6>PERSONNE A CONTACTER EN CAS D'URGENCE</h6>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="" class="form-label">Nom</label>
                                                <input type="text" class="form-control form-control-sm" placeholder=""
                                                       wire:model="nom_tuteur">
                                                <span class="text-danger">@error('nom_tuteur') {{$message}}@enderror</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="" class="form-label">Telephone</label>
                                                <input type="text" class="form-control form-control-sm" placeholder=""
                                                       wire:model="tel_tuteur">
                                                <span class="text-danger">@error('tel_tuteur') {{$message}}@enderror</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="name" class="form-label">Adresse</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control form-control-sm" placeholder="N"
                                                           wire:model="addresse_tuteur.Numero">
                                                    <input type="text" class="form-control form-control-sm"
                                                           placeholder="Avenue" wire:model="addresse_tuteur.Avenue">
                                                    <input type="text" class="form-control form-control-sm"
                                                           placeholder="Quartier" wire:model="addresse_tuteur.Quartier">
                                                    <input type="text" class=" form-control form-control-sm"
                                                           placeholder="Commune" wire:model="addresse_tuteur.Commune">
                                                </div>
                                                <span class="text-danger">@error('addresse_tuteur.Numero')
                                                    {{$message}}@enderror</span>
                                                <span class="text-danger">@error('addresse_tuteur.Avenue')
                                                    {{$message}}@enderror</span>
                                                <span class="text-danger">@error('addresse_tuteur.Quartier')
                                                    {{$message}}@enderror</span>
                                                <span class="text-danger">@error('addresse_tuteur.Commune')
                                                    {{$message}}@enderror</span>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endif
                    {{--step three--}}

                    @if($currentStep ==3)
                        <div class="step-three">
                            <div class="card">
                                <div class="card-header bg-secondary text-white">Step 3/4 Framework</div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="" class="form-label">Diplome d'acces a l'enseignement superieur
                                                    et universitaire</label>
                                                <input type="email" class="form-control form-control-sm" placeholder=""
                                                       wire:model="diplomeEtat.Diplome">

                                            </div>
                                            <span class="text-danger">@error('diplomeEtat.Diplome')
                                                {{$message}}@enderror</span>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="" class="form-label">Numero</label>
                                                <input type="text" class="form-control form-control-sm" placeholder=""
                                                       wire:model="diplomeEtat.Numero">
                                            </div>
                                            <span class="text-danger">@error('diplomeEtat.Numero')
                                                {{$message}}@enderror</span>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="" class="form-label">Option</label>
                                                <input type="text" class="form-control form-control-sm" placeholder=""
                                                       wire:model="diplomeEtat.option">
                                                <span class="text-danger">@error('diplomeEtat.Option')
                                                    {{$message}}@enderror</span>
                                            </div>
                                            <span class="text-danger">@error('diplomeEtat.option')
                                                {{$message}}@enderror</span>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="" class="form-label">Section</label>
                                                <input type="text" class="form-control form-control-sm" placeholder=""
                                                       wire:model="diplomeEtat.Section">

                                            </div>
                                            <span class="text-danger">@error('diplomeEtat.Section')
                                                {{$message}}@enderror</span>

                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="" class="form-label">Mention</label>
                                                <input type="text" class="form-control form-control-sm" placeholder=""
                                                       wire:model="diplomeEtat.Mention">
                                            </div>
                                            <span class="text-danger">@error('diplomeEtat.Mention')
                                                {{$message}}@enderror</span>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="" class="form-label">Delivre a </label>
                                                <input type="text" class="form-control form-control-sm" placeholder=""
                                                       wire:model="diplomeEtat.DelivreA">
                                                <span class="text-danger">@error('') {{$message}}@enderror</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="" class="form-label">en Date Du</label>
                                                <input type="date" class="form-control form-control-sm" placeholder=""
                                                       wire:model="diplomeEtat.DateDu">
                                                <span class="text-danger">@error('') {{$message}}@enderror</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="" class="form-label">Ecole</label>
                                                <input type="tel" class="form-control form-control-sm" placeholder=""
                                                       wire:model="diplomeEtat.ecole">
                                                <span class="text-danger">@error('diplomeEtat.Ecole')
                                                    {{$message}}@enderror</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="" class="form-label">Code</label>
                                                <input type="tel" class="form-control form-control-sm" placeholder=""
                                                       wire:model="diplomeEtat.Code">
                                                <span class="text-danger">@error('diplomeEtat.Code')
                                                    {{$message}}@enderror</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="" class="form-label">Province</label>
                                                <input type="tel" class="form-control form-control-sm" placeholder=""
                                                       wire:model="diplomeEtat.Province">
                                                <span class="text-danger">@error('diplomeEtat.Province')
                                                    {{$message}}@enderror</span>
                                            </div>
                                        </div>

                                    </div><br>
                                    <hr>
                                    <div class="table-responsive">
                                        <table class="tables table-bordered">
                                            <thead>
                                            <tr>
                                                <th style="padding-top:5px;" rowSpan="3">Annee</th>
                                                <th rowSpan="3">Institut</th>
                                                <th rowSpan="3">Faculte</th>
                                                <th rowSpan="3">option</th>
                                                <th rowSpan="3">Annee etudes</th>
                                                <th colspan="4">Resultat</th>
                                            </tr>
                                            <tr>
                                                <th colspan="2"> 1 er Session</th>
                                                <th colspan="2">2 e Session</th>
                                            </tr>
                                            <tr>
                                                <th colspan=""> Mention</th>
                                                <th colspan=""> %</th>
                                                <th colspan=""> Mention</th>
                                                <th colspan=""> %</th>
                                            </tr>
                                            </thead>
                                            @for($i =0; $i<4;$i++) <tbody>
                                            <tr style="width:30px;">
                                                <td>
                                                    <div class="input-pretend">
                                                        <input class="span4" type="text" placeholder="2010-2011"
                                                               wire:model="cursus_universitaire.anneeAc">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="input-pretend">
                                                        <input class="span4" type="text" placeholder="Institut"
                                                               wire:model="cursus_universitaire.institut">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="input-pretend">
                                                        <input class="span4" type="text" placeholder="Faculte"
                                                               wire:model="cursus_universitaire.faculte">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="input-pretend">
                                                        <input class="span4" type="text" placeholder="option"
                                                               wire:model="cursus_universitaire.option">
                                                    </div>
                                                </td>
                                                <td width="10%">
                                                    <div class="input-pretend">
                                                        <input class="span4" type="text" placeholder="2010-2011"
                                                               wire:model="cursus_universitaire.anneeEtudes">
                                                    </div>
                                                </td>
                                                <td width="5%">
                                                    <div class="input-pretend">
                                                        <select name="" id=""
                                                                wire:model="cursus_universitaire.mention1">>
                                                            <option value="D">D</option>
                                                            <option value="S">S</option>
                                                        </select>
                                                    </div>
                                                </td>
                                                <td width="7%">
                                                    <div class="input-pretend">
                                                        <input class="span4" type="text" placeholder="%"
                                                               wire:model="cursus_universitaire.percent1">
                                                    </div>
                                                </td>
                                                <td width="5%">
                                                    <div class="input-pretend">
                                                        <select name="" id=""
                                                                wire:model="cursus_universitaire.mention2">>
                                                            <option value="D">D</option>
                                                            <option value="S">S</option>
                                                        </select>
                                                    </div>
                                                </td>
                                                <td width="7%">
                                                    <div class="input-pretend">
                                                        <input class="span4" type="text" placeholder="%"
                                                               wire:model="cursus_universitaire.percent2">
                                                    </div>
                                                </td>
                                            </tr>
                                            </tbody>
                                            @endfor






                                        </table>

                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="" class="form-label">Diplome Obtenu</label>
                                                <input type="text" class="form-control form-control-sm">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="" class="form-label">Mention Obtenu</label>
                                                <input type="text" class="form-control form-control-sm">
                                            </div>
                                        </div>
                                    </div>




                                </div>
                            </div>
                        </div>

                    @endif
                    {{--Step four --}}
                    @if($currentStep==4)
                        <div class="step-four">
                            <div class="card">
                                <div class="card-header bg-secondary text-white">Step 4/5 -Document</div>
                                <div class="card-body">
                                    <p>je sollicite l'inscription en </p>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="" class="form-label">Faculte</label>
                                                <select class="form-control form-control-sm" name="" id=""
                                                        wire:model="faculte">
                                                    <option selected>--designation faculte--</option>
                                                    @foreach ($facultes as $fac)
                                                        <option value="{{$fac->id_faculte}}">{{$fac->designation_faculte}}
                                                        </option>

                                                    @endforeach

                                                </select>
                                                <span class="text-danger">@error('faculte') {{$message}}@enderror</span>
                                            </div>

                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="" class="form-label">Promotion</label>
                                                <select class="form-control form-control-sm select2" name="" id=""
                                                        wire:model="promotion">
                                                    <option selected> --promotion--</option>
                                                    @forelse ($promotions as $promo)
                                                        <option value="{{$promo->id_promotion}}">
                                                            {{$promo->designation_promotion}}</option>
                                                    @empty
                                                        <option> --promotion--</option>
                                                    @endforelse


                                                </select>
                                                <span class="text-danger">@error('promotion') {{$message}}@enderror</span>
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="" class="form-label">Annee Academique</label>
                                                <select class="form-control form-control-sm" name="" id=""
                                                        wire:model="annee_academique">
                                                    <option selected> --annee Academique--</option>
                                                    @forelse ($anneeAcademique as $annee)
                                                        <option value="{{$annee->id_annee}}">{{$annee->designation_annee}}
                                                        </option>
                                                    @empty

                                                    @endforelse

                                                </select>

                                                <span class="text-danger">@error('annee_academique')
                                                    {{$message}}@enderror</span>
                                            </div>
                                        </div>

                                    </div>
                                    <br>
                                    <h6>Je Desire m'inscrire en Qualite de </h6>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="" class="form-label"></label>
                                            <select class="form-control form-control-sm" name="" id="">
                                                <option selected>--Qualite--</option>
                                                <option>Etudiant libre</option>
                                                <option>Etudiant regulier</option>

                                            </select>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    @endif
                    {{-- Step Five--}}
                    @if($currentStep==5)
                        <div class="step-five">
                            <div class="card">
                                <div class="card-header bg-secondary text-white">Step 5/5 -Attachements</div>
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="" class="form-label">Photo Passport Recent</label>
                                                <input type="file" class="form-control" wire:model="photo">
                                            </div>
                                            @if($photo)
                                                <img src="{{$photo->temporaryUrl()}}" alt="" width="30" height="30">
                                            @endif
                                            <span class="text-danger">@error('photo') {{$message}}@enderror</span>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="" class="form-label">aptitute_physique</label>
                                                <input type="file" class="form-control" wire:model="aptitude_physique"
                                                       id="files">
                                            </div>
                                            <div wire:loading wire:target="aptitude_physique">uploading..</div>
                                            <span class="text-danger">@error('aptitude_physique')
                                                {{$message}}@enderror</span>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="" class="form-label">Diplome Etat</label>
                                                <input type="file" class="form-control" wire:model="diplome_etat_doc"
                                                       id="file">
                                            </div>
                                            <div wire:loading wire:target="diplome_etat_doc">uploading..</div>
                                            <span class="text-danger">@error('diplome_etat_doc')
                                                {{$message}}@enderror</span>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="" class="form-label">Certificat Naissance</label>
                                                <input type="file" class="form-control" wire:model="certificat_naiss"
                                                       id="file">
                                            </div>
                                            <div wire:loading wire:target="certificat_naiss">uploading..</div>
                                            <span class="text-danger">@error('certificat_naiss')
                                                {{$message}}@enderror</span>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="" class="form-label">Bulletin</label>
                                                <input type="file" class="form-control" wire:model="bulletin" id="file">
                                            </div>
                                            <div wire:loading wire:target="bulletin">uploading..</div>
                                            <span class="text-danger">@error('bulletin') {{$message}}@enderror</span>
                                        </div>

                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label for="terms" class="d-block">
                                            <input type="checkbox" name="terms" id="terms" wire:model="terms"> You must
                                            agree with
                                            our <a href="#">Terms and condition</a>
                                            <span class="text-danger">@error('terms') {{$message}}@enderror</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endif

                    {{--End Box --}}
                </div>
                <div style="position: relative; padding: 0 50px;"
                     class="action-buttons d-flex justify-content-between bg-white pt-1 pb-4">
                    @if($currentStep ==1)
                        <div></div>
                    @endif
                    @if($currentStep == 2 ||$currentStep == 3|| $currentStep == 4 || $currentStep == 5)
                        <button type="button" class="btn btn btn-secondary" wire:click="decreaseStep()">Back</button>
                    @endif
                    @if($currentStep == 1||$currentStep == 2|| $currentStep == 3||$currentStep == 4)
                        <button type="button" class="btn btn btn-primary" wire:click="increaseStep()">NEXT</button>
                    @endif

                    @if($currentStep == 5)
                        <button type="submit" id="submitId" class="btn btn btn-primary">SOUMETTRE</button>
                    @endif
                </div>

            </div>
        </form>
    @else
        <div id="box-inscription" class="row">
            <div id="box-step" class="col-md-12">
                <h2 class="text-center">INSCRIPTION</h2>
                <hr>
                <h5>Les inscription ne sont pas encore disponible</h5>
            </div>
        </div>
    @endif

</div>
