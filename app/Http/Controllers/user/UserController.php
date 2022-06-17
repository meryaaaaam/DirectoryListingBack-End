<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Adress as Address;
use App\Models\Province;
use App\Models\Service;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\NotifMail;
use App\Mail\NotifMailrefus;
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
       {
        $user = User::find($id) ;
        $adress = Address::find( $user->adress_id );



        $province = Province::find($adress->province_id);

        $rep = [

            "id"=>  $user->id,
            "username"=>  $user->username,
            "firstname"=>  $user->firstname,
            "lastname"=>  $user->lastname,
            "companyname"=>  $user->companyname,
            "email"=>  $user->email,
            "phone"=>  $user->phone,
            "website"=>  $user->website,
            "bio"=>  $user->bio,
            "logo"=>  $user->logo,
            "CV"=>  $user->CV,
            "language"=>  $user->language,
            "NEQ"=>  $user->NEQ,
            "role"=>  $user->role,
            "isActive"=>  $user->isActive,
            "note"=>  $user->note,
            "status"=>  $user->status,
            "isEmailActive"=>  $user->isEmailActive,
            "isAvailable"=>  $user->isAvailable,
            "IACNC"=>  $user->IACNC,
            "LinkedIn"=>  $user->LinkedIn,
            "Line_type"=>  $user->Line_type,
            "adress"=>  $adress->adress,
            "city"=>  $adress->city,
            "code"=>  $adress->code,
            "province_id"=>  $province->name,






        ] ;

        return response()->json($rep) ;




    }
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



  /*  public function uploadimage(Request $request )
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
    }*/

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



    public function ActiveUser2(Request $request, $id )
    {

        $user = User::findOrFail($id) ;
      //  dd($user->value('id')) ;
        $user->update($request->all(['isActive' , 'status']));

       if( $user->update($request->all(['isActive'   , 'status']))){
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
        $user->update($request->all());
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
                'province_id' => $province_id ] ;

        $province = Province::find($request->province_id) ;

        if(!$adress || !$city || !$code || !$province) {
        return response()->json([
           "message" => "Remplir votre adresse.",
           "data" => ""]);}


        else{
            $user = User::findOrFail($id) ;
            $data = $user->adress ;

            if($user->adress_id)
            {
                $adresse= Address::find( $user->adress_id) ;
                $adresse->update([  "adress"=>  $request->adress,
                                "city"=>  $request->city,
                                "code"=>  $request->code,
                                "province_id"=>  $request->province_id,
                ]);
            }
            else { $adresse= Address::create( $request->all()) ;   $user->update([  "adress_id"=>  $adresse->id]);}

            $adress1 = $request->adress ;
            $city1 = $request->city ;
            $code1 = $request->code ;
            $province1 = $province->name ;
            $adr = $adress1 ." ". $city1 ." ". $code1 ." ". $city1 ." ". $province1 ;

            $user->update([  "adresse"=>  $adr]);
            $user->update($request->all()  );

            return response()->json([     "message" => "votre profile a été mise à jour avec succes.", "data" => [$user , $adresse]]);
            }
        }







    public function getAdress(Request $request, $id )
{
        $user = User::find($id) ;
        $adress = Address::find( $user->adress_id );

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


public function getAllPro()
{
    $users = User::where('role'  ,'Pro')->get() ;
    foreach ($users as $u )
    {
        $res[] = [ "id" => $u->id ,
                 "name" => $u->firstname." ".$u->lastname] ;
    }
    return response()->json( ["Result" => $res] ) ;
}



public function getAllCompany()
{
    $users = User::where('role' ,'Company')->get() ;
    foreach ($users as $u )
    {
        $res[] = [ "id" => $u->id ,
                 "name" => $u->companyname ] ;
    }
    return response()->json( ["Result" => $res] ) ;
}





public function getAllActifUsers()
{
   // $users = User::where('role' ,'!=' ,'Admin')->where('isActive' , true)->get() ;
    $users = User::where('role' ,'!=' ,'Admin')->where('status' , 'approuved')->get() ;
    return response()->json( $users ) ;
}


public function getAllPredingUsers()
{
    $users = User::where('role' ,'!=' ,'Admin')->where('status' , 'rejected')->get() ;
    return response()->json( $users ) ;
}



public function updateProfile(Request $request, $id)
{
    $user = User::find($id) ;
     // La validation de données
/*$this->validate($request, [

    'phone' => 'max:100',
    'city' => 'max:100',
    'address' => 'max:100',
    'state' => 'max:100',
    'code' => 'max:100',
    'email' => 'email',
   // 'password' => 'required|min:8'
]);*/


if($user->address_id)
{   $address = Address::find($user->address_id) ;
  //  dd($address);
    $user->update( $request->all() );

    $address->update([
        "address" => $request->address,
        "city" => $request->city,
        "code" => $request->code,
        "state" => $request->state,

       // "password" => bcrypt($request->password)
    ]);


}
else {
   $address = Address::create([
        "address" => $request->address,
        "city" => $request->city,
        "code" => $request->code,
        "state" => $request->state,

       // "password" => bcrypt($request->password)
    ]) ;
    if ($user->role == 'Pro')
    {$user->update([
        "username" => $request->username,
        "firtname" => $request->firstname,
        "lastname" => $request->lastname,
        "phone" => $request->phone,
        "email" => $request->email,
        "address_id" => $address->id,
        "website" => $request->website,
        "link" => $request->link,
        "language" => $request->link,
        // "password" => bcrypt($request->password)
    ]);}
    elseif ($user->role == 'Company')
    {

    }
    else
    {$user->update([
        "username" => $request->username,
        "firtname" => $request->firstname,
        "lastname" => $request->lastname,
        "phone" => $request->phone,
        "email" => $request->email,

       // "password" => bcrypt($request->password)
    ]);}



}
// On modifie les informations de l'utilisateur



// On retourne la réponse JSON
return response()->json(["user" => $user , "address"=> $address]);
}

public function note($id , Request $Req)
{

    $user = User::find($id)  ;
    $user->update(["bio" => $Req->note]) ;

    return response()->json($user);
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



}
