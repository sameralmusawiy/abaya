<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    use HasFactory;
    protected $fillable=[ 'name', 'email','phonenumber','country','zip','comp_name','city','district','home_no','address','date_of_birth','gender','note','user_id'];



    public function users (){

        return $this->belongsTo(User::class, 'user_id') ;
    }

    public function orders()
    {
        return $this->hasOne(Order::class);
    }
}
