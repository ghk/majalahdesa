/* Add theme related links to theme customizer */

(function($) {
	if ('undefined' !== typeof mh_magazine_lite_links) {

		// Theme Links
		box = $('<div class="mh-theme-links-wrap"></div>');

		title = $('<h3 class="mh-theme-links-title"></h3>')
			.text(mh_magazine_lite_links.title);

		themePage = $('<a class="mh-theme-link mh-theme-link-info"></a>')
			.attr('href', mh_magazine_lite_links.themeURL)
			.attr('target', '_blank')
			.text(mh_magazine_lite_links.themeLabel);

		themeDocu = $('<a class="mh-theme-link mh-theme-link-docs"></a>')
			.attr('href', mh_magazine_lite_links.docsURL)
			.attr('target', '_blank')
			.text(mh_magazine_lite_links.docsLabel);

		themeSupport = $('<a class="mh-theme-link mh-theme-link-support"></a>')
			.attr('href', mh_magazine_lite_links.supportURL)
			.attr('target', '_blank')
			.text(mh_magazine_lite_links.supportLabel);

		themeRate = $('<a class="mh-theme-link mh-theme-link-rate"></a>')
			.attr('href', mh_magazine_lite_links.rateURL)
			.attr('target', '_blank')
			.text(mh_magazine_lite_links.rateLabel);

		// Add Theme Links
		links = box.append(title).append(themePage).append(themeDocu).append(themeSupport).append(themeRate);

		setTimeout(function() {
			$('#accordion-panel-mh_theme_options .control-panel-content').append(links);
		}, 2000);


	}
})(jQuery);