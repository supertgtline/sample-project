<?php

namespace App\Http\Controllers\Auth;

use App\Exceptions\NoActiveAccountException;

use App\Http\AuthTraits\Social\ManagesSocialAuth;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\Http\Requests;

use Socialite;

class AuthController extends Controller
{
    use AuthenticatesUsers,ManagesSocialAuth;
    protected $redirectTo = '/';
    public function __construct(){
    	$this->middleware('guest', ['except' => ['logout',

            'redirectToProvider',

            'handleProviderCallback']

        ]);
    }
    public function checkStatusLevel(){
    	if( ! Auth::user()->isActiveStatus()){
    		Auth::logout();
    		throw new  NoActiveAccountException;
    		
    	}
    }
    public function redirectPath(){
    	if(Auth::user()->isAdmin()){
    		return 'admin';
    	}
    	return property_exists($this, 'redirectTo')? $this->redirectTo : '/';

    }
    /**
	* Handle a login request to the application.
	*
	* @param \Illuminate\Http\Request $request
	* @return \Illuminate\Http\Response
	*/
	public function login(Request $request){
		$this->validateLogin($request);
	}
}
