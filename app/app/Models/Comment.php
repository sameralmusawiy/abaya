<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable=[ 'comment', 'productType_id', 'user_id'];



    public function products_types (){

        return $this->belongsTo(ProductType::class, 'productType_id') ;
    }

    public function users (){

        return $this->belongsTo(User::class, 'user_id') ;
    }
}
