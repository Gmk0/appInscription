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
    public $filter = false;
    public $pageN;
    public $Listeetudiants;

    public $order;
    protected $queryString = [
        'search' => ['expect' => ''],
        'byPromotion' => ['expect' => '']
    ];



    public function mount()
    {
        $this->order = "desc";
        $this->Listeetudiants = etudiant::orderBy('nom','asc')
        ->get();
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




    public function updating($name, $val)
    {
        if (($name == 'search') || ($name == 'byPromotion')) {
            $this->resetPage();
        }
    }
    public function print()
    {
        $this->dispatchBrowserEvent('print');
        $this->Listeetudiants = etudiant::when($this->byPromotion, function ($query) {
            $query->whereHas('inscription', function ($q) {
                $q->where('id_promotion', 'LIKE', "%{$this->byPromotion}%");
            });
        })->orderBy('nom','asc')
        ->get();
    }

    public function dumpDoc($name)
    {

        $this->dispatchBrowserEvent('PreventMessage', ["message" => "Le dossiers de $name est  incomplet"]);
    }


    public function render()
    {



        return view('livewire.etudiant.etudiant-inscris', [
            'facultes' => faculte::all(),
            'count' => etudiantInscrit::when($this->byPromotion, function ($query) {
                $query->whereHas('promotion', function ($q) {
                    $q->where('id_promotion', 'LIKE', "%{$this->byPromotion}%");
                });
            })->get(),
            'etudiantsListe' => etudiantInscrit::when($this->byPromotion, function ($query) {
                $query->whereHas('promotion', function ($q) {
                    $q->where('id_promotion', 'LIKE', "%{$this->byPromotion}%");
                });
            })
                ->get(),
            'faculteName' => faculte::where('id_faculte', $this->byPromotion)->first(),


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
