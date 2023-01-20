<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;
use App\Http\Controllers\Auth\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;
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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function facebookCallback()
    {
        $userFacebook = Socialite::driver('facebook')->user();
        $providerId = $userFacebook->getId();
        $provider = 'facebook';

        $user = User::where('provider', $provider)->where('provider_id', $providerId)->first();

        if (!$user) {
            $user = new User();
            $user->name = $userFacebook->getName();
            $user->email = $userFacebook->getEmail();
            $user->provider_id = $providerId;
            $user->password = Str::random(8);
            $user->save();
        }

        $userId = $user->id;

        Auth::loginUsingId($userId);
    }

    public function googleCallback()
    {
        $user = Socialite::driver('google')->user();
        echo $user->getId() . '<br>';
        echo $user->getNickname() . '<br>';
        echo $user->getName() . '<br>';
        echo $user->getEmail() . '<br>';
        echo $user->getAvatar() . '<br>';
    }

    public function githubCallback()
    {
        $user = Socialite::driver('github')->user();
        echo $user->getId() . '<br>';
        echo $user->getNickname() . '<br>';
        echo $user->getName() . '<br>';
        echo $user->getEmail() . '<br>';
        echo $user->getAvatar() . '<br>';
    }
}
