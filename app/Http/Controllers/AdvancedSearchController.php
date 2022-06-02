<?php

namespace App\Http\Controllers;

use App\Models\Adress;
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

      $users =  User::where('firstname' ,'like' ,$new."%")->orwhere('lastname','like' , $new."%")->orwhere('companyname' ,'like' , $new."%")->get()  ;
      $cat  = Category::where('label' ,'like', $new."%")->get() ;
      $sub =    SubCategory::where('label' ,'like' , $new."%" )->get();
      $serv = Service::where('label' ,'like', $new."%")->get() ;

        if($cat->toArray())
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
                                     "id" => $vusers->id





                      ] ;


                            }

                    }
                }

            }
        }

      if($users->toArray())
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
                                        "id" => $u->id
                                   ]  ;
                    }
                //}

        }

      }

        if($sub->toArray())
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
                                            "id" => $us->id
                                            //"Service" => $sv


                            ];
                    } }
        }




      if($serv->toArray())
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
                                            "id" => $us->id

                                    ];

                                      }}
                }





        $res[] = [] ;






      $getIDFromUsers = User::get('id');

      $finalQuery = $users->union($result);
      return response()->json($result );

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





public function advsearch(Request $request , $label )
{  // $users = new User ;

    $res[] = [] ;
    $word = $request->label ;
    $new = str_replace("%20", " ", $label);
    $users =  User::where('firstname' ,'like' ,$new."%")->orwhere('lastname','like' , $new."%")->orwhere('companyname' ,'like' , $new."%")->first();
    $cat  = Category::where('label' ,'like', $new."%")->first() ;
    $sub =    SubCategory::where('label' ,'like' , $new."%" )->first();
    //$sub =    SubCategory::where('label' ,'like' , $new."%" )->get()->toArray();
    $serv = Service::where('label' ,'like', $new."%")->first();

    if($users)
    {
        $categoriesusers = null ;
            foreach($users->services as $uuss)
            {  $serv[] = $uuss->label ;
               if($categoriesusers !== null )
               { if(!(in_array( $uuss->subcategory->category->label , $categoriesusers)) )
                     {$categoriesusers[] = $uuss->subcategory->category->label ;}
                } else{$categoriesusers[] = $uuss->subcategory->category->label ;}
            }
              $list[] = [
                     "firstname" => $users->firstname ,
                     "lastname" => $users->lastname ,
                     "companyname" => $users->companyname ,
                     "role" => $users->role ,
                     "bio" => $users->bio ,
                     "logo" => $users->logo ,
                     "adresse" => $users->adresse ,
                     "email" => $users->email ,
                     "service" => $serv,
                     "category" => $categoriesusers] ;


            return response()->json( ["Result" => $list]  );
    }
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
                    "firstname" => $u->firstname ,
                    "lastname" => $u->lastname ,
                    "companyname" => $u->companyname ,
                    "email" => $u->email ,
                    "role" => $u->role ,
                    "logo" => $u->logo ,
                    "bio" => $u->bio ,
                    "adresse" => $u->adresse ,
                    "services" => $uu   ,
                    "category" => $servs->subcategory->category->label] ;



        }
        return response()->json(["Result" => $list] );
       }
       else { return response()->json(["Result" => 'No Content'] );}


    }
    if($sub)
    {
       ; $listeuserss = null ;
        $sousdeservices = $sub->services  ;
        foreach ($sousdeservices as $ss)
        {   $subb = null ; $catt = null ;
            foreach($ss->users as $v) {
             //  $listeuserss[] = $v ;  dd()


               if($listeuserss !== null )
               {   /*$key = array_search($v->email, array_column($listeuserss, 'email') );
                 if(  (array_search($v->email, array_column($listeuserss, 'email'))) )
                 { }
                 else{$listeuserss[] = $v; dump( array_column($listeuserss, 'email') , $v->email) ;}

                 dd($key);*/
                 if(!(in_array( $v->email ,  array_column($listeuserss, 'email')) ))
                 $listeuserss[] = $v;
                 }
                 else{ $listeuserss[] = $v;}


           }}

                foreach($listeuserss as $l)
                {
                    foreach($v->UserServices as $vus)
                    {$subb = null ; $catt = null ; $services=null ;
                           $services[]=  $vus->label ;
                           if($subb !== $vus->subcategory->label) {
                                $subb[] = $vus->subcategory->label ;
                            }
                           if($catt !== $vus->subcategory->category->label) {
                               $catt[] = $vus->subcategory->category->label ;
                            }

                         //  dd($subb) ;

                    }

                    $uu = null ;

             foreach ($l->services as $servs)
             {  if($servs->label !== $uu)
                 {  $uu[] = $servs->label ;}
             }
                    $listusers[] = [
                        "firstname"=> $l->firstname ,
                        "lastname"=> $l->lastname ,
                        "companyname"=> $l->companyname ,
                        "email"=> $l->email ,
                        "bio"=> $l->bio ,
                        "role"=> $l->role ,
                        "logo"=> $l->logo ,
                        "adresse"=> $l->adresse ,
                       "services" => $uu,
                        "category"=>$servs->subcategory->category->label ,
                       // "subcategory"=>$servs->subcategory->label  ,




                       ] ;
     $services = null ; $subb = null ;
                }


           // dd($services) ;


          return response()->json( ["Result" => $listusers] );
       // dd($listusers) ;


    }
    if($serv)
    {
        $userservice = UserService::where('service_id' , $serv->id)->get("user_id")  ;
        foreach ($userservice as $us )
       {
           $user = User::find($us->user_id) ;
         //  if(!($listuser == $user))
          // {
               $listuser[] = [
                        "firstname"=>$user->firstname ,
                        "lastname"=>$user->lastname ,
                        "email"=>$user->email ,
                        "role"=>$user->role ,
                        "role"=>$user->logo ,
                        "companyname"=>$user->username ,
                        "adresse"=>$user->adresse ,
                        "bio"=>$user->bio ,
                        "category"=>$serv->subcategory->category->label ,
                        //"subcategory"=>$serv->subcategory->label ,
                        "service"=>$serv->label ,



            ] ;
        //}



    }
    // dump("serv",true , $listuser  ) ;
    return response()->json(["Result" => $listuser] );
    }

}




