@extends('frontend.layouts.app')

@section('header')
	<style type="text/css">
		.black-border {
			border: 1px solid black;
		}
		.disable-button{
	        cursor: not-allowed;
	        pointer-events: none;
	        /*
	        |
	        |---Button disabled 
	        |--- CSS color class
	        |
	        */
	        color: #c0c0c0;
	        background-color: #ffffff;
		}
	</style>
@endsection


@section('contents')

<!-- page title -->
<div class="page_title_area">
	<div class="container">
		<div class="row">
			<div class="col-sm-8">
				<div class="page_title">
					<h1>{!! $product_info[0]->product_title !!}</h1>
					<!--Hidden datas for ajax call-->
					<input type="hidden" name="products_id" id="products_id" value="{{ $product_info[0]->id }}"/>
					<input type="hidden" name="invoices_id" id="invoices_id" value="{{  Session::get('invoices_id') }}"/>
					<!---->
					@if($product_info[0]->discount_price == 0 || $product_info[0]->discount_price == NULL )
						<input type="hidden" name="sub_total" id="sub_total" value="{{  $product_info[0]->price }}"/>
					@else
						<input type="hidden" name="sub_total" id="sub_total" value="{{  $product_info[0]->discount_price }}"/>
					@endif
				</div>
			</div>
			<div class="col-sm-4">
				<div class="bredcrumb">
					<ul>
						<li><a href="#">Home</a></li>
						<li><a href="#">Shop</a></li>
						<li><a href="#">Men's</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!--/ page title -->

