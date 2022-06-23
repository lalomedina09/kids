<?php

namespace App\Http\Controllers\Landing;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Mail\Landings\Mailer;
use App\Notifications\Landings\Notifier;
use App\Models\Landing;
use Mail;
use Session;
use \DrewM\MailChimp\MailChimp;

class ImpuestosController extends Controller
{

    /**
     * Create a new resource instance
     *
     * @return void
     */
    public function __construct() {}

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\View\View
     */
    public function show()
    {
        return view('landings.partners.impuestos');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $params = $request->validate([
            'Nombre' => 'required|string|min:1|max:255',
            'Apellido' => 'required|string|min:1|max:255',
            'Correo' => 'required|email|min:1|max:255',
            'Estado' => 'required'
            // 'g-recaptcha-response' => 'required|recaptcha'
        ]);
        array_forget($params, 'g-recaptcha-response');

        $landing = new Landing;
        $landing->page = $request->route()->uri();
        $landing->fields = $params;
        $landing->save();
        // $MailChimp = new MailChimp(env('MAILCHIMP_APIKEY'));
        // $list_id='d20a9efb0d';
        // $result = $MailChimp->post("lists/$list_id/members", [
        //     'email_address' => $params['Correo'],
        //     'merge_fields'=>['FNAME' => $params['Nombre'],
        //     'LNAME' => $params['Apellido'],
        //     'STATE'=> $params['Estado']],
        //     'status'        => 'subscribed',
        // ]);
        // //if($landing){Session::flash('descarga', 'Mensaje de prueba');}
        // if($landing){Mailer::sendLinkImpuestos($params);}
        return redirect()->back()->with('success', 'Gracias, Revisa tu correo');
    }

}