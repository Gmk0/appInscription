<div class="container py-3">



    @php
        $stripe_key ='pk_test_51KxdgQB5uPnFOAdoVKnpSM8tIRiazOXyouxD2N0trLn3kIU0WHGt8Wo2y436aBgUCt9KI8LEZDHjY11or5OrNRV800EO4yIZvD';
    @endphp
   @foreach ($etudiants as $etudiant)



    <div class="row">
        <div class="col-lg-6 mx-auto">
            <div class="card">

                <div class="card-header" >
                    <div class="bg-white shadow-sm pt-2 pl-2 pr-2 pb-2">

                        <ul role="tablist" class="nav bg-light nav-pills rounded nav-fill mb-3">
                            <li class="nav-item"> <a data-toggle="pill" href="#credit-card" class="nav-link active "> <i class="fas fa-credit-card mr-2"></i> Credit Card </a> </li>
                            <li class="nav-item"> <a data-toggle="pill" href="#paypal" class="nav-link "> <i class="fab fa-paypal mr-2"></i> Paypal </a> </li>
                            <li class="nav-item"> <a data-toggle="pill" href="#net-banking" class="nav-link "> <i class="fas fa-bank mr-2"></i> Bank </a> </li>
                            <li class="nav-item"> <a data-toggle="pill" href="#net-Mobile" class="nav-link "> <i class="fas fa-bank mr-2"></i> Mobile Bank </a> </li>

                        </ul>
                    </div>


                    <div class="tab-content">
                       <div class="pt-2">
                        <p class="text-muted">
                            payement mount 20$ for inscription and 10$ for card identity  pay for student matricule {{$etudiant->etudiant->matricule_etudiant}}
                        </p>
                        <h5><span class="text-success">TOTAL PRICE:30$</span>  </h5>
                       </div>
                       <hr>
                        <div id="credit-card" class="tab-pane fade show active pt-3" style="min-height:250px;">

                            <form role="form" wire:submit.prevent="test"  id="payment-form">

                                <div class="form-group"> <label for="username">
                                        <h6>Card Owner</h6>
                                    </label> <input type="text" name="username" placeholder="Card Owner Name" required value="{{$etudiant->etudiant->Nom}} /  " id="card-name" class="form-control" wire:model="client">
                                <input type="hidden" name="matricule" id="" value="{{$etudiant->etudiant->matricule_etudiant}}">
                            </div>

                                <div id="card-element" class="form-control mb-4"></div>
                                    <!-- A Stripe Element will be inserted here. -->

                                    <!-- Used to display form errors. -->
                                    <div id="card-errors" role="alert"></div>

                                <div class="card-footer"> <button type="submit" class="subscribe btn btn-primary btn-block shadow-sm" data-secret="{{ $intent }}" id="card-button"> Confirm Payment </button>
                            </form>
                        </div>
                    </div> <!-- End -->
                    <!-- Paypal info -->
                    <div id="paypal" class="tab-pane fade pt-3" style="min-height:350px;">
                        <h6 class="pb-2">Select your paypal account type</h6>
                        <div class="form-group "> <label class="radio-inline"> <input type="radio" name="optradio" checked> Domestic </label> <label class="radio-inline"> <input type="radio" name="optradio" class="ml-5">International </label></div>
                        <p> <button type="button" class="btn btn-primary "><i class="fab fa-paypal mr-2"></i> Log into my Paypal</button> </p>
                        <p class="text-muted"> Note: After clicking on the button, you will be directed to a secure gateway for payment. After completing the payment process, you will be redirected back to the website to view details of your order. </p>
                    </div> <!-- End -->
                    <!-- bank transfer info -->
                    <div id="net-banking" class="tab-pane fade pt-3" style="min-height:350px;">
                       <h6>Banque Compte Details</h6>
                       <H5>BANK</H5>
                       <p>RAWBANK</p>
                       <H5>COMPTE BANCAIRE</H5>
                       <p>12345087895038404755</p>
                       <p class="text-muted"> Note: After clicking on the button, you will be directed to a secure gateway for payment. After completing the payment process, you will be redirected back to the website to view details of your order. </p>

                    </div> <!-- End -->
                    <!-- End -->

                     <!-- bank Mobile info -->
                     <div id="net-Mobile" class="tab-pane fade pt-3" style="min-height:350px;">
                        <div class="form-group "> <label for="Select Your Bank">
                                <h6>Select your Bank</h6>
                            </label> <select class="form-control" id="ccmonth">
                                <option value="" selected disabled>--Please select your Bank--</option>
                                <option>Bank 1</option>
                                <option>Bank 2</option>
                                <option>Bank 3</option>
                                <option>Bank 4</option>
                                <option>Bank 5</option>
                                <option>Bank 6</option>
                                <option>Bank 7</option>
                                <option>Bank 8</option>
                                <option>Bank 9</option>
                                <option>Bank 10</option>
                            </select> </div>
                        <div class="form-group">
                            <p> <button type="button" class="btn btn-primary "><i class="fas fa-mobile-alt mr-2"></i> Proceed Payment</button> </p>
                        </div>
                        <p class="text-muted">Note: After clicking on the button, you will be directed to a secure gateway for payment. After completing the payment process, you will be redirected back to the website to view details of your order. </p>
                    </div> <!-- End -->
                    <!-- End -->


                </div>
            </div>
        </div>
    </div>

    @endforeach
</div>
</div>

@push('checkout')
<script src="https://js.stripe.com/v3/"></script>
<script>
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
        const cardHoderName = document.getElementById('card-name');

        cardElement.mount('#card-element'); // Add an instance of the card Element into the `card-element` <div>.

        // Handle real-time validation errors from the card Element.
        cardElement.addEventListener('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
                Swal.fire({

                            icon:'error',

                            title:"operation faild",
                            text: event.error.message,
                            showConfirmButton: true,
                            timer:5000

                        }) ;
            } else {
                displayError.textContent = '';
            }
        });

        // Handle form submission.
        var form = document.getElementById('payment-form');

        form.addEventListener('submit', function(event) {
            event.preventDefault();
            cardButton.disabled =true;


        stripe.handleCardPayment(clientSecret, cardElement, {
                payment_method_data: {
                    billing_details: { name: cardHoderName.value}
                }
            })
            .then(function(result) {
               if (result.error) {

                     var errorElement = document.getElementById('card-errors');
                     errorElement.textContent = result.error.message;

                            Swal.fire({

                            icon:'error',

                            title:"operation faild",
                            text:result.error.message,
                            showConfirmButton: true,
                            timer:5000

                        })

                  } else {
                 if (result.paymentIntent.status === 'succeeded') {


                    Livewire.emit('payer');
                    cardHoderName = @this.client;


                    }
                     else if (result.paymentIntent.status === 'requires_payment_method') {



                        Swal.fire({

                            icon:'error',

                            title:"operation faild",
                            text:result.error.message,
                            showConfirmButton: true,
                            timer:5000

                        });
                  }
                  }

            });
        });

        window.addEventListener('showSuccessMessage', event=> {
        Swal.fire({
            position: 'top-end',
            icon:'success',
            toast: true,
            title:"operation reussie",
            text:event.detail.message,
            showConfirmButton: false,
            timer:5000

        })
    });



 </script>
@endpush
