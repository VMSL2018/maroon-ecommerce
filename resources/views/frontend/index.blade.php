@extends('frontend.layouts.app')

@section('contents')
	@section('slider')
		@include('frontend.layouts.slider')
	@endsection
	

	<!-- latest-product Collection  -->
	<div class="latest-product margin-bottom-100px">
		<div class="row ">
			@foreach($featured as $value)
				@php
					$id = \Hashids::connection('main')->encode($value->id);
				@endphp
			<div class="col-md-3 col-sm-6">
				<div class="single-latest-product">
					<a href="/product/{!! $id !!}">
						<span class="price-label">BDT {{ $value->price }}</span>
						<img class="img-responsive" src="{{ $value->image_url }}" alt="Shoe">
					</a>
					<div class="actions">
						<div class="row">
							<div class="col-md-6">
								<a href="/product/{!! $id !!}"><i class="fa fa-shopping-bag"></i>Add Cart</a>
							</div>
							<div class="col-md-6">
								<ul class="pull-right">
									<li><a role="button" onclick="wishlist('{!! $id !!}')"><i class="fa fa-heart-o"></i></a></li>
									<li><a href="/product/{{ $id }}"><i class="fa fa-expand"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
	<!-- /latest-product Collection  -->
   

    <!-- content -->
    <div class="content">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 margin-bottom-50px">
					<h2 class="trendify-heading middle-align"><span class="lg">shopping</span><span class="sm">popular products -</span></h2>
				</div>
			</div>
            <!-- trendify items -->
            <div class="trendify-items">
                <div class="trendify-tab-title">
                    <ul>
                        <li class="active"><a data-toggle="tab" href="#new">New Arrivals</a></li>
                        <!--<li><a data-toggle="tab" href="#latest">Latest Trends</a></li>
                        <li><a data-toggle="tab" href="#men">Men's Fashion</a></li>
                        <li><a data-toggle="tab" href="#women">Women's Fashion</a></li>
                        -->
                    </ul>
                </div>
                
				<div class="tab-content">
					<div id="new" class="tab-pane fade in active">
						@foreach($new_arrivals as $new)
						<div class="col-md-3 col-sm-6">
							<div class="product-single fadeInUp wow" data-wow-delay="0.5s">
								<div class="product-img">
									@php
										$id = \Hashids::connection('main')->encode($new->id);
									@endphp
									<a href="/product/{!! $id !!}">
										<img class="img-responsive" alt="Single product" src="{{ $new->image_url }}">
									</a>
									<div class="actions">
										<ul>
											<li><a class="zoom" href="{{ $new->image_url }}"><i class="fa fa-plus"></i></a></li>
											<li><a role="button" onclick="wishlist('{!! $id !!}')" ><i class="fa fa-heart-o"></i></a></li>
											<li>
												<!--
												<a href="#" data-toggle="modal" data-target=".product-preview-{!! $new->id !!}">
													<i class="fa fa-shopping-bag"></i>
												</a>
												-->
												<a href="/product/{!! $id !!}">
													<i class="fa fa-shopping-bag"></i>
												</a>
											</li>
										</ul>
									</div>
								</div>
								<div class="product-info">
									<h2>{!! $new->product_title !!}</h2>
									<div class="star-rating">
										<!--
											<ul>
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star-half-full"></i></li>
											</ul>
										-->
									</div>
									<div class="price">
										@if($new->dicount_price != NULL)
											<del> BDT {{ $new->price }} </del> BDT {{ $new->discount_price }}
										@else
											BDT {{ $new->price }}
										@endif
									</div>
								</div>
								<!-- Product pop-up -->
								<div class="product-preview-{!! $new->id !!} modal fade" tabindex="-1" role="dialog">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<a class="close" href="#" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></a>
											<div class="modal-body">
												@php
											        $product_id = $new->id;
											        $product_info = \App\Products::where('id',$product_id)->with(['categories','sub_categories','sub_slave_categories'])->get();
											        $product_variations = \App\ProductVariation::where('products_id',$product_id)->with(['colors','sizes'])->get();
											        $sub_slave_id =  $product_info[0]->sub_slave_categories_id;
												@endphp
												<div class="row">
													<div class="col-sm-12">
														<div class="col-md-6">
															<div class="single-slider-item">
																<br>
																<ul class="">
																	@foreach($product_variations as $row)
																		<li class="item" id="image_{!! $row->id !!}" class="activate-image">
																			<img src="{!! $row->image_url !!}" alt="" class="image-zoom img-responsive">
																			<a class="expand-img" href="{!! $row->image_url !!}" target="_blank"><i class="fa fa-expand"></i></a>
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
																<h3 id="product_title">{!! $product_info[0]->product_title !!}</h3>
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
																			@foreach($product_variations as $color)
																				<li class="x-small 	choose-color" data-color = "{!! $color->id !!}" onclick="choose_color(this);" id="{!! $color->colors->color_name.$color->id  !!} ">{!! $color->colors->color_name !!}</li>
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
																			<button class="trendify-btn black-bordered" style="background:white;">Size Chart</button>
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
																		<span class="item-number" id="stock"></span><br>
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
													</div>
												</div>
											</div>	
										</div>
									</div>
								</div>
								<!-- / Product pop-up -->
							</div>
						</div>
						@endforeach
                    </div>
					<!-- / new -->
				</div>
            </div>
            <!-- Latest items -->
			<div class="clear-fix" ></div>
            <!-- featured box -->
            <div class="featured-box margin-bottom-50px">
				<div class="row">
					<div class="col-md-6">
						<div class="single-featured-box margin-bottom-50px fadeInLeft wow" data-wow-delay="0.3s">
                            <div class="caption">
                                <h3>casual outfits</h3>
                                <h1>WOMEN'S CLOTHES</h1>
                                <a href="/products/Women?page=1&perPage=15" class="trendify-btn black-bordered">BUY NOW</a>
                            </div>
                            <img class="img-responsive" alt="" src="/storage/women-2.jpg">
                        </div>
					</div>					
					<div class="col-md-6">
						<div class="single-featured-box fadeInLeft wow" data-wow-delay="0.6s">
                            <div class="caption">
                                <h3>hipster fashion</h3>
                                <h1>MEN´S CLOTHES</h1>
                                <a href="/products/Men?page=1&perPage=15" class="trendify-btn black-bordered">BUY COLLECTIONS</a>
                            </div>
                            <img class="img-responsive" alt="" src="/storage/men-1.jpg">
                        </div>
					</div>
				</div>
            </div>
            <!--/ featured box -->
            
			<!-- latest blogs -->
            <div class="latest-blogs margin-bottom-100px">
                <h2 class="trendify-heading middle-align margin-bottom-50px"><span class="lg">Blog Updates</span><span class="sm">Latest from the blog</span> </h2>
                <div class="row">
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="single-news fadeInLeft wow" data-wow-delay="0.3s">
							<div class="news-img">
								<img src="/frontend/img/blog4.jpg" alt="" class="img-responsive" />
							</div>
							<div class="news-content">
								<h4>Awesome Suits for Men</h4>
								<p class="meta">April 14, 2015 | Jonah Doe | in <a href="">Clothes</a></p>
								<p class="excerpt">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua...</p>
								<a href="single.html" class="pull-right"><span class="blog-icon arrow_right"></span></a>
							</div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="single-news fadeInLeft wow" data-wow-delay="0.6s">
							<div class="news-img">
								<img src="/frontend/img/blog5.jpg" alt="" class="img-responsive" />
							</div>
							<div class="news-content">
								<h4>we are a fashion company</h4>
								<p class="meta">April 14, 2015 | Jonah Doe | in <a href="">fashion</a></p>
								<p class="excerpt">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua...</p>
								<a href="single.html" class="pull-right"><span class="blog-icon arrow_right"></span></a>
							</div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="single-news fadeInLeft wow" data-wow-delay="0.9s">
							<div class="news-img">
								<img src="/frontend/img/blog1.jpg" alt="" class="img-responsive" />
							</div>
							<div class="news-content">
								<h4>Awesome Suites for Men</h4>
								<p class="meta">April 14, 2015 | Jonah Doe | in <a href="">Clothes</a></p>
								<p class="excerpt">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua...</p>
								<a href="single.html" class="pull-right"><span class="blog-icon arrow_right"></span></a>
							</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- /latest blogs -->
		</div>
	</div>
    <!-- / content -->
    
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
    
    
	<!--footer.blade.php-->

@endsection


@section('footer')
<script>
	var owl = $('.pop-up-owl-slider');
	owl.owlCarousel({
	    items:1,
	    loop:true,
	    margin:10,
	    autoplay:true,
	    autoplayTimeout:1000,
	    autoplayHoverPause:true
	});
	
</script>
@endsection



	
