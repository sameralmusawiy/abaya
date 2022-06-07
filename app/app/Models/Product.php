<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=[ 'name', 'photo'];


    public function products_types()
    {
        return $this->hasMany(ProductType::class);
    }
}
