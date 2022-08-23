<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/invoice.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <title>Liste</title>
</head>

<body>

    <div class="page">
        <div class="subpage">

            <header class="d-flex justify-content-between">
                <div class="d-flex justify-content-around ">
                    <div class="img">
                        <img class="img-thumbnail p-1" src="{{asset('images/logo2.jpg')}}" width="10" height="10" alt=""
                            style="width:100px;">
                    </div>

                    <div class="info">
                        <h5>UNIVERSITE SAINT AUGUSTIN DE KINSHASA</h5>
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

            <div class="text-center">
                <h2>LISTE ETUDIANT</h2>
                <h6>FACULTE

                    @if(!empty($byPromotion))
                    {{$faculteName->designation_faculte}}
                    @else
                    TOUTES
                    @endif

                </h6>
            </div>

            <div>
                <div class="card">

                    <table class="table">
                        <thead>
                            <tr>
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
                            @forelse ($Listeetudiants as $etudiant )
                            <tr>

                                <td>{{$increment}}</td>
                                <td>{{$etudiant->matricule_etudiant}}</td>
                                <td>{{$etudiant->Nom}}</td>
                                <td>{{$etudiant->Prenom}}</td>

                                <td>{{$etudiant->Telephone}}</td>

                                <td>{{$etudiant->inscription->promotion->faculte->designation_faculte}}</td>
                                <td>{{$etudiant->inscription->promotion->designation_promotion}}</td>
                                <td>{{$etudiant->inscription->created_at->diffforhumans()}}</td>
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
                                <td><span class="badge badge-pill badge-warning">No Admis</span>

                                </td>
                                @endif

                            </tr>
                            {{Form::hidden('',$increment =$increment+1)}}
                            @empty
                            <p>Pas d'etudiant</p>
                            @endforelse

                        </tbody>
                        <tfoot>
                            <tr>

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



        </div>
    </div>

</body>

</html>