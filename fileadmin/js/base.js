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
	const alfilter = function (e, nThis) {
		var form = nThis ? $(nThis) : $(this).parents('form');
		var fData = {};
		form.find('input, select').each(function () {
			fData[$(this).attr('name')] = $(this).val();
		});
		// console.log('filter ...', fData);
		$.post(form.attr('action'), fData).done(function (data) {
			$(form.parent().data('target')).html($(data).find('.das-ajax').children());
			scrollAln();
		});
	};
	jQuery(document).ready(function ($) {
		if ($('.article-list-next').length > 0) {
			$(window).scroll(scrollAln);
			scrollAln();
			if ($('form.article-list-filter').length > 0) {
				$(document).on('change', 'form.article-list-filter select', alfilter);
				$('form.article-list-filter').each(function () {
					if ($(this).find('[name="tx_dioearticlesystem_view[sacluster]"]').val() !== '-1' || $(this).find('[name="tx_dioearticlesystem_view[satype]"]').val() !== '-1' || $(this).find('[name="tx_dioearticlesystem_view[saorder]"]').val() !== '0') {
						alfilter(null, this);
					}
				});
			}
		}
	});
})(jQuery);