public function advsearch2(Request $request , $label , $location)
{  // $users = new User ;

    $res[] = [] ;
    $word = $request->label ;
    $new = str_replace("%20", " ", $label);
   // $users =  User::where('firstname' ,'like' ,$new."%")->orwhere('lastname','like' , $new."%")->orwhere('companyname' ,'like' , $new."%")->first();
    $cat  = Category::where('label' ,'like', $new."%")->get()->first();
    $sub =    SubCategory::where('label' ,'like' , $new."%" )->first();
    //$sub =    SubCategory::where('label' ,'like' , $new."%" )->get()->toArray();
    $serv = Service::where('label' ,'like', $new."%")->first();

  /*  $adress = User::where('firstname' ,'like' ,$new."%")
                ->orwhere('lastname','like' , $new."%")
                ->orwhere('companyname' ,'like' , $new."%")
                ->where(function($q) use($location){
                    $q->where('adresses.adress' , $location)
                    ->orWhere('adresses.ville' , $location)
                    ->orWhere('adresses.code', $location)
                    ->orWhere('adresses.province', $location);
                })->get();

*/
     $users = Adress::join('users', 'users.adress_id', '=', 'adresses.id')
                 ->where('users.firstname' ,'like' ,$new."%")
                 ->orwhere('users.lastname','like' , $new."%")
                 ->orwhere('users.companyname' ,'like' , $new."%")
                ->where(function($q) use($location){
                    $q->where('adresses.adress' , $location)
                    ->orWhere('adresses.city' , $location)
                    ->orWhere('adresses.code', $location);
                   // ->orWhere('adresses.province_id', $location);
                })
                 /*->where('adresses.adress' , $location)
                    ->orWhere('adresses.city' , $location)
                    ->orWhere('adresses.code', $location)
                    ->orWhere('adresses.province_id', $location)
                   // ->toSql() ;*/
                  ->get(['users.*', 'adresses.*']);
  //  dd($adress) ;
    if($users->toArray())
    {
            foreach($users->UserServices as $uuss)
            {
                    $list[] = [
                     "firstname" => $users->firstname ,
                     "lastname" => $users->lastname ,
                     "companyname" => $users->companyname ,
                     "role" => $users->role ,
                     "bio" => $users->bio ,
                     "logo" => $users->logo ,
                     "adresse" => $users->adresse ,
                     "email" => $users->email ,
                     "service" => $uuss->label ,
                     "category" => $uuss->subcategory->category->label] ;

            }
            return response()->json( ["Result" => $list] );
    }
    if($cat)
    {
        foreach ($cat->Subcategories as $subc)
        {
            foreach($subc->services as $servicec)
            {
                    foreach($servicec->users as $catc)
                    {
                        $listusers[] = $catc ;
                    }
            }
        }
        $list = null ; $usersss = null ;
        foreach ($listusers as $u)
        {       $uadress = Adress::find($u->adress_id) ;
              // trim($uadress->city, " ");
              /* $uadress = Adress::where('id' ,$u->adress_id) ;*/

               // ->orWhere('adresses.province_id', $location);
                   // dump($uadress->city) ;

                 $uu = null ;
                 foreach ($u->UserServices as $servs)
                    {  if($servs->label !== $uu)
                        {  $uu[] = $servs->label ;}
                    }
                    if($uadress->city === $location || $uadress->adress === $location || $uadress->province_id === $location){



                        $list[] = [

                        "firstname" => $u->firstname ,
                        "lastname" => $u->lastname ,
                        "companyname" => $u->companyname ,
                        "email" => $u->email ,
                        "role" => $u->role ,
                        "logo" => $u->logo ,
                        "bio" => $u->bio ,
                        "adresse" => $u->adress ,
                        "services" => $uu   ,
                        "category" => $servs->subcategory->category->label] ;
                          $usersss[] = $u->username ; ;} else{  ;}

        }      $uu[] = null  ;

        for ($i = 1; $i <= count($list); $i++) {

        }
        return response()->json(["Result" => $list] );
    }
    if($sub)
    {
        $subb = null ; $catt = null ;
        $sousdeservices = $sub->services  ;
        foreach ($sousdeservices as $ss)
        {   foreach($ss->users as $v) {
            $uadress = Adress::find($v->adress_id) ;
            foreach($v->UserServices as $vus)
            {
                   $services[]=  $vus->label ;
                   if($subb !== $vus->subcategory->label) { $subb[] = $vus->subcategory->label ;}
                   if($catt !== $vus->subcategory->category->label) { $catt[] = $vus->subcategory->category->label ;}

                 //  dd($subb) ;

            }


            if($uadress->city === $location || $uadress->adress === $location || $uadress->province_id === $location){
             $listusers[] = [
                                "firstname"=> $v->firstname ,
                                "lastname"=> $v->lastname ,
                                "companyname"=> $v->companyname ,
                                "email"=> $v->email ,
                                "bio"=> $v->bio ,
                                "role"=> $v->role ,
                                "logo"=> $v->logo ,
                                "adresse"=> $v->adresse ,
                               "service" => $services,
                                "category"=>$catt ,
                             //  "subcategory"=>$subb ,




                               ] ;}
             $services = null ; $subb = null ;
            }
           // dd($services) ;

          }
          return response()->json( ["Result" => $listusers] );
       // dd($listusers) ;


    }
    if($serv)
    {
        $userservice = UserService::where('service_id' , $serv->id)->get("user_id")  ;
        foreach ($userservice as $us )
       {
           $user = User::find($us->user_id) ;
           $uadress = Adress::find($user->adress_id) ;
         //  if(!($listuser == $user))
          // {
            if($uadress->city === $location || $uadress->adress === $location || $uadress->province_id === $location){
               $listuser[] = [
                        "firstname"=>$user->firstname ,
                        "lastname"=>$user->lastname ,
                        "email"=>$user->email ,
                        "role"=>$user->role ,
                        "role"=>$user->logo ,
                        "companyname"=>$user->username ,
                        "adresse"=>$user->adresse ,
                        "bio"=>$user->bio ,
                        "category"=>$serv->subcategory->category->label ,
                        //"subcategory"=>$serv->subcategory->label ,
                        "service"=>$serv->label ,



            ] ;}
        //}



    }
    // dump("serv",true , $listuser  ) ;
    return response()->json(["Result" => $listuser] );
    }

}
}
