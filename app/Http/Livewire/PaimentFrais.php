<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PaimentFrais extends Component
{




    public function render()
    {
        return view('livewire.Checkout.paiment-frais')
            ->extends('layouts.admin')
            ->section('content');
    }
}
