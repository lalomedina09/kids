<?php

namespace App\Integrations\Zoom;

use Illuminate\Http\Response;

use App\Contracts\Integrations\WebinarConnector;
use App\Models\User;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Exception;

class ZoomConnector implements WebinarConnector
{

    private $client;
    private $users;

    /**
     * Create a new resource instance
     *
     * @return void
     */
    public function __construct()
    {
        $this->client = new ZoomAPIWrapper(
            config('services.zoom.key'),
            config('services.zoom.secret')
        );
        $this->users = config('services.zoom.users');
        $this->timezone = config('services.zoom.timezone');
        $this->meeting_type = 2; // 'Scheduled Meeting' https://marketplace.zoom.us/docs/api-reference/zoom-api/meetings/meetingcreate
        $this->clientZoom = new Client();
    }

    /**
     * Test endpoint
     *
     * @return array
     */
    public function test()
    {
        $method = 'GET';
        $endpoint = '/users';
        $query_params = [
            'status' => 'active',
            'page_size' => 10,
            'page_number' => 1
        ];
        $response = $this->client->doRequest($method, $endpoint, $query_params);
        //dump($this->client->responseCode());
        //dump($this->client->requestErrors());
        //dd($response);
        return $response;
    }

    /**
     * Create new meeting
     *
     * @param  int  $user_key
     * @param  array  $params
     * @return array
     * @throws Exception
     */
    public function createMeeting($user_key, $params)
    {
        $user_id = $this->users[$user_key];
        #dd('este es el archivo que hace los enlaces ARCHIVO CONECTOR',$user_key, $params);
        //Código comentado de zoom v1
        /*
        $method = 'POST';
        $endpoint = "/users/{$user_id}/meetings";
        $body = [
            'topic' => (app()->environment() === 'production') ? $params['title'] : '[TESTING] ' . $params['title'],
            'agenda' => $params['description'],
            'start_time' => $params['start_time'],
            'duration' => $params['duration'],
            'timezone' => $this->timezone,
            'type' => $this->meeting_type,
            'password' => str_random(10),
            'settings' => [
                'host_video' => false,
                'participant_video' => true,
                'join_before_host' => true,
                'waiting_room' => false,
                'audio' => 'both',
                'auto_recording' => 'cloud'
            ]
        ];
        */
        /*
        $response = $this->client->doRequest($method, $endpoint, [], [], $body);
        if ($this->client->responseCode() != Response::HTTP_CREATED) {
            throw new Exception("Error creating Zoom Meeting");
        }
        */
        //codigo de version 2
        try {
            $response = $this->clientZoom->post("https://api.zoom.us/v2/users/me/meetings", [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->generateTokenZoom(),
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'topic' => (app()->environment() === 'production') ? $params['title'] : '[TESTING] ' . $params['title'],
                    'type' => 2, // 2 for scheduled meeting
                    'start_time' => $params['start_time'],
                    'duration' => $params['duration'],
                    'settings' => [
                        'join_before_host' => true, // Permitir que los invitados se unan antes del host
                        'waiting_room' => false, // Desactivar la sala de espera
                        'approval_type' => 0, // Permitir que cualquier persona con el enlace se una
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
        #return $response;
    }

    /**
     * Delete a meeting
     *
     * @param  int|string  $meeting_id
     * @return array
     * @throws Exception
     */
    public function deleteMeeting($meeting_id)
    {
        $method = 'DELETE';
        $endpoint = "/meetings/{$meeting_id}";

        $response = $this->client->doRequest($method, $endpoint);
        if ($this->client->responseCode() != Response::HTTP_NO_CONTENT) {
            throw new Exception("Error deleting Zoom Meeting");
        }
        return $response;
    }

    /**
     * Register a user to webinar
     *
     * @param  App\Models\User  $user
     * @param  array  $params
     * @return string
     * @throws Exception
     */
    public function registerToWebinar(User $user, array $params)
    {
        $webinar_id = $params['webinar_id'];

        $method = 'POST';
        $endpoint = "/webinars/{$webinar_id}/registrants";
        $body = [
            'first_name' => $user->present()->name,
            'last_name' => $user->present()->last_name,
            'email' => $user->email
        ];

        $response = $this->client->doRequest($method, $endpoint, [], [], $body);
        if ($this->client->responseCode() != Response::HTTP_CREATED) {
            throw new Exception("Zoom registration error: Error registering user to Webinar");
        }

        if (!array_has($response, 'join_url')) {
            throw new Exception("Zoom registration error: Error extracting join_url from Zoom Webinar registrant");
        }

        return $response['join_url'];
    }

    public function createMeetingZoom($dateStartZoom, $minutes)
    {
        try {
            $response = $this->clientZoom->post("https://api.zoom.us/v2/users/me/meetings", [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->generateTokenZoom(),
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'topic' => "QD | Mentoría " . $dateStartZoom,
                    'type' => 2, // 2 for scheduled meeting
                    'start_time' => Carbon::parse($dateStartZoom)->toIso8601String(),
                    'duration' => $minutes,
                    'settings' => [
                        'join_before_host' => true, // Permitir que los invitados se unan antes del host
                        'waiting_room' => false, // Desactivar la sala de espera
                        'approval_type' => 0, // Permitir que cualquier persona con el enlace se una
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

    public function generateTokenZoom()
    {
        try {
            $base64String = base64_encode(env('ZOOM_CLIENT_ID') . ':' . env('ZOOM_CLIENT_SECRET'));
            $accountId = env('ZOOM_ACCOUNT_ID');

            $response = $this->clientZoom->post("https://zoom.us/oauth/token?grant_type=account_credentials&account_id={$accountId}", [
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
}
