@extends('frontend.layouts.app')

@section('header')
    <style type="text/css">
        .paragraph{
            line-height: .5;
        }
    </style>
@endsection


@section('contents')


	
	<!-- page title -->
	<div class="page_title_area">
		<div class="container">
			<div class="row">
				<div class="col-sm-4">
					<div class="page_title">
						<h1>STORE LOCATIONS</h1>
					</div>
				</div>
				<div class="col-sm-8">
					<div class="bredcrumb">
						<ul>
							<li><a href="#">Home</a></li>
							<li><a href="#">Policy</a></li>
							<li><a href="#">Store Locations</a></li>
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
			<div class="row categories">
				<div class="item">
					<div class="single-categories bottom-margin">
						<div class="cat-img pull-right">
							<!--<img src="img/bag.png" alt="Testimonial Client One" class="img-responsive"> -->
						</div>
						
						<div class="cat-info text-left">
						    <h2 class="heading">Maroon - The House of Attire, Banani</h2>
							<h3>Road No. 11,Banani,Dhaka 1212</h3>
							
						</div>
					</div>
				</div>
				
				<div class="item">
					<div class="single-categories bottom-margin">
						<div class="cat-img pull-right">
							<!--<img src="img/bag.png" alt="Testimonial Client One" class="img-responsive"> -->
						</div>
						
						<div class="cat-info text-left">
						    <h2 class="heading">Maroon - The House of Attire, UTTARA</h2>
							<h3>25 Rabindra Sarani,Uttara,Dhaka 1230</h3>
						</div>
					</div>
				</div>
				
			
			</div>
		</div>
	</div>
	
	<!-- / Shopping Cart -->
    
    
	<!--footer.blade.php-->

@endsection



	
