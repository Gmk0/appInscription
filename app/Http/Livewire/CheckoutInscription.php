<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\etudiantInscrit;
use App\Models\paiementFrais;
use Illuminate\Http\Request;
use Stripe\Charge;
use Stripe\Stripe;
use Session;




class CheckoutInscription extends Component
{
    public $etudiants;
    public $intent;
    public $client;
    Public $matricule;
    public $amount=3000;
    protected $listeners = ['payer' => 'payer'];

    public function  mount($matricule)
    {
        $this->etudiants = etudiantInscrit::where('matricule_etudiant',$matricule)->get();
        $this->matricule=$matricule;
    
        \Stripe\Stripe::setApiKey('sk_test_51KxdgQB5uPnFOAdoXl8Ew4LFU9Y0fkMlYFWhLj63JDkOKDaqzlK3TBo9cWD3XpFc9RMQAAa1f3yer3JOLDI4khWk00gu8VFsV4');
        $payment_intent = \Stripe\PaymentIntent::create([
			'description' => 'Stripe Test Payment',
			'amount' => $this->amount,
			'currency' => 'usd',
			'description' => 'Frais inscription',
			'payment_method_types' => ['card'],
		]);
		$this->intent = $payment_intent->client_secret;
       
    }

    public function payer()
    {
            


            $data= new paiementFrais;
            $data->matricule_etudiant=$this->matricule;
            $data->id_payement= $this->intent;
            $data->client=$this->client;
            $data->save();
            $this->dispatchBrowserEvent('showSuccessMessage',["message"=>"utilisateur a ete modifier avec success"]);
        

         
       
    }
    public function test()
    {
        $this->validate([
            'client'=>"required",
                ]);
    }
 
    public function render()
    {
        return view('livewire.checkout-inscription')
        ->extends('layouts.Client')
        ->section('content');
    }
}
