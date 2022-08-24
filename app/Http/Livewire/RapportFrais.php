<?php

namespace App\Http\Livewire;

use App\Models\paiementFrais;
use Livewire\Component;
use Livewire\WithPagination;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;

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
        $columnChartModel = (new ColumnChartModel())
            ->setTitle('Expenses By type')
            ->addColumn('food', 100, '#f6ad55')
            ->addColumn('bois', 100, '#f6ad55');

        return view('livewire.Checkout.rapport-frais', [
            'paimentListe' => paiementFrais::where('matricule_etudiant', 'LIKE', "%{$this->search}%")
                ->orderBy('created_at', 'DESC')
                ->paginate(5),
        ], compact('columnChartModel'))
            ->extends('layouts.admin')
            ->section('content');;
    }
}
