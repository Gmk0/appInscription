@extends('layouts.admin')
@section('title','Tableau de Bord')


@section('content')
<div class="p-1">
    @livewire('dash-board-admin')
</div>
<div>

    <div class="">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">information</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body" style="display: block;">
                Bienvenu sur le panneau d'administration de l'usakin <b>{{Auth:: user()->name}} {{Auth::
                    user()->lastname}}</b>
                <br>
                votre Role <b>{{Auth:: user()->role}}</b>

            </div>
            <!-- /.card-body -->
            <div class="card-footer" style="display: block;">

            </div>
            <!-- /.card-footer-->
        </div>

    </div>
</div>



@endsection