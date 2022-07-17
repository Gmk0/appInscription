<?php

namespace App\Http\Livewire;

use App\Models\faculte;
use App\Models\promotion;
use Livewire\Component;

class FacultePromotion extends Component
{
	public $faculte;
	public $promotion=[];



	public function updated($fields){
	    $this->validateOnly($fields,[
	        "faculte"=>"required",
            "promotion.designation_promotion"=>"required|string",
            "promotion.id_promotion"=>"required|string"
        ]);
    }
	  public function registerFaculte(){

        $this->validate([
            "faculte"=>"required",
        ]);
        $faculte= new faculte();
        $faculte->designation_faculte = $this->faculte;
        $faculte->save();

        $this->dispatchBrowserEvent('showSuccessMessage',["message"=>"La faculte creer avec success"]);
        $this->faculte =[];
    }

      public function registerPromotion(){
          $this->validate([
              "promotion.id_faculte" => 'required',
              'promotion.designation_promotion'=>'required'
          ]);

          $data= $this->promotion;

          promotion::create($data);
          $this->dispatchBrowserEvent('showSuccessMessage',["message"=>"La promotion a ete  creer avec success"]);
          $this->promotion =[];


    }

    public function cleanModal(){
	    $this->promotion =[];
    }



    public function render()
    {
        return view('livewire.Faculte.faculte-promotion',[
            "facultes"=>faculte::all(),
            "promotions"=>promotion::all()
        ])->extends('layouts.admin')
            ->section('content');
    }
}
