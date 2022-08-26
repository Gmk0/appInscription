<?php

namespace App\Http\Livewire;

use App\Models\paiementFrais;
use Livewire\Component;
use Livewire\WithPagination;

class RapportFrais extends Component
{
    use WithPagination;
    public $search = "";
    public $promotion = "";
    protected $paginationTheme = 'bootstrap';

    protected $queryString = [
        'search' => ['expect' => ''],
    ];
    public function render()
    {

        return view('livewire.Checkout.rapport-frais', [
            'paimentListe' => paiementFrais::where('matricule_etudiant', 'LIKE', "%{$this->search}%")
                ->orderBy('created_at', 'DESC')
                ->paginate(5),
        ])
            ->extends('layouts.admin')
            ->section('content');;
    }
}
