( function( jQuery ) {

	"use strict";
	
	jQuery(document).ready(function() {	

		jQuery('.main-navigation').meanmenu({
			meanMenuContainer: '.menu-container',
			meanScreenWidth: "768",
			meanRevealPosition: "right",
		});
		
		jQuery('.sticky-section').theiaStickySidebar({
	        additionalMarginTop: 0
	    });

		jQuery( '#scroll-top' ).click( function() {
			jQuery('html, body').animate({ scrollTop: 0 }, 600);
			return false;
		});

		jQuery( '.search-icon' ).click( function() {
			jQuery( '.search-form-container' ).fadeToggle();
		} );
		jQuery('.ticker-news-carousel').owlCarousel({
			items: 1,
			animateOut: 'fadeOutUp',
			animateIn: 'fadeInUp',
			autoplay: true,
			loop: true,
			nav: false
		});

		jQuery( '.highlight-carousel' ).owlCarousel({
			items: 2,
			animateIn: 'fadeIn',
			autoplay: true,
			loop: true,
			responsive: {
				0 : {
					items: 1
				},
				767: {
					items: 2
				},
				991 : {
					items: 2
				},
				1199 : {
					items: 3
				}
			}
		});

		jQuery( '.highlight-left-carousel' ).owlCarousel({
			items: 1,
			autoplay: true,
			loop: true,
			nav: true,
		});

		jQuery( '.news-section-carousel' ).owlCarousel({
			items: 2,
			animateIn: 'fadeIn',
			autoplay: true,
			loop: false,
			nav: true,
			rewind: true,
			responsive: {
				0 : {
					items: 1
				},
				767: {
					items: 2
				},
				991 : {
					items: 2
				},
				1199 : {
					items: 2
				}
			}
		})
	});

	jQuery(window).scroll( function() {
		if (jQuery(this).scrollTop() > 100) {
			jQuery( '.scroll-top' ).fadeIn(600);  
		} else {
			jQuery( '.scroll-top' ).fadeOut(600);
		}
	});


} ) ( jQuery );