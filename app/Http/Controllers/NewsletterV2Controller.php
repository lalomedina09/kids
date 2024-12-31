<?php

namespace App\Http\Controllers;

use Illuminate\Http\{Request, Response};

use App\Http\Requests\Newsletter\{DeleteRequest, StoreRequest};

use App\Models\{Newsletter, User};


class NewsletterV2Controller extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        // Code to list all newsletters
    }

    // Show the form for creating a new resource.
    public function create()
    {
        return view('newsletters.create');
        // Code to show form for creating a new newsletter
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'email' => 'required',
        ]);
        //dd($validatedData, 'antes de buscar');
        if (Newsletter::where('email', $validatedData['email'])->exists()) {
            return response()->json(['message' => 'El correo electrónico ya ha sido registrado.']);
        }
        //dd($validatedData, 'paso la busqueda');
        $newsletter = new Newsletter();
        $newsletter->email = $validatedData['email'];
        $newsletter->save();

        return response()->json(['message' => 'Newsletter creado correctamente.']);
        // Code to store a new newsletter
    }

    // Display the specified resource.
    public function show($id)
    {
        // Code to display a specific newsletter
    }

    // Show the form for editing the specified resource.
    public function edit($id)
    {
        // Code to show form for editing a specific newsletter
    }

    // Update the specified resource in storage.
    public function update(Request $request, $id)
    {
        // Code to update a specific newsletter
    }

    // Remove the specified resource from storage.
    public function destroy($id)
    {
        // Code to delete a specific newsletter
    }
}
