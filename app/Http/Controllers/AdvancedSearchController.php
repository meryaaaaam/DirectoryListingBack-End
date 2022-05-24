<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Service;
use App\Models\SubCategory;
use App\Models\User;
use App\Models\UserService;
use Illuminate\Http\Request;

class AdvancedSearchController extends Controller
{


    public function search()
    {   $res[] = [] ;
        $users = User::all() ;
        $cat = Category::all() ;
        $sub = SubCategory::all() ;
        $service = Service::all() ;


        foreach($users as $u)
        {
            $res[] = [
                'firstaname' => $u->firstName,
                'lastname' => $u->lastname,
                'companyname' => $u->companyname,
                'email' => $u->email,


            ];
        }

        foreach($cat as $u)
        {
            $res[] = [
                'label' => $u->label,


            ];
        }

        foreach($sub as $u)
        {
            $res[] = [
                'label' => $u->label,


            ];
        }


        foreach($service as $u)
        {
            $res[] = [
                'label' => $u->label,


            ];
        }

        return response()->json( ["result" => $res ] );
    }

    public function Search5(Request $request ) {

        $word = $request->label ;
        $result[] =[] ;
        $users =  User::where('firstname' ,'like' ,$word."%")->orwhere('lastname','like' , $word."%")->orwhere('companyname' ,'like' , $word."%")->get() ;
        $cat  = Category::where('label' ,'like', $word."%")->get() ;
        $sub =    SubCategory::where('label' ,'like' , $word."%" )->get();
        $serv = Service::where('label' ,'like', $word."%")->get() ;
      //  $cat = $cat->label ;
         //   dd($cat) ;
            foreach ($cat as $c ) {
                 $result[] = ["label" => $c->label  ] ;
            }

            foreach ($sub as $c ) {
                $result[] = ["label" => $c->label  ] ;
           }

           foreach ($serv as $c ) {
            $result[] = ["label" => $c->label  ] ;
       }

            foreach ($users as $u )
            {   if(! $u->role == 'Admin')
               { if ($u->firstname)        {$result[] = ["label" => $u->firstname  ] ;}
                else if($u->lastname)     {$result[] = ["label" => $u->lastname  ] ;}
                else if($u->companyname)  {$result[] = ["label" => $u->companyname  ] ;}
            }
            }






            //$result[] = $user ;

          //  dd($result) ;
       // $finalQuery = $users->union($cat)->union($sub)->union($serv)->union($users);

                   return response()->json(['Result' => $result ]);

        }

   // public
    public function Search4(Request $request ) {

        $word = $request->label ;

        $users =  User::where('firstname' ,'like' ,$word."%")->orwhere('lastname','like' , $word."%")->orwhere('companyname' ,'like' , $word."%")->get() ;
        $cat  = Category::where('label' ,'like', $word."%")->get() ;
        $sub =    SubCategory::where('label' ,'like' , $word."%" )->get();
        $serv = Service::where('label' ,'like', $word."%")->get() ;

        $finalQuery = $users->union($cat)->union($sub)->union($serv);

                   return response()->json(['Result' => $finalQuery ]);

        }




