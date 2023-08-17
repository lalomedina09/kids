<!DOCTYPE html>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <title>QD Play | Vistas por usuario</title>
        {{--<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800,900" rel="stylesheet">--}}
        {{--<link rel=”stylesheet” href=”https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src=”https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>--}}
		<style>
            * {
                font-family: 'Montserrat', sans-serif;
                font-size: 11px;
            }
            @page {
                margin-left: 1cm;
		        margin-right: 1cm;
                margin-top: 1cm;
                margin-bottom: 1cm;
            }
            table, tr, td {
                margin: 0;
                padding: 0;
            }

            p {
                margin: 0;
            }

			a {
				color: #000;
				text-decoration: none;
			}

			table.concepts th,
			table.concepts td {
				padding: 5px;
			}

			table.concepts thead th {
				border-bottom: 2px solid #000;
			}

			table.backgrounds-principal {
                margin:auto;
                text-align:center; text-transform: uppercase;
                background-image: url('/etapa1/imagenes recibo 02.png'),
                url('/etapa1/imagenes recibo 03.png'),
                url('/etapa1/imagenes recibo 04.png'),
                url('/etapa1/imagenes recibo 01.png');
                background-position: top left, top right, bottom left, bottom right;
                background-repeat: no-repeat;
                background-size: 130px;
			}

            /*.backgrounds-principal{
                margin:auto;
                text-align:center; text-transform: uppercase;
                background-image: url('/etapa1/imagenes recibo 02.png'),
                url('/etapa1/imagenes recibo 03.png'),
                url('/etapa1/imagenes recibo 04.png'),
                url('/etapa1/imagenes recibo 01.png');
                background-position: top left, top right, bottom left, bottom right;
                background-repeat: no-repeat;
                background-size: 130px;
            }*/

            .renglon-verde-azul{
                color: white;
                bagkground-color: #80aa56;
                background-image: linear-gradient(to right, #80aa56, #0bb9aa);
                color: #fff;
                padding: 10px;
            }
            .renglon-verde-superior{
                color: white; bagkground-color: #80aa56; background-image: linear-gradient(to right, #80aa56, #0bb9aa); color: #fff; padding: 10px;
            }
        </style>
    </head>
    <body>
        @include('partials.profiles.components.qdplay-reports.header')

        @yield('content')

        @include('partials.profiles.components.qdplay-reports.footer')
    </body>
</html>

{{--dd('pdf printer')--}}
