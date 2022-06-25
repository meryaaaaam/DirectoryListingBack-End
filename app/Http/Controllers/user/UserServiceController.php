<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\SubCategory;
use App\Models\User;
use App\Models\UserService;
use Illuminate\Http\Request;

class UserServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        $userid = $request->user_id;
        $services = $request->services ;

        foreach($services as $s)
        {
            $service = Service::where("label" , $s)->first() ;
            $userserv = UserService::create(["user_id"=>$userid , "service_id"=>$service->id]) ;

        }
       // $respose = UserService::all();
        if($userserv->save() && $userserv->refresh()){
            return response()->json(["message" => "profile a été modifier avec success."]);
         } else{
            return response()->json(["message" => "something went wrong"]);
         }

      // return response()->json($respose , 200 );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $userserv = UserService::where("user_id" ,$id)->get() ;
      foreach($userserv as $s)
     {

        $services = Service::find($s->service_id);
       // dd($services) ;
        $res[] =["label"=> $services->label];


    }
      return response()->json($res );
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



    public function userservice()

    {
        $service = null ;
        $user = User::find(1);
        $services = Service::find(1) ;
        $sous = SubCategory::find(1) ;
        $sub = $services->subcategory;

        return response()->json($sub);


    }

}
