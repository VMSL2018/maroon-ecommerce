@extends('frontend.layouts.app')

@section('contents')


	
<!-- page title -->
<div class="page_title_area">
	<div class="container">
		<div class="row">
			<div class="col-sm-4">
				<div class="page_title">
					<h1>ORDER HISTORY</h1>
				</div>
			</div>
			<div class="col-sm-8">
				<div class="bredcrumb">
					<ul>
						<li><a href="#">Home</a></li>
						<li><a href="#">Shop</a></li>
						<li><a href="#">Order History</a></li>
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
					<thead>
						<tr>
							<th colspan="3" class="product-name">Product</th>
							<th class="product-number">Id Number</th>
							<th class="product-price">Price</th>
							<th class="product-quantity">Quantity</th>
							<th class="product-subtotal">Sub Total</th>
						</tr>
					</thead>
					<tbody>
						<tr class="cart_item">
							<td class="product-remove">
								<a href="/cart/" class="remove" title="Remove this item"><img src="/frontend/img/icons/remove.png" alt="" /></a>					
							</td>
							<td class="product-thumbnail">
								<a href=""><img width="30" height="50" src="" alt="Adventure"></a>
							</td>
							<td class="product-info">
								<!--<a href="">Best worker shoes </a>-->
								<p></p>
							</td>
							<td class="product-number">
								<span></span>
							</td>
							<td class="product-price">
								<span class="amount"></span>					
							</td>
							<td class="product-quantity">
								<div class="quantity">
									
								</div>
							</td>
							<td class="product-subtotal">
								<span class="amount-subtotal"></span>					
							</td>
						</tr>
					</tbody>
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

	</script>
@endsection
	
