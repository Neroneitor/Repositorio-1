<?php

namespace App\Http\Controllers;

use App\Helicopter;
use Illuminate\Http\Request;

class HelicopterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $helicopters = Helicopter::latest()->paginate(5);
  
        return view('helicopters.index',compact('helicopters'))
        ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('helicopters.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            
        ]);
  
        Helicopter::create($request->all());
   
        return redirect()->route('helicopters.index')
                        ->with('success','helicopters created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Helicopter  $helicopter
     * @return \Illuminate\Http\Response
     */
    public function show(Helicopter $helicopter)
    {
        return view('helicopters.show',compact('helicopter'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Helicopter  $helicopter
     * @return \Illuminate\Http\Response
     */
    public function edit(Helicopter $helicopter)
    {
        return view('helicopters.edit',compact('helicopter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Helicopter  $helicopter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Helicopter $helicopter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Helicopter  $helicopter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Helicopter $helicopter)
    {
        //
    }

    public function getHelicopterAppApi()
    {
    $client = new \GuzzleHttp\Client();
    $url = "http://localhost:8000/api/helicopters";
   $myAuth['Authorization'] = "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjU1MmZhMzZmM2FiNTg5OWVmZGZiYTI4ZTY4YjkwMjEzZjM1NzY0YzA0NTRmOThiMTJkMjA0MmZiMGU4MmU1ZjM2NTRlNDU3OTNhMTYwM2VjIn0.eyJhdWQiOiIyIiwianRpIjoiNTUyZmEzNmYzYWI1ODk5ZWZkZmJhMjhlNjhiOTAyMTNmMzU3NjRjMDQ1NGY5OGIxMmQyMDQyZmIwZTgyZTVmMzY1NGU0NTc5M2ExNjAzZWMiLCJpYXQiOjE1NDM2NzMzMDEsIm5iZiI6MTU0MzY3MzMwMSwiZXhwIjoxNTc1MjA5MzAxLCJzdWIiOiIzIiwic2NvcGVzIjpbXX0.pv4swUAlE21x3h2XHy6672-l72hVuQ6dOjIwd_RgHSQ9IfenLQAWqjD6OBn53NYnbrzxDViSTAh5f51WeG69Rp3hj0sac57o_NfIL0vzGPEIUF7FpKBGHDw4bnweL3FosqV1qpdOPvbsjW9V6VG1SNvZf5EYYxIVQWX2080-dS-8zbMuFwdQ51Xs5zTDgakoy2tw6zVOA1ME0IIjbNaZICY4IDR3EhpF_EtMYhJ8ucGXZnHNFrICABTEoEHV71a4C93-peCaxCCtr-3gtfciVvbS9Mb9Rugaed3-9k_65G6Ore6Y3F7Ns4YxpRpJp23koNQz1KDuE2ux4rOPmOO4MG4ubDZT5tMXh-UCIHifjr1QkHyDIUM-q_wa-AcCb9V_UDEOhdsqkEXDmE-B5YFSSx9fnkvbpdjJBKIzTmxAZjfx5byguEYo0ZLfz9n9xaStvzVGA8GElcRO6E56XqDEBa9e64b1lDxgoeAMP56OZ0KMgHt_iwwREpS02RyeeElKrDbgQIKhDx9xkTwb1cl194NeEHa3KSo5fv6UsUm6opdm8Ua-n3mtxLsrtv0gnmi0WZZad6qj3Vz3KzxWxZ9WuECUu8VpB_spPhQqyn8YOKJKlproYacvdVX6_9h3xgpWMRvsutsbv5sftUhIzbdBRV6lZqyEGDUl3rlyDeGA0rY";
    //$myAccept['Accept'] = "application/json";
   // $request = $client->post($url);
     $request = $client->post($url,  ['header'=>$myAuth,$myAccept]);
    $response = $request->send();
        return ($response);

        // $client = new \GuzzleHttp\Client();
        // $url = "http://myexample.com/api/posts";
        // $myBody['name'] = "Demo";
        // $request = $client->post($url,  ['body'=>$myBody]);
        // $response = $request->send();
        // dd($response);
    

    

    // ['auth' => ['xxx', 'xxx']]);
   // echo $res->getStatusCode();
    // "200"
    //echo $request->getHeader('content-type');
    // 'application/json; charset=utf8'
   // echo $res->getBody();
    // {"type":"User"...'

    }


}
