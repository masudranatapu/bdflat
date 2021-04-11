<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Session;
use Notification;
use Auth;
use Toastr;
use App\Notifications\WellComeNotification;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'usertype'       => ['required', 'integer', 'max:4'],
            'name'           => ['required', 'string', 'max:255'],
            'email'          => ['required', 'string', 'email', 'max:255', 'unique:WEB_USER'],
            'mobile'         => ['required', 'string', 'max:15'],
            'password'       => ['required', 'string', 'min:6'],
            'person_name'    => ['nullable', 'string', 'max:50'],
            'designation'    => ['nullable', 'string', 'max:50'],
            'office_address' => ['nullable', 'string', 'max:255'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        $user = new User();
        $user->USER_TYPE    = $data['usertype'];
        $user->NAME         = $data['name'];
        $user->EMAIL        = $data['email'];
        $user->MOBILE_NO    = $data['mobile'];
        $user->PASSWORD     = Hash::make($data['password']);
        $user->CONTACT_PER_NAME = $data['person_name'] ?? null;
        $user->DESIGNATION  = $data['designation'] ?? null;
        $user->ADDRESS      = $data['office_address'] ?? null;
        $user->save();
        return $user;




        // $user = User::create([
        //     'USER_TYPE'        => $data['usertype'],
        //     'NAME'             => $data['name'],
        //     'EMAIL'            => $data['email'],
        //     'MOBILE_NO'        => $data['mobile'],
        //     'PASSWORD'         => Hash::make($data['password']),
        //     'CONTACT_PER_NAME' => $data['person_name'] ?? null,
        //     'DESIGNATION'      => $data['designation'] ?? null,
        //     'ADDRESS'          => $data['office_address'] ?? null,
        // ]);

    //    Auth::login($user, true);
    //    Session::start();
    //    return redirect()->route('home');

    }
}
