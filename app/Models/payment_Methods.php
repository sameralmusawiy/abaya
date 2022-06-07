<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payment_Methods extends Model
{
    use HasFactory;

    protected $fillable=[ 'title', 'photo', 'description', 'status'];

}
