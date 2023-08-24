<html>
<head>
    <link href="{{ asset('/css/app.css') }}?v={{ (rand(1,500)) }}" rel="stylesheet">
    <link href="{{ asset('/css/custom.css') }}?v={{ (rand(1,500)) }}" rel="stylesheet">
    <link href="{{ asset('/css/etapa1.css') }}" rel="stylesheet" />
    <title>Reporte</title>
    <style>
    /** Define the margins of your page **/
    * {
        font-family: 'Montserrat', sans-serif;
        font-size: 13px;
    }
    @page {
        margin: 150px 0px;
    }

    header {
        position: fixed;
        top: -150px;
        left: 0px;
        right: 0px;
        height: 150px;

        /** Extra personal styles **/
        background-image: url(https://www.queridodinero.com/etapa1/pdf/img-header.png);
        background-size: 100%;
        background-repeat: no-repeat;
        color: white;
        text-align: center;
        line-height: 35px;
    }

    footer {
        position: fixed;
        bottom: -150px;
        left: 0px;
        right: 0px;
        height: 150px;

        /** Extra personal styles **/
        /*background-color: #90d06b;*/
        background-image: url(https://www.queridodinero.com/etapa1/pdf/img-footer.png);
        background-size: 100%;
        color: white;
        text-align: center;
        line-height: 35px;
    }
    table, tr, td {
        margin: 5px 2px;
        padding: 0;
    }

    table {
        border-collapse: collapse;
    }

    tr {
        border-bottom: 1pt solid rgb(27, 27, 27);
        margin-top: 10px;
    }

    td {
        margin: 10px 0px;
        padding: 4px;
    }
    .space-60{
        margin-bottom: 200px;
    }
    .page-break{
        page-break-after: auto;
    }
    </style>

    <style type="text/css">
	.is-admin,
	.mandatory-card .square,
	#histories .square {
		-webkit-appearance: none !important;
		-moz-appearance: none !important;
		-o-appearance: none !important;
		-ms-appearance: none !important;appearance: none !important;
		width: 25px;
		height: 25px;
		border: 2px solid #aaa;
		border-radius: 3px;
		cursor: pointer;
		outline: 0;
		vertical-align: middle;
	}

	.is-admin:checked,
	.is-admin:checked~input,
	.mandatory-card .square:checked,
	.mandatory-card .square:checked~input,
	#histories .square:checked,
	#histories .square:checked~input
	{
		background-color: #FF6161;
	}

	.mandatory-card .optional {
		font-family: serif;
		color: red;
		background-color: white;
		font-size: 0.7em;
		overflow-wrap: break-word;
	}

	.hours-graph {
		flex-wrap: nowrap;
	}

	.hours-graph .date-bar {
		display: flex;
		flex-direction: column;
		text-align: center;
		min-height: 200px;
		justify-content: flex-end;
	}

	.hours-graph .date-bar .empty-bar {
		height: 198px;
		border-bottom: 2px solid #01dacb;
		margin: 0 auto;
		width: 50px;
	}

	.hours-graph .date-bar .bar {
		position: relative;
		bottom: 0;
		margin: 0 auto;
		width: 50px;
		background: linear-gradient(to top, #90d06b, #01dacb);
		overflow-y: hidden;
	}

	.hours-graph .date-bar .bar .value {
		position: absolute;
		top: 0;
		left: 0;
		transform-origin: 20px 20px;
		transform: rotate(90deg);
		white-space: nowrap;
	}

	.hours-graph .date-bar .date {
		margin: 0 5px;
		min-width: 100px;
		text-transform: uppercase;
	}

	.donut {
		display: flex;
		align-items: center;
		justify-content: center;
		border-radius: 50%;
		width: 150px;
		height: 150px;
		margin: 0 auto;
	}

	.donut .hole {
		display: flex;
		align-items: center;
		justify-content: center;
		border-radius: 50%;
		width: 100px;
		height: 100px;
		background-color: white;
		color: #17a2b8;
	}

	.star-bar {
		position: relative;
		min-height: 180px;
		width: 100px;
		margin: 0 auto;
		background: url('{{ asset('etapa1/estrella temas vistos.png') }}') no-repeat #eee;
		background-size: contain;
		text-align: center;
	}

	.star-bar .position {
		position: absolute;
		top:30px;
		width: 100%;
		font-size: 1.3em;
		font-weight: bold;
		color: white;
	}

	.star-bar .views {
		position: absolute;
		bottom: 0;
		width: 100%;
	}

	.star-bar-category {
		width: 100%;
		font-weight: bold;
		text-align: center;
		min-height: 2.5em;
	}

	.mandatory-card {
		margin: 5px;
	}

	.mandatory-card .square,
	#histories .square {
		width: 40px;
		height: 40px;
		margin: 10px 3px;
	}

	.mandatory-card .thumbnail {
		position: relative;
		border-radius: 10px;
		height: 150px;
		background-repeat: no-repeat;
		background-size: cover;
	}

	.mandatory-card .thumbnail .time {
		position: absolute;
		left: 0;
		bottom: 0;
		border-radius: 0 0 0 10px;
		padding: 0 .5em;
		background-color: #222;
		color: #fff;
	}

	.mandatory-card .videos {
		color: #aaa;
	}

    .hours-graph .date-bar {
        display: flex;
        flex-direction: column;
        text-align: center;
        min-height: 200px;
        justify-content: flex-end;
    }
    .grid {
        display: grid;
        grid-template-columns: 50px 300px;
        grid-template-rows: 200px 75px;
    }

    .grid-column {
        display: grid;
        grid-template-rows: 100px 100px;
        /*grid-template-columns: 1fr 2fr 1fr 1fr 1fr;*/
        grid-template-columns: 1fr 1fr 1fr 1fr 1fr;
        grid-gap: 5px;
    }

    .align-items-end{
        align-items: flex-end !important;
    }

    /*.centered-element {
        margin: 0;
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
    }*/

    /*##################################*/


/*body {
  width: 90%;
  max-width: 900px;
  margin: 2em auto;
  font:
    0.9em/1.2 Arial,
    Helvetica,
    sans-serif;
}*/

.container {
  display: grid;
  grid-template-columns: 1fr 1fr 1fr;
}

.container > div {
  border-radius: 5px;
  padding: 10px;
  background-color: rgb(207, 232, 220);
  border: 1px solid rgb(79, 185, 227);
}

.grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  grid-template-rows: 2fr 1fr;
}
    /*##################################*/

</style>
</head>

<body>
    <!-- Define header and footer blocks before your content -->
    <header>
        <br><br><br>
        Header document
    </header>

    <footer>
        <a href="https://www.queridodinero.com/" style="color:#fff; font-style: italic;">
            www.<b>queridodinero</b>.com
        </a>
    </footer>

    <!-- Wrap the content of your PDF inside a main tag -->
    <main style="margin: 50px 50px;">

    @yield('content')

    </main>
</body>

</html>
{{-- dd('print') --}}
