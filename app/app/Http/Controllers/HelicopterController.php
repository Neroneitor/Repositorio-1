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

        $conten =$res->getBody();
        $contents = $conten->getContents();
        $arrayData=(json_decode($contents , true));
        $helicopters = $arrayData['data'];

        return $helicopters;
    }

    public function getHelicopterAppApiForId()
    {
        $pathSegment = $this->Show();

    $client = new \GuzzleHttp\Client();
    $url = "http://localhost:8000/api/helicopters".$pathSegment;
   $res = $client->request('GET',$url,  
   ['headers' => [
    'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjgwNzdkODc2ZjQyNjRkZDZjYzkzZTUyZWNhMmI3YmMyMTBmMzQ1NjBkNDdhZWVmZGI1NDg0Y2U1Nzc3M2I2MWJmOGI5M2NjODhkMzNiMjZkIn0.eyJhdWQiOiIyIiwianRpIjoiODA3N2Q4NzZmNDI2NGRkNmNjOTNlNTJlY2EyYjdiYzIxMGYzNDU2MGQ0N2FlZWZkYjU0ODRjZTU3NzczYjYxYmY4YjkzY2M4OGQzM2IyNmQiLCJpYXQiOjE1NDM4NTUxMTAsIm5iZiI6MTU0Mzg1NTExMCwiZXhwIjoxNTc1MzkxMTA5LCJzdWIiOiIzIiwic2NvcGVzIjpbXX0.CrANY_mIeprQ4MiHURKlErLPCKHhsVYKtn8iAD5e4vzHJyEUKKsYIyBYVfFhVqxeYe9u2-iAieksq9lvHfNRSpOBWukC6jHu894ww715d9Buw96UTeAWphiQSdzhFwhr4OrQdWJ-0AHOXvgyc6ZNweZE3SAuiW3nd9z_AR3rB2HuVszny7k9qUxs5ssoY6mT-W9JvcIwijUCQKFfhysbla6imOTRmHuiAuxdpVy_J9vP-MbATg4Vcyjnlod3tF8lMkCBMizY8SQP68taRxHYRuzmsSvJL_cyxTI2MnBe2CvBPSHHGxGsE82vU7rFZ0a2k0FCbnfy6Jgwr1GLRTdz7IYaxXPD3xGFj8ennZ_mvF_lenGppB6-RKeCt47bQOH3DRxyiXIkcmvvC77paPzJO4_YetbehEABrxNNSv5XppR5m9syotlA2IsJSTVpwIgRRovvLpJ1hfxMtu7Ns_UG9GdErGTYL8QMHWmlvvLIfniz_6rmZanCfQDdikBlPvb5IvB_K_t9ffS0zudOebvRkI0pzAAGmSXh48gSAbzb8K5R-UWDKtooNqS6_MJNjUHzPvBGdN7HDUOFhujBEAN5kCx_ZgUVTo2_pBBIOgxoCPz3vf5wA8O7J9yjebmCF1yslzGrNGVwklQ484NBA2Kwy4riNahH-bVaT-6Jlj3fQUw',
    'Accept'  => 'application/json']]);

        $conten =$res->getBody();
        $contents = $conten->getContents();
        $arrayData=(json_decode($contents , true));
        $helicopter = $arrayData['data'];

        return $helicopter;
    }

    public function index()
    {
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
            'type' => 'required',
            'speed' => 'required',
            'color' => 'required',  
        ]);

        $client = new \GuzzleHttp\Client();
        $url = "http://localhost:8000/api/helicopters";
        $res = $client->request('POST',$url,  
        ['headers' => [
         'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjgwNzdkODc2ZjQyNjRkZDZjYzkzZTUyZWNhMmI3YmMyMTBmMzQ1NjBkNDdhZWVmZGI1NDg0Y2U1Nzc3M2I2MWJmOGI5M2NjODhkMzNiMjZkIn0.eyJhdWQiOiIyIiwianRpIjoiODA3N2Q4NzZmNDI2NGRkNmNjOTNlNTJlY2EyYjdiYzIxMGYzNDU2MGQ0N2FlZWZkYjU0ODRjZTU3NzczYjYxYmY4YjkzY2M4OGQzM2IyNmQiLCJpYXQiOjE1NDM4NTUxMTAsIm5iZiI6MTU0Mzg1NTExMCwiZXhwIjoxNTc1MzkxMTA5LCJzdWIiOiIzIiwic2NvcGVzIjpbXX0.CrANY_mIeprQ4MiHURKlErLPCKHhsVYKtn8iAD5e4vzHJyEUKKsYIyBYVfFhVqxeYe9u2-iAieksq9lvHfNRSpOBWukC6jHu894ww715d9Buw96UTeAWphiQSdzhFwhr4OrQdWJ-0AHOXvgyc6ZNweZE3SAuiW3nd9z_AR3rB2HuVszny7k9qUxs5ssoY6mT-W9JvcIwijUCQKFfhysbla6imOTRmHuiAuxdpVy_J9vP-MbATg4Vcyjnlod3tF8lMkCBMizY8SQP68taRxHYRuzmsSvJL_cyxTI2MnBe2CvBPSHHGxGsE82vU7rFZ0a2k0FCbnfy6Jgwr1GLRTdz7IYaxXPD3xGFj8ennZ_mvF_lenGppB6-RKeCt47bQOH3DRxyiXIkcmvvC77paPzJO4_YetbehEABrxNNSv5XppR5m9syotlA2IsJSTVpwIgRRovvLpJ1hfxMtu7Ns_UG9GdErGTYL8QMHWmlvvLIfniz_6rmZanCfQDdikBlPvb5IvB_K_t9ffS0zudOebvRkI0pzAAGmSXh48gSAbzb8K5R-UWDKtooNqS6_MJNjUHzPvBGdN7HDUOFhujBEAN5kCx_ZgUVTo2_pBBIOgxoCPz3vf5wA8O7J9yjebmCF1yslzGrNGVwklQ484NBA2Kwy4riNahH-bVaT-6Jlj3fQUw',
         'Accept'  => 'application/json'],
         'json'    => [
            'name' => $request->name,
            'type' => $request->type,
            'speed' => $request->speed,
            'color' => $request->color]
         ]);  

        return redirect()->route('helicopters.index')
                        ->with('success','helicopters created successfully.');
    }

     /**
     * Display the specified resource.
     *
     * @param  \App\Helicopter  $helicopter
     * @return \Illuminate\Http\Response
      */
    public function show(Request $request)
    {
        $helicopter = $this->getHelicopterAppApiForId();

        return view('helicopters.show',compact('helicopter'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Helicopter  $helicopter
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
    
        echo ($request->segment(2));
        return view('helicopter.edit',compact('helicopter'));

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
        $request->validate([
            'name' => 'required',
            'id' => 'required',
        ]);

        $client = new \GuzzleHttp\Client();
        $url = "http://localhost:8000/api/helicopters";
       $res = $client->request('PUT',$url,  
       ['headers' => [
        'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjgwNzdkODc2ZjQyNjRkZDZjYzkzZTUyZWNhMmI3YmMyMTBmMzQ1NjBkNDdhZWVmZGI1NDg0Y2U1Nzc3M2I2MWJmOGI5M2NjODhkMzNiMjZkIn0.eyJhdWQiOiIyIiwianRpIjoiODA3N2Q4NzZmNDI2NGRkNmNjOTNlNTJlY2EyYjdiYzIxMGYzNDU2MGQ0N2FlZWZkYjU0ODRjZTU3NzczYjYxYmY4YjkzY2M4OGQzM2IyNmQiLCJpYXQiOjE1NDM4NTUxMTAsIm5iZiI6MTU0Mzg1NTExMCwiZXhwIjoxNTc1MzkxMTA5LCJzdWIiOiIzIiwic2NvcGVzIjpbXX0.CrANY_mIeprQ4MiHURKlErLPCKHhsVYKtn8iAD5e4vzHJyEUKKsYIyBYVfFhVqxeYe9u2-iAieksq9lvHfNRSpOBWukC6jHu894ww715d9Buw96UTeAWphiQSdzhFwhr4OrQdWJ-0AHOXvgyc6ZNweZE3SAuiW3nd9z_AR3rB2HuVszny7k9qUxs5ssoY6mT-W9JvcIwijUCQKFfhysbla6imOTRmHuiAuxdpVy_J9vP-MbATg4Vcyjnlod3tF8lMkCBMizY8SQP68taRxHYRuzmsSvJL_cyxTI2MnBe2CvBPSHHGxGsE82vU7rFZ0a2k0FCbnfy6Jgwr1GLRTdz7IYaxXPD3xGFj8ennZ_mvF_lenGppB6-RKeCt47bQOH3DRxyiXIkcmvvC77paPzJO4_YetbehEABrxNNSv5XppR5m9syotlA2IsJSTVpwIgRRovvLpJ1hfxMtu7Ns_UG9GdErGTYL8QMHWmlvvLIfniz_6rmZanCfQDdikBlPvb5IvB_K_t9ffS0zudOebvRkI0pzAAGmSXh48gSAbzb8K5R-UWDKtooNqS6_MJNjUHzPvBGdN7HDUOFhujBEAN5kCx_ZgUVTo2_pBBIOgxoCPz3vf5wA8O7J9yjebmCF1yslzGrNGVwklQ484NBA2Kwy4riNahH-bVaT-6Jlj3fQUw',
        'Accept'  => 'application/json'],
        'json'    => [
           'name' => $request->name,
           'type' => $request->type,
           'speed' => $request->speed,
           'color' => $request->color]
        ]);  
    
            return $helicopters;



        $product->update($request->all());
  
        return redirect()->route('helicopter.index')
                        ->with('success','helicopter updated successfully');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Helicopter  $helicopter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Helicopter $helicopter)
    {
        $helicopter->delete();
  
        return redirect()->route('helicopter.index')
                        ->with('success','helicopter deleted successfully');
    }
}
