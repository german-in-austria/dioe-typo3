/* global jQuery */
(function ($) {
  const params = new Proxy(new URLSearchParams(window.location.search), { get: (searchParams, prop) => searchParams.get(prop), });
  if (params.from) { localStorage.setItem('from', params.from); }
  const aFrom = localStorage.getItem('from');
  console.log('oeda', params.from, aFrom);
  if (aFrom === 'app') { $('.dioe-nav').addClass('d-none'); }
})(jQuery);
