<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;
    protected $fillable=[ 'user_id', 'productType_id'];


    public function users()
    {
        return $this->belongsTo(user::class, 'user_id');
    }

    public function products_types()
    {
        return $this->belongsTo(ProductType::class, 'productType_id');
    }
}
