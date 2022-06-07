<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=['user_id','order_no', 'userInfo_id'];

    public function baskets()
    {
        return $this->hasMany(Basket::class);
    }


    public function users (){

        return $this->belongsTo(User::class, 'user_id') ;
    }

    public function products_types()
    {
        return $this->hasManyThrough(ProductType::class, Basket::class);
    }

    public function user_infos()
    {
        return $this->belongsTo(UserInfo::class, 'userInfo_id');
    }

}
