/* global jQuery */
(function ($) {
	// Animate Header
	if ($('header.start').length > 0) {
		const sF = function () {
			let doc = document.documentElement;
			let sTop = (window.pageYOffset || doc.scrollTop) - (doc.clientTop || 0);
			let aHsHeight = $('header.start').outerHeight();
			let aFac = sTop < aHsHeight ? 1 / aHsHeight * sTop : 1;
			$('header.start').css('opacity', 1 - aFac * 0.5);
			$('.start-city, .start-mountains').css('margin-bottom', -aHsHeight / 2.75 * aFac);
			$('.start-logo').css('margin-top', aHsHeight / 1.5 * aFac);
			$('.nav-frm .navbar-brand').css('opacity', aFac).css('transform', 'scale(' + aFac + ')');
			if (sTop > aHsHeight) {
				$('.nav-frm > .navbar').addClass('fixed-top');
			} else {
				$('.nav-frm > .navbar').removeClass('fixed-top');
			}
		};
		const sD = function () {
			$('.nav-frm > .navbar').removeClass('fixed-top');
			$('.nav-frm').css('height', $('.nav-frm').height());
			sF();
		};
		sD();
		jQuery(document).ready(function ($) {
			sD();
		});
		$(window).on('load', function ($) {
			sD();
		});
		window.onresize = function () {
			sD();
		};
		$(window).scroll(sF);
	} else {
		$('.nav-frm').css('height', $('.nav-frm').height());
		$('.nav-frm > .navbar').addClass('fixed-top');
	}
})(jQuery);
