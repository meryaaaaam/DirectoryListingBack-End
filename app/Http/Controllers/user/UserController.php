<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
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
        dd($user) ;
        $user->update($request->all(['isActive']));

       if( $user->update($request->all(['isActive']))){
           return response()->json([

        "message" => "user updated successfully.",
         "data" => $user]);}
       else
       {  return response()->json();
        }
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
