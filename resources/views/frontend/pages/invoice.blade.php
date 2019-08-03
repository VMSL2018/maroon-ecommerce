
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>MAROON - House of Attire</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Themesbrand" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App Icons -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- Basic Css files -->
        <link href="/admin-asset/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="/admin-asset/assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="/admin-asset/assets/css/style.css" rel="stylesheet" type="text/css">

    </head>


    <body class="">
    	@php 

    	@endphp
        <!-- ==================PAGE CONTENT START================== -->
        <div class="page-content-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card m-b-20">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="invoice-title">
                                            <h4 class="pull-right font-16"><strong>INVOICE # {!! $invoice !!}</strong></h4>
                                            <h3 class="m-t-0">
                                                <img src="/frontend/img/maroon-logo-transparent.png" alt="logo" height="40"/>
                                            </h3>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-6">
                                                <address>
                                                    <strong>Billed To:</strong><br>
                                                    {!! $order_data['0']->billing_address !!}
                                                </address>
                                            </div>
                                            <div class="col-6 text-right">
                                                <address>
                                                    <strong>Shipped To:</strong><br>
													{!! $order_data['0']->shipping_address !!}
                                                </address>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6 m-t-30">
                                                <address>
                                                    <strong>Payment Method:</strong><br>
                                                    {!! $order_data['0']->payment_method !!}
                                                    
                                                </address>
                                            </div>
                                            <div class="col-6 m-t-30 text-right">
                                                <address>
                                                    <strong>Order Date:</strong><br>
                                                    {!! $order_data['0']->created_at !!}<br><br>
                                                </address>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="panel panel-default">
                                            <div class="p-2">
                                                <h3 class="panel-title font-20"><strong>Order summary</strong></h3>
                                            </div>
                                            <div class="">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                        <tr>
                                                            <td class="text-center"><strong>SKU</strong></td>
                                                            <td class="text-center"><strong>Product Name</strong></td>
                                                            <td class="text-center"><strong>Color</strong></td>
                                                            <td class="text-center"><strong>Size</strong></td>
                                                            <td class="text-center"><strong>Price</strong></td>
                                                            <td class="text-center"><strong>Quantity</strong></td>  
                                                            <td class="text-right"><strong>Totals</strong></td>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($invoice_data as $data)
                                                        <tr>
                                                            <td class="text-center">{!! $data->products->sku !!}</td>
                                                            <td class="text-center">{!! $data->products->product_title !!}</td>
                                                            <td class="text-center">{!! $data->colors->color_name !!}</td>
                                                            <td class="text-center">{!! $data->sizes->size_name !!}</td>
                                                            <td class="text-center">{!! $data->products->price !!}</td>
                                                            <td class="text-center">{!! $data->quantity !!}</td>
                                                            <td class="text-right">BDT {!! $data->sub_total !!}</td>
                                                        </tr>
                                                        @endforeach
                                                        <tr>
                                                            <td class="thick-line"></td>
                                                            <td class="thick-line"></td>
                                                            <td class="thick-line"></td>
                                                            <td class="thick-line"></td>
                                                            <td class="thick-line"></td>
                                                            <td class="thick-line text-center"><strong>Subtotal</strong></td>
                                                            <td class="thick-line text-right">BDT {!! $order_data['0']->sub_total !!}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="no-line"></td>
                                                            <td class="no-line"></td>
                                                            <td class="no-line"></td>
                                                            <td class="no-line"></td>
                                                            <td class="no-line"></td>
                                                            <td class="no-line text-center"><strong>Shipping</strong></td>
                                                            <td class="no-line text-right">BDT {!! $order_data['0']->shipping !!}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="no-line"></td>
                                                            <td class="no-line"></td>
                                                            <td class="no-line"></td>
                                                            <td class="no-line"></td>
                                                            <td class="no-line"></td>
                                                            <td class="no-line text-center"><strong>Total</strong></td>
                                                            <td class="no-line text-right"><h4 class="m-0">BDT {!! $order_data['0']->order_total !!}</h4></td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <div class="d-print-none">
                                                    <div class="pull-right">
                                                        <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light"><i class="fa fa-print"></i>&nbsp;PRINT & SAVE</a>
                                                        <a href="/home" class="btn btn-primary waves-effect waves-light">BACK to Home</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div> <!-- end row -->
                                <hr>
                                <div class="row d-print-none">
                                    <div class="col-md-12 text-center">
                                        <a href="/home" class="btn btn-primary waves-effect waves-light">BACK to Home</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
            </div><!-- container -->
        </div> <!-- Page content Wrapper -->
		

        





        <!-- jQuery  -->
        <script src="/admin-asset/assets/js/jquery.min.js"></script>
        <script src="/admin-asset/assets/js/popper.min.js"></script><!-- Popper for Bootstrap -->
        <script src="/admin-asset/assets/js/bootstrap.min.js"></script>
        <script src="/admin-asset/assets/js/modernizr.min.js"></script>
        <script src="/admin-asset/assets/js/jquery.slimscroll.js"></script>
        <script src="/admin-asset/assets/js/waves.js"></script>
        <script src="/admin-asset/assets/js/jquery.nicescroll.js"></script>
        <script src="/admin-asset/assets/js/jquery.scrollTo.min.js"></script>

        <!-- App js -->
        <script src="/admin-asset/assets/js/app.js"></script>

    </body>
