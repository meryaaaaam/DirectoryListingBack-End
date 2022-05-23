<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'label' , 'category_id'];






        public function Category()
        {
            return $this->belongsTo(Category::class , 'category_id' ) ;

        }
        public function services()
        {
            return $this->hasMany(Service::class , 'subcategory_id');
        }

    }
