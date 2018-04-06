(function($){jQuery(document).ready(function($){

  // Helpers
  Date.prototype.addDays = function(days) {
    var dat = new Date(this.valueOf());
    dat.setDate(dat.getDate() + days);
    return dat;
  }

  function getCookie(c_name) {
    var i, x, y, ARRcookies = document.cookie.split(";");
    for (i = 0; i < ARRcookies.length; i++) {
      x = ARRcookies[i].substr(0, ARRcookies[i].indexOf("="));
      y = ARRcookies[i].substr(ARRcookies[i].indexOf("=") + 1);
      x = x.replace(/^\s+|\s+$/g, "");
      if (x == c_name) {
        return unescape(y);
      }
    }
  }

  // Wörter/Sätze
  var lang = [];
  lang['wirdgeladen'] = 'Wird geladen ...';
  lang['ladefehler'] = 'Fehler beim laden!';
  // Englisch
  if($('body').hasClass('lang-en')) {
    lang['wirdgeladen'] = 'Loading ...';
    lang['ladefehler'] = 'Error at loading!';
  };

  // Mobiles Menü
  if($('body#hp1,body#hp60').length>0) {
    if (!("ontouchstart" in document)) {
      var s = skrollr.init({
          smoothScrolling: false,
          forceHeight: true
      });
    }
  }

  var mobileToggle = 0;
  $('body').on('click touchend', '.trigger-mobile-menu', function (e) {
    e.preventDefault();
    e.stopPropagation();
    if(mobileToggle==0) {
      mobileToggle = 1;
      console.log(e);
      setTimeout(function(){
        $('body').toggleClass('show-mobile-nav');
        mobileToggle = 0;
      }, 250);
    };
  });

  // Animation Berge
  setInterval(function() {
      $('.hero').toggleClass('active');
  }, 8000);

  // Lightbox
  $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox();
  });

  // Bilder in Text setzen
  // <span data-img="1,left,33%,lb">&nbsp;</span>
  $('span[data-img]').each(function(){
    var aimgarray = String($(this).data('img')).split(',');
    var aimgnr = aimgarray[0];
    var aimgalign = 'left';
    var aimgwidth = '100%';
		var aimglb = false;
    for (var i = 1; i < aimgarray.length; i++) {
      if(aimgarray[i]=='left'||aimgarray[i]=='right') {
        aimgalign = aimgarray[i];
      } else if(aimgarray[i].indexOf('%') > -1) {
        aimgwidth = aimgarray[i];
      } else if(aimgarray[i]=='lb') {
				aimglb = true;
			};
    };
		var aimgrw = '<span class="img img-responsive img-rounded pull-'+aimgalign+((aimgwidth=='100%')?'':((aimgalign=='left')?' mir2e mib1e':' mil2e mib1e'))+'" style="width:'+aimgwidth+';"><img src="'+$('.imgData[data-img-dg="'+aimgnr+'"]').data('img-url')+'" alt="" class="w100">'+$('.imgData[data-img-dg="'+aimgnr+'"]').siblings('.img-add')[0].outerHTML+'</span>';
		if(aimglb==true) {
			aimgrw = '<a href="#" data-imgalbox="'+aimgnr+'">'+aimgrw+'</a>';
		};
    $(this).replaceWith(aimgrw);
  });
	$(document).on('click', 'a[data-imgalbox]', function (e) {
		e.preventDefault();
		$('.imgData[data-img-dg="'+$(this).data('imgalbox')+'"]').parent().click();
	});

  // Nachladen
  function articleNachladen() {
    if($('.article-laden.laden').length==1 && $('.article-laden.laden').offset().top < $(window).scrollTop() + $(window).outerHeight()) {
      $('.article-laden').html(lang['wirdgeladen']).removeClass('laden').addClass('lade');
      console.log('Lade Inhalte ab Eintrag: '+$('.article-laden').data("loadbegin"))
      $.post( "", { getlist: "1", begin: $('.article-laden').data("loadbegin") }).done(function( data ) {
        $('.article-laden.lade').replaceWith(data);
        $('#filter-artikel #fa-taskcluster, #filter-artikel #fa-art, #filter-artikel #fa-sort').change()
        setTimeout(function(){ $('#top-link-block').affix('checkPosition'); }, 500);
      }).fail(function( data ) {
        console.log(data);
        $('.article-laden.lade').replaceWith('<div>'+lang['ladefehler']+'</div>');
      });
    };
  };
  $(window).scroll(function(event) {
    articleNachladen()
  }).scroll();

  // "Nach oben"-Knopf
  if(($(window).height()+150)<$(document).height()) {
    $('#top-link-block').removeClass('hidden').affix({ offset: {top:150, bottom: 300} });
    setTimeout(function(){ $('#top-link-block').affix('checkPosition'); }, 500);
  };

  // Podlove
  $('#podcastAudio').podlovewebplayer();

  // Filter/Sortierung: Artiel
  if($('#filter-artikel #fa-taskcluster').length > 0) {
    function filterByClass(sClass,hClass,zClass) {
      $(zClass).removeClass(hClass).not(sClass).addClass(hClass)
      articleNachladen()
    }
    $(document).on('change', '#filter-artikel #fa-taskcluster', function(event) {
      var asel = $(this).val()
      if(asel) {
        filterByClass('.'+asel,'fa-tc-hidden','.article-list>article')
      } else {
        $('.article-list>article').removeClass('fa-tc-hidden')
      };
    });
    $(document).on('change', '#filter-artikel #fa-art', function(event) {
      var asel = $(this).val()
      if(asel) {
        filterByClass('.'+asel,'fa-art-hidden','.article-list>article')
      } else {
        $('.article-list>article').removeClass('fa-art-hidden')
      };
    });
    $(document).on('change', '#filter-artikel #fa-sort', function(event) {
      var asel = $(this).val()
      if(asel==1) {
        var sortedartikel = $('.article-list>article').sort(function(a, b) { return $(a).data('sort-date') - $(b).data('sort-date'); });
        var sortedartikelload = $('.article-list>.article-laden')
        $('.article-list').html(sortedartikel).prepend(sortedartikelload)
        articleNachladen()
      } else {
        var sortedartikel = $('.article-list>article').sort(function(a, b) { return $(b).data('sort-date') - $(a).data('sort-date'); });
        var sortedartikelload = $('.article-list>.article-laden')
        $('.article-list').html(sortedartikel).append(sortedartikelload)
      };
    });
  };

  // Filter/Sortierung: Team
  if($('#filter-team #ft-projekte').length > 0) {
    var lastuebid = '';
    $('.mitarbeiter-liste>*').each(function(){
      if($(this).is('article')) {
        $(this).attr('data-sort-ueb',lastuebid)
      } else {
        lastuebid = $(this).prop('id')
      };
    });
    $(document).on('change', '#filter-team #ft-sort', function(event) {
      var asel = $(this).val()
      if(asel==1) { /* Teilprojekt */
        console.log('Sortierung: Teilprojekt')
        $('.mitarbeiter-liste').removeClass('ft-sort-alpha').addClass('ft-sort-teilproj')
      } else if(asel==2) { /* Alphabetisch */
        $('.mitarbeiter-liste').removeClass('ft-sort-teilproj').addClass('ft-sort-alpha')
        $('.mitarbeiter-liste>div').addClass('ft-sort-hidden')
				$('.outro-text').hide()
        var sortedmitarbeiter = $('.mitarbeiter-liste>article.mitarbeiter').sort(function(a, b) { return String.prototype.localeCompare.call($(a).data('sort-name').toLowerCase(), $(b).data('sort-name').toLowerCase()); });
        $('.mitarbeiter-liste').append(sortedmitarbeiter)
      } else { /* Funktion */
        $('.mitarbeiter-liste').removeClass('ft-sort-alpha ft-sort-teilproj')
        $('.mitarbeiter-liste>div').removeClass('ft-sort-hidden')
				$('.outro-text').show()
        var sortedmitarbeiter = $('.mitarbeiter-liste>article.mitarbeiter').sort(function(a, b) { return $(a).data('sort-sorting') - $(b).data('sort-sorting'); });
        $('.mitarbeiter-liste').append(sortedmitarbeiter)
        $('.mitarbeiter-liste>div').each(function(){
          $('.mitarbeiter-liste>article.mitarbeiter[data-sort-ueb="'+$(this).prop('id')+'"]').first().before($(this))
        });
      }
    });
    $(document).on('change', '#filter-team #ft-projekte', function(event) {
      var asel = $(this).val()
      if(asel) {
        asel = JSON.parse(asel)
				$('.outro-text').hide()
        $('.mitarbeiter-liste>article.mitarbeiter').each(function(){
          if($(this).data('sort-projekte')) {
            var aproj = JSON.parse('['+$(this).data('sort-projekte')+']')
            var mfound = 0
            jQuery.each(asel, function(i,val){ if(aproj.indexOf(val)>-1) { mfound = 1; }; });
            if(mfound) {
              $(this).removeClass('ft-pro-hidden')
            } else {
              $(this).addClass('ft-pro-hidden')
            };
          };
        });
      } else {
        $('.mitarbeiter-liste>article.mitarbeiter').removeClass('ft-pro-hidden')
				$('.outro-text').show()
      };
    });

  };

  // Cookie Notice
  setTimeout(function() {
    if (getCookie('cookiepolicy') == 'true') {} else {
      var now = new Date()
      document.querySelector('.cookie-policy').classList.add('active')
      document.cookie = 'cookiepolicy=true; expires=' + now.addDays(200) + '; path=/';
    }
  }, 3000)

	$('.accordion.singleselect').on('show.bs.collapse','.collapse', function() {
		$('.accordion.singleselect').find('.collapse.in').collapse('hide');
	});

});})(jQuery);
