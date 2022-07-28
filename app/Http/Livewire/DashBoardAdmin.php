<?php

namespace App\Http\Livewire;
use App\Models\etudiantInscrit;

use Livewire\Component;
use Carbon\Carbon;

class DashBoardAdmin extends Component
{
    public $count;
    public $dateNow;
    
    public function mount(){
        $etudiant = etudiantInscrit::all();
        $etudiantNow =  etudiantInscrit::whereDate('created_at',Carbon::today())->get();
       
        $this->count = $etudiant->count();
        $this->dateNow = $etudiantNow->count();

    }
   

    public function render()
    {
        return view('livewire.users.dash-board-admin');
    }
}
