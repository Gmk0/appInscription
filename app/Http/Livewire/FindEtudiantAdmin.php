<?php

namespace App\Http\Livewire;

use App\Models\etudiantInscrit;
use Livewire\Component;

class FindEtudiantAdmin extends Component
{
    public $etudiants =[];

    public function  mount($id)
    {
        $this->etudiants = etudiantInscrit::where('id_inscrit',$id)->get();
        

    }
    public function changeStatut($id)
    {
        etudiantInscrit::where('id_inscrit',$id)->update([
            'statut_etudiant'=>1,
        ]);
        $this->dispatchBrowserEvent('userAdmis',["message"=>"la confirmation de l'etudiant a ete fait avec success"]);
        return redirect()->route('users.etudiant');
    }


    public function render()
    {
        return view('livewire.etudiant.find-etudiant-admin')
            ->extends('layouts.admin')
            ->section('content');
    }
}
