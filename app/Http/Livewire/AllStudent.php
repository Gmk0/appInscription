<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\etudiant;
use App\Models\etudiantInscrit;
use Livewire\withPagination;

class AllStudent extends Component
{
    use withPagination;
    public $etudiants;
    public $search = [];
    public $etudiantPhilo;
    public $currentPage;
    public $filter = false;
    protected $paginationTheme = 'bootstrap';




    public function mount()
    {
        $this->currentPage = "all";
        $this->etudiants = etudiant::all();
    }
    public function gotFilter()
    {

        $this->filter = false;
    }
    public function goToAll()
    {
        $this->currentPage = "all";
    }
    public function filter()
    {
        $etudiant = etudiant::query();

        if (!empty($this->search['nom'])) {
            $etudiant = $etudiant->where('Nom', 'LIKE', '%' . $this->search['nom'] . '%')->get();
        }
        if (!empty($this->search['matricule'])) {
            $etudiant = $etudiant->where('matricule_etudiant', 'LIKE', '%' . $this->search['matricule'] . '%')->get();
        }

        if (!empty($this->search['philosophie'])) {
            $etudiant = etudiant::whereHas(['tuteurEtudiant', function ($q) {
                $q->where('Nom_tuteur', 'LIKE', '%' . $this->search['philosophie'] . '%')->paginate();
            }])->get();
        }

        dd($etudiant);
        $this->etudiants = $etudiant;
    }
    public function render()
    {
        return view('livewire.all-student')
            ->extends('layouts.admin')
            ->section('content');
    }
}