  public function Search22(Request $request ) {

       $word = $request->label ;
       $new = str_replace("%20", " ", $word);

       //dd($new) ;

        $result1[] = [] ;
        $result2[] = [] ;
        $result3[] = [] ;
        $result4[] = [] ;
        $word = $request->all(['label']) ;
     // $res = Service::where("label","like","%".$label."%")->get();

      $users =  User::where('firstname' ,'like' ,$new."%")->orwhere('lastname','like' , $new."%")->orwhere('companyname' ,'like' , $new."%")->get() ;
      $cat  = Category::where('label' ,'like', $new."%")->get() ;
      $sub =    SubCategory::where('label' ,'like' , $new."%" )->get();
      $serv = Service::where('label' ,'like', $new."%")->get() ;

        if($cat)
        {
            foreach($cat as $c)
            {  // $s = SubCategory::where('label' ,'like' , $request->label."%" )->get();
                foreach($c->Subcategories as $value) {
                    $values = $value->label ;
                    foreach($value->services as $vs ) {
                        $servicesvalues = $vs->label ;
                            foreach ($vs->users as $Usv) {
                                $vusers = $Usv ;
                                $result[] = [
                                    "category" => $c->label ,
                                     "SubCategory"=>$values,
                                     "services"=>$servicesvalues,
                                     "firstname" =>$vusers->firstname ,
                                     "lastname" =>$vusers->lastname ,
                                     "companyname" =>$vusers->companyname ,
                                     "email" =>$vusers->email ,
                                     "bio" =>$vusers->bio ,
                                     "logo" =>   $vusers->logo,
                                     "role" =>   $vusers->role,
                                     "adresse" =>   $vusers->adresse,





                      ] ;


                            }

                    }
                }

            }
        }

      if($users)
      {
          foreach($users  as $u)
       {
                        foreach($u->UserServices as $us)
                    {
                        $u = User::find($us->pivot->user_id)  ;
                      //  foreach($u as $uss)
                   // {
                        $result[] = [
                                        "Category" =>  SubCategory::find($us->subcategory_id)->category->label,
                                        "SuCategory" =>  SubCategory::find($us->subcategory_id)->label,
                                        //"SubCategory" =>  $us->subcategory_id,
                                        "Service" =>  $us->label,
                                        "firstname" =>  $u->firstname,
                                        "lastname" =>  $u->firstname,
                                        "companyname" =>  $u->companyname,
                                        "email" =>   $u->email,
                                        "bio" =>   $u->bio,
                                        "logo" =>   $u->logo,
                                        "role" =>   $u->role,
                                        "adresse" =>   $u->adresse,
                                   ]  ;
                    }
                //}

        }

      }

        if($sub)
        {       foreach ($sub as $s) {
                    $cat = $s->category ;
                    foreach($s->services as $sv )
                    {       foreach($sv->users as $us)

                            $result[] = [
                                            "category"=> $cat->label ,
                                           // "subCategory"=> $s->label ,
                                            "services"=> $sv->label ,
                                            //"users"=> $users ,
                                            "firstname" =>  $us->firstname,
                                            "lastname" =>  $us->firstname,
                                            "companyname" =>  $us->companyname,
                                            "email" =>   $us->email,
                                            "bio" =>   $us->bio,
                                            "logo" =>   $us->logo,
                                            "role" =>   $us->role,
                                            "adresse" =>   $us->adresse,
                                            //"Service" => $sv


                            ];
                    } }
        }




      if($serv)
                {
                    foreach ($serv as $s) {
                        $servuser = UserService::where('service_id' ,$s->id)->get('user_id') ;


                        $uss = User::find($servuser) ;
                        foreach ($uss as $us) {
//dd($servuser->users) ;
                    $result[] = [  "Category"=> $s->subcategory->category->label ,
                                    "SuCategoryID" => $s->subcategory->id ,
                                    "SubCategory" => $s->subCategory->label ,
                                    "Service" => $s->label,
                                    "ServiceID" => $s->id,
                                    "firstname" =>  $us->firstname,
                                            "lastname" =>  $us->firstname,
                                            "companyname" =>  $us->companyname,
                                            "email" =>   $us->email,
                                            "bio" =>   $us->bio,
                                            "logo" =>   $us->logo,
                                            "role" =>   $us->rolo,
                                            "adresse" =>   $us->adresse,

                                    ];

                                      }}
                }












      $getIDFromUsers = User::get('id');

      $finalQuery = $users->union($result);
      return response()->json($finalQuery );

    //($getIDFromUser) ;


  }





