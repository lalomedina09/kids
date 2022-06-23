<?php

namespace App\Http\Controllers\Landing;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Models\Landing;

class ResuelveTuDeudaController extends Controller
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
        return view('landings.partners.resuelvetudeuda');
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
            'names' => 'required|string|min:1|max:255',
            'first_surname' => 'required|string|min:1|max:255',
            'mobile' => 'required|digits:10',
            'email' => 'required|email|min:1|max:255',
            'debt_amount' => 'required|numeric|min:35000|max:'.PHP_INT_MAX,
            'g-recaptcha-response' => 'required|recaptcha'
        ]);
        array_forget($params, 'g-recaptcha-response');

        $landing = new Landing;
        $landing->page = $request->route()->uri();
        $landing->fields = $params;
        $landing->save();

        return redirect()->back()->with('success', 'Gracias por tu respuesta, pronto recibirás la información');
    }

}
