<?php

namespace App\Http\Controllers\Landing;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Models\Landing;

class CuradeudaController extends Controller
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
        return view('landings.partners.curadeuda');
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
            'name' => 'required|string|min:1|max:255',
            'lastname' => 'required|string|min:1|max:255',
            'phone' => 'required|digits:10',
            'email' => 'required|email|min:1|max:255',
            'range' => 'required',
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
