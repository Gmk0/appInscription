<?php

namespace App\Http\Livewire;

use App\Models\etudiant;

use App\Models\etudiantInscrit;
use App\Models\faculte;
use Livewire\Component;
use log;

class EtudiantInscris extends Component
{
	public	$promotionId;
    public $etudiants;
	public  $facultes;


    public function mount(){
	    $this->facultes = faculte::all();
	    if($this->promotionId !=''){
            $this->etudiants= etudiantInscrit::where('id_promotion',$this->promotionId)->get();
        }else{
            $this->etudiants= etudiantInscrit::all();
        }


    }
    public function updatedPromotionId($value){

          dd($value);

    }

    public function render(){


    		return view('livewire.etudiant.etudiant-inscris')->extends('layouts.admin')
            ->section('content');

    }
}
