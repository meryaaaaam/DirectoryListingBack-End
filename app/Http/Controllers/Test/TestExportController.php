<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;

//use Maatwebsite\Excel\src\Concerns\FromCollection;

class UsersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
//      dd( User::all()) ;

      $users = User::
      join('Adresses','Adresses.id','Users.Adress_id')
      ->join('Provinces','Provinces.id','Adresses.province_id')
      ->join('user_services','user_services.user_id','users.id')
      ->join('services','services.id','user_services.service_id')
      ->join('sub_categories','sub_categories.id','services.subcategory_id')
      ->join('categories','categories.id','sub_categories.category_id')
      ->get()
     // ->join('user_services','user_service.user_id','Users.id')
      ;
       return $users;


             // dd($users) ;
     /* join('Adresses','Adresses.id','Users.Adress_id')
      ->join('Provinces','Provinces.id','Adresses.province_id')
     /*  ->join('user_services','user_services.user_id','users.id')
      ->join('services','services.id','user_services.service_id')
      ->join('sub_categories','sub_categories.id','services.subcategory_id')
      ->join('categories','categories.id','sub_categories.category_id')*/
     // ->get();
      //dd($users) ;
      /*->get( 'role','Users.website','Users.firstname' , 'Users.lastname' , 'Users.email',
        'Users.phone', 'Users.language',	'Users.companyname',	'Users.email',	'Users.phone'	,'Users.NEQ',	'Users.website',
        'Users.LinkedIn',
        //'Categorie'	,'line_type'	,'DisponibleOrganisme',
        'Adresse.adresse',	'Adresse.ville',	'Provinces.name',	'Adresse.code',
        'Users.line_type',


        	'Users.CV'	,'Users.Bio',	'Users.isActive',	'Users.isEmailActive',	'Users.created_at',	'Users.updated_at',
            'Users.username');*/
     // ->join('user_services','user_service.user_id','Users.id')

    }
}
