<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\etudiant;
use App\Models\etudiantInscrit;

class AllStudent extends Component
{
    public $etudiants;
    public $etudiantPhilo;
    public $currentPage;
    

  
    public function mount()
    {
        $this->currentPage="all";
            $this->etudiants=etudiant::all();
            $this->etudiantPhilo=etudiantInscrit::where('id_promotion',1)->get();
        
    }
    public function goToPhilo()
    {
        $this->currentPage="PHILO";

    }
    public function goToAll()
    {
        $this->currentPage="all";

    }
    public function render()
    {
        return view('livewire.all-student')
        ->extends('layouts.admin')
            ->section('content');
    }
}
