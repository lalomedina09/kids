<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

use Illuminate\Http\{ Request, Response };

use App\Http\Requests\Quotes\StoreRequest;
use App\Models\Quote;

class QuotesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quotes = Quote::get();
        return view('dashboard.quotes.index')->with([
            'quotes' => $quotes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $quote = new Quote;
        return view('dashboard.quotes.create')->with([
            'quote' => $quote
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Quotes\StoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $quote = Quote::create($request->all());
        return redirect()
            ->route('dashboard.quotes.index')
            ->with('success', 'La cita se creo correctamente');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int|string  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $quote = Quote::findOrFail($id);
        return view('dashboard.quotes.edit')->with([
            'quote' => $quote,
            'update' => true
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int|string  $id
     * @param  \App\Http\Requests\Quotes\StoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update($id, StoreRequest $request)
    {
        $quote = Quote::findOrFail($id);
        $quote->update($request->all());
        return redirect()
            ->route('dashboard.quotes.edit', $quote->id)
            ->with('success', 'Se guardaron los cambios correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int|string  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $quote = Quote::withTrashed()->find($id);

        if (request()->exists('force')) {
            $quote->forceDelete();

            return redirect()
                ->route('dashboard.quotes.trashed')
                ->with('deleted', [
                    'message' => 'La cita se eliminó permanentemente.'
                ]);
        }

        $quote->delete();

        return redirect()
            ->route('dashboard.quotes.index')
            ->with('deleted', [
                'message' => 'La cita se envío a la papelera.',
                'undo' => route('dashboard.quotes.restore', $id),
            ]);
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param  int|string  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        Quote::withTrashed()->find($id)->restore();
        return redirect()
            ->route('dashboard.quotes.trashed')
            ->with('success', 'Se restableció la cita');
    }

    /**
     * Archive for the trashed elements.
     *
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        $quotes = Quote::onlyTrashed()->latest('deleted_at')->get();
        return view('dashboard.quotes.trashed')->with([
            'quotes' => $quotes
        ]);
    }
}
