require('jssocials');

/*
 |--------------------------------------------------------------------------
 | Document Ready Function
 |--------------------------------------------------------------------------
 */
$(document).ready(function() {

    'use strict';

    $('.share-item').each(function() {
        $(this).jsSocials({
            url : $(this).data('url'),
            shareIn: 'popup',
            showLabel: false,
            showCount: false,
            shares: [
                {
                    share:'facebook',
                    logo: "/images/facebook-light.svg"
                }, {
                    share:'twitter',
                    logo: "/images/twitter-light.svg"
                }, {
                    share:'messenger',
                    logo: "/images/messenger-light.svg"
                }]
        });
    });

    $('#share-two').jsSocials({
        shareIn: 'popup',
        showLabel: false,
        showCount: false,
        shares: [
            {
                share:'facebook',
                logo: "/images/facebook.svg"
            }, {
                share:'twitter',
                logo: "/images/twitter.svg"
            }, {
                share:'messenger',
                logo: "/images/messenger.svg"
            }]
    });

});
