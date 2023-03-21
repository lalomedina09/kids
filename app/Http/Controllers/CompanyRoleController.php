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

        return redirect(route('profile.edit') . '#' . str_slug(__('roles')))->with('success', __('Tu Rol se agrego con exito'));
    }

    public function update($id, Request $request)
    {

        $user = $request->user();
        $companyRole = CompanyRole::find($id);

        $companyRole->name = $request->name;
        $companyRole->user_id = $user->id;
        $companyRole->update();

        return redirect(route('profile.edit') . '#' . str_slug(__('roles')))->with('success', __('Tu Rol se actualizo con exito'));
    }

    public function delete()
    {
        dd('desactivamos el rol');
    }
}
