<!DOCTYPE html>

<html>
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

			table.backgrounds {

			}
        </style>
    </head>
    <body>
		<table width="700px" border="0" cellpadding="0" cellspacing="0" style="margin:auto; text-align:center; text-transform: uppercase; background-image: url('{{ asset('etapa1/imagenes recibo 02.png') }}'),
									url('{{ asset('etapa1/imagenes recibo 03.png') }}'),
									url('{{ asset('etapa1/imagenes recibo 04.png') }}'),
									url('{{ asset('etapa1/imagenes recibo 01.png') }}');
				background-position: top left, top right, bottom left, bottom right;
				background-repeat: no-repeat;
				background-size: 130px;" class="backgrounds">
			<tr>
				<td>
					<img src="{{ asset('etapa1/imagenes recibo 10.png') }}" alt="QD Play" width="100" />
				</td>
			</tr>
			<tr style="height: 20px;"></tr>
			<tr>
				<td style="font-size: 2em; font-weight: bold;">
					Reporte de vistas por colaborador
				</td>
			</tr>
			<tr style="height: 20px;"></tr>
			<tr>
				<td style="">
                    Generado: 15 de agosto de 2023
				</td>
			</tr>
			<tr style="height: 20px;"></tr>
			<tr>
				<td style="color: white; bagkground-color: #80aa56; background-image: linear-gradient(to right, #80aa56, #0bb9aa); color: #fff; padding: 10px;">
					Detalle de vistas
				</td>
			</tr>
			<tr style="height: 20px;"></tr>
			<tr>
				<td style="">
					<span style="text-transform: uppercase; font-weight: bold;">Administrador:</span>
					{{ $user->fullname }}
				</td>
			</tr>
			<tr style="height: 20px;"></tr>
			<tr>
				<td>
					<table width="100%" border="0" cellpadding="0" cellspacing="0" class="concepts" style="text-align: left;">
						<thead>
							<tr>
								<th>Num</th>
								<th>Colaborador</th>
								<th>Usuario</th>
								<th>Curso</th>
								<th>Vistas</th>
							</tr>
						</thead>
						<tbody>
                            @php $contador = 1; @endphp
                            @foreach ($result as $item)
							<tr>
								<td style="text-transform: none;">{{ $contador++ }}</td>
								<td>{{ $item->user }} {{ $item->last_name }}</td>
								<td>{{ $item->email }}</td>
								<td>{{ $item->name }}</td>
								<td>{{ $item->total_views }}</td>
							</tr>
                            @endforeach
						</tbody>
						<tfoot>
							<tr>
								<th colspan="5" style="text-align:right; text-transform: none;">TOTAL (Impuestos incluidos):</th>
								{{--<td>${{ number_format($payment->amount,2) }} MXN</td>--}}
							</tr>
						</tfoot>
					</table>
				</td>
			</tr>
			<tr style="height: 20px;"></tr>
			<tr>
				{{--<td style="color: white; bagkground-color: #80aa56; background-image: linear-gradient(to right, #80aa56, #0bb9aa); color: #fff; padding: 10px;">
					Pagado el, <span style="font-weight: bold;">{{ date('l d \d\e F \d\e Y', strtotime($payment->date)) }}</span> a las <span style="font-weight: bold;">{{ date('H:i', strtotime($payment->date)) }} hrs</span>
				</td>--}}
			</tr>
			<tr style="height: 20px;"></tr>
			<tr>
				<td style="text-transform: uppercase; font-weight: bold;">
					¿Tienes alguna duda?
				</td>
			</tr>
			<tr style="height: 20px;"></tr>
			<tr>
				<td style="text-transform: none;">
					Comunicate con nosotros:
				</td>
			</tr>
			<tr style="height: 20px;"></tr>
			<tr>
				<td style="text-transform: none;">
					<table width="100%" border="0" cellpadding="0" cellspacing="0">
						<tr>
							<td>
								<img src="{{ asset('etapa1/imagenes recibo 13.png')}}" alt="" width="25" style="margin-bottom: -5px;" />
								<b>Monterrey: </b>
								<a href="tel:{{ config('money.phone.mty') }}">{{ config('money.phone.mty') }}</a>
							</td>
							<td>
								<img src="{{ asset('etapa1/imagenes recibo 11.png')}}" alt="" width="25" style="margin-bottom: -5px;" />
								<a href="mailto:hola@queridodinero.com">hola@<b>queridodinero</b>.com</a>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr style="height: 20px;"></tr>
			<tr>
				<td style="text-transform: uppercase; font-weight: bold;">
					Redes sociales:
				</td>
			</tr>
			<tr style="height: 20px;"></tr>
			<tr>
				<td style="text-transform: none;">
					<table width="100%" border="0" cellpadding="0" cellspacing="0">
						<tr>
							<td>
								<img src="{{ asset('etapa1/imagenes recibo 07.png')}}" alt="" width="25" style="margin-bottom: -5px;" />
								<a href="https://www.facebook.com/queridodinero/">Querido Dinero</a>
							</td>
							<td>
								<img src="{{ asset('etapa1/imagenes recibo 14.png')}}" alt="" width="25" style="margin-bottom: -5px;" />
								<a href="https://twitter.com/querido_dinero">@querido_dinero</a>
							</td>
							<td>
								<img src="{{ asset('etapa1/imagenes recibo 12.png')}}" alt="" width="25" style="margin-bottom: -5px;" />
								<a href="https://www.tiktok.com/@querido_dinero">@querido_dinero</a>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr style="height: 20px;"></tr>
			<tr>
				<td style="text-transform: none; border-top: 1px solid black; background-color: #f1f1f1; padding: 10px;">
					<b>Horarios de atención:</b> 09:00 a 14:00 hrs y de 15:00 a 16:30 hrs
				</td>
			</tr>
			<tr>
				<td style="height: 250px; vertical-align: bottom; text-transform: none;">
					<a href="https://www.queridodinero.com/" style="font-style: italic;">www.<b>queridodinero</b>.com</a>
				</td>
			</tr>
		</table>
    </body>
</html>

{{--dd('pdf printer')--}}
