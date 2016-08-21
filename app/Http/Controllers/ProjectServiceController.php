<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Curl;

class ProjectServiceController extends Controller
{

    public function array_splice_preserve_keys(&$input, $offset, $length=null, $replacement=array()) {

        // array_splice does not preserve keys so we manually insert the end date into the array

        if (empty($replacement)) {
            return array_splice($input, $offset, $length);
        }

        $part_before  = array_slice($input, 0, $offset, $preserve_keys=true);
        $part_removed = array_slice($input, $offset, $length, $preserve_keys=true);
        $part_after   = array_slice($input, $offset+$length, null, $preserve_keys=true);
        $input = $part_before + $replacement + $part_after;

        return $input;
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // GET method :  Collection resource (READ *)
        // Response Body : JSON representation of collection 
        // Response Headers : Content-Type: application/json, *
        // Response Code : 200 OK
        $uri = 'http://projectservice.staging.tangentmicroservices.com:80/api/v1/projects/';
        $projectList = Curl::to($uri)->withHeader(session('header_1'))->withHeader(session('header_2'))->get();
        $projectList = json_decode($projectList, true);

        return view('projects.index')->with('projectList', $projectList);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // validate the data
        $this->validate($request,[
            'title' => 'required|min:3',
            'description' => 'required|min:12',
            'start_date' => 'required|date'
        ]);

        $data = array(
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'start_date' => $request->input('start_date'),
            'is_billable' => ($request->input('is_billable') == 'true')?true:false ,
            'is_active' => ($request->input('is_active') == 'true')?true:false
        );

        // check if no_end_date is null i.e. if it is unchecked -> insert end_date value into $data
        if($request->input('no_end_date') == null){
            $endDate = array('end_date' => $request->input('end_date'));
            $data = $this->array_splice_preserve_keys($data, 3, 0, $endDate);    
        }
        
        // POST method : Must submit all fields required by server, cannot send partial data set
        // Response Body : JSON representation of create
        // Response Headers : Content-Type: application/json, *
        // Response Code : 201 CREATED (must return 201 CREATED, not 200 OK)
        // Location : http://projectservice.staging.tangentmicroservices.com:80/api/v1/projects/{$id}/
        $uri = 'http://projectservice.staging.tangentmicroservices.com:80/api/v1/projects/';
        $createProject = Curl::to($uri)->withHeader(session('header_1'))->withHeader(session('header_2'))->withData($data)->asJson()->post();

        $log = array(
            'message' => 'Successfully created the project');
        return view('projects.intro')->with('log', $log);
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
        
        // GET method :  Instance resource, id required (READ specific id)
        // Response Body : JSON representation of instance
        // Response Headers : Content-Type: application/json, *
        // Response Code : 200 OK
        $uri = "http://projectservice.staging.tangentmicroservices.com:80/api/v1/projects/$id/";
        $editProject = Curl::to($uri)->withHeader(session('header_1'))->withHeader(session('header_2'))->get();
        $editProject = json_decode($editProject, true);
        $editProject['is_billable'] = ($editProject['is_billable'])?'true':'false';
        $editProject['is_active'] = ($editProject['is_active'])?'true':'false';
        
        return view('projects.edit')->with('editProject', $editProject);
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
        //validate the data
        $this->validate($request,[
            'title' => 'required|min:3',
            'description' => 'required|min:12',
            'start_date' => 'required|date'
        ]);

        $data = array(
            'pk' => $id,
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'start_date' => $request->input('start_date'),
            'is_billable' => ($request->input('is_billable') == 'true')?true:false ,
            'is_active' => ($request->input('is_active') == 'true')?true:false
        );

        // check if no_end_date is null i.e. if it is unchecked -> insert end_date value into $data
        if($request->input('no_end_date') == null){
            $endDate = array('end_date' => $request->input('end_date'));
            $data = $this->array_splice_preserve_keys($data, 4, 0, $endDate);    
        }

        // PUT method :  Must submit all fields required by server, cannot send partial data set
        // Response Body : JSON representation of update
        // Response Headers : Content-Type: application/json, *
        // Response Code : 200 OK
        // Location : http://projectservice.staging.tangentmicroservices.com:80/api/v1/projects/{$id}/ 
        $uri = "http://projectservice.staging.tangentmicroservices.com:80/api/v1/projects/$id/";
        $updateProject = Curl::to($uri)->withHeader(session('header_1'))->withHeader(session('header_2'))->withData($data)->asJson()->put();

        $log = array(
            'message' => 'Successfully updated the project');
        return view('projects.intro')->with('log', $log);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // DELETE method : object id required
        // Response Body : none
        // Response Headers : Content-Length: 0, *
        // Response Code : 204 no content
        $uri = "http://projectservice.staging.tangentmicroservices.com:80/api/v1/projects/$id/";
        $deleteProject = Curl::to($uri)->withHeader(session('header_1'))->withHeader(session('header_2'))->delete();

        return $id;
    }
}
