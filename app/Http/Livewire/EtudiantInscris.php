<?php

namespace App\Http\Livewire;

use App\Models\etudiant;

use App\Models\etudiantInscrit;
use App\Models\faculte;
use Livewire\Component;
use Livewire\WithPagination;
use log;



class EtudiantInscris extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = "";
    public $faculte;

    public $currentPage = PAGELIST;



    public function statusChange($id)
    {

        etudiantInscrit::where('id_inscrit', $id)->update([
            'statut_etudiant' => 1,
        ]);
        return redirect()->route('users.etudiant');
        // $this->dispatchBrowserEvent('userAdmis',["message"=>"la confirmation de l'etudiant a ete fait avec success"]);

    }
    public function GotoEdit($id)
    {
        $data = etudiantInscrit::where('id_inscrit', $id)->get();
    }




    public function PageEtudiant()
    {
        $this->currentPage = PAGELIST;
    }

    public function dumpDoc($name)
    {

        $this->dispatchBrowserEvent('PreventMessage', ["message" => "Le dossiers de $name est  incomplet"]);
    }


    public function render()
    {



        return view('livewire.etudiant.etudiant-inscris', [
            'etudiants' => etudiantInscrit::whereHas('etudiant', function ($q) {
                $q->where('Nom', 'LIKE', "%{$this->search}%");
            })
                ->orWhere('matricule_etudiant', 'LIKE', "%{$this->search}%")
                ->Where('id_promotion', 'LIKE', "%{$this->faculte}%")
                ->orderBy('created_at', 'DESC')
                ->paginate(10),
            "facultes" => faculte::all(),
        ])->extends('layouts.admin')
            ->section('content');
    }
}
