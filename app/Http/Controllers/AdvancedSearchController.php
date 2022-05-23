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

   // public
    public function Search(Request $request ) {

        $word = $request->label ;

        $users =  User::where('firstname' ,'like' ,$word."%")->orwhere('lastname','like' , $word."%")->orwhere('companyname' ,'like' , $word."%")->get() ;
        $cat  = Category::where('label' ,'like', $word."%")->get() ;
        $sub =    SubCategory::where('label' ,'like' , $word."%" )->get();
        $serv = Service::where('label' ,'like', $word."%")->get() ;

        $finalQuery = $users->union($cat)->union($sub)->union($serv);

                   return response()->json(['Result' => $finalQuery ]);

        }




  public function Search2(Request $request ) {

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








}
