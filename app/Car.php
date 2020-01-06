<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
   protected $guarded=[
       'model',
       'year',
       'type',
       'fuel_type',
       'transmission',
       'doors',
       'price'
   ];
}
