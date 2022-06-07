<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Offer extends Model
{
    use HasFactory;
    protected $fillable=['product_id','discount', 'end_time'];


    public function products_types (){

        return $this->belongsTo(ProductType::class, 'product_id') ;
    }
}
