<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    protected $fillable=['order_id','product_id', 'quantity', 'color', 'size', 'fabric'];


    public function orders (){

        return $this->belongsTo(Order::class, 'order_id') ;
    }

    public function products_types (){

        return $this->belongsTo(ProductType::class, 'product_id') ;
    }

}
