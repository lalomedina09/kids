<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;


class TypeformWebhookController extends Controller
{
    public function handleWebhook(Request $request)
    {
        // Captura la respuesta del formulario
        $data = $request->all();

        // Para propósitos de depuración, puedes registrar la solicitud
        \Log::info('Typeform Webhook Datos:', $data);

        // Extrae el email de la respuesta (asegúrate de ajustar esto según la estructura de tu respuesta)
        $email = $data['form_response']['answers'][0]['email'];
        dd($email);
        // Construye la URL del segundo formulario con el email como parámetro
        #$url = 'https://test.queridodinero.com/gestion-de-recursos?email=' . urlencode($email);

        // Redirige al usuario al segundo formulario
        return redirect($url);
    }
}
