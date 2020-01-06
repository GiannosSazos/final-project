<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
   protected $fillable=[
       'model',
       'year',
       'type',
       'fuel_type',
       'transmission',
       'doors',
       'price'
   ];
}
