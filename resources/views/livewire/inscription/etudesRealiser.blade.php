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
                               wire:model="diplomeEtat.Option">
                        <span class="text-danger">@error('diplomeEtat.Option')
                            {{$message}}@enderror</span>
                    </div>
                    <span class="text-danger">@error('diplomeEtat.Option')
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
                               wire:model="diplomeEtat.Ecole">
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
                                       wire:model="cursus_universitaire.anneeAc{{$i}}">
                            </div>
                        </td>
                        <td>
                            <div class="input-pretend">
                                <input class="span4" type="text" placeholder="Institut"
                                       wire:model="cursus_universitaire.institut{{$i}}">
                            </div>
                        </td>
                        <td>
                            <div class="input-pretend">
                                <input class="span4" type="text" placeholder="Faculte"
                                       wire:model="cursus_universitaire.faculte{{$i}}">
                            </div>
                        </td>
                        <td>
                            <div class="input-pretend">
                                <input class="span4" type="text" placeholder="option"
                                       wire:model="cursus_universitaire.option{{$i}}">
                            </div>
                        </td>
                        <td width="10%">
                            <div class="input-pretend">
                                <input class="span4" type="text" placeholder="2010-2011"
                                       wire:model="cursus_universitaire.anneeEtudes{{$i}}">
                            </div>
                        </td>
                        <td width="5%">
                            <div class="input-pretend">
                                <select name="" id=""
                                        wire:model="cursus_universitaire.mention1{{$i}}">>
                                    <option value="D">D</option>
                                    <option value="S">S</option>
                                </select>
                            </div>
                        </td>
                        <td width="7%">
                            <div class="input-pretend">
                                <input class="span4" type="text" placeholder="%"
                                       wire:model="cursus_universitaire.percent1{{$i}}">
                            </div>
                        </td>
                        <td width="5%">
                            <div class="input-pretend">
                                <select name="" id=""
                                        wire:model="cursus_universitaire.mention2{{$i}}">>
                                    <option value="D">D</option>
                                    <option value="S">S</option>
                                </select>
                            </div>
                        </td>
                        <td width="7%">
                            <div class="input-pretend">
                                <input class="span4" type="text" placeholder="%"
                                       wire:model="cursus_universitaire.percent2{{$i}}">
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