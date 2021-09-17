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
		// Bilder in Text setzen
		// <span data-img="1,left,33%,lb">&nbsp;</span>
		$('span[data-img]').each(function(){
			var aimgarray = String($(this).data('img')).split(',');
			var aimgnr = aimgarray[0];
			var aimgalign = 'left';
			var aimgwidth = '100%';
			var aimglb = false;
			for (var i = 1; i < aimgarray.length; i++) {
				if (aimgarray[i] == 'left' || aimgarray[i] == 'right') {
					aimgalign = aimgarray[i];
				} else if(aimgarray[i].indexOf('%') > -1) {
					aimgwidth = aimgarray[i];
				} else if(aimgarray[i] == 'lb') {
					aimglb = true;
				};
			};
			var aimgrw = '<span class="d-inline-block ' + ((aimgwidth == '100%') ? ' mb-3' : 'pull-' + aimgalign + ((aimgalign == 'left') ? ' mr-3 mb-3' : ' ml-3 mb-3')) + '" style="width:' + aimgwidth + ';">';
			aimgrw += '<figure class="image border border-light w-100"><img src="' + $('.imgData[data-img-dg="' + aimgnr + '"]').data('img-url') + '" alt="" class="w100">' + $('.imgData[data-img-dg="' + aimgnr + '"]').siblings('.img-add')[0].outerHTML + '</figure>';
			var aimgFooter = $('.imgData[data-img-dg="' + aimgnr + '"]').parent().data('footer');
			if (aimgFooter && aimgFooter.length > 0) {
				aimgrw += '<div class="imgdescription">' + aimgFooter + '</div>';
			}
			aimgrw += '</span>';
			if (aimglb == true) {
				aimgrw = '<a href="#" data-imgalbox="' + aimgnr + '">' + aimgrw + '</a>';
			};
			$(this).replaceWith(aimgrw);
		});
		$(document).on('click', 'a[data-imgalbox]', function (e) {
			e.preventDefault();
			$('.imgData[data-img-dg="' + $(this).data('imgalbox') + '"]').parent().click();
		});
	});
})(jQuery);