  public function Search3(Request $request ) {

    $word = $request->label ;
    $new = str_replace("%20", " ", $word);

    //dd($new) ;

     $result1[] = [] ;
     $result2[] = [] ;
     $result3[] = [] ;
     $result4[] = [] ;
     $word = $request->all(['label']) ;
  // $res = Service::where("label","like","%".$label."%")->get();

   $users =  User::where('firstname' ,'like' ,$new."%")->orwhere('lastname','like' , $new."%")->orwhere('companyname' ,'like' , $new."%")->get() ;
   $cat  = Category::where('label' ,'like', $new."%")->get() ;
   $sub =    SubCategory::where('label' ,'like' , $new."%" )->get();
   $serv = Service::where('label' ,'like', $new."%")->get() ;

     if($cat)
     {
         foreach($cat as $c)
         {  // $s = SubCategory::where('label' ,'like' , $request->label."%" )->get();
             foreach($c->Subcategories as $value) {
                 $values = $value->label ;
                 foreach($value->services as $vs ) {
                     $servicesvalues = $vs->label ;
                         foreach ($vs->users as $Usv) {
                             $vusers = $Usv ;
                             $result4[] = [
                                 "category" => $c->label ,
                                  "SubCategory"=>$values,
                                  "services"=>$servicesvalues,
                                  "users" =>$vusers ,


                   ] ;


                         }

                 }
             }

         }
     }

   if($users)
   {
       foreach($users  as $u)
    {
                     foreach($u->UserServices as $us)
                 {
                     $result1[] = [
                                     "Category" =>  SubCategory::find($us->subcategory_id)->category->label,
                                     "SuCategory" =>  SubCategory::find($us->subcategory_id)->label,
                                     //"SubCategory" =>  $us->subcategory_id,
                                     "Service" =>  $us->label,
                                     "users" =>  User::find($us->pivot->user_id),
                                ]  ;
                 }

     }

   }

     if($sub)
     {       foreach ($sub as $s) {
                 $cat = $s->category ;
                 foreach($s->services as $sv )
                 {       foreach($sv->users as $us)
                         $users[] = $us ;
                         $result2[] = [
                                         "category"=> $cat->label ,
                                         "subCategory"=> $s->label ,
                                         "services"=> $sv->label ,
                                         "users"=> $users ,
                                         //"Service" => $sv


                         ];
                 }}
     }




   if($serv)
             {
                 foreach ($serv as $s) {
                 $result3[] = [  "Category"=> $s->subcategory->category->label ,
                                 "SuCategoryID" => $s->subcategory->id ,
                                 "SubCategory" => $s->subCategory->label ,
                                 "Service" => $s->label,
                                 "ServiceID" => $s->id,
                                 "users" => UserService::where('service_id' ,$s->id)->get('user_id')
                                 ];

                                   }
             }












   $getIDFromUsers = User::get('id');

   $finalQuery = $users->union($result1)->union($result2)->union($result3);
   return response()->json(['result' => $finalQuery ]);

 //($getIDFromUser) ;


}



public function searchByLabel()
{
    $users =User::All() ; $cat= Category::All() ; $sub = SubCategory::All() ; $serv = Service::All();
    foreach ($cat as $c ) {
       $result[] = ["label" => $c->label  ] ;
  }

  foreach ($sub as $c ) {
      $result[] = ["label" => $c->label  ] ;
 }

 foreach ($serv as $c ) {
  $result[] = ["label" => $c->label  ] ;
}

  foreach ($users as $u )
  {


   if(! ($u->role == 'Admin'))
     {   if($u->firstname)
       {  $result[] = ["label" => $u->firstname  ] ;}
       elseif ($u->lastname)
         {$result[] = ["label" => $u->lastname  ] ;}
       elseif($u->companyname)
         {$result[] = ["label" => $u->companyname  ] ;}
  }
  }






  //$result[] = $user ;

//  dd($result) ;
// $finalQuery = $users->union($cat)->union($sub)->union($serv)->union($users);

         return response()->json(['Result' => $result ]);
}

}
