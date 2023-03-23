<?php

namespace App\Http\Controllers;

//use App\Services\CalendarClients\CalendarService;
use Illuminate\Http\{Request, Response};
//use QD\Advice\Models\Advice;
//use QD\Marketplace\Models\{Coupon, Order, OrderItem};
use App\Models\CompanyRole;

class CompanyRoleController extends Controller
{
    //
    public function store(Request $request)
    {
        $user = $request->user();

        $companyRole = new CompanyRole;
        $companyRole->name = $request->name;
        $companyRole->user_id = $user->id;
        $companyRole->company_id = $request->company_id;
        $companyRole->branch_id = $request->branch_id;
        $companyRole->save();

        return redirect(route('profile.edit') . '#' . str_slug(__('roles')))->with('success', __('Tu Rol se agrego con éxito'));
    }

    public function edit($id, Request $request)
    {
        $user = $request->user();
        $branches = $request->user()->branches()->get();

        $companyRole = CompanyRole::where('id', $id)->first();
        $view = view('partials.profiles.components.roles.edit', compact('companyRole', 'branches'))->render();

        return response()->json(['view' => $view]);
    }

    public function update($id, Request $request)
    {
        $user = $request->user();
        $companyRole = CompanyRole::find($id);

        $companyRole->name = $request->name;
        $companyRole->user_id = $user->id;
        $companyRole->company_id = $request->company_id;
        $companyRole->branch_id = $request->branch_id;
        $companyRole->update();

        return redirect(route('profile.edit') . '#' . str_slug(__('roles')))->with('success', __('Tu Rol se actualizo con éxito'));
    }

    public function destroy($id)
    {
        $rol = CompanyRole::find($id);
        $rol->delete();

        return redirect(route('profile.edit') . '#' . str_slug(__('roles')))->with('success', __('Tu Rol se desactivo con exito'));
    }

}
