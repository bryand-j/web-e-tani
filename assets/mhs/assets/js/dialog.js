










(function($) {
	'use strict';
	$(function() {
		$('[data-toggle="dialog"]').on('click', function() {
			var dialog = new mdc.dialog.MDCDialog(document.querySelector('#' + $(this).attr("target-dialog")));
			dialog.listen('MDCDialog:accept', function() {
				console.log('accepted');
			});
			dialog.listen('MDCDialog:cancel', function() {
				console.log('canceled');
			});
      dialog.open();
		});
	});
})(jQuery);