<?php

namespace App\Http\Controllers;

use Google\Client;
use Illuminate\Http\Request;

class GoogleAuthController extends Controller
{
    // Redirige al usuario para autenticar
    public function authenticate()
    {
        $client = new Client();
        $client->setAuthConfig(config('google.credentials_path'));
        $client->addScope('https://www.googleapis.com/auth/calendar');
        $client->setAccessType('offline'); // Para obtener un refresh token
        $client->setPrompt('select_account consent'); // Asegura que siempre solicite consentimiento

        $redirectUri = route('google.callback');
        $client->setRedirectUri($redirectUri);

        // Redirigir al usuario a la URL de autorización
        $authUrl = $client->createAuthUrl();
        return redirect($authUrl);
    }

    // Procesa el callback y guarda el token
    public function callback(Request $request)
    {
        $client = new Client();
        $client->setAuthConfig(config('google.credentials_path'));
        $client->setRedirectUri(route('google.callback'));

        // Intercambia el authorization code por un token
        $token = $client->fetchAccessTokenWithAuthCode($request->input('code'));

        // Maneja errores
        if (isset($token['error'])) {
            return redirect('/')->with('error', 'Failed to authenticate with Google');
        }

        // Guarda el token en un archivo local
        $tokenPath = config('google.token_path');
        file_put_contents($tokenPath, json_encode($token));

        return redirect('/')->with('success', 'Google API token generated and saved.');
    }
}
