@extends('layouts.client')

@section('content')

<div class="card m-4">
    <div class="card-header bg-success text-white"> INSCRIPTION REUSSI </div>
    <div class="card-body">
        <div class="card-body">
            <p>Salut <b>{{request()->name}}</b> </b>,<br />
                Merci de nous rejoindre , votre inscription a ete bien soumis ,  vous recevrez un mail de confirmation et la
                facture de votre paiement dans votre adresse mail
                <b>{{request()->email}}</b> <br />
            </p>
            <p>
                votre matricule est le <b>{{request()->matricule}}</b>
                Le Formulaire <a href="{{route('formulaire',[request()->matricule])}}"
                    class="btn btn-primary">download</a> </p>
            <br>
            <p> Veuillez vous rendre dans l'onglet <a href="{{route('checkout',[request()->matricule])}}">Profil</a>
                Pour
                ajouter ou Modifier certaines informations</p>
            <br>

            <p>Proceder aux frais d'inscription <a href="{{route('checkout',[request()->matricule])}}"
                    class="btn btn-primary">Paiement</a>
                ou passer dans le bureau d'administration pour proceder au paiement du frais d'inscription</p>
        </div>
    </div>
</div>





@endsection