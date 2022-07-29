
@extends('layouts.client')

@section('content')

        <div class="card m-4">
            <div class="card-header bg-success text-white"> INSCRIPTION REUSSI </div>
            <div class="card-body">
                <div class="card-body">
                    Salut <b>{{request()->name}}</b> </b>,<br/>
                    Merci de nous rejoindre , soon we will aprouve registration
                    when your accout approuved you will receive your credentials
                    <b>{{request()->email}}</b>  <br/>
                    your matricule <b>{{request()->matricule}}</b>
                    download your formulaire  <a href="{{route('formulaire',[request()->matricule])}}" class="btn btn-primary">download</a>
                    <br>
                    <br>

                    proceder aux frais d'inscription <a href="{{route('checkout',[request()->matricule])}}" class="btn btn-primary">checkout</a>
                    ou passer dans le bureau d'administration pour  proceder au paiement dans le 3 jour aui vient
                </div>
            </div>
        </div>





@endsection
