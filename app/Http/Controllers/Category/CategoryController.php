<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\Service;
use App\Models\SubCategory;
use App\Models\User;
use App\Models\UserService;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use League\CommonMark\Extension\Attributes\Node\Attributes;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = category::all();
        return response()->json($category);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $respose = category::create($request->all());
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
        $category = category::find($id);

        return response()->json($category);
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
        $c= category::findOrFail($id) ;
        $c->update($request->all());

        return response()->json($c, 200 , ['success' , 'done']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $c= category::findOrFail($id) ;
        $c->delete();

        return response()->json(['success' , 'Good'], 204  );
    }
    public function search($label) {
        return Category::where("label","like","%".$label."%")->get();
    }


    public function search2(Request $request) {
        $label = $request->label ;

      //  dd($label) ;
        return Category::where("label","like","%".$label."%")->get();
    }


    public function SearchByLabel(Request $request , $label )
    {
       //$category = category::where('label' ,$request->label)->first();
       $category = category::where('label' ,$label)->first();
       if($category)
       {$id = $category->id ;
          $sous = SubCategory::where('category_id' ,$id)->get('label');
          if($sous)
          {return response()->json( $sous ) ;}
          else
          //{return response()->json(['message' => 'NO CONTENT'],204);}
          {return response()->json(['message' => 'NO CONTENT']);}
          }


        else  return response()->json( ['message' => 'NO CONTENT']) ;


    }


    public function SearchAllByUsLabel(Request $request , $label  )
    {
        $data[] = [] ;
        $category[] = new category() ;
        $sous[] = new SubCategory() ;
        $serv[] = new Service() ;
        $userserv[] = new UserService() ;



        $category = category::where('label' ,$request->label)->first();
       if($category)
       {
           $id = $category->id ;
           $sous = SubCategory::where('category_id' ,$id)->get();
           foreach ($sous as $s)
           {

              $serv =  Service::where('subcategory_id' ,$s->id)->get();

                foreach ($serv as $sv)
                {
                //  dump($sv->label , $sv->id) ;
                   $userserv = UserService::where('service_id' , $sv->id )->get() ;
                   foreach ($userserv as $us)
                   {  $user = User::find($us->user_id) ;


                        $data[] = [
                            "category" =>    $category->label ,

                            "sub category" =>    $s->label ,
                            "service" =>    $sv->label ,
                            "user id" =>    $user

                        ] ;

                    }
                }
           }

        return response()->json(['Data'=>[$data  ]]) ;
    }
        else  return response()->json( ['message' => 'NO CONTENT'],204) ;


    }


    public function SearchUserByLabel(Request $request , $label  )
    {
        $data[] = [] ;
        $category[] = new category() ;
        $sous[] = new SubCategory() ;
        $serv[] = new Service() ;
        $userserv[] = new UserService() ;



        $category = category::where('label' ,$request->label)->first();
       if($category)
       {
           $id = $category->id ;
           $sous = SubCategory::where('category_id' ,$id)->get();
           foreach ($sous as $s)
           {

              $serv =  Service::where('subcategory_id' ,$s->id)->get();

                foreach ($serv as $sv)
                {
                //  dump($sv->label , $sv->id) ;
                   $userserv = UserService::where('service_id' , $sv->id )->get() ;
                   foreach ($userserv as $us)
                   {  $user = User::find($us->user_id) ;


                        $data[] = [
                            "category" =>    $category->label ,


                            "user id" =>    $user

                        ] ;

                    }
                }
           }

        return response()->json([$data  ]) ;
    }
        else  return response()->json( ['message' => 'NO CONTENT'],204) ;


    }


    public function SearchUserByLabelID(Request $request , $id )
    {
        $data[] = [] ;
        $data2[] = [] ;
        $category[] = new category() ;
        $sous[] = new SubCategory() ;
        $serv[] = new Service() ;
        $userserv[] = new UserService() ;



        $category = category::where('id' ,$request->id)->first();
       if($category)
       {
           $id = $category->id ;
           $sous = SubCategory::where('category_id' ,$id)->get();
           foreach ($sous as $s)
           {

              $serv =  Service::where('subcategory_id' ,$s->id)->get();

                foreach ($serv as $sv)
                {
                //  dump($sv->label , $sv->id) ;
                   $userserv = UserService::where('service_id' , $sv->id )->get() ;
                   foreach ($userserv as $us)
                   {  $user = User::find($us->user_id) ;


                        $data[] = [
                            "category" =>    $category->label ,


                            "user id" =>    $user

                        ] ;



                        if(! in_array($user, $data2)) {
                            $data2[] = $user ;

                        }

                    }
                }
           }

        return response()->json($data2  ) ;
    }
        else  return response()->json( ['message' => 'NO CONTENT'],204) ;


    }
}
