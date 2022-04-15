<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $table='sub_cats';
    protected $primaryKey='id';
    protected $fillable=['name','category_id'];


    public function category(){
        // return $this->belongsTo('App\Categories','id');

       return $this->belongsTo(Category::class,'category_id');
     }
    // public function categories(){
    //    return $this->belongsToMany('Category','categories');
    //  }




}
