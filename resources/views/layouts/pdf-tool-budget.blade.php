<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Querido Dinero - Movimientos</title>

        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <meta name="author" content="">

        <style type="text/css">
            * {
                font-family: 'Open Sans', sans-serif;
                font-size: 13px;
                color:#262525;
            }
            @page {
                margin: 50px 50px;
            }
            table {
                width: 100%;
            }
            hr {
                margin: 10px 0px;
                border: 1px solid #000000;
                width: 100%;
            }
            .header {
                text-align: center;
                height: 30px;
                font-weight: bold;
            }
            .number {
                background-color: #000;
                border-radius: 60%;
                text-align: center;
                color: #fff;
                font-weight: bold;
                width: 20px;
                height: 20px;
            }
            .small {
                font-size: 11px;
            }
            .strong {
                font-weight: bold;
            }
            .color-white {
                color: #ffffff !important;
            }
            .color-main {
                color: #FF6161 !important;
            }
            .color-green {
                color: #44aa6c !important;
            }
            .bg-alt {
                background-color: #4FD7DB;
            }
            .bg-main {
                background-color: #FF6161;
            }
            /*.table-moves{
                border: 1px solid #000;
            }*
            .tr-moves {
                text-align: left;
                vertical-align: top;
                border: 1px solid #000;
                border-collapse: collapse;
                padding: 0.3em;
                caption-side: bottom;
            }*/
        </style>
    </head>

    <body>
        @include('partials.profiles.components.tools.components.budget.components.pdf.header')

        <!--<hr>-->

        @yield('content')

        {{--@include('partials.profiles.components.tools.components.budget.components.pdf.moves')--}}

        <!--<hr>-->

        @include('partials.profiles.components.tools.components.budget.components.pdf.footer')
    </body>
</html>
{{--dd('visualizacion de pdf')--}}
