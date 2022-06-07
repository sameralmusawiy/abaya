<?php

namespace App\Models;
use App\Filters\ProductFilter;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class ProductType extends Model
{
    protected $fillable=[ 'name', 'photo', 'price', 'product_id', 'size', 'color', 'fabric', 'description'];

    protected $casts = ['photo'=>'array'];


    public function scopeFilter(Builder $builder, $request)
    {
        return (new ProductFilter($request))->filter($builder);
    }

    public function products (){

        return $this->belongsTo(Product::class, 'product_id') ;
    }



    // public function prodect_sizes()
    // {
    //     return $this->hasMany(Prodect_sizes::class);
    // }

    // public function prodect_colors()
    // {
    //     return $this->hasMany(Prodect_colors::class);
    // }

    // public function prodect_fabrics()
    // {
    //     return $this->hasMany(Prodect_fabrics::class);
    // }

    public function comment()
    {
        return $this->hasMany(Comment::class, 'productType_id');
    }

    public function baskets (){

        return $this->hasMany(Basket::class) ;
    }

    public function comments()
    {
        return $this->hasManyThrough(Comment::class, User::class);
    }

    public function offers()
    {
        return $this->hasOne(Offer::class, 'product_id');
    }
    public function favorites()
    {
        return $this->hasOne(Favorite::class);
    }

    public function images (){

        return $this->hasMany(Images::class , 'product_id') ;
    }

}
