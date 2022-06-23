/*
 |--------------------------------------------------------------------------
 | Document Ready Function
 |--------------------------------------------------------------------------
 */
$(function() {

    'use strict';

    // Add lazy load youtube video
    $('div.youtube').each( function (index) {
        var video = this;
        // thumbnail image source
        var image = new Image();
        image.src = "https://img.youtube.com/vi/"+ video.dataset.embed +"/sddefault.jpg";

        // Load the image asynchronously
        image.addEventListener( "load", function() {
            video.appendChild( image );
        }(index));

        // Load video on click
        video.addEventListener( "click", function() {
            var iframe = document.createElement( "iframe" );
                iframe.setAttribute( "frameborder", "0" );
                iframe.setAttribute( "style", "height='25'" );
                iframe.setAttribute( "allowfullscreen", "false" );
                iframe.setAttribute( "src", "https://www.youtube.com/embed/"+ this.dataset.embed +"?rel=0&showinfo=0&autoplay=1" );

                this.innerHTML = "";
                this.appendChild( image );
                this.appendChild( iframe );
        } );
    });
});
