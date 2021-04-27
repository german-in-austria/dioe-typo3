/* global jQuery */
(function ($) {
	jQuery(document).ready(function ($) {
		// Filter/Sortierung: Team
		if ($('#filter-team').length > 0) {
			var lastuebid = '';
			$('section.team-list > *').each(function () {
				if ($(this).is('article')) {
					$(this).attr('data-sort-ueb', lastuebid);
				} else {
					if ($(this).find('header').length > 0) {
						lastuebid = $(this).prop('id');
					}
				};
			});
			$(document).on('change', '#filter-team #ft-sort', function (event) {
				var asel = parseInt($(this).val());
				if (asel === 2) { /* Alphabetisch */
					console.log('Sortierung: Alphabetisch');
					$('section.team-list').removeClass('ft-sort-teilproj').addClass('ft-sort-alpha');
					$('section.team-list > div:not(#filter-team)').addClass('ft-sort-hidden');
					$('section.additional-team').hide();
					$('section.team-list').append($('section.team-list > article.mitarbeiter').sort(function (a, b) { return String.prototype.localeCompare.call($(a).data('sort-name').toLowerCase(), $(b).data('sort-name').toLowerCase()); }));
				} else { /* Funktion */
					console.log('Sortierung: Standard');
					$('section.team-list').removeClass('ft-sort-alpha ft-sort-teilproj');
					$('section.team-list > div:not(#filter-team)').removeClass('ft-sort-hidden');
					$('section.additional-team').show();
					$('section.team-list').append($('section.team-list>article.mitarbeiter').sort(function (a, b) { return $(a).data('sort-sorting') - $(b).data('sort-sorting'); }));
					$('section.team-list > div:not(#filter-team)').each(function () {
						$('section.team-list>article.mitarbeiter[data-sort-ueb="' + $(this).prop('id') + '"]').first().before($(this));
					});
				}
			});
			$(document).on('change', '#filter-team #ft-projekte', function (event) {
				var asel = $(this).val();
				if (asel) {
					asel = asel.split(',');
					$('section.additional-team').hide();
					$('section.team-list > article.mitarbeiter').each(function () {
						if ($(this).data('sort-projekte')) {
							var aproj = $(this).data('sort-projekte').split(',');
							var mfound = 0;
							jQuery.each(asel, function (i, val) { if (aproj.indexOf(val) > -1) { mfound = 1; }; });
							if (mfound) {
								$(this).removeClass('ft-pro-hidden');
							} else {
								$(this).addClass('ft-pro-hidden');
							};
						};
					});
				} else {
					$('section.team-list > article.mitarbeiter').removeClass('ft-pro-hidden');
					$('section.additional-team').show();
				};
			});
		};
	});
})(jQuery);
