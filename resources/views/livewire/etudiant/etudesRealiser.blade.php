<div class="row py-5 p-3">

    <div class="col">
        <h4 class="text-bold">ETUDE SECONDAIRES</h4>
        <div class="row mb-3">
            <div class="col-md-6"><label class="labels">Diplome d'acces a l'enseignement superieur et universitaire:  </label><span><input type="text" class="form-control form-control-sm wide-font" placeholder="enter phone number" value="{{$etudiant->etudiant->etudesRealiser->Diplome_access['Diplome']}}"></span></div>
            <div class="col-md-6"><label class="labels">Numero : </label><span><input type="text" class="form-control form-control-sm wide-font" placeholder="enter phone number" value="{{$etudiant->etudiant->etudesRealiser->Diplome_access['Numero']}}"></span> </div>
            <div class="col-md-3"><label class="labels">Section : </label><span><input type="text" class="form-control form-control-sm wide-font" placeholder="enter phone number" value="{{$etudiant->etudiant->etudesRealiser->Diplome_access['Section']}}"></span></div>
            <div class="col-md-3"><label class="labels">Option: </label><span><input type="text" class="form-control form-control-sm wide-font" placeholder="enter phone number" value="{{$etudiant->etudiant->etudesRealiser->Diplome_access['Option']}}"></span></div>
            <div class="col-md-3"><label class="labels">Mention :</label><span><input type="text" class="form-control form-control-sm wide-font" placeholder="enter phone number" value="{{$etudiant->etudiant->etudesRealiser->Diplome_access['Mention']}}"></span></div>
            <div class="col-md-3"><label class="labels">Dedivvre a : </label><span><input type="text" class="form-control form-control-sm wide-font" placeholder="enter phone number" value="{{$etudiant->etudiant->etudesRealiser->Diplome_access['DelivreA']}}"></span></div>
            <div class="col-md-3"><label class="labels">en date du :</label><span><input type="text" class="form-control form-control-sm wide-font" placeholder="enter phone number" value="{{$etudiant->etudiant->etudesRealiser->Diplome_access['DateDu']}}"></span></div>
            <div class="col-md-3"><label class="labels">Ecole: </label><span><input type="text" class="form-control form-control-sm wide-font" placeholder="enter phone number" value="{{$etudiant->etudiant->etudesRealiser->Diplome_access['Ecole']}}"></span></div>
            <div class="col-md-3"><label class="labels">code: </label><span><input type="text" class="form-control form-control-sm wide-font" placeholder="enter phone number" value="{{$etudiant->etudiant->etudesRealiser->Diplome_access['Code']}}"></span></div>
            <div class="col-md-3"><label class="labels"> province </label><span><input type="text" class="form-control form-control-sm wide-font" placeholder="enter phone number" value="{{$etudiant->etudiant->etudesRealiser->Diplome_access['Province']}}"></span></div>

        </div>
    </div>
    <div>
        <h4 class="text-bold">CURSUS ACADEMIQUE</h4>
        <table class="tables table-bordered">
            <thead>
            <tr>
                <th style="padding-top:5px;" rowSpan="3">Annee</th>
                <th rowSpan="3">Instituts</th>
                <th rowSpan="3">Facultes</th>
                <th rowSpan="3">s</th>
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
            <tbody>
            <tr style="width:50px;">
                <td>
                    <div class="input-pretend">
                        <input class="span4" type="text" placeholder="" value="{{$etudiant->etudiant->etudesRealiser->Cursus_universitaire['anneeAc']}}">
                    </div>
                </td>
                <td>
                    <div class="input-pretend">
                        <input class="span4" type="text" placeholder="">
                    </div>
                </td>
                <td>
                    <div class="input-pretend">
                        <input class="span4" type="text" placeholder="">
                    </div>
                </td>
                <td>
                    <div class="input-pretend">
                        <input class="span4" type="text" placeholder="">
                    </div>
                </td>
                <td width="10%">
                    <div class="input-pretend">
                        <input class="span4" type="text" placeholder="">
                    </div>
                </td>
                <td width="5%">
                    <div class="input-pretend">
                        <select name="" id="">
                            <option></option>
                        </select>
                    </div>
                </td>
                <td width="7%">
                    <div class="input-pretend">
                        <input class="span4" type="text" placeholder="%">
                    </div>
                </td>
                <td width="5%">
                    <div class="input-pretend">
                        <select name="" id="">
                            <option></option>
                        </select>
                    </div>
                </td>
                <td width="7%">
                    <div class="input-pretend">
                        <input class="span4" type="text" placeholder="%">
                    </div>
                </td>
            </tr>
            <tr style="width:50px;">
                <td>
                    <div class="input-pretend">
                        <input class="span4" type="text" placeholder="">
                    </div>
                </td>
                <td>
                    <div class="input-pretend">
                        <input class="span4" type="text" placeholder="">
                    </div>
                </td>
                <td>
                    <div class="input-pretend">
                        <input class="span4" type="text" placeholder="">
                    </div>
                </td>
                <td>
                    <div class="input-pretend">
                        <input class="span4" type="text" placeholder="">
                    </div>
                </td>
                <td width="10%">
                    <div class="input-pretend">
                        <input class="span4" type="text" placeholder="">
                    </div>
                </td>
                <td width="5%">
                    <div class="input-pretend">
                        <select name="" id="">
                            <option></option>

                        </select>
                    </div>
                </td>
                <td width="7%">
                    <div class="input-pretend">
                        <input class="span4" type="text" placeholder="%">
                    </div>
                </td>
                <td width="5%">
                    <div class="input-pretend">
                        <select name="" id="">
                            <option></option>
                            <option></option>
                        </select>
                    </div>
                </td>
                <td width="7%">
                    <div class="input-pretend">
                        <input class="span4" type="text" placeholder="%">
                    </div>
                </td>
            </tr>
            <tr style="width:50px;">
                <td>
                    <div class="input-pretend">
                        <input class="span4" type="text" placeholder="">
                    </div>
                </td>
                <td>
                    <div class="input-pretend">
                        <input class="span4" type="text" placeholder="">
                    </div>
                </td>
                <td>
                    <div class="input-pretend">
                        <input class="span4" type="text" placeholder="">
                    </div>
                </td>
                <td>
                    <div class="input-pretend">
                        <input class="span4" type="text" placeholder="">
                    </div>
                </td>
                <td width="10%">
                    <div class="input-pretend">
                        <input class="span4" type="text" placeholder="">
                    </div>
                </td>
                <td width="5%">
                    <div class="input-pretend">
                        <select name="" id="">
                            <option></option>
                            <option></option>
                        </select>
                    </div>
                </td>
                <td width="7%">
                    <div class="input-pretend">
                        <input class="span4" type="text" placeholder="%">
                    </div>
                </td>
                <td width="5%">
                    <div class="input-pretend">
                        <select name="" id="">
                            <option></option>
                        </select>
                    </div>
                </td>
                <td width="7%">
                    <div class="input-pretend">
                        <input class="span4" type="text" placeholder="%">
                    </div>
                </td>
            </tr>
            <tr style="width:50px;">
                <td>
                    <div class="input-pretend">
                        <input class="span4" type="text" placeholder="">
                    </div>
                </td>
                <td>
                    <div class="input-pretend">
                        <input class="span4" type="text" placeholder="">
                    </div>
                </td>
                <td>
                    <div class="input-pretend">
                        <input class="span4" type="text" placeholder="">
                    </div>
                </td>
                <td>
                    <div class="input-pretend">
                        <input class="span4" type="text" placeholder="">
                    </div>
                </td>
                <td width="10%">
                    <div class="input-pretend">
                        <input class="span4" type="text" placeholder="">
                    </div>
                </td>
                <td width="5%">
                    <div class="input-pretend">
                        <select name="" id="">
                            <>D</>
                        <>S</>
                    </select>
    </div>
    </td>
    <td width="7%">
        <div class="input-pretend">
            <input class="span4" type="text" placeholder="%">
        </div>
    </td>
    <td width="5%">
        <div class="input-pretend">
            <select name="" id="">
                <option></option>
            </select>
        </div>
    </td>
    <td width="7%">
        <div class="input-pretend">
            <input class="span4" type="text" placeholder="%">
        </div>
    </td>
    </tr>
    </tbody>
    </table>

</div>
</div>