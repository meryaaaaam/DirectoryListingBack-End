<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adress extends Model
{
    use HasFactory;

    protected $fillable = [
        'adress' , 'city' , 'code' , 'province_id'
        ] ;



        public function User()
        {
            return $this->hasOne(User::class );
        }
}
