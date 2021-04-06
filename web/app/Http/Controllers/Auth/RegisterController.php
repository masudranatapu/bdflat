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
            'usertype'       => ['required', 'string', 'max:50'],
            'name'           => ['required', 'string', 'max:255'],
            'email'          => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'mobile'         => ['required', 'string', 'max:15'],
            'password'       => ['required', 'string', 'min:6', 'confirmed'],
            'person_name'    => ['required', 'string', 'max:50'],
            'designation'    => ['required', 'string', 'max:50'],
            'office_address' => ['required', 'string', 'max:255'],
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

        return User::create([
            'user_type'         => $data['usertype'],
            'name'             => $data['name'],
            'email'            => $data['email'],
            'mobile'           => $data['mobile'],
            'password'         => Hash::make($data['password']),
            'contact_per_name' => $data['person_name'],
            'designation'      => $data['designation'],
            'address'          => $data['office_address'],
        ]);
    }
}
