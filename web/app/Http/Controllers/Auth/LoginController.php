<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Socialite;
use App\User;
use Auth;
use Notification;
use App\Notifications\WellComeNotification;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = RouteServiceProvider::HOME;

   
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm() 
    {

        return view ('auth.login');
    }


    public function redirectTo()
    {
        if (request()->has('referer')) 
        {
            $this->redirectTo = request()->get('referer');
        }

        return $this->redirectTo ?? '/';
    }


    public function createUser($getInfo)
       {
           $user = User::where('email', $getInfo->email)->first();
           if (!$user) {
               $user = User::create([
                   'name' => $getInfo->name,
                   'email' => $getInfo->email,
                   //'provider' => $provider,
                   //'provider_id' => $getInfo->id
               ]);
           }
           return $user;
       }




   



}
