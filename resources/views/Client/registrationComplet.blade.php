
@extends('layouts.client')

@section('content')
    <div id="box-reinscription" class="row">
        <div class="card">
            <div class="card-header bg-success text-white"> INSCRIPTION REUSSI </div>
            <div class="card-body">
                <p>Bonjour <b>{{request()->name}}</b></p>
                <p>Votre inscription a reussie vous allew recevoir le directive dans cette adresse email
                    <b>{{request()->email}}</b>
                </p>
                <p>Votre MATRICULE <b>{{request()->matricule}}</b></p>

            </div>
        </div>
    </div>

@endsection
