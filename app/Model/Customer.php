<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
  protected $guard    = 'customer';
  protected $fillable = [
    'name', 'email', 'password','phone','address'
  ];
}
