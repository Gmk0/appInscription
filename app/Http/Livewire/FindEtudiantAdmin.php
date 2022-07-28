<?php

namespace App\Http\Livewire;

use App\Models\etudiantInscrit;
use App\Models\etudiant;


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

    public function deleteEtudiant($id)
    {
       if(etudiant::destroy($id)){
        $this->dispatchBrowserEvent('showSuccessMessage',["message"=>"l'etudiant a  supprimer avec success"]);
        return redirect()->route('users.etudiant');
       } else
        {
            $this->dispatchBrowserEvent('showSuccessMessage',["message"=>"ERROR"]);
   
        }
        }
    public function confirmDelete($id,$name){


        $this->dispatchBrowserEvent('showWarningMessage',["message"=> [
             "text"=>"Vous etes sur le point de effacer l'etudiant $name  dans la base de donnee toutes les information le concernat sera effacer. voulez-vous continuer",
             "title"=>"Etes-vous sur de continuer",
             "type"=>"warning",
             "data"=> [
                 "id"=>$id
             ]
         ]
 
         ]);
     }

    public function render()
    {
        return view('livewire.etudiant.find-etudiant-admin')
            ->extends('layouts.admin')
            ->section('content');
    }
}
