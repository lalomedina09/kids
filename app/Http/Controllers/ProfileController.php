<?php

namespace App\Http\Controllers;

use Illuminate\Http\{ Request, Response };

use App\Http\Requests\Users\UpdateRequest;
use App\Models\User;
use App\Repositories\UserRepository;

use QD\Advice\Models\{ Advice, Calendar };

use Date;

class ProfileController extends Controller
{

    private $users;

    /**
     * Create a new controller instance.
     *
     * @param  \App\Repositories\UserRepository  $users
     * @return void
     */
    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $user = $request->user();
        $user_interests = $user->interests->pluck('id')->toArray();

        $now = Date::now();
        $advice = [
            'pending' => $user->advice->filter(function ($item) use ($now) {
                return $item->end_date->gt($now);
            }),
            'past' =>$user->advice->filter(function ($item) use ($now) {
                return $item->end_date->lt($now);
            })
        ];

        $advised = [
            'pending' => $user->advised->filter(function ($item) use ($now) {
                return $item->end_date->gt($now);
            }),
            'past' =>$user->advised->filter(function ($item) use ($now) {
                return $item->end_date->lt($now);
            })
        ];
        #$user_whatsapp = ($user->hasMeta('blog', 'whatsapp')) ? $user->getMeta('blog', 'whatsapp') : 0;

        $user_education = ($user->hasMeta('blog', 'education')) ? $user->getMeta('blog', 'education') : [];
        $user_profession = ($user->hasMeta('blog', 'profession')) ? $user->getMeta('blog', 'profession') : [];

        $h = Calendar::getValidRecurrentHours();
        $recurrent_valid_hours = array_combine($h, array_map(function ($elem) {
            return Date::createFromFormat('U', $elem)->format('h:i a');
        }, $h));

        return view('profile.edit')->with([
            'interests' => User::getValidInterests(),
            'user' => $user,
            'user_interests' => $user_interests,
            'education' => $user_education,
            'profession' => $user_profession,
            'advice' => $advice,
            'advised' => $advised,
            'categories' => $user->advice_categories,
            'recurrent' => optional($user->calendar)->recurrent_days,
            'weekdays' => Calendar::getValidRecurrentWeekdays(),
            'hours' => $recurrent_valid_hours,
            'durations' => Calendar::getValidRecurrentDurations(),
            #'user_whatsapp' => $user_whatsapp
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  string  $section
     * @param  \App\Http\Requests\Users\UpdateRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($section, UpdateRequest $request)
    {
        $redirect_url = route('profile.edit');
        //dd($request->all());
        $user = request()->user();
        $params = $request->all();

        switch ($section) {
            case 'profile':
                $this->users->saveProfile($params, $user);
                return redirect($redirect_url . '#' . str_slug(__('General information')))->with('success', __('Your profile was update successfully'));

            case 'password':
                $this->users->savePassword($params, $user);
                return redirect($redirect_url . '#' . str_slug(__('Update password')))->with('success', __('Your profile was update successfully'));

            case 'interests':
                $this->users->saveInterests($params, $user);
                return redirect($redirect_url . '#' . str_slug(__('My interests')))->with('success', __('Your profile was update successfully'));

            case 'personal':
                $this->users->saveMeta('blog', $params, $user);
                return redirect($redirect_url . '#' . str_slug(__('My personal profile')))->with('success', __('Your profile was update successfully'));

            case 'payment':
                $this->users->saveMeta('blog', $params, $user);

                if($params['profile_file_tax'])
                {
                    $file = $params['profile_file_tax'];
                    $user->saveFileTaxSituation($file);
                }

                return redirect($redirect_url . '#' . str_slug(__('Payment')))->with('success', __('Your profile was update successfully'));

            default:
                return $redirect;
        }
    }

    public function updateFileSTax($user, Request $request)
    {
        $params = $request->all();
        $redirect_url = route('profile.edit');
        $user = request()->user();

        if($params['profile_file_tax'])
        {
            //Primero hacemos busqueda luego eliminamos
            $_file = $user->getmedia('profile_file_tax')->first();
            $_file->delete();

            //Ahora subimos el nuevo documento
            $file = $params['profile_file_tax'];
            $user->saveFileTaxSituation($file);
        }

        return redirect($redirect_url . '#' . str_slug(__('Payment')))->with('success', __('Constancia de situación fiscal, actualizada correctamente'));
    }
}
