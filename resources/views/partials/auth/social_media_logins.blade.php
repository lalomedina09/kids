@push('styles')
<style>
	.social-media-logins {
		text-align: center;
	}

	.google-button {
		margin: 5px;
		font-size: 4.3mm;
		display: inline-block;
		padding: 0 3mm 0 13mm;
		border-radius: 3px;
		height: 12mm;
		background: url('{{ asset("etapa1/google_logo.png") }}') no-repeat #0aa;
		background-position: 2px 2px;
		line-height: 12mm;
		text-decoration: none;
		color: #fff !important;
		font-family: "Roboto", sans-serif;
		background-color: #3367d6;
	}

	.facebook-button {
		margin: 5px;
		font-size: 4.3mm;
		display: inline-block;
		padding: 0 3mm 0 13mm;
		border-radius: 3px;
		height: 12mm;
		background: url('{{ asset("etapa1/facebook_logo.png") }}') no-repeat;
		background-position: 2px 2px;
		line-height: 12mm;
		text-decoration: none;
		color: #fff !important;
		font-family: 'Helvetica', 'Arial', sans-serif;
		font-weight: bold;
		background-color: #1877f2;
	}

	.facebook-button {
		margin: 5px;
		font-size: 4.3mm;
		display: inline-block;
		padding: 0 3mm 0 13mm;
		border-radius: 3px;
		height: 12mm;
		background: url('{{ asset("etapa1/facebook_logo.png") }}') no-repeat;
		background-position: 2px 2px;
		line-height: 12mm;
		text-decoration: none;
		color: #fff !important;
		font-family: 'Helvetica', 'Arial', sans-serif;
		font-weight: bold;
		background-color: #1877f2;
	}

	.microsoft-button {
		margin: 5px;
		font-size: 4.4mm;
		display: inline-block;
		padding: 0 3mm 0 13mm;
		border-radius: 3px;
		height: 12mm;
		background: url('{{ asset("etapa1/microsoft_logo.png") }}') no-repeat;
		background-position: 2px 2px;
		line-height: 12mm;
		text-decoration: none;
		color: #2f2f2f !important;
		font-family: "Segoe UI", segoe, sans-serif;
		font-weight: bold;
		background-color: #fff;
	}

	@import url('https://fonts.cdnfonts.com/css/sf-pro-display');

	.apple-button {
		margin: 5px;
		font-size: 4.4mm;
		display: inline-block;
		padding: 0 3mm 0 13mm;
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

	.google-button:hover, .facebook-button:hover, .microsoft-button:hover, .apple-button:hover {
		text-decoration: none;
	}
</style>
@endpush

<div class="social-media-logins">
	<a href="{{ route('redirects.facebook') }}" class="facebook-button">Iniciar Sesión con Facebook</a>
	<a href="{{ route('redirects.google') }}" class="google-button">Iniciar Sesión con Google</a>
	<a href="{{ route('redirects.microsoft') }}" class="microsoft-button">Iniciar Sesión con Microsoft</a>
	{{--<a href="{{ route('redirects.apple') }}" class="apple-button">Iniciar Sesión con Apple</a>--}}
</div>
