<?php

namespace App\Http\Livewire;

use App\Models\anneeAcademique;
use App\Models\faculte;
use App\Models\promotion;
use Livewire\Component;

class FacultePromotion extends Component
{
    public $faculte;
    public $promotion = [];
    public $promotionEdit = [];
    public $faculteEdit = [];
    public $annee;


    public function mount()
    {
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            "faculte" => "required",
            "annee" => "required|min:9|max:9",
            "promotion.designation_promotion" => "required|string",
            "promotion.id_promotion" => "required|string"
        ]);
    }
    public function registerFaculte()
    {

        $this->validate([
            "faculte" => "required",
        ]);
        $faculte = new faculte();
        $faculte->designation_faculte = $this->faculte;
        $faculte->save();

        $this->dispatchBrowserEvent('showSuccessMessage', ["message" => "La faculte creer avec success"]);
        $this->faculte = [];
    }

    public function registerPromotion()
    {
        $this->validate([
            "promotion.id_faculte" => 'required',
            'promotion.designation_promotion' => 'required'
        ]);

        $data = $this->promotion;

        promotion::create($data);
        $this->dispatchBrowserEvent('showSuccessMessage', ["message" => "La promotion a ete  creer avec success"]);
        $this->promotion = [];
    }

    public function registerAnnee()
    {

        $this->validate([
            "annee" => "required|min:9|max:9",
        ]);
        $annee = new anneeAcademique();
        $annee->designation_annee = $this->annee;
        $annee->save();

        $this->dispatchBrowserEvent('showSuccessMessage', ["message" => "L'annee a ete ajouter avec success"]);
        $this->faculte = [];
    }

    public function cleanModal()
    {
        $this->promotion = [];
        $this->promotionEdit = [];
    }
    public function goToEdit($id)
    {
        $this->promotionEdit =  promotion::where('id_promotion', $id)->first()->ToArray();
        $this->dispatchBrowserEvent('showEditModal');
    }
    public function goToEditFac($id)
    {
        $this->faculteEdit =  faculte::where('id_faculte', $id)->first()->ToArray();
        $this->dispatchBrowserEvent('showEditFac');
    }
    public function editPromotion()
    {
        $this->validate([
            "promotionEdit.id_faculte" => 'required',
            'promotionEdit.designation_promotion' => 'required'
        ]);
        $data = array(
            "designation_promotion" => $this->promotionEdit['designation_promotion'],

        );
        promotion::where('id_promotion', $this->promotionEdit['id_promotion'])->update($data);
        $this->dispatchBrowserEvent('showSuccessMessage', ["message" => "la promotion a ete bien modifier"]);
    }
    public function editFac()
    {
        $this->validate([
            'faculteEdit.designation_faculte' => 'required'
        ]);
        $data = array(
            "designation_faculte" => $this->faculteEdit['designation_faculte'],

        );
        faculte::where('id_faculte', $this->faculteEdit['id_faculte'])->update($data);
        $this->dispatchBrowserEvent('showSuccessMessage', ["message" => "la faculte  a ete bien modifier"]);
    }
    public function confirmDeleteFac($id, $name)
    {

        $this->dispatchBrowserEvent('showWarningMessage', [
            "message" => [
                "text" => "Vous etes sur le point de supprimer $name  de Faculte. voulez-vous continuer",
                "title" => "Etes-vous sur de continuer",
                "type" => "warning",
                "data" => [
                    "user_id" => $id
                ]
            ]

        ]);
    }
    public function deleteFac($id)
    {
        faculte::where("id_faculte", $id)->delete();
        $this->dispatchBrowserEvent('showSuccessMessage', ["message" => "utilisateur a ete supprimer avec success"]);
    }

    public function confirmDeletePromo($id, $name)
    {

        $this->dispatchBrowserEvent('showWarningMessagePromo', [
            "message" => [
                "text" => "Vous etes sur le point de supprimer $name  de promotion. voulez-vous continuer",
                "title" => "Etes-vous sur de continuer",
                "type" => "warning",
                "data" => [
                    "user_id" => $id
                ]
            ]

        ]);
    }
    public function deletePromo($id)
    {
        dd($id);
        promotion::where("id_promotion", $id)->delete();
        $this->dispatchBrowserEvent('showSuccessMessage', ["message" => "utilisateur a ete supprimer avec success"]);
    }



    public function render()
    {
        return view('livewire.Faculte.faculte-promotion', [
            "facultes" => faculte::all(),
            "promotions" => promotion::all(),
            "annees" => anneeAcademique::all(),
        ])->extends('layouts.admin')
            ->section('content');
    }
}
