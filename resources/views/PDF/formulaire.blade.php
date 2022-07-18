<!DOCTYPE html>
<html lang="en">
<head>

    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <title>Document</title>
    <link rel="stylesheet" href="{{public_path('pdf/formulaire.css')}}">
    <link rel="stylesheet" href="{{mix('css/app.css')}}">

</head>
<body>
<div class="page">
    <div class="subpage">

        <header>
            <div class="entete">
                <div class="img">
                    <img class="img-thumbnail" src="{{public_path('images/logo2.jpg')}}"  width="120" height="120" alt="">
                </div>

                <div class="info">
                    <h3>UNIVERSITE SAINT AUGUSTIN DE KINSHASA</h3>
                    <h6>BP 2143-KINSHASA</h6>
                    <p>Web : www.usakin.org</p>
                    <p>Contact : couriel:usakin@usakin.org tel 243 15164012</h6>
                    <p>Tel 0844720350</p>
                </div>
            </div>



            <div class="annee">
                <p>ANNNEE ACADEMIQUE {{date("Y")}}-{{date('Y',strtotime('+1 year'))}}</p>
            </div>
        </header>

        <div class="titre">
            <h2>FICHE D'INSCRIPTION</h2>
            <h6>FACULTE DE {{$student->inscription->promotion->faculte->designation_faculte}}</h6>
        </div>
        <div class="FICHE">
            <div class="cards">
                <img src="{{public_path('/storage/students_images/'.$student->image)}}" alt="" width="100" height="100" alt="">
            </div>
            <div class="Identite">
                <h6>IDENTITE</h6>
                <Ol>
                    <li>Nom, Post-Nom, Prenom:  <span>{{$student->Nom}}</span>&emsp; <span>{{$student->Postnom}}</span>  &emsp; <span>{{$student->Prenom}}</span></li>
                    <li>Lieu et Date de naissance : <span>{{$student->lieu_naiss}}</span>&emsp; <span>{{$student->date_naiss}}</span></li>
                    <li>sexe : <span>{{$student->Genre}}</span> &emsp;Etat-civil: <span>{{$student->etat_civil}}</span>       &emsp;  nationalite :   <span>{{$student->nationalite}}</span> </li>
                    <li>Nom du Pere  : <span>{{$student->Nom_pere}}</span></li>
                    <li>Nom de la mere : <span>{{$student->Nom_mere}}</span></li>
                    <li>Province d'origine:  <span>{{$student->localisation_parent['province']}}</span> &emsp; district: <span>{{$student->localisation_parent['district']}}</span> &emsp;  territoire/commune <span>{{$student->localisation_parent['commune']}}</span></li>
                    <li>Adresse (residence): <span> AV:{{ $student->Adresse_etudiant['avenue']}} Q:{{ $student->Adresse_etudiant['Quartier']}} C/{{ $student->Adresse_etudiant['commune']}}</span></li>
                    <li>Telephone: <span> {{ $student->telephone}}  &emsp; Email:  <span>{{ $student->email}}</span> </li>
                    <li>Identite, adresse et N telephonque de la personne a contacter en cas d'urgnece: <span>{{$student->tuteurEtudiant->Nom_tuteur}}</span> ;&ensp; <span>Av:{{$student->tuteurEtudiant->localisation_tuteur['avenue']}} &ensp;Q/{{$student->tuteurEtudiant->localisation_tuteur['Q']}} &ensp; C/{{$student->tuteurEtudiant->localisation_tuteur['C']}}</span></li>
                    <li> religieux: <span>{{$student->institut_rel}}</span> &emsp;sigle: <span>{{$student->sigle}}</span></li>
                </Ol>
            </div>

            <div>
                <h6>ETUDE SECONDAIRES</h6>
                <ul>
                    <li>Diplome d'acces a l'enseignement superieur et universitaire: <span>{{$student->etudesRealiser->Diplome_access['Diplome']}}</span></li>
                    <li>Numero : <span>{{$student->etudesRealiser->Diplome_access['Numero']}}</span>&emsp; Section : <span>{{$student->etudesRealiser->Diplome_access['Section']}}</span>  &emsp; Option: <span>{{$student->etudesRealiser->Diplome_access['Option']}}</span>&emsp; Mention :<span>{{$student->etudesRealiser->Diplome_access['Mention']}}</span></li>
                    <li>Delivre a : <span>{{$student->etudesRealiser->Diplome_access['DelivreA']}}</span> &emsp; en date du :<span>{{$student->etudesRealiser->Diplome_access['DateDu']}}</span></li>
                    <li>Ecole: <span>{{$student->etudesRealiser->Diplome_access['ecole']}}</span> &emsp; code: <span>{{$student->etudesRealiser->Diplome_access['Code']}}</span> &emsp; province <span>{{$student->etudesRealiser->Diplome_access['Province']}}</span> </li>

                </ul>
            </div>
            <div>
                <h6>CURSUS ACADEMIQUE</h6>
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
        <div>
            <h6>INSCRIPTION</h6>
            <p>je sollicite l'inscription en</p>
            <table class=" tables table-bordered">
                <thead>
                <tr>
                    <th>Prop</th>
                    <th>FACULTE</th>
                    <th>PROMOTION</th>
                    <th colspan="3">Signature du Candidat</th>
                </tr>
                </thead>

                <tbody>
                <tr width="200px">
                    <td scope="1"></td>
                    <td>{{$student->inscription->promotion->faculte->designatio_faculte}}</td>
                    <td>{{$student->inscription->promotion->designation_promotion}}</td>
                    <td></td>
                </tr>
                </tbody>
            </table>
        </div>
        <hr>
        <div class="footer">
            <div class="dates">
                <p>Fait a kinshasa le {{date('d/m/Y')}}</p>
            </div>
            <div class="secratariat">
                <p>Secraitere General Academique</p>
                <p>Prof. Christian Mongay Nyabolondo</p>

            </div>
        </div>

    </div>

</div>
</div>

<div class="tableau">
    <h6>DOCUMMENT DISPONIBLE</h6>
    <table class="tables table-bordered">
        <thead>
        <tr>
            <th>N</th>
            <th>DOCUMMENT</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td scope="row">N1</td>
            <td>Aptitute Physique</td>
            @if (!empty($student->dossierEtudiant->aptitude_physique))
                <td>ok</td>
            @else
                <td>no</td>
            @endif


        </tr>

        </tbody>
    </table>


</div>

</body>

</html>
