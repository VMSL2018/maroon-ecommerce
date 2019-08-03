@extends('frontend.layouts.app')


@section('header')

@endsection

@section('contents')

		<!-- page title -->
	<div class="page_title_area">
		<div class="container">
			<div class="row">
				<div class="col-sm-8">
					<div class="page_title">
						<h1>OUR products</h1>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="bredcrumb">
						<ul>
							<li><a href="#">Home</a></li>
							<li><a href="#">Shop</a></li>
							<li><a href="#">{{ $category }}</a></li>
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
				<div class="col-md-9 col-md-push-3 col-sm-12">
					<!--
					<div class="trendify-banner">
						<img src="img/banner.jpg" class="img-responsive" alt="image banner">
						<div class="banner-text">
							<h3 class="animate fadeInDown wow">ELEGANT & MODERN fashion</h3>
							<h4 class="animate fadeInDown wow" data-wow-delay="0.5s">CLOTHES & STYLES FOR EVEYRONE</h4>
							<a class="trendify-btn default-bordered margin-left-0" href="#">Sign Up Now</a>
						</div>
					</div>
					-->
					<div class="product-listing-view">
						<div class="view-navigation">
							<div class="info-text">
								<p>Showing {{ $allproducts->firstItem()  }}-{{ $allproducts->lastItem()  }} from {{ $allproducts->total()  }} products</p>
							</div>
							
							<div class="right-content">
								<div class="grid-list">
									<ul>
									<!--
										<li><a href="shop-list-sidebar.html" ><i class="fa fa-align-justify"></i></a></li>
										<li><a href="#" class="active"><i class="fa fa-th"></i></a></li>
									-->	
									</ul>
								</div>
								<div class="input-select">
									<label for="perPage">Display per Page</label>
									<select name="perPage" id="perPage" onchange="perPage()">
										<option value="">{{ $allproducts->perPage() }}</option>
										<option value="5" >5</option>
										<option value="10">10</option>
										<option value="15">15</option>
										<option value="20">20</option>
									</select>
									
								</div>
							</div>
						</div>
						<div class="row">
							@foreach($allproducts as $row)
								@php
									$id = \Hashids::connection('main')->encode($row->id);
								@endphp
							<div class="col-md-4 col-sm-6">
								<div class="product-single margin-bottom-70px">
									<div class="product-img">
										<a href="/product/{!! $id !!}">
											<img class="img-responsive" alt="Single product" src="{{ $row->image_url }}">
										</a>
										<div class="actions">
											<ul>
												<li><a class="zoom" href="/storage/men-1.jpg"><i class="fa fa-search"></i></a></li>
												<li><a role="button" onclick="wishlist('{!! $id !!}')" ><i class="fa fa-heart-o"></i></a></li>
												<li>
													<a href="/product/{!! $id !!}">
														<i class="fa fa-shopping-bag"></i>
													</a>
												</li>
											</ul>
										</div>
									</div>
									<div class="product-info">
										<h2>New Look Stripe T-Shirt</h2>
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
											@if($row->dicount_price != NULL)
												<del> BDT {{ $row->price }} </del> BDT {{ $row->discount_price }}
											@else
												BDT {{ $row->price }}
											@endif
										</div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div>
					
					<!-- pagination -->
					
					<div class="pagination">
						<div class="col-xs-1 no-padding">
							<a href="#"><span class="pagicon arrow_left"></span></a>
						</div>
						<div class="col-xs-offset-1 col-sm-offset-3 col-xs-7">
							{{ $allproducts->appends(request()->input())->links() }}	
						</div>
						<div class="col-xs-1 no-padding text-right">
							<a href="#"><span class="pagicon arrow_right"></span></a>
						</div>
					</div>
					
					<!-- / pagination -->
					
				</div>
				<div class="col-md-3 col-md-pull-9 col-sm-12">
					<div class="side-bar">
						<!--
						<div class="sidebar-list widget">
							<h4> Categories</h4>
							<ul>
								<li><a href="#" class="triangle">Loungewear <span>(8)</span></a></li>
								<li><a href="#" class="triangle">Oversized & Longline <span>(10)</span></a></li>
								<li><a href="#" class="triangle">Polo Shirts <span>(30)</span></a></li>
								<li><a href="#" class="triangle">Shirts <span>(41)</span></a></li>
								<li><a href="#" class="triangle">Shorts <span>(31)</span></a></li>
								<li><a href="#" class="triangle">Suits & Blazers <span>(16)</span></a></li>
								<li><a href="#" class="triangle">Sunglasses <span>(12)</span></a></li>
								<li><a href="#" class="triangle">Swimwear <span>(52)</span></a></li>
								<li><a href="#" class="triangle">Trousers & Chinos <span>(31)</span></a></li>
							</ul>
						</div>
						-->

						<!--
						<div class="checkboxes widget">
							<h4> Select a brand</h4>
							<ul>
								<li>
									<input type="checkbox" name="aberrombie" id="aberrombie" class="css-checkbox" />
									<label for="aberrombie" class="css-label">Aberrombie</label>
								</li>
								<li>
									<input type="checkbox" name="adidas" id="adidas" class="css-checkbox" />
									<label for="adidas" class="css-label">Adidas</label>
								</li>	
								<li>
									<input type="checkbox" name="antony-morato" id="antony-morato" class="css-checkbox" />
									<label for="antony-morato" class="css-label">Antony Morato</label>
								</li>
								<li>
									<input type="checkbox" name="armani-jeans" id="armani-jeans" class="css-checkbox" />
									<label for="armani-jeans" class="css-label">Armani Jeans</label>
								</li>
								<li>
									<input type="checkbox" name="baldessarini" id="baldessarini" class="css-checkbox" />
									<label for="baldessarini" class="css-label">Baldessarini</label>
								</li>
								<li>
									<input type="checkbox" name="bench" id="bench" class="css-checkbox" />
									<label for="bench" class="css-label">Bench</label>
								</li>
								<li>
									<input type="checkbox" name="boxfresh" id="boxfresh" class="css-checkbox" />
									<label for="boxfresh" class="css-label">Boxfresh</label>
								</li>
								<li>
									<input type="checkbox" name="bjorn-borg" id="bjorn-borg" class="css-checkbox" />
									<label for="bjorn-borg" class="css-label">Bjorn Borg</label>
								</li>
								<li>
									<input type="checkbox" name="boom-bap" id="boom-bap" class="css-checkbox" />
									<label for="boom-bap" class="css-label">Boom Bap</label>
								</li>
								<li>
									<input type="checkbox" name="boss" id="boss" class="css-checkbox" />
									<label for="boss" class="css-label">Boss</label>
								</li>
							</ul>
						</div>
						-->
						
						<div class="slider-range widget">
							<h4>Refine a price</h4>
							<div id="slider-range"></div>
							<div class="values">
								<input type="text" class="minamount" name="minamount" id="minamount" /> <span class="filter-gap"> - </span>
								<input type="text" class="maxamount" name="maxamount" id="maxamount"/>
								<input type="hidden" value="{{  Request::url() }}" id="url">
								<input type="submit" value="Filter" name="filter" onclick="updateprice()" />
							</div>
						</div>
						
						<div class="color-size">
							<div class="item-size">
								<h4>Choose a size</h4>
								<ul id="choose_size_ul">
									@foreach($sizes as $size)
										<li class="x-small 	choose-size" data-size = "{!! $size->size_name !!}"  data-sizeName ="{!! $size->size_name  !!}" onclick="choose_size(this);" id="{!! $size->size_name.$size->id  !!}">{!! $size->size_name  !!}</li>
									@endforeach
									<li class="x-small active" data-size = ""  data-sizeName ="" onclick="reset_size(this);" id="{!! $size->size_name.$size->id  !!}">Reset Size</li>
								</ul>
							</div>

							
							<div class="clear-fix"></div>
							<div class="clear-fix"></div>
							<br>
							
							<div class="item-size">
								<h4>Choose a Color</h4>
								<ul id="choose_color_ul">
									@foreach($colors as $color)
										<li class="x-small 	choose-color" data-color = "{!! $color->color_name !!}" onclick="choose_color(this);" id="{!! $color->color_name.$color->id  !!} ">{!! $color->color_name !!}</li>
									@endforeach
									<li class="x-small active" data-size = ""  data-sizeName ="" onclick="reset_color();">Reset Color</li>
								</ul>
							</div>
						</div>
						
						<!--
						<div class="popular-products widget">
							<h4>Popular Products</h4>
							<div class="product-single">
								<div class="product-img">
									<img class="img-responsive" alt="Single product" src="img/single_1.jpg">
								</div>
								<div class="product-info">
									<h2>New Look Stripe Shirt</h2>
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
										<del> $50 </del> $40
									</div>
								</div>
							</div>	

							<div class="product-single">
								<div class="product-img">
									<img class="img-responsive" alt="Single product" src="img/single_1.jpg">
								</div>
								<div class="product-info">
									<h2>New Look Stripe Shirt</h2>
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
										<del> $50 </del> $40
									</div>
								</div>
							</div>
						</div>
						-->
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
@endsection


