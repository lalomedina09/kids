<?php

namespace App\Http\Controllers;

use Google\Client;
use Google\Service\Calendar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GoogleMeetController extends Controller
{
    // Autentica la cuenta anfitrión y redirige al usuario a Google OAuth
    public function authenticate()
    {        
        $client = new Client();        
        $client->setAuthConfig(config('google.credentials_path'));
        dd('urururur');
        $client->addScope(Calendar::CALENDAR);
        
        $client->setAccessType('offline'); // Necesario para generar el refresh token
        $client->setPrompt('consent'); // Solicita confirmación para acceso
        dd('mimimimi');
        $redirectUri = route('google.callback');
        //dd($redirectUri, 'bombabababababab');
        $client->setRedirectUri($redirectUri);

        $authUrl = $client->createAuthUrl();
        return redirect($authUrl);
    }

    // Callback de Google OAuth, guarda el token anfitrión
    public function callback(Request $request)
    {
        $client = new Client();
        $client->setAuthConfig(config('google.credentials_path'));
        $client->setRedirectUri(route('google.callback'));

        $token = $client->fetchAccessTokenWithAuthCode($request->input('code'));

        if (isset($token['error'])) {
            return redirect('/')->with('error', 'Autenticación fallida.');
        }

        // Guarda el token anfitrión en un archivo
        file_put_contents(storage_path('app/conector/token_host.json'), json_encode($token));

        // Redirige al usuario a la página principal con un mensaje de éxito
        return redirect('/')->with('success', 'Cuenta anfitrión autenticada con éxito.');
    }

    // Crea una reunión en Google Meet
    public function createMeeting(Request $request)
    {
        $client = new \Google\Client();
        $client->setAuthConfig(config('google.credentials_path'));

        // Carga el token anfitrión
        $tokenPath = storage_path('app/conector/token_host.json');
        if (!file_exists($tokenPath)) {
            return response()->json(['error' => 'La cuenta anfitriona no está autenticada.'], 401);
        }

        $accessToken = json_decode(file_get_contents($tokenPath), true);
        $client->setAccessToken($accessToken);

        // Actualiza el token si está expirado
        if ($client->isAccessTokenExpired()) {
            $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
            file_put_contents($tokenPath, json_encode($client->getAccessToken()));
        }

        // Configura el servicio de Google Calendar
        $service = new \Google\Service\Calendar($client);

        // Define el evento para la reunión
        $event = new \Google\Service\Calendar\Event([
            'summary' => $request->input('title', 'Meeting 2:00 - 3:00 PM'), // Título
            'start' => [
                'dateTime' => $request->input('start', '2025-01-23T14:00:00'),
                'timeZone' => 'America/Mexico_City', // Zona horaria
            ],
            'end' => [
                'dateTime' => $request->input('end', '2025-01-23T15:00:00'),
                'timeZone' => 'America/Mexico_City', // Zona horaria
            ],
            'conferenceData' => [
                'createRequest' => [
                    'requestId' => uniqid(), // ID único para la reunión
                    'conferenceSolutionKey' => ['type' => 'hangoutsMeet'],
                ],
            ],
        ]);


        // Crea el evento en el calendario
        try {
            $event = $service->events->insert('primary', $event, ['conferenceDataVersion' => 1]);

            // Obtén el enlace de Google Meet
            $meetLink = $event->hangoutLink;

            // Guarda la liga de la reunión y sus datos en la base de datos
            DB::table('meet_links')->insert([
                'title' => $request->input('title', 'Meeting 2:00 - 3:00 PM'),
                'start_time' => $request->input('start', '2025-01-21T14:00:00'),
                'end_time' => $request->input('end', '2025-01-21T15:00:00'),
                'link' => $meetLink,
                'event_id' => $event->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return response()->json([
                'message' => 'Reunión creada con éxito.',
                'meet_link' => $meetLink,
                'event_id' => $event->id,
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


    // Obtiene los enlaces de reuniones desde la base de datos
    public function getMeetings()
    {
        $meetings = DB::table('meet_links')->get();

        return response()->json([
            'meetings' => $meetings,
        ]);
    }
}
