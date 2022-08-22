<div>
    @if($currentPage == PAGEEDIT)

    @include('livewire.inscription.pageAccueil')

    @endif

    @if($currentPage ==PAGELIST)

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
                    @include('livewire.inscription.identity')
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
                                                wire:model="etudiant.nom_pere">
                                            <span class="text-danger">@error('etudiant.nom_pere')
                                                {{$message}}@enderror</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="" class="form-label">Nom Du mere</label>
                                            <input type="text" class="form-control form-control-sm" placeholder=""
                                                wire:model="etudiant.nom_mere">
                                            <span class="text-danger">@error('etudiant.nom_mere')
                                                {{$message}}@enderror</span>
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
                                                wire:model="etudiant.nom_tuteur">
                                            <span class="text-danger">@error('etudiant.nom_tuteur')
                                                {{$message}}@enderror</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="" class="form-label">Telephone</label>
                                            <input type="text" class="form-control form-control-sm" placeholder=""
                                                wire:model="etudiant.tel_tuteur">
                                            <span class="text-danger">@error('etudiant.tel_tuteur')
                                                {{$message}}@enderror</span>
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

                    @include('livewire.inscription.etudesRealiser')
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
                    @include('livewire.inscription.uploadFile')

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
                    <button type="submit" id="submitId" class="btn btn btn-primary"
                        wire:loading.attr="disabled">SOUMETTRE</button>
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
        @endif

</div>