    <!-- header -->
    <div class="header">	
		<div class="navbar trendify-nav megamenu navbar-style-2">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".collapse" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
					
					<a class="navbar-brand" href="/"><img alt="MAROON" width="150px !important" src="/frontend/img/maroon-logo-transparent.png"></a>
					<!--<a class="navbar-brand" href="#">MAROON</a>-->
                </div>
                @php 
                    $category_id = \Hashids::connection('main')->encode(1);
                    $categories = \App\Category::all();
                @endphp
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        @foreach($categories as $category)
                            <li class="dropdown megamenu-fw">
                                @php $cat =  preg_replace('/\s+/', '_', $category->name); @endphp
                                <a href="/products/{!! $cat !!}?page=1&perPage=15"  class="dropdown-toggle" >
                                    {!! $category->name !!}
                                </a>
                                <!--
                                <a href=""  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {!! $category->name !!}
                                </a>
                                -->
                                <ul class="dropdown-menu megamenu-content" role="menu">
                                    <li>
                                        <div class="row">
                                                    @php
                                                        $id = $category->id;
                                                        $sub_category = \App\SubCategory::where('categories_id',$id)->get();
                                                    @endphp
                                                    @foreach($sub_category as $row)
                                                    <div class="col-md-3">
                                                        @php $sub =  preg_replace('/\s+/', '_', $row->name); @endphp
                                                       <a href="/products/{!! $cat !!}/{!! $sub !!}/?page=1&perPage=15"> <h5 class="title"> {!! $row->name !!}</h5></a>
                                                        <ul>
                                                            @php
                                                                $sub_id = $row->id;
                                                                $sub_slave_category = \App\SubSlaveCategory::where('sub_categories_id',$sub_id)->get();
                                                            @endphp
                                                            @foreach($sub_slave_category as $value)
                                                                <li>
                                                                    @php $sub_slave = preg_replace('/\s+/', '_', $value->name); @endphp
                                                                    <a href="/products/{!! $cat !!}/{!! $sub !!}/{{$sub_slave}}/?page=1&perPage=15">
                                                                        {!! $value->name !!}
                                                                        <span class="sell">Sell</span>
                                                                        <!--<span class="hot">Hot</span>-->
                                                                    </a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
            										</div>
            										@endforeach

                                        </div>
                                    </li>
                                </ul>
                            </li>
                        @endforeach
                        

                        @if (Route::has('login'))
                                @auth
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Welcome, {{ Auth::user()->name }}</a>
                                        <ul class="dropdown-menu">
                                            <li><a href="/wishlist">Wishlist</a></li>
                                            <li><a href="/logout">Logout</a></li>
                                        </ul>
            						</li>
            						@if(Auth::user()->user_level == 1)
            						    <li>
            						        <a href="{{ route('admindashboard') }}">Dashboard</a>
        						        </li>
            						@endif
                                @else
                                    <li>   
                                        <span><a href="{{ route('login') }}">Login</a>/@if (Route::has('register'))<a href="{{ route('register') }}">Register</a>@endif</span>
                                    </li>
                                    <li><a href="/wishlist">wishlist</a></li>
                                @endauth
                        @endif
                       
                        

						<li class="cart">
                            <a href="/cart">  
                                <img alt="en" src="/frontend/img/cart-black.png">
                            
                                <span id="cart_item_count">
                                    Cart
                                </span>
                            
                            </a>
							<?php
							/*
							<div class="cart-list hidden-xs">
                                @if(Session::has('cart'))
								    <h5 class="title">your shopping cart {{ Session::get('cart_item_count') }}</h5>
								@php
								    
								    $sub_total = 0;
							    @endphp
								@foreach(Session::get('cart') as $row)
								<div class="cart-item">
									<img class="img-responsive" alt="Single product" src="{{ $row['product_variation_image']}}">
									<!--<span class="icon_close close-icon"></span>-->
									
									<div class="product-info">
										<h5>{{ $row['product_title'] }}</h5>
										<!--
										<div class="star-rating">
											<ul>
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star-half-full"></i></li>
											</ul>
										</div><br>
										-->
										<div class="price">
											BDT {{ $row['price'] }}
										</div>
									</div>
								</div>
									@php
								        $sub_total += $row['sub_total'];
							        @endphp
								@endforeach

								
								<div class="order-total">
									<h5 class="title">TOTAL ON YOUR CART<span class="amount">BDT {!! $sub_total !!}</span></h5>
								</div>
								
								<a href="/cart" class="trendify-btn black-bordered">View Cart</a>
								@else
								    
								    <h5 class="title">No Items in the Cart</h5>
								@endif
								<!--<a href="#" class="trendify-btn black-bordered">Checkout</a>-->
							</div>
							*/
							?>
							
						</li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </div>
    </div>
    <!-- / header -->