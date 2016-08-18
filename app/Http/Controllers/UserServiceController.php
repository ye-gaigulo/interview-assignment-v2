<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Curl;

class UserServiceController extends Controller
{
	
	public function sendPostData($uri, $data){
	
		// cURL HTTP POST request with Json data object
        // returns Authorization Key         
        return Curl::to($uri)->withData($data)->asJson()->post();
    }

    /**
     * @param  Request  $request
     * @return Response
     */

    public function login(Request $request){

    	// validate username and password: required
	   	$uri = $request->input('user_service');
    	$data = array('username' => $request->input('username'),
    				  'password' => $request->input('password') 
    			);
    
    	$authToken = $this->sendPostData($uri, $data);

        if(isset($authToken->token) && strlen($authToken->token) == 40){
            $request->session()->put('exists', true);    
            $request->session()->put('username', $request->input('username'));
            $request->session()->put('header_1', 'application/json: application/json');
            $request->session()->put('header_2', 'Authorization: '.$authToken->token);
        }

        return view('projects.intro');
    }
}


