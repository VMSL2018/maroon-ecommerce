@extends('frontend.layouts.app')

@section('contents')

	
	<!-- page title -->
	<div class="page_title_area">
		<div class="container">
			<div class="row">
				<div class="col-sm-4">
					<div class="page_title">
						<h1>SHOPPING CART</h1>
					</div>
				</div>
				<div class="col-sm-8">
					<div class="bredcrumb">
						<ul>
							<li><a href="#">Home</a></li>
							<li><a href="#">Shop</a></li>
							<li><a href="#">Cart</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--/ page title -->
	
	<!-- Shopping Cart -->
	
	<div class="shopping-cart margin-bottom-70px">
		<div class="container">
			@if(!empty($cart_items))
			<div class="row">
				<div class="table-responsive">
					<table class="shop_table table-sm">
						<thead>
							<tr class="">
								<th class="text-center"></th>
								<th>product</th>
								<th class="text-center product-name"></th>
								<th class="product-number">sku</th>
								<th class="product-price">price</th>
								<th>color</th>
								<th>size</th>
								<th class="product-quantity">quantity</th>
								<th class="product-subtotal">sub total</th>
							</tr>
						</thead>
						<tbody>
							@php
								$sub_total = 0;
							@endphp
							@foreach($cart_items  as $key=> $row)

								<tr class="cart_item">
									<td class="product-remove">
										<a href="/cart/{!! $key+1 !!}" class="remove" title="Remove this item"><i class="fa fa-trash fa-2x"></i> </a>					
									</td>
									<td class="product-thumbnail">
										<a href=""><img width="30" height="30" src="{{ $row['product_variation_image'] }}" alt="MAROON"></a>
									</td>
									<td class="product-info text-center">
										<p>{!! $row['product_title'] !!}</p>
									</td>
									<td class="product-number">
										<span>{!! $row['sku'] !!}</span>
									</td>
									<td class="product-price">
										<span class="amount">{!! $row['price'] !!}</span>					
									</td>
									<td class="product-price">
										<span class="amount">{!! $row['size_name'] !!}</span>					
									</td>
									<td class="product-price">
										<span class="amount">{!! $row['color_name'] !!}</span>					
									</td>
									<td class="product-quantity">
										<div class="quantity">
											{!! $row['quantity'] !!}
										</div>
									</td>
									<td class="product-subtotal">
										<span class="amount-subtotal">{{ $row['sub_total'] }}</span>					
									</td>
								</tr>
							@php
								$sub_total += $row['sub_total'];
							@endphp
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
			
			<div class="row">
				<form method="post" action="/checkout">
					@csrf
				<div class="col-md-4">
					<h4>calculate shipping</h4>
					<div class="calculate-shipping">
						<select name="shipping_method" id="shipping_method" onChange="checkoutData()" class="country" required>
							<option value="">- Select shipping area -</option>
							<option value="60">INSIDE DHAKA CITY</option>
							<!--<option value="75">SUB-URBAN DHAKA</option>-->
							<option value="100">OUTSIDE DHAKA</option>
						</select>
						
					</div>
					<div class="text-center">
						<!--<button class="trendify-btn black-bordered" style="background:white;">Calculate Shipping</button> -->
					</div>
					
				</div>
				
				<div class="col-md-4">
					<div class="cupon-code">
						<h4>enter a coupon code</h4>
						<input type="text" name="coupon" value="" class="cupon" id="coupon">
						<div class="text-center">
							<a type="buttom" class="trendify-btn black-bordered" style="background:white;" onclick="coupon()">APPLY COUPON</a> 
						</div>
					</div>
				</div>
				
				<div class="col-md-4">
					<div class="cupon-code">
						<h4>CART TOTALS</h4>
						<table>
							<tbody>
								<tr class="cart-subtotal">
									<th>SUBTOTAL</th>
									<td><span class="subtotal" id="sub_total">@php echo $sub_total @endphp BDT</span></td>
								</tr>
								<tr class="order-shipping">
									<th>shipping</th>
									<td><span class="shipping" id="shipping_charge">0 BDT</span></td>
								</tr>
								<tr class="order-shipping">
									<th>Discount</th>
									<td><span class="shipping" id="discount">0 BDT</span></td>
								</tr>
								<tr class="order-total">
									<th>order total</th>
									<td><span class="amount" id="order_total"><strong>@php echo $sub_total @endphp BDT</strong></span></td>
								</tr>			
							</tbody>
						</table>
					</div>
					<hr>
					<div class="cupon-code">
						<ul>
							<li>
								<input type="checkbox" name="tos" id="tos" class="css-checkbox" required autofocus/>
								<label for="tos" class="css-label">I agree with the terms of service and I adhere to them unconditionally <a href="/conditions-of-use" target="_blank">(read)</a></label>
							</li>
						</ul>	
					</div>
					<br>
					<div class="text-center">
							<input type="hidden" name="sub_total" value="@php echo $sub_total @endphp BDT"/>
							<input type="hidden" name="discount_amount" id="discount_amount" value=""/>
							<input type="hidden" name="order_total" id="order_total_checkout" value=""/>

							<button class="trendify-btn black-bordered" style="background:white;" type="submit" onclick="tos_check()" >PROCEED CHECKOUT</button> 
					</div>
				</div>
				</form>
			</div>
			@else
				<h2 class="text-center">NO ITEMS IN THE CART</h2>
				<br><br><br><br>
			@endif
		</div>
	</div>
	
	<!-- / Shopping Cart -->
    
    
	<!--footer.blade.php-->

@endsection


@section('footer')
	<script type="text/javascript">
	
		function checkoutData(){
			var sub_total = document.getElementById('sub_total').innerHTML;
			var shipping_method = document.getElementById('shipping_method').value;
			
			document.getElementById('shipping_charge').innerHTML = shipping_method+"  BDT";
			
			var order_total = parseInt(sub_total)+parseInt(shipping_method);
			
			document.getElementById('order_total').innerHTML = order_total+"  BDT";
			document.getElementById('order_total_checkout').value = order_total;
			
			
		}
		
		function coupon(){
			var coupon = document.getElementById('coupon').value;
			var shipping_method = document.getElementById('shipping_method').value;
			
		
			if(coupon && shipping_method){
				
	            $.ajax({
	                type: 'POST',
	                url : '/coupon',
	                data:{
	                    'coupon'	:	coupon,
	                    _token: $('meta[name="csrf-token"]').attr('content')
	                },
	                success:function(data){
						var percentage = data;
						var sub_total = document.getElementById('sub_total').innerHTML;
						var shipping_method = document.getElementById('shipping_method').value;
						
						
						var discount = Math.floor((percentage*parseInt(sub_total))/100);
						document.getElementById('discount').innerHTML = discount+"  BDT";
						document.getElementById('discount_amount').value = discount;
						
						document.getElementById('shipping_charge').innerHTML = shipping_method+"  BDT";
						
						var order_total = parseInt(sub_total)- discount +parseInt(shipping_method);
						
						document.getElementById('order_total').innerHTML = order_total+"  BDT";
						document.getElementById('order_total_checkout').value = order_total;
						
						
	            	}
	           });
				
			}else{
				alert("Select shipping method and Fill coupon field");
			}
		}
		
		
		function tos_check(){
			var Checked = $('#tos:checkbox:checked').length > 0;
			if(!Checked){
				alert("check Terms and Condition box");
			}
		}
	</script>
@endsection
	
