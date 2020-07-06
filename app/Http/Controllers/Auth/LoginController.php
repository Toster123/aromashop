<?php

namespace App\Http\Controllers\Auth;

use App\Dialog;
use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $client_id = '7355864';
    protected $client_secret = 'FjbMJNFylAqf62EQ3xKF';
    protected $service_key = '35ac499d35ac499d35ac499d9d35dc7445335ac35ac499d6bc6199729a646330f09164b';
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->middleware('guest')->except('logout');
        if ($request->get('code')) {
            $access_token_href = 'https://oauth.vk.com/access_token?client_id='. $this->client_id .'&client_secret='. $this->client_secret .'&redirect_uri='. url('login') .'&scope=email&code='. $request->get('code');
            $access_token = json_decode(file_get_contents($access_token_href), true);

            if ($access_token) {

                $user_query = 'https://api.vk.com/method/users.get?user_ids='. $access_token['user_id'] .'&fields=first_name,photo_big&access_token='. $access_token['access_token'] .'&v=5.103';//ДОДЕЛАТЬ, добавть страну и тп
                $user_data = json_decode(file_get_contents($user_query), true)['response'][0];

                if ($access_token['email']) {
                $user_data['email'] = $access_token['email'];
                $user = User::where('email', $user_data['email'])->first();
                if (is_null($user)) {
                    $user = User::where('vk_id', $user_data['id'])->first();
                    if (!is_null($user)) {
                        Auth::login($user);
                    } else {
                        $user = new User();
                    $user->email = $user_data['email'];
                    $user->name = $user_data['first_name'];
                    $user->vk_id = $user_data['id'];
                    $user->verified_at = now();
                    $user->save();

                        $order = new Order();
                        $order->type = 1;
                        $order->user_id = $user->id;
                        $order->save();

                        $likes = new Order();
                        $likes->type = 2;
                        $likes->user_id = $user->id;
                        $likes->save();

                        $dialog = new Dialog();
                        $dialog->user_id = $user->id;
                        $dialog->save();

                    Auth::login($user);
                    }
                } else {
                    if ($user->vk_id == $user_data['id']) {
                        Auth::login($user);
                    } else {
//ВЫ УЖЕ ЗАРЕГЕСТРИРОВАННЫ!!
                    }
                }
            } else {
                $user = User::where('vk_id', $user_data['id'])->firstOrFail();
                if (is_null($user)) {
                    $user = new User();
                    $user->name = $user_data['first_name'];
                    $user->vk_id = $user_data['id'];
                    $user->verified_at = now();
                    $user->save();

                        $order = new Order();
                        $order->type = 1;
                        $order->user_id = $user->id;
                        $order->save();

                        $likes = new Order();
                        $likes->type = 2;
                        $likes->user_id = $user->id;
                        $likes->save();

                        $dialog = new Dialog();
                        $dialog->user_id = $user->id;
                        $dialog->save();

                    Auth::login($user);
                } else {
                    Auth::login($user);
                }
            }

            }
        }
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }
}
