<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
//atau bisa pakai use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
	protected $auth;

	public function __constructor(Auth $auth)
	{
		$this->auth = $auth;
	}

    public function register()
    {
    	//
    }

    public function login()
    {
    	return view('auth.login');
    }

    public function authenticate(Request $request)
    {
    	$email = $request->input('email');
    	$password = $request->input('password');

    	$dataLogin = ['email' => $email, 'password' => $password];
    	
    	if (Auth::attempt($dataLogin)) 
    	{
    		dd('login');
        }

        dd("gagal login");
    }
}
