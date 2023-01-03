<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Reschedule;
use QD\Advice\Models\Advice;
use Illuminate\Http\Request;
use App\Mail\Reschedule\Mailer;
use QD\Advice\Http\Controllers\Traits\AdviceRescheduleTrait;
class ReschedulesController extends Controller
{
    public function modalBlockReschedule(Request $request)
    {
        $advice = Advice::where('id', $request->advice_id)->first();
        $reschedule = Reschedule::where('id', $advice->id)->first();

        $view = view('partials.modals.advice.block-reschedule', compact('advice'))->render();
        return response()->json([
            'view' => $view
        ]);
    }

    public function storeBlockReschedule(Request $request)
    {
        $redirect_url = route('profile.edit');
        $redirect = redirect($redirect_url . '#' . str_slug(__('Advices')));
        $user = $request->user();

        DB::beginTransaction();
            $advice = Advice::where('id', $request->advice_id)->first();
            $reschedule = $this->storeReschedule($request);

            $dataNotification = array(
                'user_id' => $user->id,
                'subject' => 'Coach '. $advice->advisor->fullname. ' No ofrecio la opcion de reagendar',
                'description' => $request->description,
                'notificationsable_type' => "App\\Models\\Reschedule",
                'notificationsable_id' => $reschedule->id,
            );

            //Aqui notificamos al administador de querido dinero
            Mailer::sendMailNotificationBlockReschedule($dataNotification, $advice);
            $notification = AdviceRescheduleTrait::createNotification($dataNotification, $user, $typeNotification = 1);
        DB::commit();

        return $redirect->with('success', __('¡¡La asesoria fue bloqueada y ya no se podra Re agendar!!'));
    }

    public function storeReschedule(Request $request)
    {
        $reschedule = new Reschedule;
        $reschedule->status = 7;
        $reschedule->user_id = $request->user()->id;
        $reschedule->advice_id = $request->advice_id;
        $reschedule->current_date = null;
        $reschedule->new_date = null;
        $reschedule->type_user = 1; //1 Porque lo solicita el coach
        $reschedule->description = $request->description;
        $reschedule->save();

        return $reschedule;
    }
}
