@extends('frontend.layouts.app')

@section('contents')

	
	<!-- page title -->
	<div class="page_title_area">
		<div class="container">
			<div class="row">
				<div class="col-sm-4">
					<div class="page_title">
						<h1>My Account</h1>
					</div>
				</div>
				<div class="col-sm-8">
					<div class="bredcrumb">
						<ul>
							<li><a href="/home">Home</a></li>
							<li><a href="/account">My Account</a></li>
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
			    <div class="col-md-3">
      				<div class="table-responsive">
    					<table class="shop_table table-sm">
    						<thead>
    							<tr class="">
    								<th>
    								    <a href="/account">Profile</a>
								    </th>
    							</tr>
    							<tr class="">
    								<th>
    								    <a href="/customer-order-history">Orders</a>
								    </th>
    							</tr>
    							<tr class="">
    								<th><a href="/wishlist">Wishlist</a></th>
    							</tr>
    						</thead>
    					</table>
    				</div>  
			    </div>
			    <div class="col-md-9">
                    <div class="row">
                        <!--Customer Information-->
                        <div class="col-md-12">
                            <h4>Your Information&nbsp;&nbsp;&nbsp;<span class="label label-info">EDIT</span></h4>
                            <p>
                                <i class="fa fa-user"></i> Shovon Rahman Shuvo
                                <br>
                                <i class="fa fa-phone"></i> 01534653592
                                <br>
                                <i class="fa fa-envelope"></i> akandshuvo@gmail.com
                            </p>
        					<hr>
                        </div>
                        
                        <!--Billing Information-->
                        <div class="col-md-6">
                            <h4>Billing Information&nbsp;&nbsp;&nbsp;<span class="label label-info">EDIT</span></h4> 
                            <p>
                                Shovon Shuvo<br>Flat#10A,Udayan Roktokarabi,Mirpur-3,Dhaka Commerce college Road
                            </p>  
                            <hr>
                        </div>
                        <!--Shipping Information-->
                        <div class="col-md-6">
                            <h4>Shipping Information&nbsp;&nbsp;&nbsp;<span class="label label-info">EDIT</span></h4>
                            <p>
                                Shovon Shuvo<br>Flat#10A,Udayan Roktokarabi,Mirpur-3,Dhaka Commerce college Road
                            </p> 
                            <hr>
                        </div>
                        <!---->
                        <div  class="col-md-6">
                            <h3>Total Spent: <span>25000 BDT</span> </h3>
                        </div>
                        
                    </div>
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
	
