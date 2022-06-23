/*
 |--------------------------------------------------------------------------
 | Document Ready Function
 |--------------------------------------------------------------------------
 */
$(document).ready(function () {

    'use strict';

    $("#profile_photo").change(function () {
        if (!this.files || !this.files[0]) {
            return;
        }

        let reader = new FileReader();

        reader.onload = function (event) {
            $('.image--profile-change').attr('src', event.target.result);
            $('.image--profile-change__alert').removeClass('d-none');
        }

        reader.readAsDataURL(this.files[0]);
    });

});
