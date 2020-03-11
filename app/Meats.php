<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meats extends Model
{
    protected $fillable = [
        'user_id',
        'updating_user_id',
        'kind',
        'cut',
        'price_per_kg',
        'order_kg',
        'description',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function updating_user()
    {
        return $this->belongsTo(User::class);
    }
}
