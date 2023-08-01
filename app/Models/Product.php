<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table='products';
    protected $primaryKey='id';
    protected $fillable=['pro_name','pro_code','pro_price','image','pro_info','spl_price','category_id','subCategories_id','stock','new_arrival'];


    public function categories(){
        return $this->belongsToMany('Category','categories');
    }


    public function category(){
        return $this->belongsTo(Category::class);
    }



    public function subCategories(){
        return $this->belongsTo(SubCategory::class);
    }


    public function getReview(){
        return $this->hasMany('App\Models\ProductReview','product_id','id')->with('user_info')->orderBy('id','DESC');
    }
}
