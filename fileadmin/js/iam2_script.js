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

	// Cookie Notice
	setTimeout(function() {
		if (getCookie('cookiepolicy') == 'true') {} else {
			var now = new Date()
			document.querySelector('.cookie-policy').classList.add('active')
			document.cookie = 'cookiepolicy=true; expires=' + now.addDays(200) + '; path=/';
		}
	}, 1000)
});})(jQuery);
