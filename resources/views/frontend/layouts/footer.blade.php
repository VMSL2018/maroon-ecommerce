    <!-- footer -->
    <div class="footer style-6  margin-bottom-40px">
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-sm-12 col-xs-12">
						<div class="subscribe-box box-border">
							<h2>Subscribe to our newsletter</h2>
							<form method="POST" action="/newsletter">
								@csrf
								<input type="text" name="subscriber_name" placeholder="enter your name">
								<input type="email" name="subscriber_email" placeholder="enter your email address">
								<input type="submit" name="submit" value="Subscribe">
								<p>@if(isset($newsletter_message)) echo $newsletter_message @endif</p>
							</form>
						</div>
					</div>
				</div>
				<div class="seperator margin-bottom-50px"></div>
				<div class="row">
					<div class="col-md-3">
						<div class="single-widget">
							<h2>contact information</h2>  
							<address>
								MAROON HQ
								<br>
								Baridhara DOHS Residential Area
								<br>
								Customer Support: (800) 0123 4567 890
								<br>
								E-mail: 
								<a href="mailto:support@maroon-bd.com.bd">
									support@maroon-bd.com.bd
								</a><br> 
							</address>
						</div>
					</div>					
					<div class="col-md-3">
						<div class="single-widget">
							<h2><a href="/shipping-returns ">shipping & exchange</a></h2>
							<h2><a href="/privacy-notice">privacy policy</a></h2>
							<h2><a href="/conditions-of-use">terms & conditions</a></h2>
							<h2><a href="/about-us">about us</a></h2>
							<h2><a href="/store">store location</a></h2>
						</div>
					</div>					
					<div class="col-md-3">
						<div class="single-widget">
							
							<!--<h2><a href="#">contact us</a></h2>
							<h2><a href="#">blog</a></h2>
							<h2><a href="#">helpline</a></h2>
							
							<h2><a href="#">size guide</a></h2>
							
							-->
						</div>
					</div>					
					<div class="col-md-3">
						<div class="single-widget">
							<h2>Payment support</h2>  
							<ul class="payment-support">
								<li><img width="50" height="50" src="/frontend/img/payment/american-express.png" alt=""></li>
								<li><img width="50" height="50" src="/frontend/img/payment/bkash-api.png" alt=""></li>
								<li><img width="50" height="50" src="/frontend/img/payment/dbbl-mobile-banking-rocket.png" alt=""></li>
								<li><img width="50" height="50" src="/frontend/img/payment/dbbl-nexus.png" alt=""></li>
								<li><img width="50" height="50" src="/frontend/img/payment/ipay.png" alt=""></li>
								<li><img width="50" height="50" src="/frontend/img/payment/islami-bank.png" alt=""></li>
								<li><img width="50" height="50" src="/frontend/img/payment/islami-bank-m-cash.png" alt=""></li>
								<li><img width="50" height="50" src="/frontend/img/payment/master.png" alt=""></li>
								<li><img width="50" height="50" src="/frontend/img/payment/t-cash.png" alt=""></li>
								<li><img width="50" height="50" src="/frontend/img/payment/trust-bank.png" alt=""></li>
								<li><img width="50" height="50" src="/frontend/img/payment/upay-logo.png" alt=""></li>
								<li><img width="50" height="50" src="/frontend/img/payment/visa.png" alt=""></li>
								<!--
								<li><img src="/frontend/img/payment/2.png" alt=""></li>
								<li><img src="/frontend/img/payment/3.png" alt=""></li>
								<li><img src="/frontend/img/payment/4.png" alt=""></li>
								<li><img src="/frontend/img/payment/5.png" alt=""></li>
								-->
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
        <div class="container">
            <div class="seperator margin-bottom-30px"></div>
			<div class="footer-logo margin-bottom-20px text-center">
				<!--<img src="/frontend/img/logo2.png" alt="" class="img-responsive">-->
				<a class="" href="/"><img alt="MAROON" width="150" height="60" src="/frontend/img/maroon-logo-transparent.png" class=""></a>
			</div>
            <div class="row">
                <ul class="social">
                    <li><a class="facebook" href="#"><span class="fa fa-facebook fa-1x"></span> facebook</a></li>
                   	<!-- <li><a class="twitter" href="#">twitter</a></li> -->
                   	<!-- <li><a class="pinterest" href="#">pinterest</a></li>-->
                    <li><a class="instagram" href="#"> <span class="fa fa-instagram fa-1x"></span> instagram</a></li>
                  	<!--  <li><a class="linkedin" href="#">linked in</a></li>-->
                   	<!-- <li><a class="googleplus" href="#">google+</a></li>-->
                </ul>
            </div>
        </div>

        <div class="copyright">
            <p class="text-center">
				<?php echo date("Y"); ?> &copy; MAROON | All rights reserved | Developed by <a target="_blank" href="https://vmsl.com.bd">Virtual Market Solution Ltd.</a>
			</p>
        </div>
    </div>
    
    <!-- / footer -->

   <!-- jQuery -->
    <script src="/frontend/js/jquery.min.js"></script>
	<!-- Bootstrap -->
    <script type="text/javascript" src="/frontend/js/bootstrap.min.js"></script>
    <!-- jquery ui -->
    <script src="/frontend/js/jquery-ui.js"></script>
    <!-- rev slider -->
    <script type="text/javascript" src="/frontend/assets/plugins/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
    <script type="text/javascript" src="/frontend/assets/plugins/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
    <!-- wow js-->
    <script type="text/javascript" src="/frontend/js/wow.min.js"></script>  
    <!-- venobox js-->
    <script type="text/javascript" src="/frontend/js/venobox.min.js"></script>
    <!-- mouse hover js-->
	<script src="/frontend/js/jquery.directional-hover.js"></script>
    <!-- owl js -->
    <script src="/frontend/js/owl.carousel.min.js"></script>
	<!-- magnific popup -->
    <script src="/frontend/js/jquery.magnific-popup.min.js"></script>
	<!-- smoothscroll -->
    <script src="/frontend/js/smoothscroll.js"></script>
	<!-- settings -->
    <script type="text/javascript" src="/frontend/js/setting.js"></script>
    <!--Product Image Zoom-->
    <script type="text/javascript" src="/frontend/js/zoomsl.min.js"></script>
    
	<script>
		function wishlist(id){
			var products_id = id;
	
			if(id){
	            $.ajax({
	                type: 'POST',
	                url : '/wishlist',
	                data:{
	                    'products_id'	:	products_id,

	                    _token: $('meta[name="csrf-token"]').attr('content')
	                },
	                success:function(data){
						/*
						|
						|--- wishlist Summary Modal
						|
						*/
						$('#wishlist').modal('show');
	            	}
	           });
			}
		}
	</script>