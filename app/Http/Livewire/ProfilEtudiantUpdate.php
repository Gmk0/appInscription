<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\etudiant;
use App\Models\dossierEtudiant;
use Livewire\WithFileUploads;

class ProfilEtudiantUpdate extends Component
{
     use WithFileUploads;
    public $matricule;
    public $etudiants;
    public $document;
    public function mount()
    {
        
        
    }
    public function findStudent()
    {
        $this->validate([
            'matricule'=>'required'
        ]);
    
         if($etudiant = etudiant::where('matricule_etudiant', $this->matricule)->first() != null){
            $this->etudiants = etudiant::where('matricule_etudiant', $this->matricule)->first();
         }else{
            $this->dispatchBrowserEvent('error',["message"=>"ce matricule n'est pas attribue"]);
            $this->matricule="";
         };           
    }

    public function updated($propertyName)
    {

        $this->validateOnly($propertyName,
            [
                'matricule'=>'required|min:9|max:9'
            ]
        );
    }


    public function render()
    {
        return view('livewire.update.profil-etudiant-update')
        ->extends('layouts.Client')
        ->section('content');
    }

    public function updateRecom()
    {
        $this->validate([
        'document'=>'required|mimes:doc,docx,pdf|max:1024'
       ]
       );

       $recom ='recom'.time().$this->document->getClientOriginalName();
        $upload_aptPh = $this->document->storeAs('public/students_doc', $recom);
        if($upload_aptPh)
        {
            $send=dossierEtudiant::where('matricule_etudiant',$this->etudiants->matricule_etudiant)->update([
                'recommandation'=>$recom,
            ]);
            if($send){
                $this->dispatchBrowserEvent('showSuccessMessage',["message"=>"le document a ete mise a jour avec succees "]);
                $this->document="";
               
                
            };
            $this->reset('etudiants');
         

        }
       

    }
}