<!-- content area -->
<div class="content">
	<div class="container">
		<div class="row">
			<!--Product ID-->
			<input type="hidden" name="product_id" id="product_id" value="{{ $product_id[0] }}"/>
			<div class="col-sm-12">
				<div class="col-md-6">
					<div class="single-slider-item">
						<ul class="owl-slider">
							@php 

							@endphp
							@foreach($product_variations as $row)
								<li class="item" id="image_{!! $row->id !!}" class="activate-image">
									<img  src="{!! $row->image_url !!}" alt="" class="image-zoom img-responsive">
									<!--<a class="expand-img" href="{!! $row->image_url !!}" target="_blank"><i class="fa fa-expand"></i></a>-->
								</li>
							@endforeach
						</ul>
						
						<ul class="thumbnails-wrapper">
							@foreach($product_variations as $thumbnail)
								<li id="thumbnail_{!! $thumbnail->id !!}" class="thumbnail activate-thumbnail">
									<a href="#" ><img src="{!! $thumbnail->image_url !!}" alt="" class="img-responsive"></a>
								</li>
							@endforeach
						</ul>
						
					</div>
				</div>
				<div class="col-md-6">
					<div class="right-content">
						@php
							$id = \Hashids::connection('main')->encode($product_info[0]->id );
						@endphp
						<h3 id="product_title">{!! $product_info[0]->product_title !!} <span><a role="button" onclick="wishlist('{!! $id !!}')" ><i class="fa fa-heart-o"></i></a></span></h3>
						<p>{!! $product_info[0]->product_sub_title !!}</p>
						
						<div class="rated">
							<ul>
								<li><i class="fa fa-star"></i></li>
								<li><i class="fa fa-star"></i></li>
								<li><i class="fa fa-star"></i></li>
								<li><i class="fa fa-star"></i></li>
								<li><i class="fa fa-star fa-star-half-full"></i></li>
								<!--<li class="un-rated"><i class="fa fa-star fa-star-half-full"></i></li>-->
							</ul>
							<span>(24 reviews)</span>
						</div>
						@if($product_info[0]->discount_price)
							<span class="amount off">BDT {!! $product_info[0]->price !!}</span>
							<span class="amount" id="product_price">BDT {!! $product_info[0]->discount_price !!}</span><br>
						@else
							<span class="amount" id="product_price">BDT {!! $product_info[0]->price !!}</span><br>
						@endif

						<div class="color-size">
							<div class="item-size">
								<h4>Choose a Color</h4>
								<ul id="choose_color_ul">
									@php 
									$i =1;
									@endphp
									@foreach($product_variations as $color)
									
										<li class="x-small 	choose-color" data-color = "{!! $color->id."_".$i !!}" onclick="choose_color(this);" id="{!! $color->colors->color_name.$color->id  !!} ">{!! $color->colors->color_name !!}</li>
										@php 
											$i++;
										@endphp
									@endforeach
								</ul>
							</div>
							
							<div class="clear-fix"></div>
							<div class="clear-fix"></div>
							
							<div class="item-size">
								<h4>Choose a size</h4>
								<ul id="choose_size_ul">
									@foreach($product_variations as $size)
										<li class="x-small 	choose-size" data-size = "{!! $size->id !!}"  data-sizeName ="{!! $size->sizes->size_name  !!}" onclick="choose_size(this);ajaxCall()" id="{!! $size->sizes->size_name.$size->id  !!}">{!! $size->sizes->size_name  !!}</li>
									@endforeach
									<li class="x-small active"  onclick="" ><strong>Size Chart</strong></li>
								</ul>
							</div>
						</div>
						<div class="clear-fix"></div>
						<div>
							<div class="quantity">
								<label>Quantity</label><input type="number" step="1" min="0" max="99" name="quantity" id="quantity" value="1" title="Qty" class="qty">
							</div>
							<div class="add-to-cart">
								<span>
									<button class="trendify-btn black-bordered" style="background:white;" id="add_to_cart" onClick='add_to_cart()'>Add To Cart</button> 
									 
								</span>
							</div>
						</div>
						<div class="product-desc">
							<span>
								<span>
									<b>Stock:</b>
								</span>
								<span class="item-number" id="stock">N/A</span><br>
							</span>
							<span>
								<span>
									<b>SKU:</b>
								</span>
								<span class="item-number" id="sku">{!! $product_info[0]->sku !!}</span><br>
							</span>
							<span>
								<b>Category:</b>
								<span class="item-cat" id="category_id">  
									{!! $product_info[0]->categories->name !!}
								</span>
							</span>	
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="product-tab">
						<ul class="nav nav-tabs">
							<li class="nav active"><a data-toggle="tab" href="#tab1">PRODUCT DESCRIPTION</a></li>
							<li><a data-toggle="tab" href="#tab2">CUSTOMER REVIEWS</a></li>
							<!--<li><a data-toggle="tab" href="#tab3">SHIPPING INFORMATION</a></li>-->
						</ul>
						<div class="tab-content">
							<div id="tab1" class="tab-pane active">
								{!! $product_info[0]->product_description !!}
							</div>
							<div id="tab2" class="tab-pane">
								<h3>Customer#123</h3>
								<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
								<h3>Customer#123</h3>
								<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
								<hr>
								<form>
									<div class="col-md-12 no-padding-left">
										<div class="your-message">
											<label for="your-message">Your Review</label><br>
											<textarea name="your-message" cols="10" rows="3"  id="your-message"></textarea>
										</div>
									</div>
									<div class="clear-fix"></div>
									<div class="text-center">	
										<a href="#" class="trendify-btn black-bordered">Submit Review</a>
									</div>	
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<!-- Product pop-up -->
					<div class="modal fade" tabindex="-1" role="dialog" id="code">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<a class="close" href="#" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></a>
								<div class="modal-body col-md-12">
									<div class="col-md-4 no-padding-left">
										<img  id="modal_product_image" src="" class="img-responsive" alt="" />
									</div>
									<div class="col-md-8">
										<div class="right-content">
											<div class="margin-top-20px"></div>
											<br><br>
											<div class="text-center">
												<h3>Your product has been added to the cart</h3>
											</div>
											<hr>
											<a href="#"><h3>Title: <span id="modal_product_name"></span></h3></a>
											<!--
											<div class="rated">
												<ul>
													<li><i class="fa fa-star"></i></li>
													<li><i class="fa fa-star"></i></li>
													<li><i class="fa fa-star"></i></li>
													<li><i class="fa fa-star"></i></li>
													<li class="un-rated"><i class="fa fa-star"></i></li>
												</ul>
												<span>(24 reviews)</span>
											</div>
											-->
											<!--<span class="amount off">$399</span>-->
											<h3>Price: <span class="amount" id="modal_price"></span></h3>
											<h3>Color: <span id="modal_color"></span></h3>
											<h3>Size: <span id="modal_size"></span></h3>
											<h3>Quantity: <span id="modal_quantity"></span></h3>
											<!--<span class="sku">available in stock</span>-->
											<!--<h4>DESCRIPTION</h4>-->
											<!--<p>  </p>-->
											<hr>
												<span>
													<a class="trendify-btn black-bordered" style="background:white;" id="continue_shopping" data-dismiss="modal" >Continue Shopping </a>
													<a href="/cart" class="trendify-btn black-bordered" style="background:white;" >Go To Cart </a>
												</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- / Product pop-up -->
				</div>
				<div class="col-md-12">	
					<!--Related Products-->
					<div class="related-products margin-top-70px">
						<h4>related products</h4>
						<ul class="related-products-slider">
							@foreach($related_products as $row)
							<li class="item">
								<div class="product-single">
									<div class="product-img">
										<img class="img-responsive" alt="Single product" src="{{ $row->image_url }}">
										<div class="actions">
											<ul>
												<li><a class="zoom" href="{{ $row->image_url }}"><i class="fa fa-search"></i></a></li>
												<li><a href="#"><i class="fa fa-heart-o"></i></a></li>
												<li><a href="/product/{{ $row->id }}"><i class="fa fa-expand"></i></a></li>
											</ul>
										</div>
									</div>
									<div class="product-info">
										<h2>{!!$row->product_title !!}</h2>
										<div class="star-rating">
											
											<ul>
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star-half-full"></i></li>
											</ul>
											
										</div>
										<div class="price">
											BDT {{ $row->price }}
										</div>
									</div>
								</div>
							</li>
							@endforeach
						</ul>
					</div>
					<!-- pagination -->
					<div class="clear-fix margin-top-70px"></div>
					<!-- / pagination -->
				</div>
			</div>
		</div>
	</div>
