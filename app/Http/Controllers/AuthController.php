<?php
namespace App\Http\Controllers;

use App\Models\Adress;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


use Illuminate\Support\Facades\Hash;
use App\Models\User;
//use Validator;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }
    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request){
    	$validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        if (! $token = auth()->attempt($validator->validated())) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return $this->createNewToken($token);
    }
    /**
     * Register a User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|between:2,100|unique:users',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|confirmed|min:6',
            'role' => 'required|string',
            'isActive' => 'boolean',
            'isTermsAccepted' => 'required|boolean'


        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        $user = User::create(array_merge(
                    $validator->validated(),
                    ['password' => bcrypt($request->password)] , ['isActive' => 0]
                ));
        return response()->json([
            'message' => 'User successfully registered',
            'user' => $user
        ], 201);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout() {
        auth()->logout();
        return response()->json(['message' => 'User successfully signed out']);
    }
    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh() {
        return $this->createNewToken(auth()->refresh());


    }
    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function userProfile() {
       // return response()->json(auth()->user());
        if ( auth()->user() )
        {

            $user = auth()->user() ;
            $adress = Adress::find( $user->adress_id );



            $province = Province::find($adress->province_id);

            $rep = [
                 "adress"=>  $adress->adress,
                "city"=>  $adress->city,
                "code"=>  $adress->code,
                "province"=>  $province->name,
                "province_id"=>  $adress->province_id,
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
                "status"=>  $user->status,
                "isEmailActive"=>  $user->isEmailActive,
                "isAvailable"=>  $user->isAvailable,
                "IACNC"=>  $user->IACNC,
                "LinkedIn"=>  $user->LinkedIn,
                "Line_type"=>  $user->Line_type,







            ] ;

            return response()->json($rep) ;




        }
        else
        { return response()->json(['message' => 'Authontification required' , 404]) ;  }
    }


    public function userProfilewithAdr() {
        // return response()->json(auth()->user());
         if ( auth()->user() )
         {   $user = auth()->user() ;


            if($user->adress_id)
            {$adress = Adress::find( $user->adress_id );

             $province = Province::find($adress->province_id);



             //return response()->json($user );
             return response()->json(["user"=>$user ,"adress"=>$adress->adress , "city"=>$adress->city , "code"=>$adress->code

             ,"province_id"=>$province->name] ) ;}

             else
             {   return response()->json(["user"=>$user]) ;} }





         else
         { return response()->json(['message' => 'Authontification required' , 404]) ;  }
     }

    public function getRoles() {
        // return response()->json(auth()->user());
         if ( auth()->user() )
         { $role = auth()->user()->role ;

            return response()->json($role) ;}
         else
         { return response()->json(['message' => 'Authontification required' , 404]) ;  }
     }
    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function createNewToken($token){
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => auth()->user()
        ]);
    }
}
