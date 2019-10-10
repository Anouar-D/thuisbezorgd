<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consumable extends Model
{
    protected $fillable = [
        'title', 'category', 'description', 'price',
    ];

    public function restaurant(){
        return $this->belongsTo('App\Restaurant');
    }
}