</div>
<!-- / content area -->

<!-- Wishlist Modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="wishlist">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<a class="close" href="#" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></a>
			<div class="modal-body col-md-12">
				<div class="right-content">
					<div class="margin-top-20px"></div>
					<br>
					<div class="text-center">
						<h3>Product has been added to your wishlist</h3>
					</div>
					<hr>

				</div>
				<div class="text-center">
					<span>
						<a class="trendify-btn black-bordered" style="background:white;" id="continue_shopping" data-dismiss="modal" >Continue Shopping</a>
						<a href="/wishlist" class="trendify-btn black-bordered" style="background:white;" >Go To Wishlist </a>
					</span>
				</div>
				<br>
			</div>
		</div>
	</div>
</div>
<!-- Wishlist Modal -->
    
<!--footer.blade.php-->
@endsection


@section('footer')
	<script>
		
		/*
		|
		|--- CHOOSE SIZE 
		|
		*/
		/*
		function choose_size(){
			// Remove any previous data from select option
			$('#sizes_id').find('option').remove().end().append('<option value="">Choose Your Option</option>').val('Choose Your Option');
			
			var products_id = document.getElementById('products_id').value;
			var colors_id = document.getElementById('colors_id').value;
			
            $.ajax({
                type: 'POST',
                url : '/choose_size',
                data:{
                    'products_id'		:	products_id,
                    'colors_id' 		:	colors_id,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success:function(data){
                	var size_options = data;
					var select = document.getElementById("sizes_id");
					for(index in size_options) {
					    select.options[select.options.length] = new Option(size_options[index].size_name,size_options[index].id);
					}
            	}
           });
           
		}
		*/
		/*
		|
		|--- ADD TO CART AJAX REQUEST
		|
		*/
		function add_to_cart(){
			
			var products_id 	= $('#product_id').val();
			var colors_id	= $('ul#choose_color_ul').find('li.active').data('color');
			var color_id	= colors_id.split("_");
			var colors_id	= color_id[0];
			var sizes_id		= $('ul#choose_size_ul').find('li.active').data('size');
			var quantity		= document.getElementById('quantity').value;	
			var sub_total		= document.getElementById('sub_total').value;
    		/*
    		|
    		|---
    		|
    		*/
			if(invoices_id && products_id && colors_id && sizes_id && quantity && sub_total){
	            $.ajax({
	                type: 'POST',
	                url : '/cart',
	                data:{
	                    'products_id'	:	products_id,
	                    'colors_id'		:	colors_id,
	                    'sizes_id'		:	sizes_id,
	                    'quantity'		:	quantity,
	                    'sub_total'		:	sub_total,
	                    _token: $('meta[name="csrf-token"]').attr('content')
	                },
	                success:function(data){
						var cart_items = data.length;
						
						document.getElementById('cart_item_count').innerHTML = '('+data.length+')';
						/*
						|
						|--- Product Summary Modal
						|
						*/
						$('#code').modal('show');
	            	}
	           });
			}else{
				alert('Select Product');
			}
			
			
		}
	
		/*
		|
		|--- ON hover ZOOM image
		|
		*/
		$(function(){
		  $(".image-zoom").imagezoomsl();
		});
		/*
		|
		|--- ONCLICK CHANGE ACTIVE STATUS OF COLOR
		|--- Onclick Making 
		|
		*/
		function choose_color(color) {
			var a = document.getElementsByClassName('choose-color');
			var b = document.getElementsByClassName('choose-size');
			
			var d = document.getElementById("add_to_cart");
			d.className += " disable-button";
			
			for (i = 0; i < a.length; i++) {
				a[i].classList.remove('active');
				a[i].classList.remove('black-border');
			}
			for (i = 0; i < b.length; i++) {
				b[i].classList.remove('active');
			}
			color.classList.add('active');
			color.classList.add('black-border');
			
			var colors_id = $('ul#choose_color_ul').find('li.active').data('color');
			var slide_id = colors_id.split("_");
			var slide_id =slide_id[1]-1;

			
			var owl = $('.owl-carousel');
			owl.owlCarousel();
			owl.trigger('to.owl.carousel',[slide_id,300,true]);
		}
		/*
		|
		|--- ONCLICK CHANGE ACTIVE STATUS OF SIZE
		|
		*/
		function choose_size(elem) {
  			if(!$('li.choose-color').hasClass('active')){
				alert("Please choose color");
			}else{

				
				var a = document.getElementsByClassName('choose-size');
				for (i = 0; i < a.length; i++) {
					a[i].classList.remove('active');
				}
				elem.classList.add('active');
			}
		}
		

		
		function ajaxCall(){
			
			var products_id = $('#products_id').val();
			var colors_id	= $('ul#choose_color_ul').find('li.active').data('color');
			var color_id	= colors_id.split("_");
			var colors_id	= color_id[0];
			var sizes_id = $('ul#choose_size_ul').find('li.active').data('size');
			/*
			|
			|--- MAKING AJAX REQUEST TO CHECK FOR STOCK
			|
			*/
			if(products_id && sizes_id && colors_id){
	            $.ajax({
	                type: 'POST',
	                url : '/check_stock',
	                data:{
	                    'products_id'	:	products_id,
	                    'colors_id'		:	colors_id,
	                    'sizes_id'		:	sizes_id,
	                    _token: $('meta[name="csrf-token"]').attr('content')
	                },
	                success:function(data){
                		/*
                		|
                		|---
                		|
                		*/
	                	if(data.length == 0){
	                		var d = document.getElementById("add_to_cart");
							d.className += " disable-button";
							document.getElementById("stock").innerHTML ="Out of Stock";
	                	}else{
	                		/*
	                		|
	                		|---
	                		|
	                		*/
		                	if(data[0]['quantity'] == 0){
		                		var d = document.getElementById("add_to_cart");
								d.className += " disable-button";
								document.getElementById("stock").innerHTML ="Out of Stock";
		                	}
	                		/*
	                		|
	                		|---
	                		|
	                		*/
		                	if(data[0]['quantity'] > 0){
		                		var d = document.getElementById("add_to_cart");
		                		d.classList.remove("disable-button");
		                		document.getElementById("stock").innerHTML = data[0]['quantity']+' '+'piece available';
		                		/*
		                		|
		                		|---
		                		|
		                		*/
	        					var owl = $('.owl-carousel');
								/*
								|
								|---
								|
								*/
								var thumbnail = document.getElementsByClassName('activate-thumbnail');
								for (i = 0; i < thumbnail.length; i++) {
									thumbnail[i].classList.remove('active');
								}
		                		var d = document.getElementById("thumbnail_2");
								d.className += " active";
								/*
								|
								|---
								|
								*/
								setTimeout(function() {
									owl.trigger('stop.owl.autoplay');
									owl.trigger('stop.owl.loop');
								},2000);
								/*
								|
								|--- Continue SHOPPING MODAL WINDOW
								|
								*/
								var modal_product_name			=	$('#product_title').html(); 
								var modal_product_image 		=	data[0]['image_url']; 
								var modal_price 				=	$('#product_price').html();  
								var modal_size					=	$('ul#choose_size_ul').find('li.active').html();	 	
								var modal_color 				=	$('ul#choose_color_ul').find('li.active').html(); 
								var modal_quantity				=	$('#quantity').val(); 
								/*
								|
								|--- PUTTING DATA IN MODAL
								|
								*/
								document.getElementById("modal_product_image").src				= modal_product_image;
								document.getElementById("modal_product_name").innerHTML 		= modal_product_name;
								document.getElementById("modal_price").innerHTML				= modal_price;
								document.getElementById("modal_size").innerHTML 				= modal_size;
								document.getElementById("modal_color").innerHTML				= modal_color;
								document.getElementById("modal_quantity").innerHTML 			= modal_quantity;
		                	}
	                	}
	            	}
	           });
			}
			
		}

	</script>

@endsection




