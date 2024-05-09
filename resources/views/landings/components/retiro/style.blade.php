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
</style>
