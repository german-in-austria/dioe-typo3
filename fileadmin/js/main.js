(function($){jQuery(document).ready(function($){
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
  if (!("ontouchstart" in document)) {
    var s = skrollr.init({
        smoothScrolling: false,
        forceHeight: true
    });
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
});})(jQuery);
