<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    use HasFactory;
    protected $fillable=[ 'user_id', 'productType_id', 'value'];


    public function users()
    {
        return $this->hasMany(user::class, 'user_id');
    }

    public function products_types()
    {
        return $this->hasMany(ProductType::class, 'product_id');
    }
}
