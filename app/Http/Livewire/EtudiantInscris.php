<?php

namespace App\Http\Livewire;

use App\Models\etudiant;
use Livewire\Component;

class EtudiantInscris extends Component
{
    public function render()
    {
        return view('livewire.etudiant.etudiant-inscris',[
            'etudiant'=>etudiant::latest()->get(),
        ])->extends('layouts.admin')
            ->section('content');
    }
}
