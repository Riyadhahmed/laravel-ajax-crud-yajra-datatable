<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
   //
   protected $guarded = ['id','status'];
   protected $fillable = ['username', 'first_name', 'last_name', 'gender', 'password'];
   protected $dates = ['created_at', 'updated_at'];
}
