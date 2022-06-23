<?php

namespace App\Http\Controllers;

use Illuminate\Http\{ Request, Response };

use App\Http\Requests\Newsletter\{ DeleteRequest, StoreRequest };

use App\Models\{ Newsletter, User };

class NewsletterController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Newsletter\StoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $params = $request->all();
        $newsletter = Newsletter::subscribe($params);
        return redirect()->back()->withSuccess('¡Has sido suscrito exitosamente, te contactaremos muy pronto!');
    }

    /**
     * Remove a resource in storage.
     *
     * @param  \App\Http\Requests\Newsletter\DeleteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeleteRequest $request)
    {
        $email = $request->input('email');
        $newsletter = Newsletter::unsubscribe($email);
        return redirect()->route('home')->withSuccess('¡Ya no estas inscrito a nuestro Newsletter!');
    }

}
