<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Curl;

class UserServiceController extends Controller
{
	
	public function sendPostData($uri, $data){
	
		// cURL HTTP POST request with JSON data object
        // returns Authorization Key         
        return Curl::to($uri)->withData($data)->asJson()->post();
    }

    /**
     * @param  Request  $request
     * @return Response
     */

    public function login(Request $request){

    	// Validate username and password
        $this->validate($request,[
            'username' => 'required|alpha|min:3|in:admin',
            'password' => 'required|in:admin'
        ]);

	   	$uri = $request->input('user_service');
    	$data = array('username' => $request->input('username'),
    				  'password' => $request->input('password') 
    			);
    
    	// collect the authorization token
        $authToken = $this->sendPostData($uri, $data);

        // set the session variables
        if(isset($authToken->token) && strlen($authToken->token) == 40){
            $request->session()->put('exists', true);    
            $request->session()->put('username', $request->input('username'));
            $request->session()->put('header_1', 'application/json: application/json');
            $request->session()->put('header_2', 'Authorization: '.$authToken->token);
        }

        $log = array ();

        return view('projects.intro')->with('log', $log);
    }
}


