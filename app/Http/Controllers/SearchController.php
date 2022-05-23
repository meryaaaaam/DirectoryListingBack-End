<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
class SearchController extends Controller
{
    //public function search($label) {
        //return Category::where("label","like","%".$label."%")->get();
    //}
    /* function search_now(request $request2) {
        $name = $request2->name;
        $result = User::where()->where(function($query) use ($request2) {
            $query->where('firstname')
            ->orWhere('lastname')
            ->orWhere('category.label')
            ->orWhere('SubCategory.label')
            ->orWhere('Service.label')->where(function($query1) use($request2){
                $query1->where('adresses.adress')
                ->orWhere('adresses.ville')
                ->orWhere('adresses.code')
                ->orWhere('adresses.province');
            });

        })
        ->toSql();
    };
    public function search_now(request $request2) {
        $word = $request2->word;
        $result = User::where("firstname","like",$request2->word)
                    ->orWhere("lastname","like",$request2->word)
                    ->orWhere("category.label","like",$request2->word)
                    ->orWhere("SubCategory.label","like",$request2->word)
                    ->orWhere("Service.label","like",$request2->word)->where(function($query) use ($request2) {
                        $query1->where('adresses.adress')
                        ->orWhere('adresses.ville')
                        ->orWhere('adresses.code')
                        ->orWhere('adresses.province');
                    })->toSql();
                    return response()->json($user);
    }*/
    public function search_now(Request $request2) {
        $word = $request2->word;
        //$result = User::join("")
        $data = DB::table('users')
        ->where('firstname',"like",$request2->word."%")
        ->orWhere('lastname',"like" ,$request2->word."%")
        ->orWhere('username',"like" ,$request2->word."%")
        ->orWhere('email',"like" ,$request2->word."%")
        ->orWhere('companyname',"like" ,$request2->word."%")

        ->join('categories','users.id', "=", 'categories.users_id')
        ->where('categories', 'categories.user_id', '=', 'users.id')

        ->Where('categories.label',"like" ,$request2->word."%")

        //->join('services', 'services.id', '=', 'services.categories_id')
        //->where('services', 'ser')
        
        ->get();
    }












    public function pro(Request $request2) {
        $name = $request2->name;
        $where = $request2->where;
        $user = User::where("role","like","pro")->where(function($query) use ($request2) {
            $query->where('firstname',"like",$request2->name."%")
            ->orWhere('lastname',"like" ,$request2->name."%")
            ->orWhere('username',"like" ,$request2->name."%")
            ->orWhere('email',"like", $request2->name."%")
            ->orWhere('companyname',"like", $request2->name."%");
            //$leagues = League::select('league_name')->whereHas('countries', function($query) use ($country) {
                //$query->where('country_name', $country);
        })
        ->join('adresses','users.adress_id','=','adresses.id')
        ->where('adresses.adress', $request2->where)
        ->get();
        return response()->json($user);
    }
    public function company(Request $request2) {
        $name = $request2->name;
        $where = $request2->where;
        $user = User::where("role","like","company")->where(function($query) use ($request2) {
            $query->where('firstname',"like",$request2->name."%")
            ->orWhere('lastname',"like" ,$request2->name."%")
            ->orWhere('username',"like" ,$request2->name."%")
            ->orWhere('email',"like", $request2->name."%")
            ->orWhere('companyname',"like", $request2->name."%");
        })
        ->join('adresses','users.adress_id','=','adresses.id')
        ->where('adresses.adress', $request2->where)
        ->get();
        return response()->json($user);
    }
    public function word(Request $request2) {
        $name = $request2->name;
        //$users = User::where("firstname", "LIKE", $request2->name."%")->get();
        //$users = User::where("firstname","%", 'like', $request2->name."%")->orderBy("firstname", 'asc')
        //->toSql();
        $users = User::where('firstname', 'LIKE', $request2->name."%")
            ->orWhere('lastname',"like" ,$request2->name."%")
            ->orWhere('username',"like" ,$request2->name."%")
        ->get();
        return response()->json($users);
        //$users = $users->filter(function ($value, $key) {
            //return starts_with($value, 'B');
         //})
    }
}
