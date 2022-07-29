
    
@extends('Layout.app1')

@section('contenu')
    <div class="hero-wrap hero-bread" style="background-image: url('frontend/images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="{{URL::to('/')}}">Home</a></span> <span>Checkout</span></p>
            <h1 class="mb-0 bread">Checkout</h1>
          </div>
        </div>
      </div>
    </div>
			 @if (Session::has('error'))
                      <div class="alert alert-danger" role="alert" >
                             <button type="button" class="close primary" data-dismiss="alert" aria-label="close">
                              <span aria-label="true">&times;</span>
                      </button>
                              <p> {{Session::get('error')}}</p>
                           {{---Session::put('message',null)---}}
                       </div>
				@elseif(Session::has('status'))
                     <div class="alert alert-succes" role="alert" >
                             <button type="button" class="close primary" data-dismiss="alert" aria-label="close">
                              <span aria-label="true">&times;</span>
                      </button>
                              <p> {{Session::get('status')}}</p>
                           {{---Session::put('message',null)---}}
                       </div>
                      
                 @endif
    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-7 ftco-animate">
			<form action="{{url('/payement')}}" class="billing-form" method="POST" id="checkout-form">
				{{csrf_field()}}
							<h3 class="mb-4 billing-heading">Billing Details</h3>
	          	<div class="row align-items-end">
	          		<div class="col-md-6">
	                <div class="form-group">
	                	<label for="firstname">Firt Name</label>
	                  <input type="text" class="form-control" placeholder="" id="card-name"name="card-name">
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                	<label for="lastname">Adresse</label>
	                  <input type="text" class="form-control" placeholder="" name="adresse">
	                </div>
                </div>
                <div class="w-100"></div>
		            
		           
					 <div class="col-md-12">
		            	<div class="form-group">
	                		<label for="towncity">Card Number</label>
	                  		<input type="text" id="card-number" class="form-control" placeholder="card Number" name="card-number" maxlength="16">
	                	</div>
		            </div>
					 <div class="col-md-6">
		            	<div class="form-group">
	                		<label for="towncity">Expiration Month</label>
	                  		<input type="text" id="card-expiry-month"  class="form-control"  placeholder="Month" maxlength="3">
	                	</div>
		            </div>
					<div class="col-md-6">
		            	<div class="form-group">
	                		<label for="towncity">Expiration Year</label>
	                  		<input type="text" id="card-expiry-year"  class="form-control"   maxlength="4">
	                	</div>
		            </div>
					<div class="col-md-6">
		            	<div class="form-group">
	                		<label for="towncity"> CVV</label>
	                  		<input type="text"  id="card-cvc" class="form-control" name="card-cvc" placeholder="" maxlength="4">
	                	</div>
		            </div>
	            </div>
				<input type="submit" value="Buy Now" class="btn btn-primary py-3 px-4">
	          </form>
			  <!-- END -->
					</div>
					<div class="col-xl-5">
	          <div class="row mt-5 pt-3">
	          	<div class="col-md-12 d-flex mb-5">
	          		<div class="cart-detail cart-total p-3 p-md-4">
	          			<h3 class="billing-heading mb-4">Cart Total</h3>
	          			<p class="d-flex">
		    						<span>Subtotal</span>
		    						<span>$20.60</span>
		    					</p>
		    					<p class="d-flex">
		    						<span>Delivery</span>
		    						<span>$0.00</span>
		    					</p>
		    					<p class="d-flex">
		    						<span>Discount</span>
		    						<span>$3.00</span>
		    					</p>
		    					<hr>
		    					<p class="d-flex total-price">
		    						<span>Total</span>
		    						<span>{{Session::get('cart')->totalPrice}} CDF</span>
		    					</p>
								</div>
	          	</div>
	          	<div class="col-md-12">
	          		<div class="cart-detail p-3 p-md-4">
	          			<h3 class="billing-heading mb-4">Payment Method</h3>
									<div class="form-group">
										<div class="col-md-12">
											<div class="radio">
											   <label><input type="radio" name="optradio" class="mr-2"> Direct Bank Tranfer</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<div class="radio">
											   <label><input type="radio" name="optradio" class="mr-2"> Check Payment</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<div class="radio">
											   <label><input type="radio" name="optradio" class="mr-2"> Paypal</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<div class="checkbox">
											   <label><input type="checkbox" value="" class="mr-2"> I have read and accept the terms and conditions</label>
											</div>
										</div>
									</div>
									<p><a href="#"class="btn btn-primary py-3 px-4">Place an order</a></p>
								</div>
	          	</div>
	          </div>
          </div> <!-- .col-md-8 -->
        </div>
      </div>
    </section> <!-- .section -->

    @endsection

@section('script')
<script src="https://js.stripe.com/v2/"></script>
<script src="src/js/checkout.js"></script> 
  <script>
		$(document).ready(function(){

		var quantitiy=0;
		   $('.quantity-right-plus').click(function(e){
		        
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		            
		            $('#quantity').val(quantity + 1);

		          
		            // Increment
		        
		    });

		     $('.quantity-left-minus').click(function(e){
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		      
		            // Increment
		            if(quantity>0){
		            $('#quantity').val(quantity - 1);
		            }
		    });
		    
		});
	</script>
        @endsection