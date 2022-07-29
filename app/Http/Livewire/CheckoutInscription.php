<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\etudiantInscrit;

class CheckoutInscription extends Component
{
    public $etudiants;

    public function  mount($matricule)
    {
        $this->etudiants = etudiantInscrit::where('matricule_etudiant',$matricule)->get();

    }
    public function render()
    {
        return view('livewire.checkout-inscription')
        ->extends('layouts.Client')
        ->section('content');
    }
}
