<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;


class TypeformWebhookController extends Controller
{
    /*public function handleWebhook(Request $request)
    {
        // Captura la respuesta del formulario
        $data = $request->all();

        // Para propósitos de depuración, puedes registrar la solicitud
        \Log::info('Typeform Webhook Datos:', $data);

        // Extrae el email de la respuesta (asegúrate de ajustar esto según la estructura de tu respuesta)
        $email = $data['form_response']['answers'][0]['email'];

        // Construye la URL del segundo formulario con el email como parámetro
        // Este funciona en el server test
        $url = 'https://test.queridodinero.com/indice-de-felicidad/gestion-de-recursos?email=' . urlencode($email);

        // Este funciona en el local
        #$url = 'http://prod.querido-dinero.develop/indice-de-felicidad/gestion-de-recursos?email=' . urlencode($email);

        // Redirige al usuario al segundo formulario
        return redirect($url);
    }*/

    public function handleWebhook(Request $request)
    {
        // Captura la respuesta del formulario
        $data = $request->all();

        // Registra la solicitud completa para inspección
        Log::info('Typeform Webhook Data:', $data);

        // Usar data_get para acceder al email de forma segura
        $email = data_get($data, 'form_response.answers.0.email');

        if ($email) {
            // Construye la URL del segundo formulario con el email como parámetro
            $url = 'https://test.queridodinero.com/indice-de-felicidad/gestion-de-recursos?email=' . urlencode($email);

            return response()->json(['redirect_url' => $url]);
        }

        // Si no se encuentra el email, devuelve un error
        return response()->json(['error' => 'Email not found in webhook data'], 400);
    }
}
