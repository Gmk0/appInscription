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
                        <input type="text" class="form-control form-control-sm @error('Postnom') is-invalid @enderror" placeholder=""
                               wire:model="Postnom">
                        <span class="text-danger">@error('Postnom') {{$message}}@enderror</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name" class="form-label">PRENOM<span>*</span></label>
                        <input type="text" class="form-control form-control-sm @error('prenom') is-invalid @enderror" placeholder=""
                               wire:model="prenom">
                        <span class="text-danger">@error('prenom') {{$message}}@enderror</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">

                        <label for="" class="form-label">GENRE<span>*</span></label>
                        <select class="form-control form-control-sm @error('genre') is-invalid @enderror" name="" id=""
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
                        <select class="form-control form-control-sm @error('etat_civil') is-invalid @enderror"
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
                        <input type="text" class="form-control form-control-sm @error('nationalite') is-invalid @enderror" placeholder=""
                               wire:model="nationalite">
                        <span class="text-danger">@error('nationalite') {{$message}}@enderror</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name" class="form-label">Lieu De Naissance<span>*</span></label>
                        <input type="text" class="form-control form-control-sm @error('lieu_naiss') is-invalid @enderror" placeholder=""
                               wire:model="lieu_naiss">
                        <span class="text-danger">@error('lieu_naiss') {{$message}}@enderror</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name" class="form-label">Date Naissance<span>*</span></label>
                        <input type="date" class="form-control form-control-sm @error('date_naiss') is-invalid @enderror" placeholder=""
                               wire:model="date_naiss">
                        <span class="text-danger">@error('date_naiss') {{$message}}@enderror</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name" class="form-label">Adresse Mail<span>*</span></label>
                        <input type="email" class="form-control form-control-sm @error('email') is-invalid @enderror" placeholder=""
                               wire:model="email">
                        <span class="text-danger">@error('email') {{$message}}@enderror</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name" class="form-label">Telephone<span>*</span></label>
                        <input type="text" class="form-control form-control-sm @error('telephone') is-invalid @enderror" placeholder=""
                               wire:model="telephone">
                        <span class="text-danger">@error('telephone') {{$message}}@enderror</span>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="name" class="form-label">Adresse<span>*</span></label>
                    <div class="input-group">

                        <input type="text" class="form-control form-control-sm @error('adresse.Numero') is-invalid @enderror" placeholder="N"
                               wire:model="adresse.Numero">
                        <input type="text" class="form-control form-control-sm @error('adresse.Avenue') is-invalid @enderror" placeholder="Avenue"
                               wire:model="adresse.Avenue">
                        <input type="text" class="form-control form-control-sm @error('adresse.Quartier') is-invalid @enderror"
                               placeholder="Quartier" wire:model="adresse.Quartier">
                        <input type="text" class=" form-control form-control-sm @error('adresse.Commune') is-invalid @enderror"
                               placeholder="Commune" wire:model="adresse.Commune">

                    </div>
                    <span class="text-danger">@error('adresse.Avenue') {{$message}}@enderror</span>
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
                        <input type="text" class="form-control form-control-sm " placeholder=""
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