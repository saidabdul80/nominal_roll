<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
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
            //'email' => ['required', 'string', 'email', 'max:255', ],
            'ap_f_no'=>['string','required','unique:users'],
            'rank'=>['string','required'],
            'surname'=>['string','required'],
            'othername'=>['string','required'],
            'sex'=>['string','required'],                   
            'password' => ['confirmed'],
            
        ]);

        
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {        
        //return dd($data['ap_f_no']);
        
        return User::create([                
            'ap_f_no' => $data['ap_f_no'],
            'rank_id' => $data['rank'],
            'surname' => $data['surname'],
            'othername' => $data['othername'],
            'sex' => $data['sex'],
            'state_of_origin' => $data['state'],
            'tribe' => $data['tribe'],
            'zone' => $data['zone'],
            'dob' => $data['dob'],
            'doe' => $data['doe'],
            'last_promot' => $data['last_promot'],
            'retirement' => $data['retirement'],
            'date_transfer_to_command' => $data['date_transfer_to_command'],
            'command_served_last' => $data['command_served_last'],
            'qualification' => $data['qualification'],
            'discipline' => $data['discipline'],
            'general_duty_specialist' => $data['general_duty_specialist'],
            'duty_post_division' => $data['duty_post_division'],
            'date_transfer_to_division' => $data['date_transfer_to_division'],
            'date_reported_in_command' => $data['date_reported_in_command'],
            'phone' => $data['phone'],
            'recruited_as' => $data['recruited_as'],
            'address' => $data['address'],
            'nok' => $data['nok'],
            'nop' => $data['nop'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
