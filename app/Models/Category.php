<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    use HasFactory;
    protected $fillable=['name'];

//     public function products()
// {
// return $this->hasMany(Product::class);
// }

public function subCategories()
{

    // return $this->hasMany('App\SubCategories','foreign_key_column_name');


 return $this->hasMany(SubCategory::class,'category_id');
}


    public function products(){
        return $this->hasMany(Product::class);
    }


}
