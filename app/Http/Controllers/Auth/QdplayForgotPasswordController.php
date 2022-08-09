<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

use App\Mail\Qdplay\QdplayResetPasswordEmail;
use App\Mail\QdplayCustomResetPasswordEmail;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use Carbon\Carbon;
use Mail;
use Hash;
use DB;

class QdplayForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    public function showLinkRequestForm()
    {
        return view('auth.qdplay.password.email');
    }

    protected function validateEmail(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|string|max:255|email',
            'g-recaptcha-response' => 'required|recaptcha'
        ]);
    }

    public function submitForgetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'g-recaptcha-response' => 'required|recaptcha'
        ]);

        $user = User::where('email',$request->email)->first();

        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::to($user->email)->send(new QdplayCustomResetPasswordEmail($user, $token));

        return redirect('/')->with('status', 'Correo de recuperacion enviado correctamente');
    }

}
