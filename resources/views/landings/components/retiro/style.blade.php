<style>
    @font-face {
        font-family: 'Lilita One';
        src: url('/fonts/LilitaOne-Regular.ttf') format('truetype');
    }

    @font-face {
        font-family: 'Akshar';
        src: url('/fonts/Akshar-VariableFont_wght.ttf') format('truetype');
    }

    @font-face {
        font-family: 'Akshar-medium';
        src: url('/fonts/akshar/Akshar-Medium.ttf') format('truetype');
    }

    @font-face {
        font-family: 'Besley';
        src: url('/fonts/Besley-Italic-VariableFont_wght.ttf') format('truetype');
    }

    @font-face {
        font-family: 'Besley-medium';
        src: url('/fonts/besley/Besley-Medium.ttf') format('truetype');
    }

    .font-lilita {
        font-family: 'Lilita One', sans-serif;
    }

    .font-akshar {
        font-family: 'Akshar', sans-serif;
    }
    .font-akshar-medium {
        font-family: 'Akshar-medium', sans-serif;
    }
    .font-besley {
        font-family: 'Besley', sans-serif;
    }
    .font-besley-medium {
        font-family: 'Besley-medium', sans-serif;
    }

    .font-size-quote{
        font-size: 26px;
    }
    .benefits-border-white{
        border-radius: 8px;
        border: 4px solid white;
        margin: 2% 15%;
        -webkit-box-shadow: -1px 0px 15px -1px rgb(71 68 68 / 75%);
        -moz-box-shadow: -1px 0px 15px -1px rgb(71 68 68 / 75%);
        box-shadow: -1px 0px 15px -1px rgb(71 68 68 / 75%);
    }
    .benefits-border-white >p{
        font-size: 26px;
    }

    .zoom-circle {
        position: absolute;
        top: 30%;
        left: 60%;
        transform: translate(-70%, -70%);
        width: 100px;
        height: 100px;
        border-radius: 50%;
        border: 2px solid #f7dc4c;
        background-color: transparent;
        animation: moveRight 4s ease infinite alternate, zoomInOut 4s ease infinite alternate; /* Se aplican dos animaciones */
    }

    .img-ilustracion-more-gif{
        position: absolute;
        top: 0;
        right: 0;
        z-index: 0;
    }
    @keyframes moveRight {
        0% {
            left: 60%;
        }
        50% {
            left: 80%;
        }
        100% {
            left: 60%;
        }
    }

    @keyframes zoomInOut {
        0% {
            transform: translate(-60%, -60%) scale(1);
        }
        50% {
            transform: translate(-65%, -65%) scale(1.5);
        }
        100% {
            transform: translate(-80%, -80%) scale(2);
        }
    }

    .label-format{
        background-color: #f7dc4c;
        padding: 5px;
        position: absolute;
        bottom: 0;
        left: 0;
        padding-left: 10px;
        padding-right: 10px;
    }
    .img-client{
        display: block;
        margin:auto;
        width:100%;
    }
    .banner-first-span{
        font-size: 30px;
    }
    .banner-h1-label-yellow{
       margin-top: 20px;
       margin-bottom: 20px;
    }
    .banner-align-btn{
        text-align: left;
    }
    .bg-yellow{
        background-color: #f7dc4c;
    }
    .label-benefits-title{
        background-color: #f7dc4c;
        padding-left: 10px;
        padding-right: 10px;
        padding-top: -8px !important;
    }
    .label-request-title{
        background-color: #000;
        color: #ffffff;
        padding-left: 10px;
        padding-right: 10px;
        padding-top: -8px !important;
    }

    /* Media query para dispositivos móviles pequeños */
    @media only screen and (max-width: 600px) {
        /* Estilos para dispositivos móviles pequeños */
        .banner-first-span{
            text-align: center;
            display: block;
            margin: 0px auto -25px;
            font-size: 25px;
        }
        .banner-h1{
            text-align: center;
            font-size: 32px;
        }
        .banner-first-quote{
            display: none;
            font-size: 30px;
        }
        .banner-align-btn{
            text-align: center;
        }
        .img-ilustracion-more-gif{
            width: 50%;
        }
        .quote-request{
            font-size: 20px;
        }

        .request-h1{
            line-height: 1.5;
        }

        .benefits-h1{
            font-size: 1.5rem;
        }
        .text-quote{
            font-size: 18px;
            text-align: center;
            margin-bottom: 100px;
        }

        .label-format{
            bottom: 20px;
            left: 50px;
        }
    }

    /* Media query para smartphones en modo landscape */
    @media only screen and (min-width: 600px) and (max-width: 900px) {
    /* Estilos para smartphones en modo landscape */
    }

    /* Media query para tabletas en modo portrait */
    @media only screen and (min-width: 600px) and (max-width: 900px) {
    /* Estilos para tabletas en modo portrait */
    }

    /* Media query para pantallas de escritorio pequeñas */
    @media only screen and (min-width: 900px) and (max-width: 1200px) {
    /* Estilos para pantallas de escritorio pequeñas */
    }

    /* Media query para pantallas de escritorio medianas */
    @media only screen and (min-width: 1200px) and (max-width: 1800px) {
    /* Estilos para pantallas de escritorio medianas */
    }

    /* Media query para pantallas de escritorio grandes */
    @media only screen and (min-width: 1800px) {
    /* Estilos para pantallas de escritorio grandes */
    }
</style>
