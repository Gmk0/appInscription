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
           'statut_etudiant'=>1
       ]);

        return back();

    }
    public function GotoEdit($id){
        $data = etudiantInscrit::where('id_inscrit',$id)->get();

        return redirect()->route('FindEtudiant')->with('data',$data);

    }




    public function PageEtudiant()
    {
        $this->currentPage=PAGELIST;
    }


    public function render(){
      //  $this->dispatchBrowserEvent('PreventMessage',["message"=>"La promotion a ete  creer avec success"]);



    		return view('livewire.etudiant.etudiant-inscris',[
    		    'etudiants'=>etudiantInscrit::all()
            ])->extends('layouts.admin')
            ->section('content');

    }
}
