<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SearchController extends Controller
{
    //public function search($label) {
        //return Category::where("label","like","%".$label."%")->get();
    //}
    public function pro(Request $request2) {
        $name = $request2->name;


        $user = User::where("role","like","pro") ;
        $q =   $user->where('firstname',"like","%".$request2->name)->orWhere('lastname' ,$name)->orwhere('username' ,$name)


        ->toSql();

        return response()->json($q);
    }
}
