<?php

namespace App\Http\Controllers;

//use App\Services\CalendarClients\CalendarService;
use Illuminate\Http\{Request, Response};
//use QD\Advice\Models\Advice;
//use QD\Marketplace\Models\{Coupon, Order, OrderItem};
use App\Models\Company;

class CompanyController extends Controller
{
    //
    public function store(Request $request)
    {
        $user = $request->user();

        $company = new Company;
        $company->name = $request->name;
        $company->user_id = $user->id;
        $company->comments = $request->comments;
        $company->save();

        return redirect(route('profile.edit') . '#' . str_slug(__('mi-empresa')))->with('success', __('Tu empresa se agrego con exito'));
    }

    public function update($id, Request $request)
    {

        $user = $request->user();
        $company = Company::find($id);

        $company->name = $request->name;
        $company->user_id = $user->id;
        $company->comments = $request->comments;
        $company->update();

        return redirect(route('profile.edit') . '#' . str_slug(__('mi-empresa')))->with('success', __('Actualizaste tu empresa con exito'));
    }

}
