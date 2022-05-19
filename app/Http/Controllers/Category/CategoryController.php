<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\SubCategory;
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


    public function SearchByLabel(Request $request  )
    {
        $label = $request->label ;
        $category[] = new category() ;

       // $category = category::where('label' ,$request->label)->firstOrFail();

        $category = category::where('label' ,$request->label)->first();
       if($category)
       {$id = $category->value('id') ;

        $sous = SubCategory::where('category_id' ,$id)->get();
        //dd($sous) ;

        // foreach ($sous as $s)
         //{dump($s->id);} die() ;
        // dd($category->get('value')) ;

        return response()->json(['Data'=>[$category , 'Sub Category'=> $sous ]]) ;}
        else  return response()->json( ['message' => 'NO CONTENT'],204) ;


    }
}