@section('footer')

<script>
function removeParam(key, sourceURL) {
    var rtn = sourceURL.split("?")[0],
        param,
        params_arr = [],
        queryString = (sourceURL.indexOf("?") !== -1) ? sourceURL.split("?")[1] : "";
    if (queryString !== "") {
        params_arr = queryString.split("&");
        for (var i = params_arr.length - 1; i >= 0; i -= 1) {
            param = params_arr[i].split("=")[0];
            if (param === key) {
                params_arr.splice(i, 1);
            }
        }
        rtn = rtn + "?" + params_arr.join("&");
    }
    return rtn;
}

function updateprice(){
	var minamount = document.getElementById('minamount').value;
	var maxamount = document.getElementById('maxamount').value;
	var url = window.location.href;
	
	var remove_minamount = removeParam("minamount", url);
	var remove_maxamount = removeParam("maxamount", remove_minamount);
	
	var new_url = remove_maxamount+"&minamount="+minamount+'&maxamount='+maxamount;
	window.location.replace(new_url);
}

function choose_color(color) {
	var a = document.getElementsByClassName('choose-color');
	var b = document.getElementsByClassName('choose-size');
	
	
	for (i = 0; i < a.length; i++) {
		a[i].classList.remove('active');
		a[i].classList.remove('black-border');
	}
	
	color.classList.add('active');
	color.classList.add('black-border');
	
	
	var color = $('ul#choose_color_ul').find('li.active').data('color');
	var url = window.location.href;
	
	var remove_color = removeParam("color", url);
	
	var new_url = remove_color+"&color="+color;
	window.location.replace(new_url);
	
}
/*
|
|--- ONCLICK CHANGE ACTIVE STATUS OF SIZE
|
*/
function choose_size(elem) {

	var a = document.getElementsByClassName('choose-size');
	for (i = 0; i < a.length; i++) {
		a[i].classList.remove('active');
	}
	elem.classList.add('active');
	
				
	var size = $('ul#choose_size_ul').find('li.active').data('size');
	
	var url = window.location.href;
	
	var remove_size = removeParam("size", url);
	
	var new_url = remove_size+"&size="+size;
	window.location.replace(new_url);

	
}
/*
|
|--- Reset size options
|
*/
function reset_size(){
	var a = document.getElementsByClassName('choose-size');
	for (i = 0; i < a.length; i++) {
		a[i].classList.remove('active');
	}
}
/*
|
|--- Reset color options
|
*/
function reset_color(){
	var a = document.getElementsByClassName('choose-color');
	for (i = 0; i < a.length; i++) {
		a[i].classList.remove('active');
	}
	elem.classList.add('active');
}


function perPage(){
	var x = document.getElementById("perPage").value;
	var url = window.location.href;
	
	var remove_perPage = removeParam("perPage", url);
	
	var new_url = remove_perPage+"&perPage="+x;
	window.location.replace(new_url);

}


</script>

@endsection


	
