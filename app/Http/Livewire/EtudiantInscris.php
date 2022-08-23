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
    public $search;
    public $faculte;
    public $byPromotion = null;
    public $byPromotions;
    public $filter = false;
    public $pageN;
    public $count;
    public $order;
    public $etudiantCount = [
        'philo' => "",
        'Cs' => "",
        'Th' => ""
    ];
    public $etudiant;

    public $currentPage = PAGELIST;


    public function mount()
    {
        $this->order = "desc";
    }

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
            'facultes' => faculte::all(),


            'etudiants' => etudiantInscrit::when($this->byPromotion, function ($query) {
                $query->whereHas('promotion', function ($q) {
                    $q->where('id_promotion', 'LIKE', "%{$this->byPromotion}%");
                });
            })->search(trim($this->search))
                ->orderBy('created_at', $this->order)
                ->paginate($this->pageN)




        ])->extends('layouts.admin')
            ->section('content');
    }
}
