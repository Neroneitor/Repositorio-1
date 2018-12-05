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


    public function getHelicopterAppApi()
    {
    $client = new \GuzzleHttp\Client();
    $url = "http://localhost:8000/api/helicopters";
   $res = $client->request('GET',$url,  
   ['headers' => [
    'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjgwNzdkODc2ZjQyNjRkZDZjYzkzZTUyZWNhMmI3YmMyMTBmMzQ1NjBkNDdhZWVmZGI1NDg0Y2U1Nzc3M2I2MWJmOGI5M2NjODhkMzNiMjZkIn0.eyJhdWQiOiIyIiwianRpIjoiODA3N2Q4NzZmNDI2NGRkNmNjOTNlNTJlY2EyYjdiYzIxMGYzNDU2MGQ0N2FlZWZkYjU0ODRjZTU3NzczYjYxYmY4YjkzY2M4OGQzM2IyNmQiLCJpYXQiOjE1NDM4NTUxMTAsIm5iZiI6MTU0Mzg1NTExMCwiZXhwIjoxNTc1MzkxMTA5LCJzdWIiOiIzIiwic2NvcGVzIjpbXX0.CrANY_mIeprQ4MiHURKlErLPCKHhsVYKtn8iAD5e4vzHJyEUKKsYIyBYVfFhVqxeYe9u2-iAieksq9lvHfNRSpOBWukC6jHu894ww715d9Buw96UTeAWphiQSdzhFwhr4OrQdWJ-0AHOXvgyc6ZNweZE3SAuiW3nd9z_AR3rB2HuVszny7k9qUxs5ssoY6mT-W9JvcIwijUCQKFfhysbla6imOTRmHuiAuxdpVy_J9vP-MbATg4Vcyjnlod3tF8lMkCBMizY8SQP68taRxHYRuzmsSvJL_cyxTI2MnBe2CvBPSHHGxGsE82vU7rFZ0a2k0FCbnfy6Jgwr1GLRTdz7IYaxXPD3xGFj8ennZ_mvF_lenGppB6-RKeCt47bQOH3DRxyiXIkcmvvC77paPzJO4_YetbehEABrxNNSv5XppR5m9syotlA2IsJSTVpwIgRRovvLpJ1hfxMtu7Ns_UG9GdErGTYL8QMHWmlvvLIfniz_6rmZanCfQDdikBlPvb5IvB_K_t9ffS0zudOebvRkI0pzAAGmSXh48gSAbzb8K5R-UWDKtooNqS6_MJNjUHzPvBGdN7HDUOFhujBEAN5kCx_ZgUVTo2_pBBIOgxoCPz3vf5wA8O7J9yjebmCF1yslzGrNGVwklQ484NBA2Kwy4riNahH-bVaT-6Jlj3fQUw',
    'Accept'  => 'application/json']]);
    //echo gettype ($res);
   //echo $res->getStatusCode();
    // "200"
    //echo $request->getHeader('content-type');
    // 'application/json; charset=utf8'
  // echo $res->getBody();
    // {"type":"User"...'


        $stream = $res->getBody();
        $contents = $stream->getContents();
        // mostrar el username de 01 usuario
        $user=(json_decode($contents , true));
        //print_r($user);
        return $user;


    }
    


    public function index()
    {
    
       // $helicopters = Helicopter::latest()->paginate(5);
       
        $helicopters = $this->getHelicopterAppApi();

  
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
        //return view('helicopters.create');

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
        //
    }
}
