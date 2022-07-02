<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
        return response()->json($services);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $respose = Service::create($request->all());
        return response()->json($respose , 200 );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $respose = Service::find($id);

        return response()->json($respose);
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
        $service = Service::find($id);
        $requests = $request->all() ;
        $respose = $service->update($requests);


        return response()->json($respose);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $respose = Service::find($id);
        return response()->json($respose);
    }


    public function search(Request $request  ) {
        $label = $request->label ;
        $res = Service::where("label","like","%".$label."%")->get();



        return response()->json(

             $res);
    }


    public function searchbysub(Request $request)
    {
     
        $sub = $request->label ;
 
         foreach($sub as $s)
         {
              $su = SubCategory::where('label' ,$s)->first();
              $serv = Service::where('subcategory_id',$su->id)->get('label');
             $result[] = $serv ;
         }

     return response()->json( $result);
    //return response()->json( $sub);

        }
    //     if($result)
    //   { return response()->json( $result);}
    //   else
    //   { return response()->json( ["message" => "empty"]);}
    //   // return response()->json( $sub);



    

    public function storeservices ()
    {}

}
