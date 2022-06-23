<?php

namespace App\Http\Controllers\Landing;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Models\Landing;

use App\Mail\Landings\Mailer;
use App\Notifications\Landings\Notifier;

use Mail;

class MasterPlanController extends Controller
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
        return view('landings.partners.masterplan');
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
            'Celular' => 'required|digits:10',
            'email' => 'required|email|min:1|max:255',
            'Nivel' => 'required',
            'Situacion' => 'required',
            'Donde' => 'required',
            'g-recaptcha-response' => 'required|recaptcha'
        ]);
        array_forget($params, 'g-recaptcha-response');

        $landing = new Landing;
        $landing->page = $request->route()->uri();
        $landing->fields = $params;
        $landing->save();
        Mailer::sendLeadMplan($params);

        return redirect()->back()->with('success', 'Gracias, pronto recibirás la información');
    }

}