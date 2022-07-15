<?php

namespace App\Http\Controllers;

use App\Models\Adress;
use App\Models\Category;
use App\Models\Province;
use App\Models\Service;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Http\Request;

class provinceSearchController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        //
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
        //
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

    public function advsearch(Request $request , $label )
    {
        $i = $request->IACNC ;

        $new = str_replace("%20", " ", $label);
    $users =  User::where('firstname' ,'like' ,$new."%")->orwhere('lastname','like' , $new."%")->orwhere('companyname' ,'like' , $new."%")->first();
    $cat  = Category::where('label' ,'like', $new."%")->first() ;
    $sub =    SubCategory::where('label' ,'like' , $new."%" )->first();
    //$sub =    SubCategory::where('label' ,'like' , $new."%" )->get()->toArray();
    $serv = Service::where('label' ,'like', $new."%")->first();

    if($cat)
    { $listusers = null ;
        foreach ($cat->Subcategories as $subc)
        {
            foreach($subc->services as $servicec)
            {
                  foreach($servicec->users as $catc)
                    {
                        if($listusers !== null )
                       {
                        if(!(in_array( $catc->email ,  array_column($listusers, 'email')) ))
                        $listusers[] = $catc;
                           }
                           else{ $listusers[] = $catc;}


                    }


            }
        }
        
       


        $list = null ; $usersss = null ;
       if($listusers)
       { foreach ($listusers as $u)
        {
            $uu = null ;

             foreach ($u->services as $servs)
             {  if($servs->label !== $uu)
                 {  $uu[] = $servs->label ;}
             }

            $list[] = [
                "id" => $u->id ,
                "Active"=> $u->isActive ,
                "EA"=> $u->isEmailActive ,
                "username" => $u->username ,
                "firstname" => $u->firstname ,
                "lastname" => $u->lastname ,
                "companyname" => $u->companyname ,
                "IACNC" => $u->IACNC ,
                "email" => $u->email ,
                "adress_id" =>$u->adress_id,
                "role" => $u->role ,
                "logo" => "http://localhost:8000/storage/image/".$u->logo ,
                "bio" => $u->bio ,
                "adresse" => $u->adresse ,
                "services" => $uu   ,
                "category" => $servs->subcategory->category->label] ;
           
           
                $prov=explode(",", $request->province);
                foreach($prov as $p){
                    if(strpos($u->adresse,(string)$p)){
                $adresse=Adress::where('id',$u->adress_id)->get();
    
                //echo($adresse);
                foreach($adresse as $ad){
               // echo($ad->id);

                if($ad->id == $u->adresse){
                    $list[] = [
                        "id" => $u->id ,
                        "Active"=> $u->isActive ,
                        "EA"=> $u->isEmailActive ,
                        "username" => $u->username ,
                        "firstname" => $u->firstname ,
                        "lastname" => $u->lastname ,
                        "companyname" => $u->companyname ,
                        "IACNC" => $u->IACNC ,
                        "email" => $u->email ,
                        "adress_id" =>$u->adress_id,
                        "role" => $u->role ,
                        "logo" => "http://localhost:8000/storage/image/".$u->logo ,
                        "bio" => $u->bio ,
                        "adresse" => $u->adresse ,
                        "services" => $uu   ,
                        "category" => $servs->subcategory->category->label] ;
               }
               
            }
            
            
        }
        
            }
            
             
        }
        return response()->json(["Results" => $list]);
       
        //return response()->json(["Results" => $list] );   
        //   else{
        //     return response()->json(["Results" => $list] );
        //   }
         
      }

      
        
    }
}

    }
//     elseif($request->province) // dd($list);
//     {
//      $pro=explode(",", $request->province);
     
// //dd($province);
// // foreach($province as $p){
// //for($i=0;$i<count($p);$i++){
// // $pro=strpos($u->adresse,(string)$p);
// //if($province[$i] == $u->adresse)
//  //for($i=0;$i<count($province);$i++){
//   //for($i=0;$i<count($province);$i++){
//   foreach($pro as $p){
//     $pr=Province::where('name',$p)->first();
//     $user=User::where('adresse','like','%'.$p.'%')->get();
    
//   //$strpro=implode($p);
//   //dd(count($province));
  
//   //dd($strpro);
//   //  if($u->adresse){
//   //    dd($u->adresse);
//   //  }
//     // $list[] = [
//     //   "id" => $u->id ,
//     //   "Active"=> $u->isActive ,
//     //   "EA"=> $u->isEmailActive ,
//     //   "username" => $u->username ,
//     //   "firstname" => $u->firstname ,
//     //   "lastname" => $u->lastname ,
//     //   "companyname" => $u->companyname ,
//     //   "IACNC" => $u->IACNC ,
//     //   "email" => $u->email ,
//     //   "role" => $u->role ,
//     //   "logo" => "http://localhost:8000/storage/image/".$u->logo ,
//     //   "bio" => $u->bio ,
//     //   "adresse" => $request->province,
//     //   "services" => $uu   ,
//     //   "category" => $servs->subcategory->category->label] ;
//     //$strpro=null;
//     }
//     return response()->json(["Result" => $user] );
//     $strpro=null;
    
   
//    //dd($i);
   
   
 
// }