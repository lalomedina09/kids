@push('styles')
<style>
	.social-media-logins {
		text-align: center;
	}

	.google-button-v2 {
		margin: 5px;
		font-size: 4.3mm;
		display: inline-block;
		padding: 0 10mm 0 13mm;
		border-radius: 3px;
		height: 12mm;
		/*background: url('{{ asset("images/qdplay/login/google.png") }}') no-repeat #0aa;*/
		background-position: 2px 2px;
        background-size: contain;
		line-height: 12mm;
		text-decoration: none;
		color: #fff !important;
		/*font-family: "Roboto", sans-serif;*/
        font-family: 'Akshar', sans-serif;
        font-weight: bold;
		background-color: #000000;
	}

	.facebook-button-v2 {
		margin: 5px;
		font-size: 4.3mm;
		display: inline-block;
		padding: 0 10mm 0 13mm;
		border-radius: 3px;
		height: 12mm;
		/*background: url('{{ asset("images/qdplay/login/facebook.png") }}') no-repeat;*/
		background-position: 2px 2px;
        background-size: contain;
		line-height: 12mm;
		text-decoration: none;
		color: #fff !important;
		/*font-family: 'Helvetica', 'Arial', sans-serif;*/
        font-family: 'Akshar', sans-serif;
		font-weight: bold;
		background-color: #000000;
	}

	.facebook-button-v2 {
		margin: 5px;
		font-size: 4.3mm;
		display: inline-block;
		padding: 0 10mm 0 13mm;
		border-radius: 3px;
		height: 12mm;
		/*background: url('{{ asset("images/qdplay/login/facebook.png") }}') no-repeat;*/
		background-position: 2px 2px;
        background-size: contain;
		line-height: 12mm;
		text-decoration: none;
		color: #fff !important;
		/*font-family: 'Helvetica', 'Arial', sans-serif;*/
        font-family: 'Akshar', sans-serif;
		font-weight: bold;
		background-color: #000000;
	}

	.microsoft-button-v2 {
		margin: 5px;
		font-size: 4.4mm;
		display: inline-block;
		padding: 0 10mm 0 13mm;
		border-radius: 3px;
		height: 12mm;
		/*background: url('{{ asset("images/qdplay/login/microsoft.png") }}') no-repeat;*/
		background-position: 2px 2px;
        background-size: contain;
		line-height: 12mm;
		text-decoration: none;
		color: #fff !important;
		/*font-family: "Segoe UI", segoe, sans-serif;*/
        font-family: 'Akshar', sans-serif;
		font-weight: bold;

		background-color: #000000;
	}

	@import url('https://fonts.cdnfonts.com/css/sf-pro-display');

	.apple-button-v2 {
		margin: 5px;
		font-size: 4.4mm;
		display: inline-block;
		padding: 0 10mm 0 13mm;
		border-radius: 3px;
		height: 12mm;
		background: url('{{ asset("etapa1/apple_logo.png") }}') no-repeat;
		background-position: 2px 2px;
		line-height: 12mm;
		text-decoration: none;
		color: #fff !important;
		font-family: 'SF Pro Display', sans-serif;
		background-color: #000;
		font-weight: bold;
	}

	.google-button-v2:hover, .facebook-button-v2:hover, .microsoft-button-v2:hover, .apple-button-v2:hover {
		text-decoration: none;
	}
</style>
@endpush

<div class="social-media-logins mt-3 text-center">
	<a href="{{ route('redirects.facebook') }}" class="facebook-button-v2" style="text-align: left;">
        <img src="{{ asset("images/qdplay/login/facebook.png") }}" alt="Logo Google" width="20">
        &nbsp;&nbsp; Iniciar Sesión con Facebook
    </a>
	<a href="{{ route('redirects.google.client', [$track_client]) }}" class="google-button-v2">
        <img src="{{ asset("images/qdplay/login/google.png") }}" alt="Logo Google" width="20">
        &nbsp;&nbsp; Iniciar Sesión con Google &nbsp;&nbsp;&nbsp;&nbsp;
    </a>
	<a href="{{ route('redirects.microsoft') }}" class="microsoft-button-v2">
        <img src="{{ asset("images/qdplay/login/microsoft.png") }}" alt="Logo Google" width="20">
        &nbsp;&nbsp; Iniciar Sesión con Microsoft
    </a>
	{{--<a href="{{ route('redirects.apple') }}" class="apple-button-v2">Iniciar Sesión con Apple</a>--}}
</div>
