/* global jQuery */
(function ($) {
	jQuery(document).ready(function ($) {
		fxData();
	});
	$(window).on('load', function ($) {
		fxData();
	});
	window.onresize = function () {
		fxData();
	};
	var fxData = function () {
		let wH = $(window).height();
		$('.fx-text-ol').parent().css('height', '');
		$('[data-fx-sh]').css({'height': ''});
		$('.fx-img').each(function () {
			$(this).css('height', '').css('min-height', '');
			if ($(this).hasClass('fx-img-mh') && $(this).parent().find('.fx-text-ol').length > 0) { $(this).parent().css('height', ''); };
			let aFxImgH = (wH - (($(this).hasClass('wo-nav')) ? ($('.nav-frm').outerHeight() + $('.nav-frm').position().top || $('nav.navbar').outerHeight()) : 0)) * (($(this).data('fx-img-multi')) ? $(this).data('fx-img-multi') : 1);
			if ($(this).hasClass('fx-img-mh')) {
				$(this).css('min-height', aFxImgH);
				let fxTxtOl = $(this).parent().find('.fx-text-ol');
				if (fxTxtOl.length > 0) {
					$(this).parent().css('height', fxTxtOl.outerHeight());
				}
			} else {
				$(this).css('height', aFxImgH);
			}
		});
		$('.fx-center').each(function () {
			$(this).css('top', ($(this).parent().outerHeight() - $(this).outerHeight()) / 2);
		});
		$('.nav-frm').removeClass('fx-moved-up').css({'margin-top': 0});
		$('[data-fx]').removeClass('fixed-top fx-fixed').each(function () {
			if (typeof $(this).data('fx') === 'string') {
				let aData = $(this).data('fx').split(' ');
				if (aData.indexOf('fixed') !== -1) {
					let tOH = $(this).outerHeight();
					let tPT = $(this).position().top;
					$(this).addClass('fx-fixed').data('fx-pos-top', tPT).parents('.nav-frm').height(tOH);
					if (aData.indexOf('moved-up') !== -1) {
						$(this).data('fx-pos-top', tPT - tOH).parents('.nav-frm').addClass('fx-moved-up').css({'margin-top': -tOH});
					}
				}
			}
		});
		$('[data-fx-sh]').each(function () {
			let oH = $(this).outerHeight(), sH = $(this).data('fx-sh');
			$(this).data('fx-height', ((oH < sH ? sH : oH)));
		});
		sF();
	};
	var sF = function () {
		let doc = document.documentElement;
		let sTop = (window.pageYOffset || doc.scrollTop) - (doc.clientTop || 0);
		let wH = $(window).height();
		$('.fx-fixed').each(function () {
			let aTop = ($(this).data('fx-pos-top') || 0);
			if (sTop >= aTop) {
				$(this).addClass('fixed-top');
			} else {
				$(this).removeClass('fixed-top');
			}
			if (sTop > aTop) {
				$(this).addClass('fx-pos-over');
				$(this).find('[data-fx-sh]').each(function () {
					let aFH = $(this).data('fx-height'), aSH = $(this).data('fx-sh');
					let nFH = aFH - (sTop - aTop);
					if (nFH < aSH) { nFH = aSH; };
					if (nFH > aFH) { nFH = aFH; };
					$(this).height(nFH);
				});
			} else {
				$(this).removeClass('fx-pos-over');
				$('[data-fx-sh]').css({'height': ''});
			}
		});
		$('[data-fx-parallax]').each(function () {
			let xTop = 0;
			if ($(this).parents('.fx-parallax-base').length > 0) {
				xTop = sTop - $(this).parents('.fx-parallax-base').position().top;
			} else {
				xTop = sTop - $(this).parents('.fx-parallax').position().top;
			}
			if ($(this).data('fx-parallax-no-top') && xTop < 0) { xTop = 0; };
			$(this).css('transform', 'translate3d(0px, ' + (xTop / ($(this).data('fx-parallax') || 3)) + 'px, 0px)');
		});
	};
	$(document).on('click', '.fx-img-next', function () {
		$([document.documentElement, document.body]).animate({scrollTop: $(this).parent().position().top + $(this).parent().outerHeight()}, $(this).data('fx-time') || 400);
	});
	$(document).on('click', '.fx-img-prev', function () {
		$([document.documentElement, document.body]).animate({scrollTop: $(this).parent().position().top - $(window).height()}, $(this).data('fx-time') || 400);
	});
	$(window).scroll(sF);
})(jQuery);
