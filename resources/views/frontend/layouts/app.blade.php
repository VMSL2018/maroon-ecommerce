<!DOCTYPE html>
<html lang="en">
<head>
	<!--header.blade.php-->
	@include('frontend.layouts.header')
	@yield('header')
</head>


<body class="home5">
	<!--	<div id="loading-bar-spinner" class="spinner"><div class="spinner-icon"></div></div> -->
		
		<!--navbar.blade.php-->
		@include('frontend.layouts.navbar')
	
		@yield('slider')
		
		@yield('contents')
	        
	    
		<!--footer.blade.php-->
		@include('frontend.layouts.footer')
	
		@yield('footer')
	

	
</body>
</html>