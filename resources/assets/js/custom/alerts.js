const sweetAlert = require('sweetalert');

/*
 |--------------------------------------------------------------------------
 | Document Ready Function
 |--------------------------------------------------------------------------
 */
$(document).ready(function() {

    'use strict';

    /**
     * Close sweetalert when users click on the overlay.
     * @link https://github.com/t4t5/sweetalert
     */
    $('.sweet-overlay').click(event => {
        sweetAlert.close();
    });

});
