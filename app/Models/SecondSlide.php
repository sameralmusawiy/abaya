<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SecondSlide extends Model
{
    use HasFactory;
    protected $fillable=['title', 'photo', 'isShow'];

}
