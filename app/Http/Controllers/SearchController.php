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
        //dd($request2);
        $user = User::where("role","like","Pro")->where(function($query) {
        $query->where('firstname','name')
                ->orWhere('lastname','name');
        })
        ->toSql();
        //dd($user);
        return response()->json($user);
    }
}   