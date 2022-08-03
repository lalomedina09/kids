<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FacebookConversionsApiService;

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
    public function index(Request $request)
    {
        $statusBuy = $this->getStatusBuyExpiration();
        $coupon = Coupon::all();
        $fechaActual = date("Y-m-d");

        $fb_pixel_data = $this->facebookApiDataCustom("QD-Play Paquete 3 cursos inicio", $request);
        return view('preQdplay.experiment-qdplay.index', compact('statusBuy','coupon', 'fechaActual', 'fb_pixel_data'));
    }

    public function show(Request $request, $video)
    {
        $data = $this->arrayVideo();

        $statusBuy = $this->getStatusBuyExpiration();
        $coupon = Coupon::all();
        $fechaActual = date("Y-m-d");
        $fb_pixel_data = $this->facebookApiDataCustom($data['title_principal'][$video], $request);

        return view('preQdplay.experiment-qdplay.show', compact('video', 'data', 'statusBuy', 'coupon', 'fechaActual', 'fb_pixel_data'));
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
                '1' => 'storage/media-qdplay/intro-casa.mp4',
                '2' => 'storage/media-qdplay/intro-parejas.mp4',
                '3' => 'storage/media-qdplay/intro-impuestos.mp4',
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
                '1' => [
                            0 => 'Puntos Importantes',
                            1 => 'Ejercicios',
                        ],
                '2' => [
                            0 => 'Puntos Importantes',
                    ],
                '3' => [
                            0 => 'Actividades económicas',
                            1 => 'Catálogo de llenado CFDI',
                            2 => 'Catálogo régimen y tipo de sociedades',
                            3 => 'Personas físicas con actividad empresarial y profesional',
                            4 => 'Tabla ISR Persona Física',
                            5 => 'Tipos de Impuestos',
                        ],
            ),
            'descargables_url' => array(
                '1' => '/index_files/experimento/descargables-taller-1.zip',
                '2' => '/index_files/experimento/Puntos-importantes-del-Taller-Finanzas-en-Pareja.pdf',
                '3' => '/index_files/experimento/curso-impuestos.zip',
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
                '1' => '/index_files/experimento/ludivina.png',
                '2' => '/index_files/experimento/karen-vega.png',
                '3' => '/index_files/experimento/miguel.png',
            ),
            'link_asesor' => array(
                '1' => 'asesores/Karen_Vega',
                '2' => 'asesores/LudiCordoba',
                '3' => null,
            ),
            'name_asesor' => array(
                '1' => 'Ludivina Córdoba Delgado',
                '2' => 'Karen Vega',
                '3' => 'Miguel Cardona',
            ),
            'speciality_asesor' => array(
                '1' => 'ASESOR FINANCIERO Y BANCARIO',
                '2' => 'AMANTE DE LAS FINANZAS Y APASIONADA DE LOS NÚMEROS.',
                '3' => 'EXPOSITOR',
            ),
            'description_asesor' => array(
                '1' => 'Lic. en Negocios Internacionales por la Universidad Anáhuac con Master en Dirección Estratégica por la U. Francisco de Vitoria (Madrid). Co-fundadora de Making Makers, plataforma ed-tech para acelerar tus habilidades profesionales en Finanzas, Marketing y Liderazgo.',
                '2' => 'Fiel creyente de que las finanzas pueden aprenderse de forma fácil e incluso divertida con el objetivo de siempre poder usarlas a nuestro favor.$$$Licenciada en Administración, Contaduría y Finanzas, con diferentes cursos y diplomados enfocados a diversos aspectos de las Finanzas.$$$Cuenta con más de 10 años de experiencia laboral en el área de Finanzas y actualmente también es host del podcast Dinero entre Amigas.$$$Está convencida de que la mejor manera de apoyar al mundo es compartiendo y por eso le encanta impartir pláticas, talleres y asesorías sobre temas financieros que ayuden a las personas a mejorar su situación actual para que puedan cumplir sus metas.',
                '3' => 'Miguel Cardona es Contador Público de la UANL. Cuenta con un MBA del IPADE.$$$ A lo largo de más de 20 años de carrera ha trabajado en varias compañías en diferentes posiciones de las cuales ha adquirido experiencia en contabilidad, contraloría, tesorería, planeación financiera, y auditorias en empresas como Axtel, Alestra, Sisamex, Laboratorios Griffith & PwC',
            ),
        );

    }

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
                $orderspaid = Order::whereIn('id', $getOrders)->where('status', 'order.paid')->get();
                return count($orderspaid);
            } else {
                return 0;
            }
        }else{
            return 0;
        }
    }

    public function facebookApiDataCustom($name, $request)
    {
        $fbcapi = new FacebookConversionsApiService($request);
        $fbcapi->emit(FacebookConversionsApiService::VIEW_CONTENT, $name, null);

        return $fbcapi->getDeduplicationData();
    }
}
