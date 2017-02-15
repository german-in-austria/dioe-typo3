(function($){jQuery(document).ready(function($){
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

  // Nachladen
  $(window).scroll(function(event) {
    if($('.article-laden.laden').length==1 && $('.article-laden.laden').offset().top < $(window).scrollTop() + $(window).outerHeight()) {
      $('.article-laden').html('Wird geladen ...').removeClass('laden').addClass('lade');
      console.log('Lade Inhalte ab Eintrag: '+$('.article-laden').data("loadbegin"))
      $.post( "", { getlist: "1", begin: $('.article-laden').data("loadbegin") }).done(function( data ) {
        $('.article-laden.lade').replaceWith(data);
        setTimeout(function(){ $('#top-link-block').affix('checkPosition'); }, 500);
      }).fail(function( data ) {
        console.log(data);
        $('.article-laden.lade').replaceWith('<div>Fehler beim laden!</div>');
      });
    };
  }).scroll();

  // "Nach oben"-Knopf
  if(($(window).height()+150)<$(document).height()) {
    $('#top-link-block').removeClass('hidden').affix({ offset: {top:150, bottom: 300} });
    setTimeout(function(){ $('#top-link-block').affix('checkPosition'); }, 500);
  };

});})(jQuery);
