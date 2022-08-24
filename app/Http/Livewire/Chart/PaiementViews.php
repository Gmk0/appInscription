<?php

namespace App\Http\Livewire\Chart;

use Asantibanez\LivewireCharts\Models\AreaChartModel;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use Asantibanez\LivewireCharts\Models\LineChartModel;
use Asantibanez\LivewireCharts\Models\PieChartModel;
use App\Models\paiementFrais;

use Livewire\Component;


class PaiementViews extends Component
{

    public function render()
    {
        $countFrais = paiementFrais::where('libelle', 'frais inscription')->count();
        $countReleves = paiementFrais::where('libelle', 'Releve de cotes')->count();
        $countCarte = paiementFrais::where('libelle', 'carte identite')->count();

        $columnChartModel = (new ColumnChartModel())
            ->setTitle('Expenses By type')
            ->addColumn('food', 100, '#f6ad55')
            ->addColumn('bois', 100, '#f6ad55');

        return view('livewire.chart.paiement-views', compact('countFrais', 'countReleves', 'countCarte', 'columnChartModel'));
    }
}
