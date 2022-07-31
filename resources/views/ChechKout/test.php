
// in  the file blade layouts/app.blade.php

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


    
    @livewireStyles
</head>
<body>

<div>


   {{$slot}}

</div>


    

@livewireScripts
</body>
</html>












// in the console 

composer require stripe/stripe-php

php artisan make:livewire mystripe








// in the stripe livewire controller


<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Mystripe extends Component
{

    public $intent ;


    protected $listeners = ['payer' => 'payer'];


    public function mount() {

        \Stripe\Stripe::setApiKey('sk_test_aPm1VDsuUszU0FMSNa3WUzNP00q');
        		
		
		$amount = 4000;
        // the real price is 40  you have to multiply by 100.
        
        $payment_intent = \Stripe\PaymentIntent::create([
			'description' => 'Stripe Test Payment',
			'amount' => $amount,
			'currency' => 'EUR',
			'description' => 'Payment From Codehunger',
			'payment_method_types' => ['card'],
		]);
		$this->intent = $payment_intent->client_secret;
    }
    


    public function payer() {

        // action after paiement success 
        // you can redirect to another page for example

        
        
    }


    public function render()
    {
        return view('livewire.mystripe');
    }
}





// in the stripe livewire view



<div>
   

     <!-- put your stripe key. -->
      @php
        $stripe_key = 'pk_test_NHgmU89wAVV4OE33YXlI9mZu00d5Yho1pI';
    @endphp
    <div class="container" style="margin-top:10%;margin-bottom:10%">
        <div class="row justify-content-center">
            <div class="col-md-6">
                
                <div class="card">
                    <form action=""   id="payment-form">
                        @csrf                    
                        <div class="form-group">
                            <div class="card-header">
                                <label for="card-element">
                                    Paiement carte bancaire
                                </label>
                            </div>
                            <div class="card-body">
                                <div id="card-element" class="form-control" >
                                <!-- A Stripe Element will be inserted here. -->
                                </div>
                                <!-- Used to display form errors. -->
                                <div id="card-errors" role="alert"></div>
                                <input type="hidden" name="plan" value="" />
                            </div>
                        </div>
                        <div class="card-footer">

                      
                          <button
                          id="card-button"
                          class="btn btn-dark"
                          type="submit"
                          data-secret="{{ $intent }}"
                        >  Payer      </button>
                       

                       
                       
                    


                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



     
    







   <style>

.card {
    border : 1px solid black ;
}
#card-button {
    width : 200px ;
    background-color : blue ;
}
.card-footer {
    text-align : center ;
}

.card-body {

    border-top : 1px solid white ;
    border-bottom : 1px solid white ;
}






   </style>





    <script src="https://js.stripe.com/v3/"></script>
    <script>
        // Custom styling can be passed to options when creating an Element.
        // (Note that this demo uses a wider set of styles than the guide below.)

        var style = {
            base: {
                color: 'black',
                lineHeight: '18px',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: 'black'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };
    
        const stripe = Stripe('{{ $stripe_key }}', { locale: 'fr' }); // Create a Stripe client.
        const elements = stripe.elements(); // Create an instance of Elements.
        const cardElement = elements.create('card', { style: style }); // Create an instance of the card Element.
        const cardButton = document.getElementById('card-button');
        const clientSecret = cardButton.dataset.secret;
    
        cardElement.mount('#card-element'); // Add an instance of the card Element into the `card-element` <div>.
    
        // Handle real-time validation errors from the card Element.
        cardElement.addEventListener('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });
    
        // Handle form submission.
        var form = document.getElementById('payment-form');
    
        form.addEventListener('submit', function(event) {
            event.preventDefault();
    
        stripe.handleCardPayment(clientSecret, cardElement, {
                payment_method_data: {
                    billing_details: { name: 'james smith' }
                }
            })
            .then(function(result) {
               if (result.error) {
        
                     var errorElement = document.getElementById('card-errors');
                     errorElement.textContent = result.error.message;

                      alert('there is an error paiement') ;

                  } else {
                 if (result.paymentIntent.status === 'succeeded') {

                   
                    Livewire.emit('payer') ;
                      
        
                    }
                     else if (result.paymentIntent.status === 'requires_payment_method') {
          
                      
                        
                         alert('there is an error paiement') ;
                  }
                  }
                
            });
        });
    </script>


</div>









// in the router web

use App\Http\Livewire\Mystripe;

Route::get('/stripe', Mystripe::class)->name('stripe');



