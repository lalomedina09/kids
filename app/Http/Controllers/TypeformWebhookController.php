<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TypeformWebhookController extends Controller
{

    public function handleWebhook(Request $request)
    {
        // Captura la respuesta del formulario
        $data = $request->all();

        // Registra la solicitud completa para inspección
        Log::info('Typeform Webhook Data:', ['data' => $data]);

        // Verifica la estructura y accede al email de forma segura
        $email = null;
        if (isset($data['form_response']['answers'])) {
            foreach ($data['form_response']['answers'] as $answer) {
                if (isset($answer['type']) && $answer['type'] == 'email' && isset($answer['email'])
                ) {
                    $email = $answer['email'];
                    break;
                }
            }
        }

        if ($email) {
            // Construye la URL del segundo formulario con el email como parámetro
            $url = 'https://test.queridodinero.com/indice-de-felicidad/gestion-de-recursos?email=' . urlencode($email);

            return response()->json(['redirect_url' => $url]);
        }

        // Si no se encuentra el email, devuelve un error
        return response()->json(['error' => 'Correo electrónico no encontrado en los datos del webhook'], 400);
    }
}
