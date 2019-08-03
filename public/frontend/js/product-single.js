$(document).ready(function() {
		  // Init Slider
		  $('.owl-slider').owlCarousel({
			items: 1,
			loop: true,
			autoplay: true,
			nav: true,
			dots: false,
			navText: false
		  });
		  // Pref add class active to 1st thumbnail via js
		  $('.thumbnail').eq(0).addClass('active');
		  // When slider autoplay or drag is true 
		  $('.owl-slider').on('changed.owl.carousel', function(event) {
			$('.thumbnail').removeClass('active');
			var sliders = 4;
			var currentItem = event.item.index - 2;
			if(currentItem >= sliders) {
			  currentItem = 0;
			}
			$('.thumbnail').eq(currentItem).addClass('active');
		  });
		  // When thumbnail is clicked
		  $('.thumbnail a').click(function(event) {
			event.preventDefault();
			$('.thumbnail').removeClass('active');
			var index = $('.thumbnail a').index(this);
			$('.thumbnail').eq(index).addClass('active');
			$('.owl-slider').trigger('to.owl.carousel', [index, 300, true]);
		  });
		  
		  
		  $('.related-products-slider').owlCarousel({
			items: 4,
			loop: true,
			autoplay: true,
			nav: true,
			dots: false,
			navText: false,
			responsive: {
				0: {
					items: 1,
				},
				480: {
					items: 2,
				},
				768: {
					items: 3,
				},
				1200: {
					items: 4,
				}
			}
		  });
		});