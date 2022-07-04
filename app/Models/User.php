<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable  implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',

        'firstname',
        'lastname',
        'companyname',
        'phone',
        'line_type',
        'isTermsAccepted',

        'logo',
        'photo',
        'adresse',
        'website',
        'bio',
        'role',
        'isActive',
        'status',
        'IACNC',
        'adress_id',
        'isEmailActive',
        'service_id',
        'NEQ' ,
        'CV',
        'LinkedIn',

        'language',
        'note' ,


        'created_at' , 'updated_at'

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function getJWTIdentifier() {
        return $this->getKey();
    }
    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims() {
        return [];
    }



    public function services()
    {
        return $this->belongsToMany(Service::class , 'user_services','user_id','service_id');
    }

    public function UserServices()
    {
        return $this->belongsToMany(Service::class, 'user_services', 'user_id','service_id'   )->using(UserService::class);
       // return $this->belongsToMany(Service::class, 'user_services', 'user_id','service_id'   )->using(UserService::class);
    }


    public function Adresse()
    {
        return $this->hasOne(Adress::class );
    }
    
}
