<?php

namespace App\Http\Controllers;

use Session;
use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\ThrottlesLogins;

class HomeController extends Controller
{

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    protected function password_reset() {
        return view('auth/passwords/password_reset_lockout');
    }

    protected function password_reset_submit(Request $request) {
        //$this->validateLogin($request);
        $throttles = $this->isUsingThrottlesLoginsTrait();
        echo $request->password;
        $credentials = $this->getCredentials($request);

        if (Auth::guard($this->getGuard())->attempt($credentials, $request->has('remember'))) {
            $user = User::where('email', Auth::user()->email)->first();
            echo $user;
            $user->password = bcrypt($request->newpassword);
            $user->save();
            Session::flash('successful_password_reset', 'You have successfully reset your password and you are now logged in!');
            return $this->handleUserWasAuthenticated($request, $throttles);
        }
            echo 'test';
            redirect()->action('HomeController@password_reset');

        // If the login 
        echo $request->confirmpassword;
        Session::flash('error', 'There was an error resetting the password. 
            Please try to reset your password again.');
        return redirect()->action('HomeController@password_reset');
    }

}
