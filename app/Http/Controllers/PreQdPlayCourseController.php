<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use QD\Marketplace\Helpers\Checkout;
use QD\Marketplace\Models\Coupon;
class PreQdPlayCourseController extends Controller
{
    public function index()
    {
        $buy = false;
        $coupon = Coupon::all();
        $fechaActual = date("Y-m-d");
        return view('preQdplay.experiment-qdplay.index', compact('buy','coupon', 'fechaActual'));
    }

    public function show($video)
    {
        $data = $this->arrayVideo();
        $buy = false;
        $coupon = Coupon::all();
        $fechaActual = date("Y-m-d");

        return view('preQdplay.experiment-qdplay.show', compact('video', 'data', 'buy', 'coupon', 'fechaActual'));
    }

    public function arrayVideo()
    {
        return $videoData = array(
            'video' => 1,
            'title_principal' => array(
                                    '1' => 'Guía para comprar tu primera casa',
                                    '2' => '',
                                    '3' => '',
                                ),
            'title_video' => array(
                '1' => '',
                '2' => '',
                '3' => '',
            ),
            'url_poster' => array(
                '1' => 'index_files/experimento/guia-comprar-casa.png',
                '2' => 'index_files/experimento/finanzas-en-pareja.png',
                '3' => 'index_files/experimento/basico-de-impuestos.png',
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
                '1' => '##',
                '2' => 'storage/media-qdplay/2-parejas.mp4',
                '3' => 'storage/media-qdplay/3-impuestos.mp4',
            ),
        );

    }
}
