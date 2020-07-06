<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Auth\VerifiesEmails;
use App\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\EmailVerify;
use Illuminate\Support\Facades\Auth;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function send ($userId) {
        try {
            $user = User::where('id', $userId)->where('verified_at', null)->firstOrFail();
            $token = Str::random(20);
            $name = $user->name;
            $user->verify_token = $token;
            $user->save();
            Mail::to($user->email)->send(new EmailVerify($name, $token));
            return view('auth.verifyPage');
        } catch (ModelNotFoundException $e) {

        }
    }

    public function __construct()
    {

    }

public function verify($token) {
        try {
            $user = User::where('verify_token', $token)->firstOrFail();
            $user->verify_token = null;
            $user->verified_at = now();
            $user->save();
            Auth::login($user);
            return view('auth.verifySuccess');
        } catch (ModelNotFoundException $e) {

        }
    }

}
