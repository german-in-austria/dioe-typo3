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
  if($('body#hp1').length>0) {
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
  // <span data-img="1,left,33%">&nbsp;</span>
  $('span[data-img]').each(function(){
    var aimgarray = String($(this).data('img')).split(',');
    var aimgnr = aimgarray[0];
    var aimgalign = 'left';
    var aimgwidth = '100%';
    for (var i = 1; i < aimgarray.length; i++) {
      if(aimgarray[i]=='left'||aimgarray[i]=='right') {
        aimgalign = aimgarray[i];
      } else if(aimgarray[i].indexOf('%') > -1) {
        aimgwidth = aimgarray[i];
      };
    };
    $(this).replaceWith('<span class="img img-responsive img-rounded pull-'+aimgalign+((aimgwidth=='100%')?'':((aimgalign=='left')?' mir2e mib1e':' mil2e mib1e'))+'" style="width:'+aimgwidth+';"><img src="'+$('.imgData[data-img-dg="'+aimgnr+'"]').data('img-url')+'" alt="" class="w100">'+$('.imgData[data-img-dg="'+aimgnr+'"]').siblings('.img-add')[0].outerHTML+'</span>');
  });

  // Nachladen
  $(window).scroll(function(event) {
    if($('.article-laden.laden').length==1 && $('.article-laden.laden').offset().top < $(window).scrollTop() + $(window).outerHeight()) {
      $('.article-laden').html(lang['wirdgeladen']).removeClass('laden').addClass('lade');
      console.log('Lade Inhalte ab Eintrag: '+$('.article-laden').data("loadbegin"))
      $.post( "", { getlist: "1", begin: $('.article-laden').data("loadbegin") }).done(function( data ) {
        $('.article-laden.lade').replaceWith(data);
        setTimeout(function(){ $('#top-link-block').affix('checkPosition'); }, 500);
      }).fail(function( data ) {
        console.log(data);
        $('.article-laden.lade').replaceWith('<div>'+lang['ladefehler']+'</div>');
      });
    };
  }).scroll();

  // "Nach oben"-Knopf
  if(($(window).height()+150)<$(document).height()) {
    $('#top-link-block').removeClass('hidden').affix({ offset: {top:150, bottom: 300} });
    setTimeout(function(){ $('#top-link-block').affix('checkPosition'); }, 500);
  };

  // Podlove
  $('#podcastAudio').podlovewebplayer();

  // Filter/Sortierung: Team
  if($('#filter-team #ft-projekte').length > 0) {
    var lastuebid = '';
    $('.mitarbeiter-liste>*').each(function(){
      if($(this).is('article')) {
        $(this).data('sort-ueb',lastuebid)
      } else {
        lastuebid = $(this).prop('id')
      };
    });
    $(document).on('change', '#filter-team #ft-projekte', function(event) {
      var asel = $(this).val()
      if(asel) {
        asel = JSON.parse(asel)
        $('.mitarbeiter-liste>article.mitarbeiter').each(function(){
          if($(this).data('sort-projekte')) {
            var aproj = JSON.parse('['+$(this).data('sort-projekte')+']')
            var mfound = 0
            jQuery.each(asel, function(i,val){ if(aproj.indexOf(val)>-1) { mfound = 1; }; });
            if(mfound) {
              $(this).removeClass('hidden')
            } else {
              $(this).addClass('hidden')
            };
          };
        });
      } else {
        $('.mitarbeiter-liste>article.mitarbeiter').removeClass('hidden')
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


});})(jQuery);
