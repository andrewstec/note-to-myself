<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Note;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Auth;
use Collective\Html\HtmlFacade;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = 'Notes/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    protected function password_reset() {
        return "password_reset page";
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|min:8|max:145',
            'email' => 'required|email|max:145|unique:users',
            'password' => 'required|min:8|confirmed',
            'g-recaptcha-response' => 'required|captcha',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $confirmation_code = str_random(44);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'confirmation_code' => $confirmation_code
        ]); 

        $note = Note::create([
            'email' => $data['email'],
            'note' => null,
            'websites' => null,
            'image1' => null,
            'image2' => null,
            'image3' => null,
            'image4' => null,
            'tbd' => null,
            ]);


        if ($user != null) {

             $email_data = Array(
            'confirmation_link' => HtmlFacade::link('verify/' . urlencode($confirmation_code)),
            'email' => $data['email'],
            'name' => $data['name'],
            );

            \Mail::send('verification/email_verification', $email_data, function($mail) use ($email_data)  {
                $mail->from('andrew@organicsplit.com', 'Note To Myself');
                $mail->to($email_data['email'], $email_data['name'])->subject('Please verify your account');
            });
        }

        return $user;

    }
//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//an override for the AuthenticateAndRegister users controller below:
//This will allow only email validated users to login.

//FROM \vendor\laravel\framework\src\Illuminate\Foundation\Auth
//    protected function getCredentials(Request $request)
//    {
//        return $request->only($this->loginUsername(), 'password');
//    }

//Didn't work here... try to place it here afterwards. Implemented code is in AuthenticateAndRegister
        
}
