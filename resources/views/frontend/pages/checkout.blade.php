@extends('frontend.layouts.app')

@section('contents')


	   <!-- page title -->
	<div class="page_title_area">
		<div class="container">
			<div class="row">
				<div class="col-sm-8">
					<div class="page_title">
						<h1>Checkout</h1>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="bredcrumb">
						<ul>
							<li><a href="#">Home</a></li>
							<li><a href="#">Shop</a></li>
							<li><a href="#">checkout</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--/ page title -->
	
	<div class="checkout margin-bottom-70px">
		<div class="container">
			<div class="row">
				<form action="/payment" method="post">
					@csrf
					<div class="col-md-6">
						<div class="billing margin-bottom-50px">
							<h3>Billing Details</h3>
							<div class="info-sec">
								<input type="hidden" name="invoices_id" value="{{ Session::get('invoices_id')  }}"/>
								<div class="first-name col-md-6 no-padding-left">
									<label for="first-name">first name <span class="required">*</span></label><br>
									<input type="text" name="billing_first_name" value="" id="billing_first_name" required>
								</div>
								
								<div class="last-name col-md-6 no-padding-left no-padding-right">
									<label for="last-name">Last name <span class="required">*</span></label><br>
									<input type="text" name="billing_last_name" value="" id="billing_last_name" required>
								</div>
							
								<div class="your-address">
									<label for="company-name">Address<span class="required">*</span></label>
									<input type="text" name="billing_your_address" placeholder="enter your address" id="billing_first_address" required>
								</div>
								<br>
								<div class="second-address">
									<input type="text" name="billing_second_address" placeholder="second address line" id="billing_second_address" required>
								</div>
								
								<div class="your-email col-md-6 no-padding-left">
									<label for="your-email">Email Address<span class="required"></span></label>
									<input type="email" name="billing_email" placeholder="email" id="billing_email">
									<p class="warning-text"> * Fill up your email to get invoice details</p>
								</div>
								
								<div class="phone-number col-md-6 no-padding-left no-padding-right">
									<label for="phone-number">Phone Number <span class="required">*</span></label><br>
									<input type="text" maxlength="11" minlenth="11" name="billing_phone_number" value="" placeholder="+880" id="billing_mobile" required>
								</div>
							</div>
						</div>
					</div>
						
					<div class="col-md-6">
						<div class="ship-different-address margin-bottom-50px">
							<div class="payment">
								<h3>Different Shipping Address</h3>
								<div class="payment-method">
									<table>
										<tbody>
											<tr class="">
												<th>
												  <input type="checkbox" name="same_shipping_address" value="" id="same_shipping_address" >Same as Billing Address<br>
												</th>
											</tr>		
										</tbody>
									</table>
								</div>
							</div>
							<div class="info-sec">
								<div class="first-name col-md-6 no-padding-left">
									<label for="first-name1">first name <span class="required">*</span></label>
									<input type="text" name="shipping_first_name" value="" id="shipping_first_name" required>
								</div>
								
								<div class="last-name col-md-6 no-padding-left no-padding-right">
									<label for="last-name1">Last name <span class="required">*</span></label><br>
									<input type="text" name="shipping_last_name" value="" id="shipping_last_name" required>
								</div>
								
								
								<div class="your-address">
									<label for="your-address2">Address<span class="required">*</span></label>
									<input type="text" name="shipping_your_address" placeholder="enter your address" id="shipping_first_address" required>
								</div>
								<br>
								<div class="second-address">
									<input type="text" name="shipping_second_address" placeholder="second address line" id="shipping_second_address" required>
								</div>
								
								<div class="your-email col-md-6 no-padding-left">
									<label for="your-email">Email Address<span class="required">*</span></label>
									<input type="email" name="shipping_email" placeholder="email" id="shipping_email" required>
									<p class="warning-text"> * Fill up your email to get invoice details</p>
								</div>
								
								<div class="phone-number col-md-6 no-padding-left no-padding-right">
									<label for="phone-number">Phone Number <span class="required">*</span></label><br>
									<input type="text" maxlength="11" minlenth="11" name="shipping_phone_number" value="" placeholder="+880" id="shipping_mobile" required>
								</div>
							</div>
						</div>
					</div>
				
			</div>
			<hr>
			<div class="row">
				<div class="col-md-6">
					<div class="cart-totals">
						<h3>Cart totals</h3>
						<div class="info-sec">
							<table>
								<tbody>
									<tr class="cart-subtotal">
										<th colspan="3">SUBTOTAL</th>
										<td class="subtotal">{{ $sub_total }}</td>
									</tr>
									<tr class="order-shipping">
										<th colspan="3">shipping</th>
										<td class="shipping">{{ $shipping }} BDT</td>
									</tr>
									<tr class="order-shipping">
										<th colspan="3">Discount</th>
										<td class="shipping">{{ $discount }} BDT</td>
									</tr>
									<tr class="order-total">
										<th colspan="3">order total</th>
										<td class="amount"><strong>{{ $order_total }} BDT</strong></td>
									</tr>			
									<input type="hidden" name="sub_total" value="{{ $sub_total }}"/>
									<input type="hidden" name="shipping" value="{{ $shipping }}"/>
									<input type="hidden" name="discount" value="{{ $discount }}"/>
									<input type="hidden" name="order_total" value="{{ $order_total }}"/>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				
				<div class="col-md-6">
					<div class="payment">
						<h3>payment method</h3>
						<div class="payment-method">
							<table>
								<tbody>
									<tr class="">
										<th>
										  <input type="radio" name="payment_method" value="cash" id="cash" required>Cash On Delivery<br>
										</th>
										<th>
											<input type="radio" name="payment_method" value="online" id="visa" required>Online Payment<br>
										</th>
									</tr>		
								</tbody>
							</table>
							
						</div>
						<div class="cupon-code text-right margin-top-20px">
							<input type="submit" name="checkout" value="place order" class="btn-black calculate">
						</div>
					</div>
				</div>
				</form>
			</div>
		</div>
	</div>

    
    
<!--footer.blade.php-->

@endsection

@section('footer')

<script>
$(document).ready(function () {
    var ckbox = $('#same_shipping_address');

    $('input:checkbox').on('click',function (){


			// GETTING DATA FROM SHIPPING ADDRESS
            var billing_first_name		=	document.getElementById("billing_first_name").value;
            var billing_last_name		=	document.getElementById("billing_last_name").value;
            var billing_first_address	=	document.getElementById("billing_first_address").value;
            var billing_second_address	=	document.getElementById("billing_second_address").value;
            var billing_email			=	document.getElementById("billing_email").value;
            var billing_mobile			=	document.getElementById("billing_mobile").value;
            
            // PUTTING DATA IN BILLING ADDRESS
            if( billing_first_name && billing_last_name && billing_first_address && billing_second_address && billing_mobile){
	            document.getElementById("shipping_first_name").value		= billing_first_name;
	            document.getElementById("shipping_last_name").value 		= billing_last_name;
	            document.getElementById("shipping_first_address").value		= billing_first_address;
	            document.getElementById("shipping_second_address").value 	= billing_second_address;
	            if(billing_email){
	            	document.getElementById("shipping_email").value				= billing_email;
	            }
	            document.getElementById("shipping_mobile").value 			= billing_mobile;
            }else{
            	
            	var uncheckstatus = $("#same_shipping_address").prop("checked", false);
            	alert('Fill all the field in billing address');
            	
            }
        

    });
});


function checkout(){
	var phone = $('billing_phone').va();
}



</script>

@endsection

	