</html>


















<?php

/*
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<style>
		.text-center{
			text-align:center;
		}	
		
	</style>
</head>
<body>
	
	
<!-- Shopping Cart -->
<div id="printableArea" class="text-center">
	<div class="shopping-cart margin-bottom-70px">
		<div class="container">
		    <div class="row">
		        <div class="col-md-2 col-md-offset-5">
		            <div class="text-center" >
    		            <img alt="MAROON" width="150px !important" src="/frontend/img/maroon-logo-transparent.png" class="img-responsive">
		            </div>
		        </div>
		    </div>
		    <div class="row">
		        <div class="col-md-6">
		            <h2>MAROON INVOICE Number# {{ $invoice }}</h2>
		        </div>
		    </div>
		    <hr>
		    
			<div class="row">
				<div class="table-responsive text-center">
					<table class="">
						<thead>
							<tr class="" style="background-color:blue">
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
							@foreach($invoice_data  as $key=> $row)
								<tr class="cart_item">
									<td class="product-info text-center">
										<p>{{ $invoice }}</p>
									</td>
									<td class="product-number">
										<span>{{ $invoice }}</span>
									</td>
									<td class="product-price">
										<span class="amount">{{ $invoice }}</span>					
									</td>
									<td class="product-price">
										<span class="amount">{{ $invoice }}</span>					
									</td>
									<td class="product-price">
										<span class="amount">{{ $invoice }}</span>					
									</td>
									<td class="product-quantity">
										<div class="quantity">
											{{ $invoice }}
										</div>
									</td>
									<td class="product-subtotal">
										<span class="amount-subtotal">{{ $invoice }}</span>					
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 col-md-offset-8">
					<div class="cupon-code">
						<h4>CART TOTALS</h4>
						<table>
							<tbody>
								<tr class="cart-subtotal">
									<th>SUBTOTAL</th>
									<td><span class="subtotal" id="sub_total">@php   @endphp BDT</span></td>
								</tr>
								<tr class="order-shipping">
									<th>shipping</th>
									<td><span class="shipping" id="shipping_charge"></span></td>
								</tr>
								<tr class="order-total">
									<th>order total</th>
									<td><span class="amount" id="order_total"><strong>@php @endphp BDT</strong></span></td>
								</tr>			
							</tbody>
						</table>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>	
<hr>
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="text-center">
		    <button class="trendify-btn black-bordered" style="background:white;" type="submit" onclick="printDiv('printableArea')" >PRINT</button> 
	    </div>
    </div>
</div>
<br>
	
	
<script>
	function printDiv(divName) {
	     var printContents = document.getElementById(divName).innerHTML;
	     var originalContents = document.body.innerHTML;
	
	     document.body.innerHTML = printContents;
	
	     window.print();
	
	     document.body.innerHTML = originalContents;
	}
</script>
	
</body>
</html>

*/

?>