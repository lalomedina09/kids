<?php

namespace App\Http\Controllers\Landing;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
#use App\Mail\Landings\Mailer;
#use App\Notifications\Landings\Notifier;
use App\Models\Lead;
#use Mail;
#use Session;

class RetiroController extends Controller
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
        return view('landings.retiro');
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

        $emailCorp = $this->validateEmailCorp($request->mail_corporate);
        array_forget($params, 'g-recaptcha-response');

        if ($emailCorp) {
            $lead = $this->saveLead($request);
            return redirect()->back()->with('success', 'Gracias, Pronto nos pondremos en contacto contigo');
        } else {
            return redirect()->back()->with('error', 'El correo debe ser de tu trabajo');
        }
    }

    private function saveLead($request)
    {
        $lead = new Lead;
        $lead->type = 1;
        $lead->status = 0;
        $lead->name = $request->name;
        $lead->last_name = $request->last_name;
        $lead->mail_corporate = $request->mail_corporate;
        $lead->movil = $request->movil;
        $lead->company = $request->company;
        $lead->interests = $request->interests;
        $lead->form = $request->form;
        $lead->url = $request->url();
        $lead->save();

        return $lead;
    }

    /*public function validateEmailCorp($email)
    {

    }*/
}
