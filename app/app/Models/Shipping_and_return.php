<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping_and_return extends Model
{
    use HasFactory;
    protected $fillable=[ 'title', 'photo', 'description', 'status'];

}
