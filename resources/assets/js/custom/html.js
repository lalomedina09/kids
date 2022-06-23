/*
 |--------------------------------------------------------------------------
 | Document Ready Function
 |--------------------------------------------------------------------------
 */
$(function() {

    'use strict';

    const view = $(document),
          menu = $('#navbar-collapse'),
          open = menu.lenght !== 0;

	function close() {
		menu.collapse('hide');
	}

	// Exit to menu when escape button keypress
	view.keydown(event => {
		let escape = event.which == 27;
		if (open && escape) {
			close();
		}
	});

	// Exit to menu when clicking outside of the menu wrapper
	view.on('click', function(event) {
		let clickover = $(event.target),
			menuWrapper = 'header__menu-wrapper';
		if (open && !clickover.hasClass(menuWrapper)) {
			close();
		}
	});
});
