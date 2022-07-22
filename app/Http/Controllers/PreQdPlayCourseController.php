<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\Courses\BuyRequest;
use App\Models\Course;
use App\Models\UserPackage;

use QD\Marketplace\Helpers\CheckoutPackage;
use QD\Marketplace\Models\Coupon;
use QD\Marketplace\Models\Order;

#use QD\Marketplace\Models\Course;
use Carbon\Carbon;
use Auth;
use DB;

class PreQdPlayCourseController extends Controller
{
    public function index()
    {
        $statusBuy = $this->getStatusBuyExpiration();
        #dd($statusBuy);
        $coupon = Coupon::all();
        $fechaActual = date("Y-m-d");

        return view('preQdplay.experiment-qdplay.index', compact('statusBuy','coupon', 'fechaActual'));
    }

    public function show($video)
    {
        $data = $this->arrayVideo();
        $statusBuy = $this->getStatusBuyExpiration();
        $coupon = Coupon::all();
        $fechaActual = date("Y-m-d");

        return view('preQdplay.experiment-qdplay.show', compact('video', 'data', 'statusBuy', 'coupon', 'fechaActual'));
    }

    public function arrayVideo()
    {
        return $videoData = array(
            'video' => 1,
            'title_principal' => array(
                                    '1' => 'Guía para comprar tu primera casa',
                                    '2' => 'Finanzas en Pareja',
                                    '3' => 'Impuestos para Mortales',
                                ),
            'title_video' => array(
                '1' => '¿Cómo funciona el mundo inmobiliario?',
                '2' => 'Las bases de una comunicación sana y visión compartida ',
                '3' => 'Conceptos básicos de impuestos',
            ),
            'url_poster' => array(
                '1' => 'index_files/experimento/guia-comprar-casa-repro.png',
                '2' => 'index_files/experimento/finanzas-en-pareja-repro.png',
                '3' => 'index_files/experimento/basico-de-impuestos-repro.png',
            ),
            'url_video_intro' => array(
                '1' => 'storage/media-qdplay/intro-segunda-inversion.mp4',
                '2' => 'storage/media-qdplay/intro-segunda-inversion.mp4',
                '3' => 'storage/media-qdplay/intro-segunda-inversion.mp4',
            ),
            'url_video_main' => array(
                '1' => 'storage/media-qdplay/1-casa.mp4',
                '2' => 'storage/media-qdplay/2-parejas.mp4',
                '3' => 'storage/media-qdplay/3-impuestos.mp4',
            ),
            'temario' => array(
                '1' => '###¿Cómo funciona el mundo inmobiliario?###¿Cómo sé que casa necesito?###Inversionista vs. hogar###¿Cómo me organizo para pagar una casa?###Las deudas: Alternativa para obtener un crédito hipotecario###Las letras chiquitas de las deudas que debo conocer Impuestos###101 Antes de solicitar un crédito hipotecario',
                '2' => '###Las bases de una comunicación sana y visión compartida###Administración y buenas decisiones###Deudas en pareja: Historial, deudas personales y compartidas###Como vencer a los 4 monstruos de la vida (Boda, Educación, Hijos, Casa)###Métodos y herramientas para: Ahorrar y lograr metas###Inversión en pareja',
                '3' => '###Conceptos básicos de impuestos###Regulación y herramientas electrónicas fiscales###El Régimen en las Personas Físicas y Morales###Los CFDI´s ¿Qué son las facturas? ¿Qué trae adentro?###Primeros pasos para darte de alta en Hacienda',
            ),
            'descargables' => array(
                '1' => null,
                '2' => null,
                '3' => null,
            ),
            'lo_que_aprenderas' => array(
                '1' => 'Al finalizar el taller sabrás lo que debes evaluar antes de comprar tu primera casa,
                definirás metas alcanzables de ahorro y conocerás los beneficios de tener un inmueble.',
                '2' => 'Al finalizar el taller podrán administrar el dinero de manera correcta, conocerán los
                instrumentos de ahorro e inversión y tendrán una comunicación asertiva sobre los temas de
                dinero para que logren sus metas compartidas.',
                '3' => 'Al finalizar el taller podrás optimizar el pago de tus impuestos, conocerás lo básico
                del sistema fiscal, entenderás los impuestos más importantes y cómo lidiar con ellos, podrás
                detectar errores y oportunidades de mejora en tu régimen fiscal.',
            ),
            'foto_perfil' => array(
                '1' => '/index_files/experimento/karen-vega.png',
                '2' => '/index_files/experimento/ludivina.png',
                '3' => '/index_files/experimento/miguel.png',
            ),
            'link_asesor' => array(
                '1' => 'asesores/Karen_Vega',
                '2' => 'asesores/LudiCordoba',
                '3' => null,
            ),
        );

    }

    /**
     * Buy a course.
     *
     * @param  string  $slug
     * @param  \App\Http\Requests\Courses\BuyRequest  $request
     * @return \Illuminate\View\View
     */
    public function buy($package, BuyRequest $request)
    {

        $collection = Course::whereSlug('paquete-qdplay-3-cursos')
            ->firstOrFail();

        $user = request()->user();
        $payment_method = $request->input('payment');

        $redirect = redirect()->route('qdplay.index');

        $checkout = new CheckoutPackage($user, collect([$collection]), $payment_method);

        $checkout->placeOrder();

        return $checkout->getRedirect($redirect);
    }

    public function createCollection()
    {
        $collection = collect(
            [
                0 => ['id' => '1'],
                1 => ['example' => '1'],
                2 => ['data' => '1']
            ]
        );

        return $collection;
    }

    public function getStatusBuyExpiration()
    {
        $now = Carbon::now()->format('Y-m-d h:i:s');
        if(Auth::user())
        {
            $getOrders = UserPackage::where('user_id', Auth::user()->id)
                ->where('code', 'paquete-qdplay-3-cursos')
                ->select('order_id')
                ->get()
                ->pluck('order_id')
                ->toArray();

            if (count($getOrders) > 0) {
                #dd($getOrders);
                $orderspaid = Order::where('id', $getOrders)->where('status', 'order.paid')->get();

                return count($orderspaid);
            } else {
                return 0;
            }
        }else{
            return 0;
        }
    }

}
