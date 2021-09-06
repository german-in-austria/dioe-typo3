/* global jQuery */
(function ($) {
	const scrollAln = function () {
		if ($('.article-list-next').length > 0) {
			$('.article-list-next:not(.loading)').each(function () {
				if ($(this).offset().top < $(window).scrollTop() + $(window).outerHeight()) {
					$(this).addClass('loading').text($(this).text() + ' loading ...');
					var aThis = this;
					$.get($(this).data('url')).done(function (data) {
						// console.log(data);
						$(aThis).replaceWith($(data).find('.das-ajax').children());
					}).fail(function (data) {
						console.log('Error', data);
						$('.article-laden.lade').replaceWith('<div>Error!</div>');
					});
				}
			});
		}
	};
	jQuery(document).ready(function ($) {
		if ($('.article-list-next').length > 0) {
			$(window).scroll(scrollAln);
		}
		scrollAln();
	});
})(jQuery);
