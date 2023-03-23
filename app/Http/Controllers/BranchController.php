<?php

namespace App\Http\Controllers;

//use App\Services\CalendarClients\CalendarService;
use Illuminate\Http\{Request, Response};
//use QD\Advice\Models\Advice;
//use QD\Marketplace\Models\{Coupon, Order, OrderItem};
use App\Models\Branch;

class BranchController extends Controller
{
    //
    public function store(Request $request)
    {
        $user = $request->user();

        $branch = new Branch;
        $branch->name = $request->name;
        $branch->user_id = $user->id;
        $branch->company_id = $request->company_id;
        $branch->comments = $request->comments;
        $branch->save();

        return redirect(route('profile.edit') . '#' . str_slug(__('sucursales')))->with('success', __('Tu sucursal se agrego con exito'));
    }

    public function edit($id, Request $request)
    {
        #dd($id);
        $branch = Branch::where('id', $id)->first();
        //dd($branch);
        $view = view('partials.profiles.components.branches.edit', compact('branch'))->render();

        return response()->json(['view' => $view]);
    }

    public function update($id, Request $request)
    {

        $user = $request->user();
        $branch = Branch::find($id);

        $branch->name = $request->name;
        $branch->user_id = $user->id;
        $branch->company_id = $request->company_id;
        $branch->comments = $request->comments;
        $branch->update();

        return redirect(route('profile.edit') . '#' . str_slug(__('sucursales')))->with('success', __('Tu sucursal se actualizo con exito'));
    }

    public function destroy($id){
        $branch = Branch::find($id);
        $branch->delete();

        return redirect(route('profile.edit') . '#' . str_slug(__('sucursales')))->with('success', __('Tu sucursal se desactivo con exito'));
    }
}
