<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\View\View;

class PagesController extends Controller
{
    /**
     * Display the content page.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail();
        if ($page->auth && !auth()->check()) {
            session(['url.intended' => url()->current()]);
            return redirect()->route('login');
        }
        return view('pages.index', ['page' => $page]);
    }

    /**
     * Display the content page.
     *
     * @return \Illuminate\View\View
     */
    public function contact() : View
    {
        return view('pages.contact');
    }

    /**
     * Display the content page.
     *
     * @return \Illuminate\View\View
     */
    public function about() : View
    {
        $page = Page::where('slug', 'sobre-nosotros')->first();

        return view('pages.index', ['page' => $page]);
    }

    /**
     * Display the content page.
     *
     * @return \Illuminate\View\View
     */
    public function policies() : View
    {
        $page = Page::where('slug', 'politicas-de-devoluciones')->first();

        return view('pages.index', ['page' => $page]);
    }

    /**
     * Display the content page.
     *
     * @return \Illuminate\View\View
     */
    public function privacy() : View
    {
        $page = Page::where('slug', 'aviso-de-privacidad')->first();

        return view('pages.index', ['page' => $page]);
    }

    /**
     * Display the content page.
     *
     * @return \Illuminate\View\View
     */
    public function collaborations() : View
    {
        $page = Page::where('slug', 'colaboraciones')->first();

        return view('pages.index', ['page' => $page]);
    }

    /**
     * Display the content page.
     *
     * @return \Illuminate\View\View
     */
    public function terms() : View
    {
        $page = Page::where('slug', 'terminos-y-condiciones')->first();

        return view('pages.index', ['page' => $page]);
    }

    public function prestacion_de_servicios_fisica() : View
    {
        $page = Page::where('slug', 'contrato-de-prestacion-de-servicios-qd-play-persona-fisica')->first();

        return view('pages.index', ['page' => $page]);
    }

    public function prestacion_de_servicios_moral() : View
    {
        $page = Page::where('slug', 'contrato-de-prestacion-de-servicios-qd-play')->first();
        dd($page);
        return view('pages.index', ['page' => $page]);
    }

    /**
     * Display the content page.
     *
     * @return \Illuminate\View\View
     */
    public function cs_qdplay(): View
    {
        return view('pages.comming-s-qdplay');
    }

}
