<?php

namespace App\Http\Livewire\Chart;

use Asantibanez\LivewireCharts\Models\AreaChartModel;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use Asantibanez\LivewireCharts\Models\LineChartModel;
use Asantibanez\LivewireCharts\Models\PieChartModel;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;
use Asantibanez\LivewireCharts\Models\RadarChartModel;
use Asantibanez\LivewireCharts\Models\TreeMapChartModel;
use App\Models\paiementFrais;
use Faker\Factory;
use Illuminate\Support\Facades\DB;

use Livewire\Component;


class PaiementViews extends Component
{
    public $types = ['frais inscription', 'Releves de cotes', 'enrolement', 'travel', 'other'];
    public $colors = [
        'frais inscription' => '#f6ad55',
        'enrolement' => '#66DA26',
        'Releves de cotes' => '#90cdf4',
        'travel' => 'cbd5e0',
        'other' => '#cbd5e0',
    ];
    public $firstRun = true;


    public $showDataLabels = true;
    protected $listeners = [
        'onPointClick' => 'handleOnPointClick',
        'onSliceClick' => 'handleOnSliceClick',
        'onColumnClick' => 'handleOnColumnClick',
    ];
    public function handleOnPointClick($point)
    {
        dd($point);
    }
    public function handleOnSliceClick($slice)
    {
        dd($slice);
    }
    public function handleOnColumnClick($column)
    {
        dd($column);
    }

    public function render()
    {
        $faker = Factory::create();
        $expenses = paiementFrais::whereIn('libelle', $this->types)->get();

        $data_paiement = paiementFrais::select(DB::raw('DATE_FORMAT(created_at, "%d") as date'), DB::raw('count(DATE_FORMAT(created_at, "%d %m %y")) as value'))
            ->groupBy('date')
            ->where('libelle', 'frais inscription')
            ->get();

        $dates = [];
        for ($a = 0; $a < now()->day; $a++) {
            for ($b = 0; $b < count(
                $data_paiement
            ); $b++) {
                if ($a + 1 == $data_paiement[$b]->date) {
                    $data_baru[$a + 1] = $data_paiement[$b]->value;
                    break;
                } else {
                    $data_baru[$a + 1] = 0;
                }
            }
        }

        $columnChartModel = (new ColumnChartModel());
        foreach ($data_baru as $key => $item) {
            $columnChartModel->addColumn($key, $item, $faker->hexColor());
        }

        $columnChartModel
            ->setTitle('Paiement frais')
            ->withDataLabels()
            ->withoutLegend()
            ->withOnColumnClickEventName('onColumnClick')
            ->setAnimated(true);


        $pieChartModel = $expenses->groupBy('libelle')
            ->reduce(
                function ($pieChartModel, $data) {
                    $type = $data->first()->libelle;
                    $value = $data->sum('montant');


                    return $pieChartModel->addSlice($type, $value, $this->colors[$type]);
                },
                LivewireCharts::pieChartModel()
                    //->setTitle('Expenses by Type')
                    ->setAnimated($this->firstRun)
                    ->setType('donut')
                    ->withOnSliceClickEvent('onSliceClick')
                    //->withLegend()
                    ->legendPositionBottom()
                    ->legendHorizontallyAlignedCenter()
                    ->setDataLabelsEnabled($this->showDataLabels)
                //->setColors(['#b01a1b', '#d41b2c', '#ec3c3b', '#f66665'])

            );


        $areaChartModel = $expenses
            ->reduce(
                function ($areaChartModel, $data) use ($expenses) {
                    $index = $expenses->search($data);
                    return $areaChartModel->addPoint($index, $data->montant, ['id' => $data->id]);
                },
                LivewireCharts::areaChartModel()
                    //->setTitle('Expenses Peaks')
                    ->setAnimated($this->firstRun)
                    ->setColor('#f6ad55')
                    ->withOnPointClickEvent('onAreaPointClick')
                    ->setDataLabelsEnabled($this->showDataLabels)
                    ->setXAxisVisible(true)
                    ->sparklined()
            );

        $multiLineChartModel = $expenses
            ->reduce(
                function ($multiLineChartModel, $data) use ($expenses) {
                    $index = $expenses->search($data);

                    return $multiLineChartModel
                        ->addSeriesPoint($data->libelle, $index, $data->montant,  ['id' => $data->id]);
                },
                LivewireCharts::multiLineChartModel()
                    //->setTitle('Expenses by Type')
                    ->setAnimated($this->firstRun)
                    ->withOnPointClickEvent('onPointClick')
                    ->setSmoothCurve()
                    ->multiLine()
                    ->setDataLabelsEnabled($this->showDataLabels)
                    ->sparklined()
                //->setColors(['#b01a1b', '#d41b2c', '#ec3c3b', '#f66665'])
            );

        $multiColumnChartModel = $expenses->groupBy('libelle')
            ->reduce(
                function ($multiColumnChartModel, $data) {
                    $type = $data->first()->libelle;

                    return $multiColumnChartModel
                        ->addSeriesColumn($type, 1, $data->sum('montant'));
                },
                LivewireCharts::multiColumnChartModel()
                    ->setAnimated($this->firstRun)
                    ->setDataLabelsEnabled($this->showDataLabels)
                    ->withOnColumnClickEventName('onColumnClick')
                    ->setTitle('Revenue per Year (K)')
                    ->stacked()
                    ->withGrid()
            );

        $radarChartModel = $expenses
            ->reduce(
                function (RadarChartModel $radarChartModel, $data) use ($expenses) {
                    return $radarChartModel->addSeries($data->first()->libelle, $data->libelle, $data->montant);
                },
                LivewireCharts::radarChartModel()
                    ->setAnimated($this->firstRun)
            );

        $treeChartModel = $expenses->groupBy('libelle')
            ->reduce(
                function (TreeMapChartModel $chartModel, $data) {
                    $type = $data->first()->libelle;
                    $value = $data->sum('montant');

                    return $chartModel->addBlock($type, $value)->addColor($this->colors[$type]);
                },
                LivewireCharts::treeMapChartModel()
                    ->setTitle('Expenses Weight')
                    ->setAnimated($this->firstRun)
                    ->setDistributed(true)
                    ->withOnBlockClickEvent('onBlockClick')
            );

        $this->firstRun = true;


        return view('livewire.chart.paiement-views')->with([
            'columnChartModel' => $columnChartModel,
            'pieChartModel' => $pieChartModel,
            'areaChartModel' => $areaChartModel,
            'multiLineChartModel' => $multiLineChartModel,
            'multiColumnChartModel' => $multiColumnChartModel,
            'radarChartModel' => $radarChartModel,
            'treeChartModel' => $treeChartModel,


        ]);;
    }
}
