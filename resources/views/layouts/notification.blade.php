<!doctype html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <title>Querido Dinero</title>
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800,900" rel="stylesheet">

        <style>
            * {
                font-family: 'Montserrat', sans-serif;
                font-size: 14px;
            }

            table, tr, td {
                background-color: white;
                margin: 0;
                padding: 0;
            }

            p {
                margin: 0;
            }
        </style>
    </head>

    <body>
        <table width="750px" border="0" cellpadding="0" cellspacing="0" style="margin:auto;">
            <tr height="30px"></tr>

            <tr>
                <td style="vertical-align:middle;text-align:center;">
                    <a href="{{ config('app.url') }}" target="_blank" rel="noopener noreferrer">
                        <img src="{{ asset('images/emails/logo.png') }}" width="250">
                    </a>
                </td>
            </tr>

            <tr height="30px"></tr>

            <tr height="60px">
                <td style="vertical-align:middle;text-align:center;">
                    <p style="font-size:24px;font-weight:bold;">@yield('email-title')</p>
                    <img src="{{ asset('images/emails/underline.png') }}" width="400">
                </td>
            </tr>

            <tr height="30px"></tr>

            <tr>
                <td>
                    <table width="600px" border="0" cellpadding="0" cellspacing="0" style="margin:auto;">
                        @yield('email-content')
                    </table>
                </td>
            </tr>

            <tr height="30px"></tr>

            <tr>
                <td style="vertical-align:middle;text-align:center;background-color:black;color:white;padding:20px 0;">
                    <p>{{ config('money.copyright') }}</p>
                </td>
            </tr>
        </table>
    </body>
</html>
