<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Curl;

class ProjectServiceController extends Controller
{

        public function getServiceCall($uri){

//        $url ="http://projectservice.staging.tangentmicroservices.com:80/api/v1/projects/";
        
        
/*
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");  
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  'application/json: application/json',
  'Authorization: 71456dbd15de0c0b6d2b4b44e5a92ad94c6def97'
));
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 
  $result = curl_exec($ch);
  curl_close($ch);  // Seems like good practice
  
  dd($result);
*/
    $header1 = 'application/json: application/json';
    $header2 = 'Authorization: 71456dbd15de0c0b6d2b4b44e5a92ad94c6def97';


    return Curl::to($uri)->withHeader($header1)->withHeader($header2)->get();

        
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projectList = $this->getServiceCall('http://projectservice.staging.tangentmicroservices.com:80/api/v1/projects/');

        $projectList = json_decode($projectList, true);

        dd($projectList);
        return view('projects.index')->with('projectList', $projectList);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
