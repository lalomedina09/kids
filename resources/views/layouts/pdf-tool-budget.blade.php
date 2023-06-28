<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Querido Dinero - Detalle de orden de compra</title>

        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <meta name="author" content="">

        <style type="text/css">
            * {
                font-family: 'Open Sans', sans-serif;
                font-size: 13px;
                color:#262525;
            }
            table {
                width: 100%;
            }
            hr {
                margin: 10px 0px;
                border: 1px solid #ccc;
                width: 100%;
            }
            .header {
                text-align: center;
                height: 30px;
                font-weight: bold;
            }
            .number {
                background-color: #FF6161;
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
        </style>
    </head>

    <body>
        @include('partials.profiles.components.tools.components.budget.components.pdf.header')

        <hr>

        @yield('content')

        @include('partials.profiles.components.tools.components.budget.components.pdf.moves')

        <hr>

        @include('partials.profiles.components.tools.components.budget.components.pdf.footer')
    </body>
</html>
