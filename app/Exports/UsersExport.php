<?php

namespace App\Exports;

use App\Models\Adress;
use App\Models\Category;
use App\Models\Province;
use App\Models\Service;
use App\Models\SubCategory;
use App\Models\User;
use App\Models\UserService;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

//use Maatwebsite\Excel\src\Concerns\FromCollection;

 class UsersExport implements FromCollection, WithHeadings , WithStyles
{
    public function headings(): array
    {
        return [
            'Type',	'IDSite',	'NomContact',	'PrenomContact',	'CourrielContact'	,'TelephoneContact',	'TelephonePersonnel',
            'LangueCorrespondance',	'NomEntreprise',	'CourrielEntreprise',	'TelephoneEntreprise'	,'Neq',	'SiteWeb',
            'LinkedIn',	'Categorie'	,'Typeligne'	,'DisponibleOrganisme',	'Adresse',	'Ville',	'Province',	'CodePostal',
            'AfficherAdresse',	'CV'	,'Bio',	'IndCompteActif',	'IndCourrielActif',	'DateCreation',	'DateMAJ',
            	'Username',	'ImageLogo',

        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],


        ];
    }

    public function collection()
    {
//      dd( User::all()) ;

       $users = User::where('role', '!=' ,'Admin')->get();



     foreach ($users as $user)
     {

            $userservice = UserService::where('user_id',$user->id)->first();
            $srv = Service::find( $userservice->service_id);
            $sub = SubCategory::find( $srv->subcategory_id);
            $cat = Category::where('id',$sub->category_id)->first('label') ;
            $adr = Adress::find($user->adress_id) ;



            if($user->role == "Pro")
            {$userss = ["P" ,
                $user->id ,
                $user->lastname ?$user->lastname : "",
                $user->firstname ?$user->firstname  : "",

                $user->email? $user->email : "" ,
                $user->phone ?$user->phone : "" ,
                $user->phone ?$user->phone : "" ,
                $user->language ?$user->language : "",
                $user->companyname ?$user->companyname : "",
                $user->email ?$user->email : "",
                $user->phone ?$user->phone : "",
                $user->NEQ ?1 : "0",
                $user->website ?$user->website : "",
                $user->LinkedIn ?$user->LinkedIn  : "",
                $cat->label  ?$cat->label : "",
                $user->Line_type  ?$user->Line_type : "",
                $user->IACNC ? 1  : '0',
                $adr  ?$adr->adresse  : "",
                $adr  ?$adr->ville  : "",
                $adr  ?Province::find($adr->province_id)->name : "",
                $adr?$adr->code  : "",
                $user->isEmailActive ?1 :'0',
                $user->CV  ?$user->CV  : "",
                $user->bio  ?$user->bio  : "",

                $user->isActive  ?1 : "0",
                $user->isEmailActive ?1 :'0',
                $user->created_at?$user->created_at:'',
                $user->updated_at?$user->updated_at:'',

                $user->username  ?$user->username : "",
                $user->logo  ?$user->logo : "",
                ];}
            else
            {$userss = ["E" ,
                $user->id ,
                $user->lastname ?$user->lastname : "",
                $user->firstname ?$user->firstname  : "",

                $user->email? $user->email : "" ,
                $user->phone ?$user->phone : "" ,
                $user->phone ?$user->phone : "" ,
                $user->language ?$user->language : "",
                $user->companyname ?$user->companyname : "",
                $user->email ?$user->email : "",
                $user->phone ?$user->phone : "",
                $user->NEQ ?1 : "0",
                $user->website ?$user->website : "",
                $user->LinkedIn ?$user->LinkedIn  : "",
                $cat->label  ?$cat->label : "",
                $user->Line_type  ?$user->Line_type : "",
                $user->IACNC ? 1  : '0',
                $adr  ?$adr->adresse  : "",
                $adr  ?$adr->ville  : "",
                $adr  ?Province::find($adr->province_id)->name : "",
                $adr?$adr->code  : "",
                $user->isEmailActive ?1 :'0',
                $user->CV  ?$user->CV  : "",
                $user->bio  ?$user->bio  : "",

                $user->isActive  ?1 : "0",
                $user->isEmailActive ?1 :'0',
                $user->created_at?$user->created_at:'',
                $user->updated_at?$user->updated_at:'',

                $user->username  ?$user->username : "",
                $user->logo  ?$user->logo : "",


            ];}
         /*   $userss[] = [
                        $user->website ,
                        $user->firstname ,
                        $user->lastname ,
                        $user->email ,
                        $user->phone ,
                        $user->language ,
                        $user->companyname ,
                        $user->email ,
                        $user->phone ,
                        $user->NEQ ,
                        $user->website ,
                        $user->LinkedIn ,
                        $cat->label ,
                        $user->line_type ,
                        $adr->adresse,
                        $adr->ville,
                        $p->name,
                        $adr->code,
                        $user->CV,
                        $user->Bio,
                        $user->isActive,
                        $user->isActive,




        	//'Users.CV'	,'Users.Bio',	'Users.isActive',	'Users.isEmailActive',	'Users.created_at',	'Users.updated_at',
            //'Users.username'



     ];*/
     //------------------------------------------------
   /* }
     else {


        if($user->role == "Pro")
            {$userss = ["P" ,
                $user->website ?NULL : "null",
                $user->firstname ?NULL : "null",
                $user->lastname ?NULL : "null",
                $user->email? NULL : "null" ,
                $user->phone ?NULL : "null" ,
                $user->language ?NULL : "null",
                $user->companyname ?NULL : "null",
                $user->email ?NULL : "null",
                $user->phone ?NULL : "null",
                $user->NEQ ?NULL : "null",
                $user->website ?NULL : "null",
                $user->LinkedIn ?NULL : "null",
                $cat->label  ?NULL : "null",
                $user->line_type  ?NULL : "null",
                "null","null","null","null",
                $user->CV  ?NULL : "null",
                $user->Bio  ?NULL : "null",
                $user->isActive  ?NULL : "null",
                ];}
            else
            {$userss = ["E" ,
                $user->website ?NULL : "null",
                $user->firstname ?NULL : "null",
                $user->lastname ?NULL : "null",
                $user->email? NULL : "null" ,
                $user->phone ?NULL : "null" ,
                $user->language ?NULL : "null",
                $user->companyname ?NULL : "null",
                $user->email ?NULL : "null",
                $user->phone ?NULL : "null",
                $user->NEQ ?NULL : "null",
                $user->website ?NULL : "null",
                $user->LinkedIn ?NULL : "null",
                $cat->label  ?NULL : "null",
                $user->line_type  ?NULL : "null",
                "null","null","null",
                "null",
                $user->CV  ?NULL : "null",
                $user->Bio  ?NULL : "null",
                $user->isActive  ?NULL : "null",];}


            }*/



       $result[]= $userss ;


     }

  //   dd($result);

       return collect($result);

    }
}
