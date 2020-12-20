/*
	Dopetrope by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
*/

(function($) {

	skel
		.breakpoints({
			desktop: '(min-width: 737px)',
			tablet: '(min-width: 737px) and (max-width: 1200px)',
			mobile: '(max-width: 736px)'
		})
		.viewport({
			breakpoints: {
				tablet: {
					width: 1080
				}
			}
		});

	$(function() {

		var	$window = $(window),
			$body = $('body');

		// Disable animations/transitions until the page has loaded.
			$body.addClass('is-loading');

			$window.on('load', function() {
				$body.removeClass('is-loading');
			});

		// Fix: Placeholder polyfill.
			$('form').placeholder();

		// Prioritize "important" elements on mobile.
			skel.on('+mobile -mobile', function() {
				$.prioritize(
					'.important\\28 mobile\\29',
					skel.breakpoint('mobile').active
				);
			});

		// Dropdowns.
			$('#nav > ul').dropotron({
				mode: 'fade',
				noOpenerFade: true,
				alignment: 'center'
			});

		// Off-Canvas Navigation.

			// Title Bar.
				$(
					'<div id="titleBar">' +
						'<a href="#navPanel" class="toggle"></a>' +
					'</div>'
				)
					.appendTo($body);

			// Navigation Panel.
				$(
					'<div id="navPanel">' +
						'<nav>' +
							$('#nav').navList() +
						'</nav>' +
					'</div>'
				)
					.appendTo($body)
					.panel({
						delay: 500,
						hideOnClick: true,
						hideOnSwipe: true,
						resetScroll: true,
						resetForms: true,
						side: 'left',
						target: $body,
						visibleClass: 'navPanel-visible'
					});

			// Fix: Remove navPanel transitions on WP<10 (poor/buggy performance).
				if (skel.vars.os == 'wp' && skel.vars.osVersion < 10)
					$('#titleBar, #navPanel, #page-wrapper')
						.css('transition', 'none');

	});

})(jQuery);

// var images = ['images/carousel/picture00001.jpg',
// 'images/carousel/picture00002.jpg',
// 'images/carousel/picture00003.jpg',
// 'images/carousel/picture00004.jpg',
// 'images/carousel/picture00005.jpg',
// 'images/carousel/picture00006.jpg',
// 'images/carousel/picture00007.jpg',
// 'images/carousel/picture00008.jpg',
// 'images/carousel/picture00009.jpg',
// 'images/carousel/picture00010.jpg'];
//
// var i = 0;
//
// setInterval(function(){
// 	if (i > images.length) {
// 		i = 0;
// 	}
// 	$('#carousel').fadeOut(10000, function(){
// 		$('#carousel').attr('src', images[i]);
// 		$('#carousel').fadeIn(10000);
// 	});
// 	i = i+1;
// }, 10000);

function cycleImages(){
      var $active = $('#cycler .active');
      var $next = ($active.next().not('.base').length > 0) ? $active.next().not('.base') : $('#cycler img').not('.base').first();
      $next.css('z-index',2);//move the next image up the pile
      $active.fadeOut(1500,function(){//fade out the top image
	      $active.css('z-index',1).show().removeClass('active');//reset the z-index and unhide the image
          $next.css('z-index',3).addClass('active');//make the next image the top one
      });
    }

$(document).ready(function(){
$('#cycler img.base').clone().prependTo('#cycler');
$('#cycler img.base').last().removeClass('base').addClass('active');
$('#cycler img').show();
// run every 4s
setInterval('cycleImages()', 4000);
})
