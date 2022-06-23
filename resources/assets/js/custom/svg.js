/*
 |--------------------------------------------------------------------------
 | Document Ready Function
 |--------------------------------------------------------------------------
 */
$(function() {

    'use strict';

    // Here be dragons.

    var svgCustom = $('.svg');
    svgCustom.each(function(){
        var img         = $(this);
        var image_uri   = img.attr('src');

        $.get(image_uri, function(data) {
            var svg = $(data).find('svg');
            svg.removeAttr('xmlns:a');
            img.replaceWith(svg);
        }, 'xml');
    });
});
