<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/invoice.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <title>Receipt example</title>
</head>

<body>
    @if($invoices != null)

    <div class="invoice">
        @foreach($invoices as $invoice )
        <div class="header">
            <div class="">
                <div class=""> <img src="{{asset('images/logo2.jpg')}}" alt="Logo" width="50">
                </div>
                <div>
                    <h5>Universite Saint Augustin De Kinshasa</h5>
                    <p>N3 18 eme Rue Commune de Limete <br>
                        Republique democratique du Congo</p>
                </div>



            </div>
            <div>
                <p>Kinshasa le {{date("d/m/Y")}}</p>
                <p>Heure:{{date("h:i:sa")}}</p>
            </div>

        </div>

        <div class="mt-2">
            <H5 style="text-align:center; font-size:18px;">BON D'ENTREE DES FONDS N°{{$invoice->id}}</H5>
        </div>
        <hr>
        <div class="recu border p-2">
            <ul class="list-unstyled">
                <li>Recu de: <strong>{{$invoice->inscriptionCheck->etudiant->Nom}}
                        {{$invoice->inscriptionCheck->etudiant->Nom}}</strong></li>
                <li>Matricule: <strong>{{$invoice->matricule_etudiant}}</strong></li>
                <li>MONTANT PAYE : <strong>{{$invoice->montant}} usd</strong></li>
                <li>Montant En lettre</li>
                <li>Motif: <span>{{$invoice->libelle}}</span></li>

            </ul>

            <div class="d-flex justify-content-around mb-2 ">
                <p>Partie versante</p>
                <p>Caissier</p>

            </div>
        </div>
        <p class="centered">Thanks for your purchase!
            <br>Usakin.com
        </p>
        @endforeach
    </div>
    @endif
</body>

</html>