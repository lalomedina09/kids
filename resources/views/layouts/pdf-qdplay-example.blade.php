<!DOCTYPE html>

<html>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <title>QD Play | Vistas por usuario</title>
    <head>
        <style>
        /** Define the margins of your page **/
        * {
            font-family: 'Montserrat', sans-serif;
            font-size: 12px;
        }
        @page {
        margin: 100px 25px;
        }

        header {
        position: fixed;
        top: -60px;
        left: 0px;
        right: 0px;
        height: 50px;

        /** Extra personal styles **/
        color: white;
        bagkground-color: #80aa56;
        background-image: linear-gradient(to right, #80aa56, #0bb9aa);
        /*background-color: #03a9f4;
        color: white;*/
        text-align: center;
        line-height: 35px;
        }

        footer {
        position: fixed;
        bottom: -60px;
        left: 0px;
        right: 0px;
        height: 50px;

        /** Extra personal styles **/
        background-color: #03a9f4;
        color: white;
        text-align: center;
        line-height: 35px;
        }
        </style>
    </head>
    <body>
        <!-- Define header and footer blocks before your content -->
        <header>
            Cabecera del documento
        </header>


        <main>

            @yield('content')

        </main>

        <footer>
            Copyright ©
        </footer>

        <!-- Wrap the content of your PDF inside a main tag -->
    </body>

</html>
{{--dd('pdf')--}}
