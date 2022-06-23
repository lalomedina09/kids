<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests\Downloads\{ StoreRequest, UpdateRequest };
use App\Models\Download;
use App\Repositories\DownloadRepository;

class DownloadController extends Controller
{

    private $downloads;

    /**
     * Create a new resource instance
     *
     * @param  \App\Repositories\DownloadRepository  $downloads
     * @return void
     */
    public function __construct(DownloadRepository $downloads)
    {
        $this->downloads = $downloads;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('dashboard.downloads.index')->with([
            'downloads' => Download::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('dashboard.downloads.create')->with([
            'download' => new Download,
            'edit' => false
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $params = $request->all();

        $download = $this->downloads->save($params);

        return redirect()->route('dashboard.downloads.edit', [$download->id])
            ->with('success', 'El descargable se creó correctamente');
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function trash(Request $request)
    {
        return view('dashboard.downloads.trashed')->with([
            'downloads' => Download::onlyTrashed()->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        return view('dashboard.downloads.edit')->with([
            'download' => Download::findOrFail($id),
            'edit' => true
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param  \App\Http\Requests\UpdateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update($id, UpdateRequest $request)
    {
        $download = Download::findOrFail($id);
        $params = $request->all();
        $this->downloads->save($params, $download);

        return redirect()->route('dashboard.downloads.edit', [$id])
            ->with('success', 'El descargable se actualizó correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $download = Download::withTrashed()->find($id);

        if (request()->exists('force')) {
            $download->forceDelete();

            return redirect()->route('dashboard.downloads.trash')
                ->with('deleted', [
                    'message' => 'El descargable se eliminó permanentemente.'
                ]);
        }

        $download->delete();

        return redirect()->route('dashboard.downloads.index')
            ->with('deleted', [
                'message' => 'El descargable se envío a la papelera.',
                'undo' => route('dashboard.downloads.restore', $id),
            ]);
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param  int  $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function restore($id, Request $request)
    {
        Download::withTrashed()->find($id)->restore();
        return redirect()->route('dashboard.downloads.trash')
            ->with('success', 'Se restableció el descargable');
    }
}

