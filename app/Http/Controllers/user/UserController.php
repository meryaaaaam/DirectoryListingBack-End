<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Mail\NotifMail;
use App\Mail\NotifMailrefus;
use App\Models\Adress;
use App\Models\Province;
use App\Models\Service;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

    //File Upload Function
public function uploadimage(Request $request,$id)
{
    $user = User::find($id) ;
  //check file
  if ($request->hasFile('img'))
  {
    $filenameWithExt = $request->file('img')->getClientOriginalName();
    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
    $extension = $request->file('img')->getClientOriginalExtension();
    $fileNameToStore= $filename.'_'.time().'.'.$extension;
    $path = $request->file('img')->storeAs('public/image', $fileNameToStore);
    $user->logo= $fileNameToStore;
    
   }
   if($user->save()){
    return response()->json(["message" => "image saved succesfully"]);
   } else{
    return response()->json(["message" => "something went wrong"]);
   }
    
        // // $file      = $request->file('image');
        // // Get filename with the extension
        // $filenameWithExt = $request->file('img')->getClientOriginalName();
        
        // // $filename  = $file->getClientOriginalName();
        // // Get just filename
        // $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        // //$extension = $file->getClientOriginalExtension();
        // // Get just ext
        // $extension = $request->file('img')->getClientOriginalExtension();
        
        // //$picture   = date('His').'-'.$filename;
        // // Filename to store
        // $fileNameToStore= $filename.'_'.time().'.'.$extension;
        // // //move image to public/img folder
        // // $file->move(public_path('img'), $picture);
        //  // Upload Image
        //  $path = $request->file('img')->storeAs('public/img', $fileNameToStore);
        //  $user->logo=$fileNameToStore;
        // return response()->json(["message" => "Image Uploaded Succesfully"]);
  
//   else
//   {
//     $fileNameToStore = 'nocontent.jpg';
//         return response()->json(["message" => "Select image first."]);
//   }
}


    // public function uploadimage(Request $request )
    // {
    //     $requests = $request->all() ;
    //     $user = User::findOrFail( auth()->user()->id) ;
    //     $photo = $user->photo ;
    //      // La validation de données


    // // On modifie les informations de l'utilisateur
    // $user->update($requests);


    // // On retourne la réponse JSON
    // return response()->json([

    // "message" => "image updated successfully.",
    // "data" => $user]);
    // }

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

    // Request $request, $id 
   

    public function ActiveUser(Request $request, $id)
    {
      
        $user = User::findOrFail($id) ;
        // dd($user->value('id')) ;
        $user->update($request->all(['isActive']));
        
        if( $user->update($request->all(['isActive']))){
             if ($user->isActive == 0){
                Mail::to($user->email)->send(new NotifMailrefus());
             }
             if($user->isActive == 1){
              Mail::to($user->email)->send(new NotifMail());
            }
            return response()->json([

         "message" => "user updated successfully.",
          "data" => $user]);}
        else
        {  

            return response()->json();
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

public function getAllusers()
{
    $users = User::where('role' ,'!=' ,'Admin')->get() ;
    return response()->json( $users ) ;
}




public function getAllActifUsers()
{
    $users = User::where('role' ,'!=' ,'Admin')->where('isActive' , true)->get() ;
    return response()->json( $users ) ;
}


public function getAllPredingUsers()
{
    $users = User::where('role' ,'!=' ,'Admin')->where('isActive' , false)->get() ;
    return response()->json( $users ) ;
}
}
