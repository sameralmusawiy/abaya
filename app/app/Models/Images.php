<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    use HasFactory;
    protected $fillable=['photo','product_id', 'color_id'];
    protected $casts = ['photo'=>'array'];

    public function products_types (){

        return $this->belongsTo(ProductType::class) ;
    }

}
