<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ZoomController extends Controller
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function createMeeting(Request $request): array
    {
        // Validate input
        $validated = $this->validate($request, [
            'title' => 'required',
            'start_date_time' => 'required|date',
            'duration_in_minute' => 'required|numeric',
            #'password' => 'required|string|min:6', // Validar la clave de acceso
            'template_id' => 'required|string' // Validar el ID de la plantilla
        ]);

        try {
            $response = $this->client->post("https://api.zoom.us/v2/users/me/meetings", [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->generateToken(),
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'topic' => $validated['title'],
                    'type' => 2, // 2 for scheduled meeting
                    'start_time' => Carbon::parse($validated['start_date_time'])->toIso8601String(),
                    'duration' => $validated['duration_in_minute'],
                    #'password' => $validated['password'], // Incluir la clave de acceso
                    #'template_id' => $validated['template_id'], // Incluir el ID de la plantilla
                    'settings' => [
                        'join_before_host' => true, // Permitir que los invitados se unan antes del host
                        'waiting_room' => false, // Desactivar la sala de espera
                        'approval_type' => 0, // Permitir que cualquier persona con el enlace se una
                        #'meeting_authentication' => true, // Requerir autenticación para unirse
                        #'authentication_option' => 'sign_in_to_join',
                    ],
                ],
            ]);

            $responseBody = json_decode($response->getBody(), true);

            // Imprimir la respuesta para depuración
            \Log::info('Zoom API Response:', $responseBody);

            return $responseBody;
        } catch (\Throwable $th) {
            throw $th;
        }
    }



    protected function generateToken(): string
    {
        try {
            $base64String = base64_encode(env('ZOOM_CLIENT_ID') . ':' . env('ZOOM_CLIENT_SECRET'));
            $accountId = env('ZOOM_ACCOUNT_ID');

            $response = $this->client->post("https://zoom.us/oauth/token?grant_type=account_credentials&account_id={$accountId}", [
                'headers' => [
                    "Content-Type" => "application/x-www-form-urlencoded",
                    "Authorization" => "Basic {$base64String}"
                ]
            ]);

            $body = json_decode($response->getBody(), true);

            return $body['access_token'];
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getMeetingTemplates()
    {
        try {
            $response = $this->client->get("https://api.zoom.us/v2/users/me/meeting_templates", [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->generateToken(),
                    'Content-Type' => 'application/json',
                ]
            ]);

            $responseBody = json_decode($response->getBody(), true);

            // Imprimir la respuesta para depuración
            \Log::info('Zoom API Meeting Templates Response:', $responseBody);

            return $responseBody['templates'];
        } catch (\Throwable $th) {
            throw $th;
        }
    }

}
