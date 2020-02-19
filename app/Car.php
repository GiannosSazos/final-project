<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
   protected $fillable=[
       'user_id',
       'updating_user_id',
       'model',
       'year',
       'type',
       'fuel_type',
       'transmission',
       'doors',
       'price',

   ];

   public function user(){
       return $this -> belongsTo (User::class);
   }
    public function updating_user(){
        return $this -> belongsTo (User::class);
    }
}
