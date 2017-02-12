(function($){jQuery(document).ready(function($){
  $(window).scroll(function(event) {
    if($('.article-laden.laden').length==1 && $('.article-laden.laden').offset().top < $(window).scrollTop() + $(window).outerHeight()) {
      $('.article-laden').html('Wird geladen ...').removeClass('laden').addClass('lade');
      console.log('Lade Inhalte ab Eintrag: '+$('.article-laden').data("loadbegin"))
      $.post( "", { getlist: "1", begin: $('.article-laden').data("loadbegin") }).done(function( data ) {
        $('.article-laden.lade').replaceWith(data);
      }).fail(function( data ) {
        console.log(data);
        $('.article-laden.lade').replaceWith('<div>Fehler beim laden!</div>');
      });
    }
}).scroll();
});})(jQuery);
