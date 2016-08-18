<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Curl;

class UserServiceController extends Controller
{
	
	public function sendPostData($uri, $data){
	
		// cURL HTTP POST request with Json data object         
        return Curl::to($uri)->withData($data)->asJson()->post();
    }

    public function login(Request $request){

    	// validate username and password: required
	   	$uri = $request->input('user_service');
    	$data = array('username' => $request->input('username'),
    				  'password' => $request->input('password') 
    			);
    
    	$authToken = $this->sendPostData($uri, $data);

    	// If authToken was created start the session
    	// store session variables

    	return view('projects.intro');
    }
}


