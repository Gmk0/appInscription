<div class="container py-3">
    <!-- For demo purpose -->

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
                        <div id="credit-card" class="tab-pane fade show active pt-3" style="min-height:350px;">
                       
                            <form role="form" onsubmit="event.preventDefault()" id="checkout-form">
                                <div class="form-group"> <label for="username">
                                        <h6>Card Owner</h6>
                                    </label> <input type="text" name="username" placeholder="Card Owner Name" required value="{{$etudiant->etudiant->Nom}} / {{$etudiant->etudiant->matricule}} " id="card-name" class="form-control " disabled> </div>
                                <div class="form-group"> <label for="cardNumber">
                                        <h6>Card number</h6>
                                    </label>
                                    <div class="input-group"> <input type="text" name="cardNumber" id="card-number" placeholder="Valid card number" class="form-control " required>
                                        <div class="input-group-append"> <span class="input-group-text text-muted"> <i class="fab fa-cc-visa mx-1"></i> <i class="fab fa-cc-mastercard mx-1"></i> <i class="fab fa-cc-amex mx-1"></i> </span> </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="form-group"> <label><span class="hidden-xs">
                                                    <h6>Expiration Date</h6>
                                                </span></label>
                                            <div class="input-group"> <input type="number" id="card-expiry-month"  placeholder="MM" name="" class="form-control" required> <input type="number" id="card-expiry-year"  placeholder="YY" name="" class="form-control" required> </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group mb-4"> <label data-toggle="tooltip" title="Three digit CV code on the back of your card">
                                                <h6>CVV <i class="fa fa-question-circle d-inline"></i></h6>
                                            </label> <input type="text" id="card-cvc" required class="form-control"> </div>
                                    </div>
                                </div>
                                <div class="card-footer"> <button type="button" class="subscribe btn btn-primary btn-block shadow-sm"> Confirm Payment </button>
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
<script src="https://js.stripe.com/v2/"></script>
<script src="{{asset('js/checkout.js')}}"></script> 
@endpush