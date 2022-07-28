<?php

namespace App\Http\Livewire;

use App\Models\etudiant;

use App\Models\etudiantInscrit;
use App\Models\faculte;
use Livewire\Component;
use log;

class EtudiantInscris extends Component
{


	public $currentPage = PAGELIST;



    public function statusChange($id){
     
        etudiantInscrit::where('id_inscrit',$id)->update([
            'statut_etudiant'=>1,
        ]);
        return redirect()->route('users.etudiant');
       // $this->dispatchBrowserEvent('userAdmis',["message"=>"la confirmation de l'etudiant a ete fait avec success"]);

    }
    public function GotoEdit($id){
        $data = etudiantInscrit::where('id_inscrit',$id)->get();

        

    }




    public function PageEtudiant()
    {
        $this->currentPage=PAGELIST;
    }

    public function dumpDoc($name)
    {
        
        $this->dispatchBrowserEvent('PreventMessage',["message"=>"Le dossiers de $name est  incomplet"]);
    }


    public function render(){
      //  $this->dispatchBrowserEvent('PreventMessage',["message"=>"La promotion a ete  creer avec success"]);



    		return view('livewire.etudiant.etudiant-inscris',[
    		    'etudiants'=>etudiantInscrit::all()
            ])->extends('layouts.admin')
            ->section('content');

    }
}
