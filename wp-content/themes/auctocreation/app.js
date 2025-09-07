jQuery(document).ready(function($){

	$(document).ready(function(){

		// Add smooth scrolling to all links in navbar + footer link

		// $(".navbar a, footer a[href='#myPage']").on('click', function(event) {

		// 	// Events

		// 	// Prevent default anchor click behavior

		// 	event.preventDefault();

			

		// 	// Store hash

		// 	var hash = this.hash;

			

		// 	// Using jQuery's animate() method to add smooth page scroll

		// 	// The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area

		// 	$('html, body').animate({

		// 		scrollTop: $(hash).offset().top

		// 		}, 900, function(){

				

		// 		// Add hash (#) to URL when done scrolling (default click behavior)

		// 		window.location.hash = hash;

		// 	});

		// });

		

		// Slide in elements on scroll

		$(window).scroll(function() {

			$(".slideanim").each(function(){

				var pos = $(this).offset().top;

				

				var winTop = $(window).scrollTop();

				if (pos < winTop + 600) {

					$(this).addClass("slide");

				}

			});

		});

	});

	$(function() { // DOM ready

		// If a link has a dropdown, add sub menu toggle.

		$('nav ul li a:not(:only-child)').click(function(e) {

			$(this).siblings('.nav-dropdown').toggle();

			// Close one dropdown when selecting another

			$('.nav-dropdown').not($(this).siblings()).hide();

			e.stopPropagation();

		});

		// Clicking away from dropdown will remove the dropdown class

		$('html').click(function() {

			$('.nav-dropdown').hide();

		});

		// Toggle open and close nav styles on click

		$('#nav-toggle').click(function() {

			$('nav ul').slideToggle();

		});

		// Hamburger to X toggle

		$('#nav-toggle').on('click', function() {

			this.classList.toggle('active');

		});

	}); // end DOM ready

	/*****Scroll to about****/
	var headerHeight = $('.navbar').outerHeight();
	var scrollLink = $('.scroll');
		//Smooth scrolling
		scrollLink.click(function(e){
			e.preventDefault();
			$('body,html').animate({
				scrollTop: $(this.hash).offset().top - headerHeight
		}, 1000);
	})

	// Smooth scroll

	$('.slide-section').click(function(e){
		var linkHref = $(this).attr('href');
		//console.log($(linkHref).offset().top);
		$('html, body').animate({
			scrollTop: $(linkHref).offset().top - headerHeight
		}, 1000);
		e.preventDefault();
	});
	
});