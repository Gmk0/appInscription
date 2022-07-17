<?php

namespace App\Http\Livewire;

use App\Models\etudiant;

use App\Models\etudiantInscrit;
use App\Models\faculte;
use Livewire\Component;

class EtudiantInscris extends Component
{
	public	$promotion =1;

    public function render(){
    		return view('livewire.etudiant.etudiant-inscris',[
            'etudiants'=> etudiantInscrit::all(),
            'facultes'=>faculte::all(),
        		])->extends('layouts.admin')
            ->section('content');

    }
}
