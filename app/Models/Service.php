<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'label'  , 'subcategory_id'];




        public function users()
        {
            return $this->belongsToMany(User::class)->using(UserService::class);
        }


         /**
     * Get the post that owns the comment.
     */
      public function subcategory()
       {
        return $this->belongsTo(SubCategory::class);
        }
}
