/*
 |--------------------------------------------------------------------------
 | Document Ready Function
 |--------------------------------------------------------------------------
 */
$(function() {

    'use strict';

    $('#lnk_video_media').click(function() {
        $('#lnk_video_media').addClass('active');
        $('#lnk_podcast_media').removeClass('active');

        $('#menu_podcast_content').addClass('d-none');
        $('#menu_video_content').removeClass('d-none');

        $('#div_podcast_content').addClass('d-none');
        $('#div_video_content').removeClass('d-none');
    });

    $('#lnk_podcast_media').click(function() {
        $('#lnk_video_media').removeClass('active');
        $('#lnk_podcast_media').addClass('active');

        $('#menu_video_content').addClass('d-none');
        $('#menu_podcast_content').removeClass('d-none');

        $('#div_video_content').addClass('d-none');
        $('#div_podcast_content').removeClass('d-none');
    });

});
