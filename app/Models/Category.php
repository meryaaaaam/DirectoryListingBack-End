<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'label'
    ];








    protected $table = 'categories';




    public function Subcategories()
    {
            return $this->hasMany(SubCategory::class , 'category_id') ;

    }
}
