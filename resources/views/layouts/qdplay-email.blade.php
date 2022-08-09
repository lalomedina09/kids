<!doctype html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <title>QD Play</title>
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
                        <img src="{{ asset('images/qdplay/logo/oficial.png') }}" width="250">
                    </a>
                </td>
            </tr>

            <tr height="30px"></tr>

            <tr height="60px">
                <td style="vertical-align:middle;text-align:center;">
                    <p style="font-size:24px;font-weight:bold;">@yield('email-title')</p>
                    <img src="{{ asset('images/emails/underline.svg') }}" width="400">
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

            <tr height="20px"></tr>
            <tr>
                <td style="border-top:dashed 1px #cccccc;"></td>
            </tr>
            <tr height="20px"></tr>

            <tr>
                <td>
                    <table width="500px" border="0" cellpadding="0" cellspacing="0" style="margin:auto;">
                        <tr>
                            <td colspan=2 style="vertical-align:middle;text-align:center;">
                                <img src="{{ asset('images/emails/question.svg') }}" width="150">
                                <p style="font-weight:bold;">¿Tienes alguna duda? Comunícate con nosotros</p>
                                <img src="{{ asset('images/emails/underline.svg') }}" width="400">
                            </td>
                        </tr>
                        <tr height="20px"></tr>
                        <tr>
                            <td style="vertical-align:middle;text-align:left;">
                                @if(false)
                                <p style="font-weight:bold;vertical-align:middle;margin-bottom:10px;">
                                    <img src="{{ asset('images/emails/call.svg') }}" width="30" style="vertical-align:middle;">
                                    CDMX: {{ config('money.phone.cdmx') }}
                                <p>
                                @endif
                                <p style="font-weight:bold;vertical-align:middle;">
                                    <img src="{{ asset('images/emails/call.svg') }}" width="30" style="vertical-align:middle;">
                                    MTY: {{ config('money.phone.mty') }}
                                <p>
                            </td>
                            <td style="vertical-align:middle;text-align:right;">
                                <p style="font-weight:bold;vertical-align:middle;">
                                    <img src="{{ asset('images/emails/email.svg') }}" width="30" style="vertical-align:middle;">
                                    <a href="mailto:{{ config('money.email') }}" style="color:black;">{{ config('money.email') }}</a>
                                <p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr height="20px"></tr>

            <tr>
                <td style="vertical-align:middle;text-align:center;background-color:black;color:white;padding:30px 0;">
                    <p style="font-weight:bold;margin-bottom:20px;">¡Únete a nuestra comunidad!</p>

                    <p style="font-weight:bold;margin-bottom:40px;">
                        <a href="{{ config('money.url.facebook') }}">
                            <img src="{{ asset('images/emails/facebook.svg') }}" width="40" style="vertical-align:middle;">
                        </a>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="{{ config('money.url.instagram') }}">
                            <img src="{{ asset('images/emails/instagram.svg') }}" width="40" style="vertical-align:middle;">
                        </a>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="{{ config('money.url.twitter') }}">
                            <img src="{{ asset('images/emails/twitter.svg') }}" width="40" style="vertical-align:middle;">
                        </a>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="{{ config('money.url.youtube') }}">
                            <img src="{{ asset('images/emails/youtube.svg') }}" width="40" style="vertical-align:middle;">
                        </a>
                    </p>

                    <p style="margin-bottom:20px;">{{ config('money.copyright') }}</p>

                    <p>
                        <a href="{{ route('about') }}" style="color:white;">Sobre nosotros</a>
                        &nbsp;&nbsp;&#8226;&nbsp;&nbsp;
                        <a href="{{ route('privacy') }}" style="color:white;">Aviso de Privacidad</a>
                        &nbsp;&nbsp;&#8226;&nbsp;&nbsp;
                        <a href="{{ route('terms') }}" style="color:white;">Términos y Condiciones</a>
                        &nbsp;&nbsp;&#8226;&nbsp;&nbsp;
                        <a href="{{ route('policies') }}" style="color:white;">Políticas de devoluciones</a>
                    </p>
                </td>
            </tr>
        </table>
    </body>
</html>
