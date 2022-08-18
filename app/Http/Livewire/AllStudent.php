<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\etudiant;
use App\Models\paiementFrais;
use Livewire\withPagination;
use App\Models\faculte;

class AllStudent extends Component
{
    use withPagination;

    public $search;
    public $etudiantPhilo;
    public $invoices;
    public $currentPage;
    public $byPromotion = null;
    public $filter = false;
    public $pageN;
    public $faculte;
    public $Listeetudiants;
    protected $paginationTheme = 'bootstrap';




    public function mount()
    {
        $this->currentPage = "all";
        $this->pageN = 10;
        $this->Listeetudiants = etudiant::all();
    }

    public function print()
    {
        $this->dispatchBrowserEvent('print');
        $this->Listeetudiants = etudiant::when($this->byPromotion, function ($query) {
            $query->whereHas('inscription', function ($q) {
                $q->where('id_promotion', 'LIKE', "%{$this->byPromotion}%");
            });
        })->get();
    }

    public function render()
    {
        return view('livewire.all-student', [
            'facultes' => faculte::all(),
            'etudiants' => etudiant::when($this->byPromotion, function ($query) {
                $query->whereHas('inscription', function ($q) {
                    $q->where('id_promotion', 'LIKE', "%{$this->byPromotion}%");
                });
            })->search(trim($this->search))
                ->paginate($this->pageN)




        ])
            ->extends('layouts.admin')
            ->section('content');
    }
}
