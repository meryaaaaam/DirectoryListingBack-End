<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Adress;
use App\Models\Province;
use App\Models\Service;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::All() ;
        return response()->json($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (User::find($id))
       { return response()->json(User::find($id));}
       else
       { return response()->json(['message' => 'user not found  ']);}
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id )
    {
        $requests = $request->all() ;
        $requests = $request->all() ;
        $user = User::findOrFail($id) ;
        $user->update($request->all());
        return response()->json([

        "message" => "user updated successfully.",
        "data" => $user]);
    }



    public function uploadimage(Request $request )
    {
        $requests = $request->all() ;
        $user = User::findOrFail( auth()->user()->id) ;
        $photo = $user->photo ;
         // La validation de données


    // On modifie les informations de l'utilisateur
    $user->update($requests);


    // On retourne la réponse JSON
    return response()->json([

    "message" => "image updated successfully.",
    "data" => $user]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id) ;
        // On supprime l'utilisateur
        $user->delete();

        // On retourne la réponse JSON
        return response()->json();
    }

    public function passwordchange()
    {}



    public function ActiveUser(Request $request, $id )
    {

        $user = User::findOrFail($id) ;
      //  dd($user->value('id')) ;
        $user->update($request->all(['isActive']));

       if( $user->update($request->all(['isActive']))){
           return response()->json([

        "message" => "user updated successfully.",
         "data" => $user]);}
       else
       {  return response()->json();
        }
    }



    public function isActive(Request $request, $id )
    {

        $isActive = $request->isActive ;
        $user = User::findOrFail($id) ;
        $user->update($$request->all());
        return response()->json([

        "message" => "user updated successfully.",
        "data" => $user]);
    }




    public function update2(Request $request, $id )
    {
        $requests = $request->all() ;
        $adress = $request->all(['adress']);
        $city = $request->all(['city']);

        $code = $request->all(['code']);
        $province_id = $request->all(['province_id']);

        $ad =   ['adress' => $adress,
        'city' => $city,
        'code' => $code ,
        'province_id' => $province_id

        ] ;

        $province = Province::find($request->province_id) ;
      //  dd($province->name);

        $user = User::findOrFail($id) ;
        $data = $user->adress ;
      //  $adr = $adress+","+$city + "," +",";




      if($user->adress_id)
      {
        $adresse= Adress::find( $user->adress_id) ;
        $adresse->update([  "adress"=>  $request->adress,
                          "city"=>  $request->city,
                          "code"=>  $request->code,
                          "province_id"=>  $request->province_id,


        ]);
      }
      else { $adresse= Adress::create( $request->all()) ;}

      $adress1 = $request->adress ;
      $city1 = $request->city ;
      $code1 = $request->code ;
      $province1 = $province->name ;
      $adr = $adress1 ." ". $city1 ." ". $code1 ." ". $city1 ." ". $province1 ;

        $user->update([  "adresse"=>  $adr]);
        $user->update($request->all()  );

        return response()->json([

        "message" => "user updated successfully.",
    "data" => [$user , $adresse]]);
    }







    public function getAdress(Request $request, $id )
{
        $user = User::find($id) ;
        $adress = Adress::find( $user->adress_id );

        $province = Province::find($adress->province_id);
      //  dd($adress) ;
       // $province = Province::find($)
       return response()->json([$user ,$adress ,$province ]) ;

}
}
