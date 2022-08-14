<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\etudiant;
use App\Models\paiementFrais;
use Livewire\WithPagination;
use PDF;

class PaimentFrais extends Component
{
    use WithPagination;

    public $matricule, $invoices;
    public $etudiants;
    public $paiementUp = [];
    public $paiement = [];
    public $search = "";
    protected $paginationTheme = 'bootstrap';

    protected $queryString = [
        'search' => ['expect' => ''],
    ];

    public function  mount()
    {
    }


    public function findStudent()
    {
        $this->validate([
            'matricule' => 'required'
        ], [
            "matricule.required" => "Veuillez saisir le le matricule de l'etudiant"
        ]);

        if ($etudiant = etudiant::where('matricule_etudiant', $this->matricule)->first() != null) {
            $this->etudiants = etudiant::where('matricule_etudiant', $this->matricule)->first();
        } else {
            $this->dispatchBrowserEvent('error', ["message" => "ce matricule n'est pas attribue"]);
            $this->matricule = "";
        };
        $this->dispatchBrowserEvent('tables');
    }
    public function clear()
    {
        $this->matricule = "";
        $this->etudiants = "";
        $this->paiement = "";
        $this->resetErrorBag();
    }

    public function paiement()
    {
        if ($this->etudiants != null) {
            $this->validate([
                'paiement.libelle' => 'required',
                'paiement.montant' => 'required|numeric',
            ], [
                "paiement.libelle.required" => "Veuillez saisir le motif de la transaction",
                "paiement.montant.required" => "Veuillez saisir le montant de la transaction",

            ]);

            if (paiementFrais::where('matricule_etudiant', $this->etudiants->matricule_etudiant)->exists()) {
                $this->dispatchBrowserEvent('error', ["message" => "l'etudiant a deja solder le frais d'inscription"]);
                $this->clear();
            } else {
                $data = new paiementFrais;
                $matricule = $this->etudiants->matricule_etudiant;
                $data->matricule_etudiant = $matricule;
                $data->id_payement = random_int(100000, 999999);
                $data->client = $this->paiement['libelle'];
                $data->montant = $this->paiement['montant'];
                $data->libelle = "frais inscription";
                $data->save();
                if ($data) {
                    $this->dispatchBrowserEvent('showSuccessMessage', ["message" => "La transaction a ete bien effecuer"]);
                    sleep(1);
                    $this->clear();
                    return $this->print($matricule);
                }
            }
        } else {
            $this->dispatchBrowserEvent('error', ["message" => "veuillez saisir un  matricule"]);
        }
    }

    public function editPaye(int $id)
    {
        $this->paiementUp = paiementFrais::find($id)->ToArray();
    }
    public function updatePayement()
    {
        $this->validate([
            'paiementUp.libelle' => 'required',
            'paiementUp.montant' => 'required|numeric',
        ], [
            "paiementUp.libelle.required" => "Veuillez saisir le motif de la transaction",
            "paiementUp.montant.required" => "Veuillez saisir le montant de la transaction",

        ]);

        $data = array(
            "montant" => $this->paiementUp['montant'],
            "libelle" => $this->paiementUp['libelle'],
        );
        paiementFrais::find($this->paiementUp['id'])->update($data);
        $this->dispatchBrowserEvent('showSuccessMessage', ["message" => "La transaction a ete bien effecuer"]);
    }


    public function print(string $id)
    {
        $this->invoices = paiementFrais::where('matricule_etudiant', $id)->get();
        $this->dispatchBrowserEvent('print');
    }



    public function render()
    {
        return view(
            'livewire.Checkout.paiment-frais',
            [
                'paimentListe' => paiementFrais::where('matricule_etudiant', 'LIKE', "%{$this->search}%")
                    ->orderBy('created_at', 'DESC')
                    ->paginate(5),
            ]
        )->extends('layouts.admin')
            ->section('content');
    }
}
