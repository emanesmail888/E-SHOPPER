<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Orders;
use App\Models\Product;
use App\Models\ProductReview;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public  function orders(){
        return $this->hasMany(Orders::class);

    }
    
    public function productReviews()
    {
        return $this->hasMany(ProductReview::class);
    }



    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    public function isAdmin(){
        return $this->admin;
    }

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
