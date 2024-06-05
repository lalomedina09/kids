<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TypeformWebhookController extends Controller
{
    public function handleWebhook(Request $request)
    {
        // Captura la respuesta del formulario
        $data = $request->all();

        // Extrae el email de la respuesta
        $email = $data['form_response']['answers'][0]['emailuser']; // Asegúrate de ajustar esto según la estructura de tu respuesta

        // Redirige al segundo formulario con el email como parámetro
        $url = 'https://test.queridodinero.com/indice-de-felicidad/gestion-de-recursos?emailuser=' . urlencode($email);

        /*
        Route::prefix('indice-de-felicidad')
        ->group(function () {
            Route::get('/')
                ->uses('IndexHappyController@index')
                ->name('indice.happy.data.personal');

            Route::get('/gestion-de-recursos')
                ->uses('IndexHappyController@resourceManagement')
                ->name('indice.happy.resource.management');
        });

        return redirect()
            ->route('qdplay.payments.payform', ['concept' => $request->codeConcept])
            ->with([
                'success' => '¡Bienvenido! a Querido Dinero'
            ]);
        */
        return redirect($url);
    }
}
