<?php

namespace App\Http\Controllers\Landing;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Mail\Landings\Mailer;
use App\Notifications\Landings\Notifier;
use App\Models\Lead;
use Mail;
use Session;

class QdplayEmpresasController extends Controller
{

    /**
     * Create a new resource instance
     *
     * @return void
     */
    public function __construct()
    {

    }


    public function show()
    {
        return view('landings.register-qdplay');
    }

    public function store(Request $request)
    {
        $params = $request->validate([
            'name' => 'required|string|min:1|max:255',
            'last_name' => 'required|string|min:1|max:255',
            'mail_corporate' => 'required|email|min:1|max:255',
            'movil' => 'required|digits:10',
            'company' => 'required|string|min:1|max:255',
            'g-recaptcha-response' => 'required|recaptcha'
        ]);

        array_forget($params, 'g-recaptcha-response');

            $landing = new Lead;
            $landing->name = $request->name;
            $landing->last_name = $request->last_name;
            $landing->mail_corporate = $request->mail_corporate;
            $landing->movil = $request->movil;
            $landing->company = $request->company;

            $landing->interests = 'QD Play para empresas';
            $landing->form = 'registro-qdplay-empresas';
            $landing->url = $request->url();
            $landing->save();

        return redirect()->back()->with('success', 'Gracias, Pronto nos pondremos en contacto contigo');
    }
}

