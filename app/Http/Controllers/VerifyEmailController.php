<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use App\Http\Controllers;

class VerifyEmailController extends Controller
{
    function verify($confirmation_code) {

	//verification logic below. verifies the user account and enables it.

	$user = User::whereconfirmation_code($confirmation_code)->first();
	if( $user != null) {
		$user->account_confirmed = 1;
	}
	$user->save();
	
	//echo $user;

	//for testing, uncomment echo $user, and comment redirect, to see user details.

	return redirect()->route('Notes.index');
}

    function verifyandreset($confirmation_code) {

	//verification logic below. verifies the user account and enables it.
    	
	$user = User::whereconfirmation_code($confirmation_code)->first();
	if( $user != null) {
		$user->account_confirmed = 1;
	}
	$user->save();
	
	//echo $user;
	
	//for testing, uncomment echo $user, and comment redirect, to see user details.

	return redirect()->action('HomeController@password_reset');
}

}
