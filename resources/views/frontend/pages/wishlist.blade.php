@extends('frontend.layouts.app')

@section('contents')

	
	<!-- page title -->
	<div class="page_title_area">
		<div class="container">
			<div class="row">
				<div class="col-sm-4">
					<div class="page_title">
						<h1>WISHLIST</h1>
					</div>
				</div>
				<div class="col-sm-8">
					<div class="bredcrumb">
						<ul>
							<li><a href="#">Home</a></li>
							<li><a href="#">Shop</a></li>
							<li><a href="#">Wishlist</a></li>
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
			<div class="row">
				<div class="table-responsive">
					<table class="shop_table table-sm">
						@if(!empty($wishlist))
						<thead>
							<tr class="">
								<th class="text-center"></th>
								<th>product</th>
								<th class="text-center product-name"></th>
								<th class="product-number text-center">sku</th>
								<th class="product-price text-center">price</th>
							</tr>
						</thead>
						<tbody>
							
							@foreach($wishlist  as $key=> $row)
								@php
									$id = \Hashids::connection('main')->encode($row['products_id']);
								@endphp
								<tr class="cart_item">
									<td class="product-remove">
										<a href="/wishlist/{!! $key+1 !!}" class="remove" title="Remove this item"><i class="fa fa-trash fa-2x"></i> </a>					
									</td>
									<td class="product-thumbnail">
										<a href="/product/{!! $id !!}"><img width="30" height="30" src="{{ $row['image_url'] }}" alt="MAROON"></a>
									</td>
									<td class="product-info text-center">
										<a href="/product/{!! $id !!}">{!! $row['product_title'] !!}</a> 
									</td>
									<td class="">
										{!! $row['sku'] !!}
									</td>
									<td class="">
										BDT {!! $row['price'] !!}			
									</td>
								</tr>
							@endforeach
						</tbody>
						@else
							<h2 class="text-center">NO ITEMS IN THE WISHLIST</h3>
						@endif
					</table>
				</div>
			</div>
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
			// Hello
		}
	</script>
@endsection
	
