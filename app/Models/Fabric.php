<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fabric extends Model
{
    protected $fillable=[ 'name'];

    public function products_types (){

        return $this->belongsTo(ProductType::class, 'productType_id') ;
    }

}
